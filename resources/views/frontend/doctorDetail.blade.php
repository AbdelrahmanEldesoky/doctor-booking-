@extends('layouts.app')
@section('title','Home')
@push('css')
<style>
    .fill {
        color: #FFD700;
    }
    .append-card-img img {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        object-position: top;
        border: 2px solid #3da8c0;
        padding: 2px;
        box-shadow: 0 0 6px #3da8c04d;
    }
    .appoint_detail {
        padding: 10px;
        border: 1px solid;
        border-radius: 10px;
        margin-top: 20px;
    }
    .hide {
        display: none;
    }
</style>
@endpush
@section('content')
<div class="bg_home-slider"></div>
<div class="tabslid" style="min-height:100% !important">
    <div class="container text-center px-0">
        <div class="main-tabs bg-site" style="margin-top:20px">
            @include('frontend.components.searchForm')
        </div>
    </div>
</div>
<div class="w-bg pb-5 statistics ">

    <div class="container">
        <div class="row fitered_doctors_list " style="margin-top:20px">
            <div class="col-md-8">
                <div class="card-item card-item-list doctor_list_item" data-url="{{route('doctor.show',$doctor->id)}}">

                    <div class="card-body ">
                        <div class="row mt-4">
                            <div class="col-md-3">
                                <div class="card-img" style="height:150px;width:150px;overflow:hidden">
                                    <a href="javascript:;" class="d-block">
                                        <img src="{{ doctorProfile($doctor->getRawOriginal('image'),null,$doctor->image) }}" alt="img"
                                            style="width:100%">
                                    </a>
                                </div>

                            </div>
                            <div class="col-md-9">
                                <p>
                                    <span class="price__from">
                                        @if (!empty(Session::get('locale') == 'ar'))
                                        {{$doctor->name_ar}}
                                        @else
                                        {{$doctor->name}}
                                        @endif
                                    </span>
                                </p>
                                <p style="font-size: 13px;font-weight: lighter">


                                    @if (!empty(Session::get('locale') == 'ar'))
                                    {{   $doctor->information  ? $doctor->information->job_title_ar : '-'}}
                                    @else
                                    {{   $doctor->information  ? $doctor->information->job_title : '-'}}
                                    @endif
                                </p>
                                <!-- <div class="card-rating">
                                    <div class="d-flex" style="width:fit-content">
                                   
                                     //   @php(list($count,$rate) = avgRating($doctor->id))
                                      //  @for($i=1;$i<=5;$i++) @php($fill=$i <=$count ? 'text-warning' : '' ) <i
                                            class="fa fa-star  {{$fill}} "></i>
                                        //    @endfor
                                    </div>

                                </div> -->
                                <div class="card-rating">
                                    <div class="d-flex" style="width:fit-content">
                                   
                                        @php(list($count,$rate) = avgRating($doctor->id))
                                        @for($i=1;$i<=5;$i++) @php($fill=$i <=$rating ? 'text-warning' : '' ) <i
                                            class="fa fa-star  {{$fill}} "></i>
                                            @endfor
                                    </div>

                                </div>
                                <div class="card-price d-flex align-items-center justify-content-between">
                                    <p>
                                        <span class="price__from" style="font-size:14px">
                                            @lang('site.over_all_rate_from')
                                            {{ $rate}}
                                            @lang('site.users')
                                        </span>
                                    </p>
                                </div>



                                <p style="font-size: 13px;font-weight: lighter;margin-top: 14px;">
                                    {{$doctor->information ? $doctor->information->about : '-'}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-site">
                    <div class="card-body">
                        <h4>
                            @lang('site.specialities')
                        </h4>
                        @foreach($doctor->specialities as $item)
                        {{$item->name}}
                        @endforeach
                    </div>
                </div>
                <!-- <div class="card mt-3">
                    <div class="card-body">
                        <h4>
                            About
                        </h4>
                        <table class="table table-borderless">

                            <tbody>
                                <tr>
                                    <th scope="row">Country</th>
                                    <td>{{$doctor->information ? $doctor->information->country : '-'}}</td>
                                    <th>City</th>
                                    <td>{{$doctor->information ? $doctor->information->city : '-'}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Hospital</th>
                                    <td>{{$doctor->information ? $doctor->information->hospital : '-'}}</td>
                                    <td>Clinic</td>
                                    <td>{{$doctor->information ? $doctor->information->clinic : '-'}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> -->

            </div>

            <div class="col-md-4">
                <div class="filter_sidebar mt-0">
                    <div class="filter_header">
                        <div>
                            <i class="fa fa-book"></i>
                            @lang('site.choose_appointments')
                            <p class="m-0 p-0">@lang('site.Egypt_Time')</p>
                        </div>
                    </div>
                    <div class="filter_body " style="">
                        @if($typee == 'ofline')
                        <div style="padding-right:10px">
                            <select class="form-control form-select change_sch_box">
                                @foreach($doctor->clinics as $clinic)
                                <option value="{{$clinic->id}}">{{$clinic->lang_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif
                        <div class="book_box">
                            <div class="" dir="ltr">
                                @include('frontend.components.schedules')
                            </div>
                        </div>
                        <div class="book_box hide">
                            <div style="text-align:right"><button class="btn btn-danger back_interval" type="button">
                                    @lang('site.back')</button>
                            </div>
                            <div class="ml-1 w-300p">
                                <label>@lang('site.select_date_for_appointment') :</label>
                                @php($lang_picker = Session::get('locale') == 'en' ? 'flatpickr-month-en' : 'flatpickr-month-ar')
                                <input type="text" id="fp-default" name="date"
                                    class="form-control appoint_date flatpickr-custom">
                            </div>
                            <div style="text-align:right">
                                <button class="btn btn-site mt-2 book_appointment_btn"
                                    style="width:100px"> @lang('site.book')
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card mt-3 card-site">
                    <div class="card-body p-0">
                        <h4>
                            @lang('site.clinics_media')
                        </h4>
                        <div class="row" dir="ltr">
                            <div class="slick-slider">
                                @foreach($images as $image)
                                <div class="" style="padding:20px">
                                <img src="{{ subDomainAsset($image->image) }}" style="width:100%;  object-fit:cover;">
                                </div>
                                @endforeach
                            </div>
                            <!-- @foreach($images as $item)
                                <div class="col-lg-3 col-sm-6 col-12 mb-3">
                                    <img src="{{ subDomainAsset($item->image) }}" style="width:100%; height:350px; object-fit:cover;">

                                </div>
                            @endforeach -->
                        </div>


                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mt-3 card-site">
                    <h4>
                        @lang('site.video')
                    </h4>
                    <iframe style="width:100%; height:35vw;"
                        src="https://www.youtube.com/embed/{{  $doctor->information  ? $doctor->information->embed_link : '#'}}">
                    </iframe>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card mt-3 card-site">
                    <h4>
                        @lang('site.patient_reviews')
                    </h4>
                    @foreach($doctor->doctorRatings as $rate)
                    <div class="d-flex">
                    @for($i=1;$i<=5;$i++)
                     @php($fill=$i <=$rate->rating ? 'text-warning' : '' )
                     <i class="fa fa-star  {{$fill}} "></i>
                     @endfor

                     <span style="font-size: 14px;margin-left: 28px;">@lang('site.overall_rating')</span>
                    </div>

                    <div style="margin-top:10px;margin-bottom:10px">{{$rate->comment}}</div>
                    @php($margin = Session::get('locale') == 'ar' ? 'margin-right:15px' : 'margin-left:15px')
                    <div style="font-size:14px;display:flex">{{$rate->rateBy->name}} <div style="{{$margin}}"> {{customDate($rate->created_at,'d M Y')}}</div></div>
                    <hr>
                    @endforeach

                </div>
            </div>

        </div>
    </div>
</div>

</div>

@endsection
@push('js')



<script>
    $(document).on('click', '.show_sched', function () {
        let textt = $(this).text();
        if ($(this).hasClass('show')) {
            $(this).text(@json(__('site.hide')))
        } else {
            $(this).text(@json(__('site.show')))
        }
        $(this).toggleClass('show');
        $(this).closest('.sch_area').find('.simple_hide').toggleClass('hide');
    })

</script>
<script>
    $(document).on('change', '.change_sch_box', function () {
        let value = $(this).val();
        $('.sch_boxes').addClass('hide');
        $('.sch_box_' + value).removeClass('hide');

        setTimeout(function () {
            $('.sch_box_' + value).slick('destroy')
        }, 100)
        setTimeout(function () {
            $('.sch_box_' + value).slick({
                dots: false,
                infinite: true,
                autoplay: true,
                speed: 300,
                slidesToShow: 1,
                slidesToScroll: 1,
                responsive: [

                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 360,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        }, 300)

    })

</script>
@endpush
