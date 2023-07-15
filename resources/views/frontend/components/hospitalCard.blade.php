<div class="card-item card-item-list doctor_list_item_@" style="background:honeydew">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 doctor_card">
                <div class="card-img text-center append-card-img" style="">
                    <a href="javascript:;" class="d-block">
                        <img src="{{ doctorProfile($hospital->getRawOriginal('image'),null,$hospital->image) }}" alt="image" style="">
                    </a>
                </div>
                <div class="mt-3 align-items-center text-center">
                    <div class="fz16 text-blue name" style="font-size:20px"> {{$hospital->name}}</div>
                </div>
                
                <div class="card-rating text-center mb-3">
                @php(list($count,$rate) = avgRating($hospital->id))
                        @for($i=1;$i<=5;$i++) @php($fill=$i <=$count ? 'text-warning' : '' ) <i
                            class="fa fa-star  {{$fill}} "></i>
                            @endfor
                </div>
                <div class="card-rating text-center mb-3">
                    @lang('site.average_price'): {{$hospital->my_price}}  
                    @if(Session::get('locale') == 'ar')
                    جنيه
                    @else
                    EGP
                    @endif
                </div>
                <div class="fz16 text-blue name about_section">
                        {{ substr($hospital->information  ? $hospital->information->about : '-',0,200) }}
                    </div>
               
                <div class="mt-3 align-items-center text-center ">
                    <div class="btn-group w-100" role="group" aria-label="Basic example">
                    <a class=" _book_hospital btn btn-site" href="{{route('hospitals.show',$hospital->id)}}" style="" data-hospital="{{$hospital->id}}">@lang('site.book_me')</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
