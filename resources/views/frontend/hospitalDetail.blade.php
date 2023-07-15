@extends('layouts.app')
@section('title','Home')
@push('css')


<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"> -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"> -->
<style>
    .hide {
        display: none;
    }

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

    .theme_color {
        color: #3BBEDC;
    }

    .mb-20p {
        margin-bottom: 20px;
    }

    .item {
        align-items: center;
        background-color: tomato;
        color: white;
        display: flex;
        height: 300px;
        justify-content: center;
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

<div style="wdth:300px"></div>

@php($direction = Session::get('locale') == 'en' ? 'ltr' : 'ltr')
<div class="w-bg pb-5 statistics " dir="{{$direction}}">
    <div class="container">
        <div class="slick-slider" style="margin-top:20px">
            @foreach($images as $image)
            <div class="" style="padding:20px">
                <img src="{{doctorProfile($image->getRawOriginal('image'),'custom',$hospital->image)}}"
                    style="width:100%;margin-bottom:10px">
            </div>
            @endforeach
        </div>

        <div class="row fitered_doctors_list" style="margin-top:20px">
            <div class="col-md-4">
                <h3>{{$hospital->name}}</h3>
                <div class="card-rating mb-1 mt-1">
                    @php(list($count,$rate) = avgRating($hospital->id))
                    @for($i=1;$i<=5;$i++) @php($fill=$i <=$count ? 'text-warning' : '' ) <i
                        class="fa fa-star  {{$fill}} "></i>
                        @endfor

                        ({{$rate}})
                </div>
                <!-- <div class="d-flex mt-3">
                    @php($lang_picker = Session::get('locale') == 'en' ? 'flatpickr-month-en' : 'flatpickr-month-ar')
                    @php($margin = Session::get('locale') == 'en' ? 'margin-right:30px' : 'margin-left:30px')
                    <div class="mb-20p" style="{{$margin}}">@lang('site.check_in') <br>
                        <input type="text" id="fp-default" name="froom_date" value="{{session('from_date')}}"
                            class="form-control froom_date {{$lang_picker}}">
                    </div>
                    <div class="mb-20p">@lang('site.check_out') <br>
                        <input type="text" id="fp-default" name="too_date" value="{{session('to_date')}}"
                            class="form-control {{$lang_picker}} too_date">
                    </div>
                </div> -->
            </div>
            <div class="col-md-8">
                <div class="row">
                    @foreach($rooms as $room)
                    @php(list($price,$curr) = getRoomPrice($room,'currency'))
                    <div class="col-md-4 mb-20p">
                        <div class="text-center" style="padding: 20px;border: 1px solid;border-radius: 20px;">
                            {{$room->lang_name}}
                            <br>
                            <span style="font-size:14px">{{$price}} {{$curr}}</span>
                            <br>
                            <button data-hospital="{{$hospital->id}}" data-room="{{$room->id}}"
                                class="btn btn-primary mt-4 book_hospital"> @lang('site.book')</button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-12">
                <div class="card mt-3 card-site">
                    <h4>
                        @lang('site.patient_reviews')
                    </h4>
                    @foreach($hospital->hospitalRatings as $rate)
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


<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
    $('#owl-carousel').owlCarousel({
    loop: true,
    margin: 30,
    dots: true,
    nav: true,
    items: 2,
})
</script> -->
@endpush
