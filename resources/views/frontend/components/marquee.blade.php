
    <div class="container-fluid bg-marquee">
        <div class="container">


            @if (!empty(Session::get('locale') == 'ar'))
                <marquee behavior="" direction="right">
                    {{setting()['newsbar_1_ar'] ?? ''}}
                </marquee>
            @else
                <marquee behavior="" direction="left">
                    {{setting()['newsbar_1_en'] ?? ''}}
                </marquee>
            @endif

        </div>
    </div>
