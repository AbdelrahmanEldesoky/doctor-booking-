@foreach($methods as $item )
<div class="col-lg-5 col-md-5 col-sm-12 col-12 mt-3">
  
                                                                <div
                                                                    class="card bg-light d-flex flex-fill has-shadow payment_box">
                                                                    <div class="ribbon-wrapper ribbon-lg">
                                                                        <div class="ribbon bg-success">
                                                                            Account
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="card-header bold_head text-muted border-bottom-0">
                                                                        Bank Account
                                                                    </div>
                                                                    <div class="card-body pt-0 mt-2">
                                                                        <div class="row">
                                                                            <div class="col-6 text-center">
                                                                                <img src="{{asset('images/payment/Bank.png')}}"
                                                                                    alt="Bank Account"
                                                                                    class="img-circle img-fluid">
                                                                            </div>
                                                                            <div class="col-md-12 mt-2">
                                                                                <p class="text-muted text-sm lh_sm">
                                                                                    <b>Bank: </b> {{$item->bank_name}}</p>
                                                                                <p class="text-muted text-sm lh_sm">
                                                                                    <b>Branch: </b> {{$item->branch_name}}</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <ul class=" mb-0 fa-ul text-muted">
                                                                                <li class="small"><span class="fa-li"><i
                                                                                            class="fa fa-file fs-15"></i></span>
                                                                                    Account Name : {{$item->account_name}}
                                                                                </li>
                                                                                <li class="small"><span class="fa-li"><i
                                                                                            class="fa fa-credit-card fs-15"></i></span>
                                                                                    Account No! :
                                                                                    {{$item->account_number}}
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <hr>
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12">
                                                                                <input type="checkbox"
                                                                                    name="Makeyourselfonline" class="eye_line" checked>
                                                                                <i class="btn btn-info fa fa-eye edit_bank"
                                                                                   data-id="{{$item->id}}"
                                                                                   data-bank="{{$item->bank_name}}"
                                                                                   data-branch="{{$item->branch_name}}"
                                                                                   data-swift="{{$item->swift_code}}"
                                                                                   data-iban="{{$item->iban}}"
                                                                                   data-account="{{$item->account_name}}"
                                                                                   data-number="{{$item->account_number}}"
                                                                                    style="float: right"></i>

                                                                            </div>

                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endforeach