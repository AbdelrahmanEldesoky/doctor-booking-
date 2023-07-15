@extends('layouts.app')
@section('title', trans('site.rating'))
@push('css')
<style>
    p{
        text-align: justify;
    }
    .error
    {
        color: red;
    }
</style>
@endpush
@section('content')
    <!-- <div class="tabslid pages-banner">
        <div class="container text-center px-0">

            <div class=" text-center">
                <h1 class="GraphikArabic-Black-Web text-white">
                    @lang('site.wait')
                </h1>
            </div>

        </div>
    </div> -->

    <main class="container my-5">
        <div class="row g-5">
            <div class="col-md-6 offset-md-3 mb-4">
                <div class=" card-site" >
                    <h2 class="site-heading text-center">@lang('site.rate_our_service')</h2>
                    <form class="" action="{{route('rate')}}" method="post">
                    @csrf
                    <input type="hidden" value="{{ $appointment_id }}" name="appointment_id">
                    <input type="hidden" value="{{ $doctor_id }}" name="doctor_id">
                    <input type="hidden" value="{{ $hospital_id }}" name="hospital_id">
                            <label for="username" class="form-label">@lang('site.rating')</label>
                                <input type="number" name="rating" id="rating1" class="rating text-warning form-control text-center" data-clearable="remove"/>

                                <label for="username" class="form-label">@lang('site.message')</label>
                                <textarea name="comment" class="form-control required" id="" placeholder="@lang('site.message')" cols="20" rows="3"></textarea>

                        <button class=" btn btn-primary btn-lg btn-site border-0 mt-4" type="submit">@lang('site.submit')</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

@endsection
@push('js')
<!-- <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css"> -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.3.1/flatly/bootstrap.min.css"> -->
    <script src="https://use.fontawesome.com/5ac93d4ca8.js"></script>
    <script src="{{asset('js/bootstrap4-rating-input.js')}}"></script>
    <style type="text/css">
      .container { margin: 150px auto; font-size: 20px; }
    </style>
    <script type="text/javascript">
        $(function () {
            $('input').on('change', function () {
                 $(this).val()
            });
        });
    </script>
@endpush
