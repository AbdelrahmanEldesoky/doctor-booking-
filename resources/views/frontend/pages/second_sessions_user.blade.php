<link href="{{ asset('new_assets/booking/style.css') }}" rel="stylesheet">

<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css"> --}}

@extends('new_layouts.app')

@section('title')
    <title>ipersona / {{ trans('second_sessions_user.home') }}</title>
@endsection

@extends('new_layouts.master_pages')

<!--  start Section  -->
@section('section')
    <section id="hero" class="hero">
        <div class="container position-relative">
            <div class="row gy-5 aos-init aos-animate" data-aos="fade-in">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
                    <h2 class="text-center ">{{ trans('second_sessions_user.home') }}</h2>
                    <p class="h3 text-center we"> {{ trans('second_sessions_user.brief') }}</p>
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                    <img src="https://www9.0zz0.com/2023/05/04/04/935654529.png " class="img-fluid aos-init aos-animate"
                        alt="" data-aos="zoom-out" data-aos-delay="100">
                </div>
            </div>
        </div>

    </section>
@endsection
<!-- End Hero Section -->
<style>

</style>


<!--  start Section  -->

@section('about_us')
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">
            <div class="row">

                <div class="col-lg-12 col-sm-12 text-center">
                    <div class="section-header">
                        <h1 class="about_us_title">{{ trans('second_sessions_user.home') }}</h1>
                    </div>
                   <table class="table p-lg-2 table-bordered text-center  teable_sessions_user " id="mytable">
                        <thead class="table-light we">
                            <tr>
                                <th class="text-center" scope="col">#</th>
                                <th class="text-center" scope="col">{{ trans('second_sessions_user.name') }}</th>
                                <th class="text-center" scope="col">{{ trans('second_sessions_user.sessio_link') }}</th>
                                <th class="text-center" scope="col">{{ trans('second_sessions_user.today') }}</th>
                                <th class="text-center" scope="col">{{ trans('second_sessions_user.history') }}</th>
                                <th class="text-center" scope="col">{{ trans('second_sessions_user.watch') }}</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($appointments as $key => $query)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <th>{{ $query->doctor ? $query->doctor->name : ($query->hospital ? $query->hospital->name : '-') }}
                                    </th>
                                    <!-- <th>{{ $query->doctor ? 'Doctor' : 'Hospital' }}</th> -->
                                    <th>
                                        @if ($query->join_url)
                                            <!--<a href="{{ route('join.session', $query->join_url) }}" class="btn btn-site">@lang('site.Start_session')</a>-->
                                            <a href="{{ $query->join_url }}" class="btn btn-site">@lang('site.Start_session')</a>
                                        @endif
                                    </th>
                                    <th>
                                        @if ($query->schedule)
                                            @lang('site.' . $query->schedule->date)
                                        @endif
                                    </th>
                                    <th> {{ $query->from }}</th>
                                    <th>
                                        <a href="{{ route('user.appointments.show', $query->id) }}" class="btn btn-site-2">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script>
        let table = new DataTable('#myTable');
        $(document).ready(function() {
            $('#mytable').DataTable({
                // responsive: true

            });

        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $('#link_show').click(function() {
            Swal.fire({
                //   title: 'تفاصيل الحجز!',
                //   html:
                //     '<h4 class="we text-white p-0 m-0"> الدكتور : عبد الرحمن</h4> <br>'
                //      +'<h4 class="we text-white p-0 m-0"> الحالة  : ملغي</h4> <br>' +
                //     '<h4 class="we text-white p-0 m-0"> اليوم :  السبت  </h4> <br> ' +
                //     '<h4 class="we text-white p-0 m-0"> التاريخ : 5/6/2023  </h4> <br> ' +
                //      '<h4 class="we text-white p-0 m-0"> الساعة: 5 مساءاً بتوقيت مصر</h4> '  +
                //      '<h4 class="we text-white p-0 m-0"> الساعة:  6 مساءاً بالتوقيت المحلي</h4> '  +
                //      '<h4 class="we text-white p-0 m-0"> المبلغ  = 3000 جنيه     </h4> <br> ' ,


                html: '<div class="border"> ' +
                    '<h4 class="we text-white p-0 m-0"> الدكتور: عبدالرحمن</h4> ' +
                    '<h4 class="we text-white p-0 m-0"> الحالة : ملغي</h4> ' +
                    '<h4 class="we text-white p-0 m-0"> التاريخ : 5-6-2023    </h4> <br> ' +
                    '<h4 class="we text-white p-0 m-0"> الساعة: 5 مساءاً بتوقيت مصر</h4> ' +
                    '<h4 class="we text-white p-0 m-0"> الساعة:  6 مساءاً بالتوقيت المحلي</h4> ' +
                    '<h4 class="we text-white p-0 m-0"> المبلغ  = 3000 جنيه     </h4> <br> ' +
                    ' </div>',

                imageUrl: 'https://images.squarespace-cdn.com/content/v1/5efa0fe78713d718e5a23e0d/1623170942484-0DIN15JGG47O71NGWLFL/Prof+Dr+Ahmed+Hatem.png?format=1000w',
                imageWidth: 400,
                imageHeight: 200,
                imageAlt: 'Custom image',
            })
        })
    </script>

    <style>
        .swal2-image {

            width: 247px !important;
            border-radius: 50% !important
        }

        .swal2-popup {
            background-color: #9b8cf8;
        }
    </style>
@endsection
<!-- End Hero Section -->
