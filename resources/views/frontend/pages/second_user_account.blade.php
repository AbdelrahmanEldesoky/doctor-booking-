@extends('new_layouts.app')

@section('title')
    <title>ipersona / {{ trans('second_login.edit') }}</title>
@endsection
<!-- LINEARICONS -->
<link rel="stylesheet" href="{{ asset('new_assets/user_account/fonts/linearicons/style.css') }}">

<!-- STYLE CSS -->
<link rel="stylesheet" href="{{ asset('new_assets/user_account/css/style.css') }}">
<!-- start style lang -->

<link href="{{ asset('new_assets/booking/style.css') }}" rel="stylesheet">

@extends('new_layouts.master_pages')


<!--  start Section  -->
@section('section')
    <section id="hero" class="hero">
        <div class="container position-relative">
            <div class="wrapper">
                <div class="inner">
                    <img src="{{ asset('new_assets/user_account/images/image-1.png') }} " alt="" class="image-1">
                    <form class='form_register' action="{{ route('update_user_account') }}" enctype="multipart/form-data"
                        method="POST">
                        @csrf
                        <h3>{{ trans('second_login.edit') }}</h3>
                        <div class="form-holder">
                            <span class="lnr P-2 lnr-user"></span>
                            <input type="text" class="form-control we h4 text-center" name="name"
                                value="{{ old('name') ? old('name') : $user['name'] }}"
                                placeholder="{{ trans('second_login.name') }}">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-holder">
                            <span class="lnr P-2 lnr-envelope"></span>
                            <input type="text" disabled class="form-control we h4 text-center"
                                value="{{ $user->email }}">
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-holder">
                            <span class="lnr P-2 lnr-phone"></span>
                            <input type="text" name="phone" class="form-control we h4 text-center"
                                value="{{ $user->information->phone }}">
                            @error('phone')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-holder">
                            <span class="lnr P-2 lnr-lock"></span>
                            <input type="password" class="form-control we h4 text-center" name="password"
                                placeholder="{{ trans('second_login.password') }}">
                            @error('password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>



                        <div class="d-flex justify-content-around">
                            {{-- <div class="col-4">
                                <div class="d-flex justify-content-around p-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" {{$user->information->gender == 'male'? 'checked':null}}>
                        <label class="form-check-label" for="flexRadioDefault1">
                            {{ trans('second_login.male') }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2"
                            {{$user->information->gender == 'female'? 'checked':null}}>
                        <label class="form-check-label" for="flexRadioDefault2">
                            {{ trans('second_login.female') }}
                        </label>
                    </div>
            </div>
        </div> --}}
                            <div class="col-lg-4 col-6">
                                <div class="col-auto">
                                    <input type="file" id="inputFile" class="form-control"
                                        aria-labelledby="passwordHelpInline">

                                </div>

                            </div>

                        </div>
                        <div class="col-12 p-2">
                            <select name="residence" class="form-select we h4" aria-label="Default select example">
                                {{-- <option selected>{{ trans('second_login.country') }}</option> --}}
                                <option class='we  h4' value="Egyption"
                                    {{ $user->residence == 'egyption' ? 'selected' : null }}>
                                    {{ trans('second_login.egypt') }}</option>
                                <option class='we  h4' value="algeria"
                                    {{ $user->residence == 'algeria' ? 'selected' : null }}>
                                    {{ trans('second_login.algeria') }}</option>
                                <option class='we  h4' value="kuwait" {{ $user->residence == 'kuwait' ? 'selected' : null }}>
                                    {{ trans('second_login.kuwait') }}</option>
                                <option class='we  h4' value="morocco"
                                    {{ $user->residence == 'morocco' ? 'selected' : null }}>
                                    {{ trans('second_login.morocco') }}</option>
                            </select>
                        </div>
                        <div class="m-auto text-center p-2">

                            <button type="submit" class="btn btn_purple purple">{{ trans('second_login.edit') }} </button>
                        </div>

                    </form>
                    <img src="{{ asset('new_assets/user_account/images/image-2.png') }}" alt="" class="image-2">
                </div>

            </div>
        </div>


    </section>
@endsection

<script src="{{ asset('new_assets/user_account/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('new_assets/user_account/js/main.js') }}"></script>
