<script>

    $('.schedule_time').click(function(){

        $('#date_input').datepicker({
          beforeShowDay: function(date) {
            var day = jQuery.datepicker.formatDate('yy-mm-dd', date);
            return [msg.indexOf(day) == -1]
          }
        });
        let customday = [$(this).data('day')];
        var arr = [1, 2, 3] //these are the array of days numbers return from controller
        
        $('#date_input').datepicker('option', 'beforeShowDay', function(date){
                    var day = date.getDay();
                    return [(customday.indexOf(day) != -1)];
            });
    });

    @php($app_id = null)
    @if (auth()->user())
        @php([$app_id, $doc_id, $hos_id] = appointRate())
    @endif

    @if (session('message'))
        toastr.success("{{ session('message') }}");
    @elseif (session('error'))
        toastr.error("{{ session('error') }}");
    @endif

    $('.change_sch_box').change(function() {
        let value = $(this).val();
        $('.sch_boxes').addClass('hide');
        $('.sch_box_' + value).removeClass('hide');

        setTimeout(function() {
            $('.sch_box_' + value).slick('destroy')
        }, 100)
        setTimeout(function() {
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

    let day = $('.schedule_time').data('day');
    let appoint_id = $('.schedule_time').data('id');
    let appoint_type = $('.schedule_time').data('type');



    $('#book_now').click(function(e) {
        
        e.preventDefault();
        date = $('.book_box_input').val();
       
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
                }
            },
        });
    })
    let customPickr = $('.book_box_input');
    if (customPickr.length) {
                customPickr.flatpickr({
                    minDate: "today",
                    "disable": [
                        function (date) {
                            return (date.getDay() != day);
                        }
                    ],
                });
            }
</script>