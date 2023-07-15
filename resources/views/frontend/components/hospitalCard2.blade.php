<div class="card" style="width: 20rem;">
    <div class="card-block">
        <img src="{{ doctorProfile($hospital->getRawOriginal('image'),null,$hospital->image) }}">
        <h4 class="card-title text-center about_us_title">
            {{$hospital->name}}
        </h4>
        <p class="card-text we text-center">
            {{ substr($hospital->information  ? $hospital->information->about : '-',0,200) }}
        </p>
        <div class="d-flex justify-content-center  ">
            @php(list($count,$rate) = avgRating($hospital->id))
            @for($i=1;$i<=5;$i++) @php($fill=$i <=$count ? 'text-warning' : '' ) <i
                class="fa fa-star  {{$fill}} "></i>
            @endfor
        </div>
        <div class="d-flex justify-content-around we ">
            <p class="we h5">
                @lang('site.average_price'): {{$hospital->my_price}}  
                @if(Session::get('locale') == 'ar')
                جنيه
                @else
                EGP
                @endif
            </p>
        </div>
        <div class="d-flex justify-content-start">
            <a href="{{route('booking_hospital_details',$hospital->id)}}"  data-price="0.5"
            class="add-to-cart btn purple btn-primary p-2 w-100">{{ trans('second_booking_doctor.book_now') }}</a>
        </div>
    </div>
</div>

