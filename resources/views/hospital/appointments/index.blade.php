@extends('layouts.hospital')
@section('title','Appointments')
@push('css')
<link rel="stylesheet" href="{{ asset('assets/admin/dashboard/css/dataTables.bootstrap4.min.css') }}" />

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
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Appointments</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="row-grouping-datatable">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{route('hospital.appointments.index')}}" method="get">

                            <div class="card">
                                <div class="card-body d-flex " id="flatpickr">
                                    <!-- <div class="ml-1 w-300p">
                                        <label>Date :</label>
                                        <input type="text" id="fp-default" name="date"
                                            class="form-control flatpickr-basic">
                                    </div> -->
                                    <div class="ml-1 w-300p">
                                        <label>Status :</label>
                                        <select class="form-control" name="status">
                                            <option value="">All</option>
                                            <option value="completed">Completed</option>
                                            <option value="canceled">Canceled</option>
                                            <option value="in progress">In progress</option>
                                        </select>
                                    </div>
                                    <div class="ml-1 ">
                                        <button class="btn btn-primary mt-24p ">Search</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="col-12">
                        <div class="card">
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
<script src="{{asset('assets/admin/app-assets/js/fetchRecord.js')}}"></script>
<script src="{{asset('assets/admin/app-assets/vendors/js/pickers/pickadate/picker.js')}}"></script>
<script src="{{asset('assets/admin/app-assets/vendors/js/pickers/pickadate/picker.date.js')}}"></script>
<script src="{{asset('assets/admin/app-assets/vendors/js/pickers/pickadate/picker.time.js')}}"></script>
<script src="{{asset('assets/admin/app-assets/vendors/js/pickers/pickadate/legacy.js')}}"></script>
<script src="{{asset('assets/admin/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{asset('assets/admin/app-assets/js/scripts/forms/pickers/form-pickers.js')}}"></script>

<script src="{{  asset('assets/admin/dashboard/js/jquery.dataTables.min.js')}}"></script>
<script src="{{  asset('assets/admin/dashboard/js/dataTables.bootstrap4.min.js')}}"></script>

@if(in_array('data-table',$assets ?? []))
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" type="text/javascript"></script><script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js" type="text/javascript"></script><script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js" type="text/javascript"></script><script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js" type="text/javascript"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script><script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js" type="text/javascript"></script><script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js" type="text/javascript"></script>
@endif
{{ $dataTable->scripts() }}
@endpush
