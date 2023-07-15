@extends('layouts.admin')
@section('title','Dashboard |Admin')
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/dashboard/css/dataTables.bootstrap4.min.css') }}"/>
    
    <link rel="stylesheet" type="text/css"
    href="{{asset('assets/admin/app-assets/vendors/css/pickers/pickadate/pickadate.css')}}">
<link rel="stylesheet" type="text/css"
    href="{{asset('assets/admin/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
<link rel="stylesheet" type="text/css"
    href="{{asset('assets/admin/app-assets/css/plugins/forms/pickers/form-flat-pickr.css')}}">
<link rel="stylesheet" type="text/css"
    href="{{asset('assets/admin/app-assets/css/plugins/forms/pickers/form-pickadate.css')}}">
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
                                    <h4 class="card-title">Revenue</h4>
                                       <form action="{{route('admin.revenue.index')}}" method="get">
                            <div class="">
                                <div class=" d-flex " id="flatpickr">
                                   <div class="ml-1 ">
                                        <label>@lang('site.Date')</label>
                                        <input type="text" id="fp-range"  name="date" class="form-control flatpickr-range">
                                    </div>
                                    <div class="ml-1 ">
                                        <button class="btn btn-primary mt-24p ">@lang('site.search')</button>
                                    </div>
                                   
                                </div>
                            </div>
                        </form>
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
@endsection
@push('js')

    {{--    <script src="{{  asset('assets/admin/dashboard/js/jquery.min.js')}}"></script>--}}
    <script src="{{asset('assets/admin/app-assets/vendors/js/pickers/pickadate/picker.js')}}"></script>
<script src="{{asset('assets/admin/app-assets/vendors/js/pickers/pickadate/picker.date.js')}}"></script>
<script src="{{asset('assets/admin/app-assets/vendors/js/pickers/pickadate/picker.time.js')}}"></script>
<script src="{{asset('assets/admin/app-assets/vendors/js/pickers/pickadate/legacy.js')}}"></script>
<script src="{{asset('assets/admin/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{asset('assets/admin/app-assets/js/scripts/forms/pickers/form-pickers.js')}}"></script>
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


@endpush
