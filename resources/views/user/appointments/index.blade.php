@extends('layouts.app')
@section('title', trans('site.my_Appointments'))
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
        .w-300p{
            width:300px;

        }
        .ml-1{
            margin-left:1px;
        }
        .ml-20{
            margin-left:20px;
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
                        <h2 class="site-heading float-left mb-0">@lang('site.my_Appointments')</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="row-grouping-datatable">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{route('user.appointments.index')}}" method="get">

                            <div class="card " style="padding:10px">
                            <label class="ml-20">@lang('site.status') :</label>

                                <div class="card-body d-flex " id="flatpickr">
                                    <div class="ml-1 w-300p">
                                        <select class="form-control" name="status">
                                            <option value="">@lang('site.all')</option>
                                            @php($selected = $request->status == 'completed' ? 'selected' : '')
                                            <option {{$selected}} value="completed">@lang('site.completed')</option>
                                            @php($selected = $request->status == 'closed' ? 'selected' : '')
                                            <option {{$selected}} value="closed">@lang('site.canceled')</option>
                                            @php($selected = $request->status == 'in progress' ? 'selected' : '')
                                            <option {{$selected}} value="in progress">@lang('site.in_progress')</option>
                                        </select>
                                    </div>
                                    <div class="ml-1 ">
                                        <button class="btn btn-primary mt-24p ">@lang('site.search')</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body mt-2">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                          <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">@lang('site.name')</th>
                                            <!-- <th scope="col">@lang('site.type')</th> -->
                                            <th scope="col">@lang('site.Start_session_heading')</th>
                                            <th scope="col">@lang('site.Day')</th>
                                            <th scope="col">@lang('site.Date')</th>
                                            <th scope="col">@lang('site.Action')</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          @foreach($appointments as $key => $query)
                                            <tr>
                                                <th>{{ $loop->iteration }}</th>
                                                <th>{{ $query->doctor ? $query->doctor->name : ($query->hospital ? $query->hospital->name : '-') }}</th>
                                                <!-- <th>{{ $query->doctor ? 'Doctor' : 'Hospital' }}</th> -->
                                                <th>
                                                    @if($query->join_url)
                                                    <!--<a href="{{ route('join.session', $query->join_url) }}" class="btn btn-site">@lang('site.Start_session')</a>-->
                                                    <a href="{{ $query->join_url }}" class="btn btn-site">@lang('site.Start_session')</a>
                                                    @else
                                                     ----
                                                    @endif
                                                </th>
                                                <th>
                                                    @if($query->schedule)
                                                        @lang('site.'.$query->schedule->date)
                                                    @endif
                                                </th>
                                                <th>   {{   $query->from }}</th>
                                                <th>
                                                    <a href="{{ route('user.appointments.show', $query->id) }}" class="btn btn-site-2">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </th>
                                            </tr>
                                          @endforeach


                                        </tbody>
                                      </table>
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
<!-- <script src="{{asset('assets/admin/app-assets/js/fetchRecord.js')}}"></script>
<script src="{{asset('assets/admin/app-assets/vendors/js/pickers/pickadate/picker.js')}}"></script>
<script src="{{asset('assets/admin/app-assets/vendors/js/pickers/pickadate/picker.date.js')}}"></script>
<script src="{{asset('assets/admin/app-assets/vendors/js/pickers/pickadate/picker.time.js')}}"></script>
<script src="{{asset('assets/admin/app-assets/vendors/js/pickers/pickadate/legacy.js')}}"></script>
<script src="{{asset('assets/admin/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{asset('assets/admin/app-assets/js/scripts/forms/pickers/form-pickers.js')}}"></script>

<script src="{{  asset('assets/admin/dashboard/js/jquery.dataTables.min.js')}}"></script>
<script src="{{  asset('assets/admin/dashboard/js/dataTables.bootstrap4.min.js')}}"></script>

@if(in_array('data-table',$assets ?? [])) -->
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" type="text/javascript"></script><script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js" type="text/javascript"></script><script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js" type="text/javascript"></script><script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js" type="text/javascript"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script><script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js" type="text/javascript"></script><script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js" type="text/javascript"></script>
@endif
@endpush
