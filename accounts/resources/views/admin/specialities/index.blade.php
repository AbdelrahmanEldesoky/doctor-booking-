@extends('layouts.admin')
@section('title','Dashboard |Admin')
@push('css')
<!-- <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"> -->
    <link rel="stylesheet" href="{{ asset('assets/admin/dashboard/css/dataTables.bootstrap4.min.css') }}"/>
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
                                    <h4 class="card-title">Specialities</h4>
                                    <a href="{{route('admin.specialities.create')}}"
                                       class="btn btn-primary add_speciality">Add More</a>
                                </div>
                                <div class="card-body mt-2">
                                    <div class="table-responsive">
                                        {{ $dataTable->table(['class' => 'table text-center table-striped w-100'],true) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <div class="modal fade" id="specialityModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Speciality</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="" class="speciality_form" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div>
                            <label>Image</label>
                            <input type="file" class="dropify speciality_image"  name="file" data-default-file="">
                        </div>
                        <div>
                            <label>Name (Eng)</label>
                            <input class="form-control speciality_name_en" required name="name_en" value="" placeholder="Enter Name">
                        </div>
                        <div>
                            <label>Name (Ar)</label>
                            <input class="form-control speciality_name_ar"  name="name_ar" value="" placeholder="Enter Name">
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('js')

{{--    <script src="{{  asset('assets/admin/dashboard/js/jquery.min.js')}}"></script>--}}
    <script src="{{  asset('assets/admin/dashboard/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{  asset('assets/admin/dashboard/js/dataTables.bootstrap4.min.js')}}"></script>

    @if(in_array('data-table',$assets ?? []))
        <script type="text/javascript"
                src="{{ asset('assets/admin/vendor/datatables/dataTables.buttons.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/admin/vendor/datatables/pdfmake.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/admin/vendor/datatables/vfs_fonts.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/admin/vendor/datatables/buttons.html5.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('assets/admin/vendor/datatables/buttons.print.min.js')}}"></script>
        <script src="{{ asset('assets/admin/vendor/datatables/buttons.server-side.js')}}"></script>
    @endif
    {{ $dataTable->scripts() }}

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script> -->
@endpush
