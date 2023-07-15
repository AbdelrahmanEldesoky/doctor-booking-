<div class="row">
    <div class="col-md-12">
        <div class="card-item card-item-list doctor_list_item_@" data-url="{{route('doctor.show',$doctor->id)}}">
            <form method="post" action="{{route('credit')}}" class="pay_form" id="payment_form">
                @csrf
                <input type="hidden" name="schedule_id" value="{{$schedule->id}}">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 doctor_card">
                            <div class="card-img text-center append-card-img" style="">
                                <a href="{{route('doctor.show',$doctor->id)}}" class="d-block">
                                    <img src="{{doctorProfile($doctor->getRawOriginal('image'),null,$doctor->image)}}" alt="img"
                                        style="">
                                </a>
                            </div>
                            <div class="mt-3 align-items-center text-center">
                                <div class="fz16 text-blue name">
                                    @if (!empty(Session::get('locale') == 'ar'))
                                    {{$doctor->name_ar}}
                                    @else
                                    {{$doctor->name}}
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 ">
                            <div class="appoint_detail">
                                <div class="row ">
                                    <div class="col-md-4">
                                        <label>@lang('site.day'):</label>
                                        <p class="small_text">@lang('site.'.$schedule->date)</p>
                                    </div>
                                    <div class="col-md-4">
                                        <label>@lang('site.date'):</label>
                                        <p class="small_text">{{$request->date}}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <label>@lang('site.payment_type'):</label>
                                        <p class="small_text">Card</p>
                                    </div>
                                    @php(list($price,$curr) = getSessonPrice($doctor,true,'currency'))
                                    <div class="col-md-4">
                                        <label>@lang('site.amount'):</label>
                                        <p class="small_text">{{$price}}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <label>@lang('site.from'):</label>
                                        <p class="small_text">{{$schedule->from}}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <label>@lang('site.to'):</label>
                                        <p class="small_text">{{$schedule->to}}</p>
                                    </div>

                                </div>
                            </div>
                        </div>



                        <div class="col-md-12 mt-3">
                            <input type="text" value="" name="promocode" placeholder="Promo Code"
                                class="form-control is_valid_promocode">
                        </div>
                        <div class="col-md-12 mt-3">
                            <div class="row">
                                     @foreach(getGateway() as $key => $gate)
                                @if(in_array($gate->name_en,['Master Card Or Visa','mobile wallet','aman','fawry']))
                                <div class="form-check col-md-6">
                                    @php($checked = $gate->name_en == 'Master Card Or Visa' ? 'checked' : '')
                                    <input class="form-check-input gate" type="radio" value="{{$gate->paymentId}}" name="gate" id="gate{{$key}}"
                                        {{$checked}}>
                                    <label class="form-check-label" for="gate{{$key}}">
                                 
                                    <img src="{{$gate->logo}}" style="width:80px">
                                    @if (!empty(Session::get('locale') == 'ar'))
                                    <span style="font-size:12px;">{{$gate->name_en == 'Master Card Or Visa' ? 'كروت بنكية' : $gate->name_ar}}</span>
                                    @else
                                    <span style="font-size:12px;text-transform: capitalize;">{{$gate->name_en == 'Master Card Or Visa' ? 'Bank Cards' : $gate->name_en}}</span>
                                    @endif
                                        
                                    </label>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-12  mt-3">
                            <label>@lang('site.phone_mobile')</label>
<input class="form-control pay_phone" type="text" value="{{auth()->user()->information ? auth()->user()->information->phone : ''}}" name="phone_mobile">
                        </div>
                        <div class="col-md-12 doctor_card">
                            <div class="mt-3 align-items-center text-center ">
                                <div class="btn-group w-100" role="group" aria-label="Basic example">
                                    <!-- <button type="button" data-id="{{$doctor->id}}" class="btn btn-info text-white book_me_btn">Book Me</button> -->
                                    <button type="submit" class="btn btn-theme pay_submit">@lang('site.checkout')</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-8 ">

    </div>

</div>
<style>
    .flatpickr-calendar {
        z-index: 99999999999999999999 !important;
    }

</style>
