<div class="slick-slider-appointments">
    @foreach($schedules[$doctor->id] as $key => $item)
    <div class="text-center" style="min-width:135px;margin:10px">
        <div class="schedule_head"> @lang('site.'.$key)</div>
        @foreach($item as $list)
        @if($list->schedule_type == 'online')
        <div class="schedule_time" data-day="{{getDayNumber($key)}}" data-type="interval" data-id="{{$list->id}}">
            {{$list->from}} - {{$list->to}}
        </div>
        @else
        <div class="schedule_time" data-day="{{getDayNumber($key)}}" data-type="telehealth" data-id="{{$list->id}}">
            From {{$list->from}}
            <br>
            To {{$list->to}}
        </div>
        @endif
        @endforeach
    </div>
    @endforeach
</div>
