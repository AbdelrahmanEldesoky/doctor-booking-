   @foreach($ratings as $rate)
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