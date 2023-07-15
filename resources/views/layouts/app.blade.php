<!DOCTYPE html>
@if (!empty(Session::get('locale') == 'en'))
    <html dir="ltr">
@else
    <html dir="rtl">
@endif


<head>

    @if (!empty(Session::get('locale') == 'en'))
        <link href="{{ asset('frontend/dist/css/style_v.css') }}" rel="stylesheet" />
    @else
        <link href="{{ asset('frontend/dist/css/style_Ar_v.css') }}" rel="stylesheet" />
    @endif
    @include('frontend.include.head')
    <style>
        .doctor_list_item {
            cursor: pointer;
        }

        .GraphikArabic-Semibold-Web {
            color: white !important;
        }

        .GraphikArabic-Black-Web {
            color: #3BBEDC !important
        }

        .schedule_time {
            padding: 10px 0 10px 0;
            border-bottom: 1px solid;
        }

        .book_box {
            padding-left: 30px;
            padding-right: 30px;
        }

        .ft-15 {
            font-size: 25px;
        }

        .lang_flag {
            position: absolute;
            display: none;
        }

        .lang_flag .nav-link {
            display: flex;
            color: white;
            font-size: 11px;
            padding: 0px;
        }

        .lang_flag img {
            height: 25px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .left-15pr {
            left: 15%;
        }

        .right-15pr {
            right: 15%;
        }

        @media screen and (max-width: 767px) {
            .lang_flag {
                display: block;
            }
        }
    </style>
    @stack('css')


    <script async src="https://www.googletagmanager.com/gtag/js?id=G-43FQZ85NXW"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-43FQZ85NXW');
    </script>
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-55M8SPZ" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <div class="container-fluid">
        <div class="row heightapp">
            <div class="align-self-start p-0">
                @include('frontend.include.header')

                @yield('content')
            </div>
        </div>
    </div>


    @include('frontend.include.footer')
    @include('frontend.include.script')

    <form id="delete-form" action="" method="POST" style="display: none;">
        @csrf
        @method('delete')
    </form>
    <div class="modal fade" id="appointmentPayModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document" style="">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('site.book_psy')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body append_pay_appointment">

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="RateModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('site.rate_our_service')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="" action="{{ route('rate') }}" method="post">
                        @csrf
                        <input type="hidden" class="appp_id" value="" name="appointment_id">
                        <input type="hidden" class="docc_id" value="" name="doctor_id">
                        <input type="hidden" class="hoss_id" value="" name="hospital_id">
                        <label for="username" class="form-label">@lang('site.rating')</label>
                        <input type="number" name="rating" id="rating1"
                            class="rating text-warning form-control text-center" data-clearable="remove" />

                        <label for="username" class="form-label">@lang('site.message')</label>
                        <textarea name="comment" class="form-control required" required id="" placeholder="@lang('site.message')"
                            cols="20" rows="3"></textarea>

                        <button class=" btn btn-primary btn-lg btn-site border-0 mt-4"
                            type="submit">@lang('site.submit')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @php($app_id = null)
    @if (auth()->user())
        @php([$app_id, $doc_id, $hos_id] = appointRate())
    @endif

    <script src="https://use.fontawesome.com/5ac93d4ca8.js"></script>
    <script src="{{ asset('js/bootstrap4-rating-input.js') }}"></script>
    <script type="text/javascript">
        $(function() {
            $('input').on('change', function() {
                $(this).val()
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            @if ($app_id)
                let app_id = '{{ $app_id }}';
                let doc_id = '{{ $doc_id }}';
                let hos_id = '{{ $hos_id }}';

                $('.appp_id').val(app_id);
                $('.docc_id').val(doc_id);
                $('.hoss_id').val(hos_id);

                $('#RateModal').modal('show');
            @endif
        })

        $(document).on('change', '.search_country_id', function() {
            let city = $(this).val();
            $.ajax({
                type: 'GET',
                data: {
                    city: city
                },
                url: '{{ route('append.areas') }}',
                success: function(response) {
                    $('.appendCities').html(response.view);
                },
            });
        })

        $(document).on('click', '.doctor_list_item', function() {
            let url = $(this).data('url');

            window.location.href = url;
        })

        $(document).on('click', '.book_hospital', function(e) {
            e.preventDefault();
            @if (!Auth::user())
                toastr.error('Please Login to book Appointment');
                window.location.href = `{{ route('login') }}`;
                return false;
            @endif
            let hospital_id = $(this).data('hospital');
            let room_id = $(this).data('room');
            let too_date = $('.too_date').val();
            let froom_date = $('.froom_date').val();
            toastr.success(@json(__('site.sent_request_wait')));
            $.ajax({
                type: 'GET',
                data: {
                    hospital_id: hospital_id,
                    room_id: room_id,
                    too_date: too_date,
                    froom_date: froom_date
                },
                url: '{{ route('hospitals.appointment') }}',
                success: function(response) {
                    if (response.error) {
                        toastr.error(response.error);
                    } else {
                        toastr.success(response.success);
                    }
                }
            });
        })

        $(document).on('submit', '.submit_form', function(e) {
            e.preventDefault();
            if (!validate($(this)))
                return false;
            if ($("div").hasClass("alert-dangers")) {
                return false;
            }
            toastr.success(@json(__('site.sent_request_wait')));
            var form = $(this);
            var data = new FormData(this);
            $(form).find('.submit_btn').prop('disabled', true);
            $.ajax({
                type: 'POST',
                data: data,
                cache: !1,
                contentType: !1,
                processData: !1,
                url: $(form).attr('action'),
                async: true,
                headers: {
                    "cache-control": "no-cache"
                },
                success: function(response) {
                    $(form).find('.submit_btn').prop('disabled', true);
                    if (response.error) {
                        toastr.error(response.error);
                    } else {
                        toastr.success(response.success);
                    }
                    $(form).find('.submit_btn').prop('disabled', false);
                    if (!response.update) {
                        $(form).trigger("reset");
                    }
                },
                error: function(xhr, status, error) {
                    if (xhr.status == 422) {
                        $(form).find('div.alert').remove();
                        var errorObj = xhr.responseJSON.errors;
                        $.map(errorObj, function(value, index) {
                            var appendIn = $(form).find('[name="' + index + '"]').closest(
                                'div');
                            if (!appendIn.length) {
                                toastr.error(value[0]);
                            } else {
                                $(appendIn).append(
                                    '<div class="alert alert-danger" style="padding: 1px 5px;font-size: 12px"> ' +
                                    value[0] + '</div>')
                            }
                        });
                        $(form).find('.submit_btn').prop('disabled', false);

                    } else {
                        $(form).find('.submit_btn').prop('disabled', false);
                        toastr.error('Unknown Error!');
                    }

                }
            });
        });

        function validate(that) {
            var valid = true;
            $(".alert-danger").remove();

            that.closest('form').find(".required:visible").each(function() {
                if ($(this).val() == "" || $(this).val() === null || ($(this).attr('type') == "radio" && $(
                        '[name="' + $(this).attr('name') + '"]:checked').val() == undefined)) {
                    $(this)
                        .closest("div")
                        .append('<div class="alert-danger">This field is required</div>');

                    valid = false;
                }
            });
            if (!valid) {
                $("html, body").animate({
                        scrollTop: $(".alert-danger:first").offset().top - 80,
                    },
                    100
                );
            }
            return valid;
        }

        let date = '';
        let appoint_id = '';
        let appoint_type = '';
        $(document).on('click', '.book_me_btn', function(e) {
            e.preventDefault();
            let doctor_id = $(this).data('id');
            toastr.success(@json(__('site.sent_request_wait')));
            $.ajax({
                type: 'GET',
                data: {
                    doctor_id: doctor_id
                },
                url: '{{ route('append.schedules') }}',
                success: function(response) {
                    $('.append_body').html(response.view);
                    $('#appointmentModal').modal('show');
                }
            });
        })


        $(document).on('click', '.schedule_time', function(e) {
            e.preventDefault();
            let day = $(this).data('day');
            appoint_id = $(this).data('id');
            appoint_type = $(this).data('type');
            $(this).closest('.book_box').addClass('hide');
            $(this).closest('.book_box').next('.book_box').removeClass('hide');
            let customPickr = $('.flatpickr-custom');
            if (customPickr.length) {
                customPickr.flatpickr({
                    minDate: "today",
                    "disable": [
                        function(date) {
                            return (date.getDay() != day);
                        }
                    ],
                });
            }
        })
        $(document).on('click', '.back_interval', function(e) {
            e.preventDefault();
            $(this).closest('.book_box').addClass('hide');
            $(this).closest('.book_box').prev('.book_box').removeClass('hide');
        })

        $(document).on('click', '.book_appointment_btn', function(e) {
            e.preventDefault();
            date = $(this).closest('.book_box').find('.appoint_date').val();
            if (!date) {
                toastr.error(@json(__('site.select_date')));
                return false;
            }
            toastr.success(@json(__('site.sent_request_wait')));
            let prevUrl = '{{ url()->current() }}';
            $.ajax({
                type: 'GET',
                data: {
                    schedule_id: appoint_id,
                    type: appoint_type,
                    date: date,
                    prevUrl: prevUrl
                },
                url: '{{ route('doctor.appointment') }}',
                success: function(response) {
                    if (response.error) {
                        toastr.error(response.error);
                        if (response.url) {
                            window.location.href = response.url;
                        }
                    } else {
                        toastr.success(response.success);
                        if (response.open) {
                            $('.append_pay_appointment').html(response.view);
                            $('#appointmentPayModal').modal('show');
                        } else {
                            window.location.href = `{{ route('home') }}`;

                        }


                        // $('#appointmentModal').modal('hide');
                        // window.location.href = '{{ route('user.appointments.index') }}';
                    }
                },
            });
        })


        $(document).on('change', '.is_valid_promocode', function() {
            let code = $(this).val();
            $.ajax({
                type: 'GET',
                data: {
                    code: code
                },
                url: '{{ route('validCode') }}',
                success: function(response) {
                    if (response.error) {
                        toastr.error(response.error);
                    } else {
                        toastr.success(response.success);
                    }
                },
            });
        })



        @if (session('message'))
            toastr.success("{{ session('message') }}");
        @elseif (session('error'))
            toastr.error("{{ session('error') }}");
        @endif
    </script>




    @stack('js')

</body>

</html>
