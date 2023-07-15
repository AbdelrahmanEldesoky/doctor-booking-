<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Report;
use App\Models\Schedule;
use App\Models\Setting;
use App\Models\PromocodeUser;
use App\Models\Promocode;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use AymanElmalah\MyFatoorah\Facades\MyFatoorah;

class PaymentController extends Controller
{

  public function credit(Request $request) {

      $schedule = Schedule::findOrFail($request->schedule_id);
      list($amount,$currency) = getSessonPrice($schedule->user,true,'currency');
      if($currency != 'EGP')
      {
        $amount = $amount * (setting()['dollar_price'] ?? 1);
      }
      if($request->promocode)
      {
       $amount = $this->validPromo($request->promocode,$schedule,$amount);
      }
      Session::put('schedule_id',$schedule->id);
      Session::put('amount',$amount);
    //   dd(session('appointment_id'));
      $token = $this->getToken();
      $order = $this->createOrder($token,$schedule,$amount,$currency);
      $paymentToken = $this->getPaymentToken($order,$token,$schedule,$amount,$currency);
    //   dd($order,$paymentToken);
      return \Redirect::away('https://accept.paymob.com/api/acceptance/iframes/'.env('PAYMOB_IFRAME_ID').'?payment_token='.$paymentToken);
  }

  public function getToken() {
      $response = Http::post('https://accept.paymob.com/api/auth/tokens', [
         'api_key' => env('PAYMOB_API_KEY')
      ]);
      return $response->object()->token;
  }

  public function createOrder($token,$schedule,$amount,$currency) {
      $items = [
          [ "name"=> "Appointment",
              "amount_cents"=> $amount * 100,
              "description"=> "Appointment",
              "quantity"=> "1"
          ],
      ];

      $amount = $amount * 100;
      $data = [
          "auth_token" =>   $token,
          "delivery_needed" =>"false",
          "amount_cents"=> "1234",
          "currency"=> 'EGP',
          "items"=> $items,

      ];
      $response = Http::post('https://accept.paymob.com/api/ecommerce/orders', $data);
      return $response->object();
  }

  public function getPaymentToken($order, $token,$schedule,$amount,$currency)
  {
    // dd($order, $token,$schedule,(int)$amount,$currency);
    $amount = (int)$amount;
      $billingData = [
          "apartment" => "803",
          "email" => "claudette09@exa.com",
          "floor" => "42",
          "first_name" => "Clifford",
          "street" => "Ethan Land",
          "building" => "8028",
          "phone_number" => "+86(8)9135210487",
          "shipping_method" => "PKG",
          "postal_code" => "01898",
          "city" => "Jaskolskiburgh",
          "country" => "CR",
          "last_name" => "Nicolas",
          "state" => "Utah"
      ];
      $data = [
          "auth_token" => $token,
          "amount_cents" => $amount * 100,
          "expiration" => 3600,
          "order_id" => $order->id,
          "billing_data" => $billingData,
          "currency" => "EGP",
          "integration_id" => env('PAYMOB_INTEGRATION_ID')
      ];
      $response = Http::post('https://accept.paymob.com/api/acceptance/payment_keys', $data);
      return $response->object()->token;
  }
  public function callback(Request $request)
  {
      $data = $request->all();
    //   dd($data);
        if(isset($data['invoice_id']))
        {
            $appointment = $this->createApp($data);
            $appointment->payment_status = 'paid';
            $appointment->save();
            sendDoctorEmail($appointment);
            sendPatientEmail($appointment);

            smsToUser($appointment->doctor,$appointment,'online', 'doctor');
            smsToUser($appointment->patient,$appointment,'online','patient');
            return redirect()->route('thankyou')->with('message','payment succeded');

        }
      return redirect()->route('home')->with('error', trans('There_is_some_issue'));
  }
  
  public function createApp($data = null)
  {
       $id = Session::get('schedule_id');
            $amount = Session::get('amount');
            $schedule = Schedule::where('id',$id)->first();
            $location = getLocation();
            $location = strtolower($location)  == 'egypt' ? 'egyption' : 'outsider';
            $appointment = Appointment::create(['user_type' => $location,'clinic_id' => $schedule->clinic_id,'schedule_id' => $schedule->id,'amount'=> $amount ?? 0,'doctor_id' => $schedule->user_id,'patient_id'=>Auth::user()->id,'type' => $schedule->schedule_type,'from' => session('from_date')]);
      
            $appointment->save();
            Session::put('doctor_id',$appointment->doctor_id);
            return $appointment;
  }
  public function __callback(Request $request)
  {
    dd($request->all());
      $data = $request->all();
       if(!$data)
       {
        abort(404);
       }

      ksort($data);
      $hmac = $data['hmac'];
      $array = [
          'amount_cents',
          'created_at',
          'currency',
          'error_occured',
          'has_parent_transaction',
          'id',
          'integration_id',
          'is_3d_secure',
          'is_auth',
          'is_capture',
          'is_refunded',
          'is_standalone_payment',
          'is_voided',
          'order',
          'owner',
          'pending',
          'source_data_pan',
          'source_data_sub_type',
          'source_data_type',
          'success',
      ];
      $connectedString = '';
      foreach ($data as $key => $element) {
          if(in_array($key, $array)) {
              $connectedString .= $element;
          }
      }
      $secret = env('PAYMOB_HMAC');
      $hased = hash_hmac('sha512', $connectedString, $secret);
      if ( $hased == $hmac) {
        if($data['success'] == "true")
        {
            $id = Session::get('schedule_id');
            $amount = Session::get('amount');
            $schedule = Schedule::where('id',$id)->first();
            $location = getLocation();
            $location = strtolower($location)  == 'egypt' ? 'egyption' : 'outsider';
            $appointment = Appointment::create(['user_type' => $location,'clinic_id' => $schedule->clinic_id,'schedule_id' => $schedule->id,'amount'=> $amount ?? 0,'doctor_id' => $schedule->user_id,'patient_id'=>Auth::user()->id,'type' => $schedule->schedule_type,'from' => session('from_date')]);
            // $appointment = Appointment::findOrFail(Session::get('appointment_id'));
            // Report::create(
            //     ['appointment_id' => $appointment->id,
            //     'schedule_id' => $appointment->schedule_id,
            //     'doctor_id' => $appointment->doctor_id,
            //     'patient_id' => $appointment->patient_id,
            //     'session_amount' => $appointment->amount,
            //     'paid_amount' => $appointment->amount,
            //     'status' => 'paid',]
            // );
            // $appointment->status = 'complete';
            $appointment->save();
            Session::put('doctor_id',$appointment->doctor_id);

            sendDoctorEmail($appointment);
            sendPatientEmail($appointment);

            smsToUser($appointment->doctor,$appointment,'online', 'doctor');
            smsToUser($appointment->patient,$appointment,'online');

            return redirect()->route('thankyou')->with('message','payment succeded');

        }
        return redirect()->route('home')->with('error', trans('There_is_some_issue_in_your_card'));
      }
      return redirect()->route('home')->with('error', trans('There_is_some_issue'));
  }

  public function validPromo($code,$schedule,$amount)
  {
    $promocode =  Promocode::where('code',$code)->first();
    if($promocode)
    {
       $date = $promocode->expiry ? $promocode->expir : Carbon::now();
       $dis = $promocode->discount ? $promocode->discount : 0;

        $codeUsers =  PromocodeUser::where('promocode_id',$promocode)->get();
      if($codeUsers->count() >= $promocode->total_user)
      {
         return $amount;
      }
      $myCode = $codeUsers->where('user_id',auth()->user()->id);
      if($myCode->count() >= $promocode->total_user)
      {
        return $amount;
      }
      
       if(Carbon::now()->lte(Carbon::parse($date)))
       {
        $dis = ($amount * $dis)/100;
        $amount = $amount - $dis;
       }

    }
    return $amount;
  }

  public function error(Request $request)
  {
      return redirect()->route('home')->with('error','There is somthing wrong with card');
  }

  public function index(Request $request) {
    //   dd($request->all());
      $gate = $request->gate ?? 2;
      $schedule = Schedule::where('id',$request->schedule_id)->first();
      if(!$schedule)
      {
        abort(403);
      }
      $pat = auth()->user();
      $name = $pat->name;
      $email = $pat->email;
      $phone = $request->phone_mobile ??  '123456789';
    //   $phone = $pat->information ? ($pat->information->phone ?? '123456789') : '123456789';
      
      list($amount,$currency) = getSessonPrice($schedule->user,true,'currency');
      if($currency != 'EGP')
      {
        $amount = $amount * (setting()['dollar_price'] ?? 1);
      }
      if($request->promocode)
      {
       $amount = $this->validPromo($request->promocode,$schedule,$amount);
      }
      Session::put('schedule_id',$schedule->id);
      Session::put('amount',$amount);
    //MY CODE
    
    $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://app.fawaterk.com/api/v2/invoiceInitPay',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "payment_method_id": "'.$gate.'",
    "cartTotal": "'.$amount.'",
    "currency": "EGP",
    "customer": {
        "first_name": "'.$name.'",
        "last_name": "'.$name.'",
        "email": "'.$email.'",
        "phone": "'.$phone.'",
        "address": "test address"
    },
    "redirectionUrls": {
         "successUrl" : "https://ipersona.me/payment/callback",
             "failUrl": "https://ipersona.me/payment/error",
             "pendingUrl": "https://ipersona.me/payment/callback"   
    },
    "cartItems": [
        {
            "name": "this is test oop 112252",
            "price": "'.$amount.'",
            "quantity": "1"
        }
    ]
}',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer 12580f76f429e721aed4ef5641fae391c5f45d0583fcc525ff',
    'Content-Type: application/json'
  ),
));

     $response = curl_exec($curl);

     curl_close($curl);
     $pay = json_decode($response);
     
     if($gate != 2)
     {
         list($invoice_id,$code) =  $this->getGateCode($pay,$gate);
         $appointment = $this->createApp();
         $appointment->invoice_id = $invoice_id;
         $appointment->invoice_code = $code;
         $appointment->payment_status = 'unpaid';
         $appointment->save();

         
         return redirect()->route('paymentPending');
        
     }
     return redirect($pay->data->payment_data->redirectTo);
   }
   
   public function getGateCode($pay,$gate)
   {
       $code = null;
     $invoice_id =   $pay->data->invoice_id;
     if($gate == 3)
     {
         $code = $pay->data->payment_data->fawryCode;
     }
       if($gate == 4)
     {
         $code = $pay->data->payment_data->meezaReference;
     }
        if($gate == 12)
     {
         $code = $pay->data->payment_data->amanCode;
     }
     Session::put('invoice_code',$code);
     return [
         $invoice_id,
         $code
         ];
   }
   public function fawaterkWebhook(Request $request)
   {
            $data = $request->all();
            if(isset($data['invoice_status']) && $data['invoice_status'] == 'paid')
            {
                $app = Appointment::where('payment_status','unpaid')->where('invoice_code',$data['referenceNumber'])->first();

                if($app)
                {
                    $app->payment_status = 'paid';
                    $app->save();
                    
                    
         sendDoctorEmail($app);
         sendPatientEmail($app);

         smsToUser($app->doctor,$app,'online', 'doctor');
         smsToUser($app->patient,$app,'online','patient');
                }
            }
   }
   
   
   
}
