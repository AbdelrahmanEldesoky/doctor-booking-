@extends('layouts.admin')
@section('title','Dashboard |Admin')
@push('css')
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush
@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section id="row-grouping-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header border-bottom d-flex justify-content-between">
                                    <h4 class="card-title">Hospitals</h4>
                                    <a href="{{route('admin.specialities.create')}}"
                                       class="btn btn-primary add_speciality">Add More</a>
                                </div>
                                <div class="card-body mt-2">
                                    <form method="POST" action="{{route('admin.hospitals.store')}}" class="" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" name="name" class="form-control" required
                                                           placeholder="Enter Name"/>
                                                    @error('name')
                                                    <p class="error">{{ $message }}</p>
                                                    @enderror

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" name="email" class="form-control"
                                                           placeholder="Enter Email"/>
                                                    @error('email')
                                                    <p class="error">{{ $message }}</p>
                                                    @enderror

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label>Average Price</label>
                                                    <input type="number" name="my_price" class="form-control"
                                                           value="0"/>
                                                    @error('my_price')
                                                    <p class="error">{{ $message }}</p>
                                                    @enderror

                                                </div>
                                            </div>
                                            <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label>Online Percentage %</label>
                                                <input class="form-control" required type="number" name="percentage" placeholder="" value=""/>
                                                @error('percentage')
                                                <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label>Offline Percentage %</label>
                                                <input class="form-control" required type="number" name="ofline_percentage" placeholder="" value=""/>
                                                @error('ofline_percentage')
                                                <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="basicInput">Cities</label>
                                                    <select class="form-control country_id" name="city" required>
                                                        <option value="">Select City</option>
                                                        @foreach($cities as $city)
                                                            <option value="{{$city->id}}">{{$city->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('city')
                                                    <p class="error">{{ $message }}</p>
                                                    @enderror

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="basicInput">Areas</label>
                                                    <select class="form-control city_id appendCities" name="area"
                                                            required>
                                                        <option value="">Select Area</option>
                                                    </select>
                                                    @error('area')
                                                    <p class="error">{{ $message }}</p>
                                                    @enderror

                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="account-company">About</label>
                                                            <textarea  class="form-control w-100" name="about" rows="5"
                                                                  ></textarea>
                                                        </div>
                                                    </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="basicInput">Image</label>
                                                    <input type="file" class="dropify" name="file"  data-allowed-file-extensions="png jpg">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary submit_btn">
                                                    Submit
                                                </button>
                                            </div>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script type="text/javascript">
        $('.dropify').dropify(
            {
                messages: {
                    'default': 'Upload File',
                    'replace': 'Drag and drop or click to replace',
                    'remove': 'Remove',
                    'error': 'Ooops, something wrong happended.'
                }
            }
        );
    </script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script>
        $(document).ready(function () {
            $('.summernote').summernote();
        });
    </script>
    <script>
        $(document).on('change', '.country_id', function () {
            let city = $(this).val();
            $.ajax({
                type: 'GET',
                data: {city: city},
                url: '{{route('admin.append.areas')}}',
                success: function (response) {
                    $('.appendCities').html(response.view);
                },
            });
        })
    </script>
@endpush
