<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\Doctor\TransactionDataTable;
use App\Models\Transaction;
use App\Http\Requests\BankRequest;
use App\Http\Requests\MobileRequest;
use App\Models\PaymentMethod;
use Faker\Provider\ar_EG\Payment;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TransactionDataTable $dataTable)
    {
       $methods= PaymentMethod::where('user_id',Auth::user()->id)->where('type','bank_account')->get();
       $mobiles= PaymentMethod::where('user_id',Auth::user()->id)->where('type','mobile_account')->get();
        $assets = ['data-table'];
        return $dataTable->render('doctor.transactions.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Transaction::findOrFail($id);

        return view('doctor.transactions.show', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function bankAccont(BankRequest $request)
    {
       $request->merge(['user_id' => Auth::user()->id]);
       
       PaymentMethod::updateOrCreate(['id' => $request->id], $request->all());

       $methods= PaymentMethod::where('user_id',Auth::user()->id)->where('type','bank_account')->get();
       $view = view('doctor.components.appendBank', get_defined_vars())->render();

       return response()->json(['view' => $view,'success','Created successfully','target' => 'appendBank']);

    }
    public function mobileAccont(MobileRequest $request)
    {
        $request->merge(['user_id' => Auth::user()->id,'type' => 'mobile_account']);
       PaymentMethod::updateOrCreate(['id' => $request->id], $request->all());

       $mobiles= PaymentMethod::where('user_id',Auth::user()->id)->where('type','mobile_account')->get();

       $view = view('doctor.components.appendMobile', get_defined_vars())->render();

       return response()->json(['view' => $view,'success','Created successfully','target' => 'appendMobile']);
    }
}
