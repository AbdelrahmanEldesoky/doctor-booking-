<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Report;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;


class PaymentController extends Controller
{

  public function credit(Request $request) {
      $appointment = Appointment::findOrFail($request->appointment_id);
      Session::put('appointment_id',$request->appointment_id);
      dd(session('appointment_id'));
      $token = $this->getToken();
      $order = $this->createOrder($token,$appointment);
      $paymentToken = $this->getPaymentToken($order, $token,$appointment);
    //   dd($order,$paymentToken);
      return \Redirect::away('https://portal.weaccept.co/api/acceptance/iframes/'.env('PAYMOB_IFRAME_ID').'?payment_token='.$paymentToken);
  }

  public function getToken() {
      $response = Http::post('https://accept.paymob.com/api/auth/tokens', [
         'api_key' => env('PAYMOB_API_KEY')
      ]);
      return $response->object()->token;
  }

  public function createOrder($token,$appointment) {
      $items = [
          [ "name"=> "Appointment",
              "amount_cents"=> $appointment->amount * 100,
              "description"=> "Appointment",
              "quantity"=> "1"
          ],
      ];

      $amount = $appointment->amount * 100;
      $data = [
          "auth_token" =>   $token,
          "delivery_needed" =>"false",
          "amount_cents"=> "1234",
          "currency"=> "EGP",
          "items"=> $items,

      ];
      $response = Http::post('https://accept.paymob.com/api/ecommerce/orders', $data);
      return $response->object();
  }

  public function getPaymentToken($order, $token,$appointment)
  {
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
          "amount_cents" => $appointment->amount * 100,
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
    dd($request->all(),Session::get('appointment_id'),session('appointment_id'));
      $data = $request->all();
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
        $appointment = Appointment::findOrFail(Session::get('appointment_id'));
        Report::create(
            ['appointment_id' => $appointment->id,
            'schedule_id' => $appointment->schedule_id,
            'doctor_id' => $appointment->doctor_id,
            'patient_id' => $appointment->patient_id,
            'session_amount' => $appointment->amount,
            'paid_amount' => $appointment->amount,
            'status' => 'paid',]
        );
        $appointment->status = 'complete';
        $appointment->save();
        return redirect()->route('user.dashboard')->with('message','payment succeded');
      }
      return redirect()->route('user.dashboard')->with('error','there is some issue');
  }
}