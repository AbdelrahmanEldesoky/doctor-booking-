{{-- <div class="swiper mySwiper">
    <div class="swiper-wrapper">
<div class="swiper-slide rate ps-5 pe-5">
        <p class=" we p-2 m-auto h1 time_link justify-content-between border-bottom w-100">
            <b>الاحد</b>
        </p>
        <a href="#" class=" we d-flex ms-2 me-2 time_link justify-content-between border-bottom w-100">
            <b>02:02 صباحاً</b>
            <b>02:02 مساءً</b>
        </a>
        <a href="#"
            class=" we d-flex ms-2 me-2 time_link justify-content-between border-bottom w-100">
            <b>02:02 صباحاً</b>
            <b>02:02 مساءً</b>
        </a>
</div>

</div>

<div class="swiper-button-next"></div>
<div class="swiper-button-prev"></div>
</div> --}}
@if ($typee == 'online')
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            @foreach ($schedules[$doctor->id] as $key => $item)
                <div class="swiper-slide ps-5 pe-5">
                    <p class=" we p-2 m-auto h1 time_link justify-content-between border-bottom w-100">
                        <b> @lang('site.' . $key)</b>
                    </p>
                    @foreach ($item as $k => $list)
                        @php($hide = $k <= 4 ? '' : 'simple_hide hide')
                        @if ($list->schedule_type == 'online')
                            <a href="#"
                                data-day="{{ getDayNumber($key) }}" data-type="telehealth" data-id="{{ $list->id }}"
                                class="schedule_time we d-flex m-auto h5 time_link justify-content-evenly p-2 border-bottom w-75">
                                <b>{{ $list->from }} - {{ $list->to }}</b>
                            </a>
                        @else
                            <a class="we d-flex m-auto h5 time_link justify-content-evenly  border-bottom w-75">
                                <b>@lang('site.from') : {{ $list->from }}</b>
                                <br>
                                <b>@lang('site.to') : {{ $list->to }}</b>
                            </a>
                        @endif
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    @endforeach

                </div>
            @endforeach
        </div>
    </div>
@else
    @foreach ($doctor->clinics as $kk => $clinic)
        @php($hide = $kk == 0 ? '' : 'hide')
        <div class="sch_box_{{ $clinic->id }} sch_boxes {{ $hide }}">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @foreach ($schedules[$clinic->id] as $key => $item)
                        <div class="swiper-slide rate ps-5 pe-5 swiper-slide_doctor">
                            <p class=" we p-2 m-auto h1 time_link justify-content-between border-bottom w-100">
                                <b> @lang('site.' . $key)</b>
                            </p>
                            @foreach ($item as $k => $list)
                                @php($hide = $k <= 4 ? '' : 'simple_hide hide')
                                @if ($list->schedule_type == 'online')
                                    <a href="#"
                                        class="we d-flex ms-2 me-2 time_link justify-content-between border-bottom w-100">
                                        <b>{{ $list->from }} - {{ $list->to }}</b>
                                    </a>
                                @else
                                    <a class="schedule_time {{ $hide }} we d-flex m-auto h6 time_link justify-content-between border-bottom w-100"
                                        data-day="{{ getDayNumber($key) }}" data-type="telehealth"
                                        data-id="{{ $list->id }}">
                                        <b>@lang('site.from') : {{ $list->from }}</b>
                                        <br>
                                        <b>@lang('site.to') : {{ $list->to }}</b>
                                    </a>
                                @endif
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
@endif
