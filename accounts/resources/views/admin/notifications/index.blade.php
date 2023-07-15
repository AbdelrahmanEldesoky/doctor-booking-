@extends('layouts.admin')
@section('title','Notifications')
@push('css')
<link rel="stylesheet" href="{{ asset('assets/admin/dashboard/css/dataTables.bootstrap4.min.css') }}" />
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
                        <h2 class="content-header-title float-left mb-0">Notifications</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="row-grouping-datatable">
                <div class="row">
                    <div class="col-md-12">
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
<script src="{{  asset('assets/admin/dashboard/js/jquery.dataTables.min.js')}}"></script>
<script src="{{  asset('assets/admin/dashboard/js/dataTables.bootstrap4.min.js')}}"></script>

@if(in_array('data-table',$assets ?? []))
<script type="text/javascript" src="{{ asset('assets/admin/vendor/datatables/dataTables.buttons.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/admin/vendor/datatables/pdfmake.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/admin/vendor/datatables/vfs_fonts.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/admin/vendor/datatables/buttons.html5.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/admin/vendor/datatables/buttons.print.min.js')}}"></script>
<script src="{{ asset('assets/admin/vendor/datatables/buttons.server-side.js')}}"></script>
@endif
{{ $dataTable->scripts() }}
@endpush
