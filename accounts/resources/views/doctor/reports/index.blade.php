
@extends('layouts.doctor')
@section('title', trans('site.report'))
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


    <style>
        .buttons-html5{
            padding: 0.486rem 1rem;
  font-size: 0.9rem;
  line-height: 1;
  border-radius: 0.358rem;
    border-top-right-radius: 0.358rem;
    border-bottom-right-radius: 0.358rem;
    margin-right: 10px;
        }
        .buttons-excel{
  border-color: #7367f0 !important;
    border-right-color: rgb(115, 103, 240);
    border-left-color: rgb(115, 103, 240);
  background-color: #7367f0 !important;
  color: #fff !important;
  box-shadow: none;
  font-weight: 500;
        }
        .buttons-csv{
  border-color: #82868b !important;
    border-right-color: rgb(130, 134, 139) ;
    border-left-color: rgb(130, 134, 139);
  background-color: #82868b !important;
  color: #fff !important;
  box-shadow: none;
  font-weight: 500;
        }
        .buttons-pdf{
  border-color: #00cfe8 !important;
    border-right-color: rgb(0, 207, 232);
    border-left-color: rgb(0, 207, 232);
  background-color: #00cfe8 !important;
  color: #fff !important;
  box-shadow: none;
  font-weight: 500;
        }
    </style>
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
                        <h2 class="content-header-title float-left mb-0">@lang('site.report')</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="row-grouping-datatable">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{route('doctor.reports.index')}}" method="get">
                            <div class="card">
                                <div class="card-body d-flex " id="flatpickr">
                                   <div class="ml-1 w-300p">
                                        <label>@lang('site.Date')</label>
                                        <input type="text" id="fp-range"  name="date" class="form-control flatpickr-range">
                                    </div>
                                    <div class="ml-1 ">
                                        <button class="btn btn-primary mt-24p ">@lang('site.search')</button>
                                    </div>
                                    <div class="ml-1 w-300p">
                                        <label> @lang('site.total_expert_net')</label>
                                        <input type="text" value="{{$netExport}} EGP"  class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{route('invoice',Auth::user()->id)}}" class="btn btn-primary">@lang('site.invoice')</a>
                                <a href="{{route('invoiceDownload',Auth::user()->id)}}"class="btn btn-primary">@lang('site.invoice_download')</a>
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
