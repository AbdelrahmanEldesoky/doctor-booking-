@extends('layouts.admin')
@section('title','Doctor |Detail')
@push('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
@endpush
@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <main class="container mb-3 mt-1 card">


                    <div class="row g-5">

                        <div class="col-lg-12 ">

                            <div class="card-site" >
                                <div class=" text-center mb-3">
                                    <h1 class="GraphikArabic-Black-Web text-white">
                                        @lang('site.register')
                                    </h1>
                                </div>
                                <form class="auth-login-form p-1" action="{{ route('admin.doctors.store') }}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <input type="hidden" name="doc_id" value="{{$doc ? $doc->id : null}}">
                                    <div class="row">
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label>@lang('site.name')</label>
                                                <input class="form-control" required type="text" name="name"
                                                    placeholder="john" value="{{$doc ? $doc->name : ''}}" />
                                                @error('name')
                                                <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label>@lang('site.name') (Arabic)</label>
                                                <input class="form-control" required type="text" name="name_ar"
                                                    placeholder="john" value="{{$doc ? $doc->name_ar : ''}}"/>
                                                @error('name_ar')
                                                <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label>Is For Ads</label>
                                                <select class="form-control" name="is_add">
                                                    @php($selected = $doc && $doc->is_add == 0  ? 'selected' : '')
                                                    <option {{$selected}} value="0">No</option>
                                                    @php($selected = $doc && $doc->is_add == 1  ? 'selected' : '')
                                                    <option {{$selected}} value="1">Yes</option>
                                                </select>
                                                @error('gender')
                                                <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label>@lang('site.email')</label>
                                                <input class="form-control" required type="email" name="email"
                                                    placeholder="john@example.com" value="{{$doc ? $doc->email : ''}}"/>
                                                @error('email')
                                                <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label>@lang('site.mobile_number')</label>
                                                <input class="form-control" required type="text" name="phone" placeholder="" value="{{$doc ? ($doc->information ? $doc->information->phone : '') : ''}}"/>
                                                @error('phone')
                                                <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label>Online Percentage %</label>
                                                <input class="form-control" required type="number" name="percentage" placeholder="" value="{{$doc ? $doc->percentage  : 0}}"/>
                                                @error('percentage')
                                                <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label>Online Percentage (outsider) %</label>
                                                <input class="form-control" required type="number" name="percentage_outside" placeholder="" value="{{$doc ? $doc->percentage_outside  : 0}}"/>
                                                @error('percentage_outside')
                                                <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label>Offline Percentage %</label>
                                                <input class="form-control" required type="number" name="ofline_percentage" placeholder="" value="{{$doc ? $doc->ofline_percentage  : 0}}"/>
                                                @error('ofline_percentage')
                                                <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label>@lang('site.gender')</label>
                                                <select class="form-control" name="gender">
                                                    @php($selected = $doc && $doc->information && $doc->information->gender == 'male'  ? 'selected' : '')
                                                    <option {{$selected}} value="male">Male</option>
                                                    @php($selected = $doc && $doc->information && $doc->information->gender == 'female'  ? 'selected' : '')
                                                    <option {{$selected}} value="female">Female</option>
                                                    @php($selected = $doc && $doc->information && $doc->information->gender == 'other'  ? 'selected' : '')
                                                    <option {{$selected}} value="other">Other</option>
                                                </select>
                                                @error('gender')
                                                <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label>Job Title</label>
                                                <input class="form-control" required type="text" name="job_title" placeholder="" value="{{$doc ? ($doc->information ? $doc->information->job_title : '') : ''}}"/>
                                                @error('job_title')
                                                <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label>Job Title (Arabic)</label>
                                                <input class="form-control" required type="text" name="job_title_ar" placeholder="" value="{{$doc ? ($doc->information ? $doc->information->job_title_ar : '') : ''}}"/>
                                                @error('job_title_ar')
                                                <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 ">
                                            <div class="input-box">
                                                <label class="label-text">@lang('site.select_city')</label>
                                                <div class="form-group">
                                                    <select class="form-control search_country_id" name="city">
                                                        <option class="" value="">@lang('site.select_city')</option>
                                                        @foreach ($cities as $item)
                                                        @php($selected = $doc && $doc->information && $doc->information->city == $item->id  ? 'selected' : '')
                                                        <option {{$selected}} value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 ">
                                            <div class="input-box">
                                                <label class="label-text">@lang('site.select_speciality')</label>
                                                <div class="form-group">
                                                    <select class="form-control select2" multiple name="speciality_id[]">
                                                        <option class="" value="">@lang('site.select_speciality')</option>
                                                        @foreach ($specialities as $item)
                                                        @php($selected = $doc && in_array($item->id,getSpecialities($doc)) ? 'selected' : '')
                                                        <option {{$selected}} value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 ">
                                            <div class="input-box">
                                                <label class="label-text">@lang('site.select_area')</label>
                                                <div class="form-group">
                                                    <select class="form-control appendCities select2" multiple name="areas[]">
                                                        @if($areas)
                                                        @foreach ($areas as $item)
                                                        @php($selected = $doc && in_array($item->id,getDocAreas($doc)) ? 'selected' : '')
                                                        <option {{$selected}} value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                        @else
                                                        <option class="hidden" disabled="" value="">@lang('site.select_area')
                                                        </option>
                                                        @endif
                                                       
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 ">
                                            <div class="input-box">
                                                <label class="label-text">@lang('site.profile_image')</label>
                                                <div class="form-group">
                                                    <input type="file" name="file" class="dropify" data-default-file="{{$doc ? $doc->image :''}}">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12 ">
                                            <div class="input-box">
                                                <label class="label-text">Zoom Access Token</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="zoom_id"  value="{{$doc->zoom_id ?? ''}}">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-12 mt-4 text-right">
                                            <button class="btn btn-info">@lang('site.register') </button>

                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>


                    </div>
                </main>

            </div>
        </div>
    </div>
@endsection
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<script type="text/javascript">
        $(".select2").select2({});
    </script>
@endpush
