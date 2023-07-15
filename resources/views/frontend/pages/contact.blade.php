@extends('layouts.app')
@section('title', 'تواصل معنا')
@push('css')
@endpush
@section('content')
<div class="tabslid pages-banner">
    <div class="container text-center px-0">

        <div class="py-0  text-center">
            <h1 class="GraphikArabic-Black-Web text-white">
                @lang('site.Contact')
            </h1>
        </div>

    </div>
</div>




    <div class="container my-5">



        <div class="row g-5">

            <div class="col-md-12">

                <div class=" card-fields">
                    <h2>@lang('site.submit_inquiry')</h2>
                    <form class="submit_form" action="{{route('contactMessage')}}" method="post">
                    @csrf
                    <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="firstName" class="form-label">@lang('site.name')</label>
                                <input type="text" name="name" class="form-control required" id="" placeholder="John Doe"
                                    value="" required>
                            </div>

                            <div class="col-sm-6">
                                <label for="lastName" class="form-label">@lang('site.email')</label>
                                <input type="text" class="form-control required" name="email" placeholder="johndoe@gmail.com"
                                    value="" required>
                            </div>

                            <div class="col-12">
                                <label for="username" class="form-label">@lang('site.message')</label>
                                <textarea name="message" class="form-control required" id="" placeholder="@lang('site.message')" cols="30" rows="8"></textarea>
                            </div>
                        </div>


                        <button class=" btn btn-primary btn-lg btn-site border-0 mt-4" type="submit">@lang('site.submit_inquiry')</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card-fields">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3452.85110745194!2d31.205067299999996!3d30.069802099999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14584110811a76ef%3A0xd01139373d5fda34!2zMzAyINi02KfYsdi5INin2YTYs9mI2K_Yp9mGLCBBYmQgRWwtTmFlZW0sIEltYmFiYSwgR2l6YSBHb3Zlcm5vcmF0ZSAzNzU1MTMwLCBFZ3lwdA!5e0!3m2!1sen!2s!4v1671803758351!5m2!1sen!2s"
                        style="border:0;width:100%;min-height:435px;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>



@endsection
@push('js')
