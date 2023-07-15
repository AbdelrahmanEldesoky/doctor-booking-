@extends('layouts.doctor')
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
                                        @lang('site.clinics')
                                    </h1>
                                </div>
                                <form class="auth-login-form p-1" action="{{ route('doctor.clinics.store') }}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <input type="hidden" name="clinic_id" value="{{$clinic ? $clinic->id : null}}">
                                    <div class="row">
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label> @lang('site.name_en')</label>
                                                <input class="form-control" required type="text" name="name_en"
                                                    placeholder="john" value="{{$clinic ? $clinic->name_en : ''}}" />
                                                @error('name_en')
                                                <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label>  @lang('site.name_arabic')</label>
                                                <input class="form-control" required type="text" name="name_ar"
                                                    placeholder="john" value="{{$clinic ? $clinic->name_ar : ''}}"/>
                                                @error('name_ar')
                                                <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label> @lang('site.Location_en')</label>
                                                <input class="form-control" required type="text" name="location_en"
                                                    placeholder="john" value="{{$clinic ? $clinic->location_en : ''}}" />
                                                @error('location_en')
                                                <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label> @lang('site.Location_arabic')</label>
                                                <input class="form-control" required type="text" name="location_ar"
                                                    placeholder="john" value="{{$clinic ? $clinic->location_ar : ''}}"/>
                                                @error('location_ar')
                                                <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 ">
                                            <div class="input-box">
                                                <label class="label-text">  @lang('site.CITY')</label>
                                                <div class="form-group">
                                                    <select class="form-control search_country_id" name="city">
                                                        <option class="" value="">  @lang('site.select_city')</option>
                                                        @foreach ($cities as $item)
                                                        @php($selected = $clinic && $clinic->city == $item->id  ? 'selected' : '')
                                                        <option {{$selected}} value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 ">
                                            <div class="input-box">
                                                <label class="label-text">@lang('site.Select_Main_Area')</label>
                                                <div class="form-group">
                                                    <select class="form-control appendCities "  name="area">
                                                        @if($areas)
                                                        @foreach ($areas as $item)
                                                        @php($selected = $clinic && $clinic->area == $item->id ? 'selected' : '')
                                                        <option {{$selected}} value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                        @else
                                                        <option class="hidden" disabled="" value="">  @lang('site.Select_Area')
                                                        </option>
                                                        @endif

                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 ">
                                            <div class="input-box">
                                                <label class="label-text">  @lang('site.Select_Nearest_Areas')</label>
                                                <div class="form-group">
                                                    <select class="form-control appendCities select2" multiple  name="nearst_areas[]">
                                                        @if($areas)
                                                        @foreach ($areas as $item)
                                                        @php($selected = $clinic &&  in_array($item->id,$near_areas) ? 'selected' : '')
                                                        <option {{$selected}} value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                        @else
                                                        <option class="hidden" disabled="" value=""> @lang('site.Select_Area')
                                                        </option>
                                                        @endif

                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mt-4 text-right">
                                            <button class="btn btn-info">  @lang('site.submit')</button>
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
