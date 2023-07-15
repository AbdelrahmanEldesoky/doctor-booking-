@extends('layouts.hospital')
@section('title','Dashboard |Hospital')
@push('cs')

@endpush
@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Account Settings</h2>
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
                            <ul class="nav nav-pills flex-column nav-left">
                                <!-- general -->
                                <li class="nav-item">
                                    <a class="nav-link active" id="account-pill-general" data-toggle="pill"
                                       href="#account-vertical-general" aria-expanded="true">
                                        <i data-feather="user" class="font-medium-3 mr-1"></i>
                                        <span class="font-weight-bold">General</span>
                                    </a>
                                </li>
                                <!-- change password -->
                                <li class="nav-item">
                                    <a class="nav-link" id="account-pill-password" data-toggle="pill"
                                       href="#account-vertical-password" aria-expanded="false">
                                        <i data-feather="lock" class="font-medium-3 mr-1"></i>
                                        <span class="font-weight-bold">Change Password</span>
                                    </a>
                                </li>
                        
                            </ul>
                        </div>
                        <div class="col-md-9">
                            <div class="card">
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
                                                    <div class="media-body mt-75 ml-1">
                                                        <label for="account-upload"
                                                               class="btn btn-sm btn-primary mb-75 mr-75">Upload</label>
                                                        <input class="upload-image" type="file" id="account-upload"
                                                               name="profile_image" hidden accept="image/*"/>
                                                        <button
                                                            class="btn btn-sm btn-outline-secondary mb-75 reset-image">
                                                            Reset
                                                        </button>
                                                        <p>Allowed JPG, GIF or PNG. Max size of 800kB</p>
                                                    </div>
                                                    <!--/ upload and reset button -->
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="account-username">Role</label>
                                                            <input type="text" class="form-control"
                                                                   id="account-username" readonly
                                                                   placeholder="Username" value="{{$user->role}}"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="account-name">Name</label>
                                                            <input type="text" class="form-control" id="account-name"
                                                                   name="name" placeholder="Name"
                                                                   value="{{$user->name}}"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="account-e-mail">E-mail</label>
                                                            <input class="form-control"
                                                                   placeholder="Email"
                                                                   style="text-transform: lowercase !important;"
                                                                   value="{{$user->email}}" readonly/>
                                                        </div>
                                                    </div>
                                                   
                                                
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary mt-2 mr-1">Save
                                                            changes
                                                        </button>
                                                        <button type="reset" class="btn btn-outline-secondary mt-2">
                                                            Cancel
                                                        </button>
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
                                                            <label for="account-new-password">New Password</label>
                                                            <div
                                                                class="input-group form-password-toggle input-group-merge">
                                                                <input type="password" id="account-new-password"
                                                                       name="password" class="form-control"
                                                                       placeholder="New Password" required/>
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
                                                            <label for="account-retype-new-password">Retype New
                                                                Password</label>
                                                            <div
                                                                class="input-group form-password-toggle input-group-merge">
                                                                <input type="password" class="form-control"
                                                                       required
                                                                       id="account-retype-new-password"
                                                                       name="password_confirmation"
                                                                       placeholder="New Password"/>
                                                                <div class="input-group-append">
                                                                    <div class="input-group-text cursor-pointer"><i
                                                                            data-feather="eye"></i></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary mr-1 mt-1">Save
                                                            changes
                                                        </button>
                                                        <button type="reset" class="btn btn-outline-secondary mt-1">
                                                            Cancel
                                                        </button>
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
    </div>

    <div class="modal fade" id="zoomModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Zoho Itegration</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{route('doctor.linkZoom')}}">

                    <div class="modal-body">
                        @csrf
                        <input type="email" class="form-control" required name="email"
                               value="{{$user->zoom_email ?? $user->email}}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>

            </div>
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
