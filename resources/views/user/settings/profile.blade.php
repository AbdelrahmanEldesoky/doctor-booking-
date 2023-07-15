@extends('layouts.app')
@section('title', trans('site.my_profile'))
@push('css')
@endpush
@section('content')

<div class="container">
        <div class=" row mb-3">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="site-heading float-left mb-0">@lang('site.my_profile')</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- account setting page -->
            <section id="page-account-settings">
                <div class="row">
                    <!-- left menu section -->
                    <div class="col-md-3 mb-2 mb-md-0">
                        <ul class="nav nav-pills flex-column nav-left card-site">
                            <!-- general -->
                            <li class="nav-item">
                                <a class="nav-link active" id="account-pill-general" data-toggle="pill"
                                   href="#account-vertical-general" aria-expanded="true">
                                    <i data-feather="user" class="font-medium-3 mr-1"></i>
                                    <span class="font-weight-bold">@lang('site.General')</span>
                                </a>
                            </li>
                            <!-- change password -->
                            <li class="nav-item">
                                <a class="nav-link" id="account-pill-password" data-toggle="pill"
                                   href="#account-vertical-password" aria-expanded="false">
                                    <i data-feather="lock" class="font-medium-3 mr-1"></i>
                                    <span class="font-weight-bold">@lang('site.Change_Password')</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <div class="col-md-9">
                        <div class="card-site">
                            <div class="card-body">
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="account-vertical-general"
                                         aria-labelledby="account-pill-general" aria-expanded="true">
                                        <!-- header media -->
                                        <form class="validate-form mt-2" action="{{route('hospital.profile')}}"
                                              method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="media">
                                                <a href="javascript:void(0);" class="mr-25">
                                                    <img src="{{$user->image}}"
                                                         id="account-upload-img" class="rounded mr-50 profile-img"
                                                         alt="profile image" height="80" width="80"/>
                                                </a>
                                                <!-- upload and reset button -->
                                                <div class="media-body mt-75 ml-1 mt-2">
                                                    <label for="account-upload"
                                                           class="btn btn-sm btn-primary mb-75 mr-75">@lang('site.upload')</label>
                                                    <input class="upload-image" type="file" id="account-upload"
                                                           name="profile_image" hidden accept="image/*"/>
                                                    <button
                                                        class="btn btn-sm btn-outline-secondary mb-75 reset-image">
                                                        @lang('site.reset')
                                                    </button>
                                                </div>
                                                <!--/ upload and reset button -->
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-name">@lang('site.name')</label>
                                                        <input type="text" class="form-control" id="account-name"
                                                               name="name" placeholder="Name"
                                                               value="{{$user->name}}"/>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-e-mail">@lang('site.email')</label>
                                                        <input class="form-control"
                                                               placeholder="Email"
                                                               style="text-transform: lowercase !important;"
                                                               value="{{$user->email}}" readonly/>
                                                    </div>
                                                </div>


                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-site mt-2 mr-1">@lang('site.save_changes')</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!--/ form -->
                                    </div>
                                    <div class="tab-pane fade" id="account-vertical-password" role="tabpanel"
                                         aria-labelledby="account-pill-password" aria-expanded="false">
                                        <!-- form -->
                                        <form class="validate-form" action="{{route('hospital.update.password')}}"
                                              method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-new-password">@lang('site.new_Password')</label>
                                                        <div
                                                            class="input-group form-password-toggle input-group-merge">
                                                            <input type="password" id="account-new-password"
                                                                   name="password" class="form-control"
                                                                   placeholder="@lang('site.new_Password')" required/>
                                                            <div class="input-group-append">
                                                                <div class="input-group-text cursor-pointer">
                                                                    <i data-feather="eye"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @error('password')
                                                        <p class="error">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-retype-new-password">@lang('site.retype_Password')</label>
                                                        <div
                                                            class="input-group form-password-toggle input-group-merge">
                                                            <input type="password" class="form-control"
                                                                   required
                                                                   id="account-retype-new-password"
                                                                   name="password_confirmation"
                                                                   placeholder="@lang('site.retype_Password')"/>
                                                            <div class="input-group-append">
                                                                <div class="input-group-text cursor-pointer"><i
                                                                        data-feather="eye"></i></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-site mr-1 mt-1">@lang('site.save_changes')</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!--/ form -->
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
</div>





@endsection

@push('js')
    <script>
        $(document).ready(function () {
            var readURL = function (input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('.profile-img').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $(".upload-image").on('change', function () {
                readURL(this);
            });
            $(".reset-image").on('click', function () {
                let image = '{{$user->image}}';
                $('.profile-img').attr('src', image);
            });

        });
    </script>
@endpush

