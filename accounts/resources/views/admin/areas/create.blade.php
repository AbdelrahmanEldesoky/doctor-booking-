@extends('layouts.admin')
@section('title','Dashboard |Admin')
@push('css')
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
                                <h4 class="card-title">Areas</h4>
                            </div>
                            <div class="card-body mt-2">
                                <form method="POST" action="{{route('admin.areas.store')}}" class=""
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="basicInput">Cities</label>
                                                <select class="form-control city_id" name="city_id" required>
                                                    <option value="">Select City</option>
                                                    @foreach($cities as $item)
                                                    <option value="{{$item->id}}">{{$item->name_en}}</option>
                                                    @endforeach
                                                </select>
                                                @error('city_id')
                                                <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12 append_area">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Name (en)</label>
                                                    <input type="text" name="name_en[]" class="form-control" required
                                                        placeholder="Enter Name" />
                                                    @error('name_en')
                                                    <p class="error">{{ $message }}</p>
                                                    @enderror

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Name (ar)</label>
                                                    <input type="text" name="name_ar[]" class="form-control" required
                                                        placeholder="Enter Name" />
                                                    @error('name_ar')
                                                    <p class="error">{{ $message }}</p>
                                                    @enderror

                                                </div>
                                            </div>
                                           
                                        </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="button" class="btn btn-primary add_area">
                                                Add More
                                            </button>
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
<script>
    $(document).on('click','.add_area',function(){
        html=``;
        html +=`<div class="row">
                                                
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label>Name (en)</label>
                                                        <input type="text" name="name_en[]" class="form-control" required
                                                            placeholder="Enter Name" />
                                                        @error('name_en')
                                                        <p class="error">{{ $message }}</p>
                                                        @enderror

                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label>Name (ar)</label>
                                                        <input type="text" name="name_ar[]" class="form-control" required
                                                            placeholder="Enter Name" />
                                                        @error('name_ar')
                                                        <p class="error">{{ $message }}</p>
                                                        @enderror

                                                    </div>
                                                </div>
                                                <div class="col-md-2" style="margin-top:25px">
                                                   <div><i class="fa fa-trash btn btn-danger remove_area"></i></div>
                                                </div>

                                            </div>`;
                                            $('.append_area').append(html);
    });

    $(document).on('click','.remove_area',function(){
        $(this).closest('.row').remove();
    })
</script>
@endpush
