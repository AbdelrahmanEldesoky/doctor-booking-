@extends('layouts.admin')
@section('title', 'Dashboard |Admin')
@push('cs')
@endpush
@section('content')





    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section>
                    <div class="card">
                        <div class="card-header d-sm-flex d-block">
                            <div class="me-auto mb-sm-0  text-primary">
                                <h4 class="card-title mb-0 text-primary">Settings</h4>
                            </div>
                        </div>
                        <hr class="mt-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <form method="post" action="{{ route('admin.setting.update') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">



                                            {{-- <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">Site Name</label>
                                                                <input type="text" value="{{setting()['site_name'] ?? ''}}" name="site_name" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">Site Title</label>
                                                                <input type="text" value="{{setting()['site_title'] ?? ''}}" name="site_title" class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">Site Slogan</label>
                                                                <input type="text" value="{{setting()['site_slogan'] ?? ''}}" name="site_slogan" class="form-control">
                                                            </div>
                                                        </div>


                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">Meta Description</label>
                                                                <input type="text" value="{{setting()['homepage_description'] ?? ''}}" name="homepage_description" class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">Meta Keywords</label>
                                                                <input type="text" value="{{setting()['homepage_keywords'] ?? ''}}" name="homepage_keywords" class="form-control">
                                                            </div>
                                                        </div>



                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Logo Light</label>
                                                                <input type="file" class=" dropify dropify-event" name="logo_light" data-default-file="{{ asset(setting()['logo_light'] ?? '')  }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Logo Dark</label>
                                                                <input type="file" class=" dropify dropify-event" name="logo_dark" data-default-file="{{ asset(setting()['logo_dark'] ?? '')  }}">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Favicon</label>
                                                                <input type="file" class=" dropify dropify-event" name="favicon" data-default-file="{{ asset(setting()['favicon'] ?? '')  }}">
                                                            </div>
                                                        </div> --}}

                                        </div>


                                        <div class="row mb-2">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Newsbar English</label>
                                                    <input type="text" value="{{setting()['newsbar_1_en'] ?? ''}}" name="newsbar_1_en" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Newsbar Arabic</label>
                                                    <input type="text" value="{{setting()['newsbar_1_ar'] ?? ''}}" name="newsbar_1_ar" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Set Dollar Price</label>
                                                    <input type="number" value="{{setting()['dollar_price'] ?? ''}}" name="dollar_price" class="form-control">
                                                </div>
                                            </div>

                                        </div>



                                        <div class="btn-group pull-right mb-3">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>






@endsection
@push('js')
@endpush
