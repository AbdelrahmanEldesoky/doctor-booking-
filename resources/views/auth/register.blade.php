@extends('layouts.app')
@section('title', trans('site.register'))
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>

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

    <main class="container mb-3 mt-1">


        <div class="row g-5">

            <div class="col-lg-12 mb-4">

                <div class="card-site" >
                    <div class=" text-center mb-3">
                        <h1 class="GraphikArabic-Black-Web text-white">
                            @lang('site.register')
                        </h1>
                    </div>
                    <form class="auth-login-form p-1" action="{{$route}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label>@lang('site.name')</label>
                                    <input class="form-control" required type="text" name="name"
                                        placeholder="john" />
                                    @error('name')
                                    <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label>@lang('site.email')</label>
                                    <input class="form-control" required type="email" name="email"
                                        placeholder="john@example.com" />
                                    @error('email')
                                    <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label>@lang('site.mobile_number')</label>
                                    <input class="form-control" required type="text" name="phone" placeholder="" />
                                    @error('phone')
                                    <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label>@lang('site.gender')</label>
                                    <select class="form-control" name="gender">
                                        <option value="male">@lang('site.male')</option>
                                        <option value="female">@lang('site.female')</option>
                                        <option value="other">@lang('site.other')</option>
                                    </select>
                                    @error('gender')
                                    <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            @if($type=='doctor')
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label>@lang('site.job_title')</label>
                                    <input class="form-control" required type="text" name="job_title" placeholder="" />
                                    @error('job_title')
                                    <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="input-box">
                                    <label class="label-text">@lang('site.select_city')</label>
                                    <div class="form-group">
                                        <select class="form-control search_country_id" name="city">
                                            <option class="" value="">@lang('site.select_city')</option>
                                            @foreach ($cities as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="input-box">
                                    <label class="label-text">@lang('site.select_speciality')</label>
                                    <div class="form-group">
                                        <select class="form-control select2" multiple name="speciality_id[]">
                                            <option class="" value="">@lang('site.select_speciality')</option>
                                            @foreach ($specialities as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="input-box">
                                    <label class="label-text">@lang('site.select_area')</label>
                                    <div class="form-group">
                                        <select class="form-control appendCities" name="area">
                                            <option class="hidden" disabled="" value="">@lang('site.select_area')
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-4">
                                <div class="input-box">
                                    <label class="label-text">@lang('site.profile_image')</label>
                                    <div class="form-group">
                                        <input type="file" name="file" class="dropify">
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="col-lg-6 mb-4">
                                <div class="input-box">
                                    <label class="label-text">@lang('site.select_residence')</label>
                                    <div class="form-group">
                                        <select class="form-control " name="residence">
                                            <option class="" value="">@lang('site.select_residence')</option>
                                            <option value="egyption">@lang('site.egyption')</option>
                                            <option value="NonEgyption">@lang('site.NonEgyption')</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="login-password">@lang('site.password')</label>
                                    <input class="form-control" required id="login-password" type="password"
                                        name="password" placeholder="············" aria-describedby="login-password"
                                        tabindex="2" />
                                    @error('password')
                                    <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="login-password">@lang('site.confirm_password')</label>
                                    <input class="form-control" required type="password" name="confirm_password"
                                        placeholder="············" aria-describedby="login-password" tabindex="2" />
                                    @error('confirm_password')
                                    <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            @endif


                            <div class="col-md-12 mt-4">
                                <button class="btn btn-site btn-block">@lang('site.register') </button>

                            </div>
                        </div>
                    </form>

                </div>
            </div>


        </div>
    </main>

@endsection
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<script>
    $('.dropify').dropify();
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>

<script type="text/javascript">
    $(".select2").select2({});
</script>
@endpush
