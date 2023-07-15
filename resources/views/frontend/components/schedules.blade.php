@if($typee == 'online')
<div class="slick-slider-appointments">
    @foreach($schedules[$doctor->id] as $key => $item)
    <div class="text-center sch_area" style="min-width:135px;margin:10px">
        <div class="schedule_head"> @lang('site.'.$key)</div>
        @foreach($item as $k => $list)
        @php($hide = $k <=4 ? '' : 'simple_hide hide' ) 
        @if($list->schedule_type == 'online')
            <div class="schedule_time {{$hide}}" data-day="{{getDayNumber($key)}}" data-type="interval"
                data-id="{{$list->id}}">
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
            @if($hide == 'simple_hide hide')
            <button class="btn btn-success w-100 show_sched show">@lang('site.show')</button>
            @endif
    </div>
    @endforeach
</div>
@else

@foreach($doctor->clinics as $kk => $clinic)
@php($hide = $kk == 0 ? '' : 'hide')
<div class="slick-slider-appointments sch_box_{{$clinic->id}} sch_boxes {{$hide}}">
    @foreach($schedules[$clinic->id] as $key => $item)
    <div class="text-center sch_area" style="min-width:135px;margin:10px">
        <div class="schedule_head"> @lang('site.'.$key)</div>
        @foreach($item as $k => $list)
        @php($hide = $k <=4 ? '' : 'simple_hide hide' )
        @if($list->schedule_type == 'online')
            <div class="schedule_time vdsv {{$hide}} {{$k}}" data-day="{{getDayNumber($key)}}" data-type="interval"
                data-id="{{$list->id}}">
                {{$list->from}} - {{$list->to}}
            </div>
            @else
            <div class="schedule_time {{$hide}}" data-day="{{getDayNumber($key)}}" data-type="telehealth" data-id="{{$list->id}}">
                From {{$list->from}}
                <br>
                To {{$list->to}}
            </div>
            @endif
            @endforeach
            @if($hide == 'simple_hide hide')
            <button class="btn btn-success w-100 show_sched show">@lang('site.show')</button>
            @endif
    </div>
    @endforeach
</div>
@endforeach

@endif
