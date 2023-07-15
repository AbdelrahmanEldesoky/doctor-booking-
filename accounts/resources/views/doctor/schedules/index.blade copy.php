@extends('layouts.doctor')
@section('title','Dashboard |Doctor')
@push('css')
<link rel="stylesheet" type="text/css"
    href="{{asset('assets/admin/app-assets/vendors/css/pickers/pickadate/pickadate.css')}}">
<link rel="stylesheet" type="text/css"
    href="{{asset('assets/admin/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
<link rel="stylesheet" type="text/css"
    href="{{asset('assets/admin/app-assets/css/plugins/forms/pickers/form-flat-pickr.css')}}">
<link rel="stylesheet" type="text/css"
    href="{{asset('assets/admin/app-assets/css/plugins/forms/pickers/form-pickadate.css')}}">

<link rel="stylesheet" href="{{ asset('assets/admin/dashboard/css/dataTables.bootstrap4.min.css') }}" />

@endpush
@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-12 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <div class="d-flex justify-content-between">
                            <h2 class="content-header-title float-left mb-0">Schedules</h2>
                            <button class="btn btn-primary action_btn" id="schedule_action">Create</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="row-grouping-datatable">
                <div class="row">
                    <div class="col-md-12 create_tabs hide">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-pills nav-fill">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="create-tab-fill" data-toggle="pill"
                                            href="#create" aria-expanded="true">Create</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="bulk-tab-fill" data-toggle="pill" href="#bulk"
                                            aria-expanded="false">Bulk Create</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="repeat-tab-fill" data-toggle="pill" href="#bulk_repeat"
                                            aria-expanded="false">Bulk Create Repeated</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="create"
                                        aria-labelledby="create-tab-fill" aria-expanded="true">
                                        <form method="POST" action="{{route('doctor.schedules.create')}}"
                                            class="submit_form">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="basicInput">Status</label>
                                                        <select class="form-control" name="status">
                                                            @foreach(sessionStatus() as $status)
                                                            <option value="{{$status}}" class="text-capitalize">
                                                                {{$status}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="basicInput">Interval</label>
                                                        <select class="form-control" name="interval">
                                                            @foreach(interval() as $status)
                                                            <option value="{{$status}}" class="text-capitalize">
                                                                {{$status}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="basicInput">Date</label>
                                                        <input type="text" name="date"
                                                            class="form-control flatpickr-basic required"
                                                            id="basicInput">
                                                    </div>
                                                </div>
                                                <div class="col-md-6" id="pick-a-time">
                                                    <div class="form-group">
                                                        <label for="basicInput">From</label>
                                                        <input type="text" name="from" id="pt-default"
                                                            class="form-control pickatime required"
                                                            placeholder="8:00 AM" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="basicInput">Schedule Type</label>
                                                        <select class="form-control" name="schedule_type">
                                                            <option value="online" class="text-capitalize">
                                                                Online</option>
                                                            <option value="ofline" class="text-capitalize">
                                                                OFF lIne</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <button type="button" class="btn btn-primary submit_btn">
                                                        Submit
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="bulk" role="tabpanel" aria-labelledby="bulk-tab-fill"
                                        aria-expanded="false">
                                        <form method="POST" action="{{route('doctor.schedules.bulk')}}"
                                            class="submit_form">
                                            @csrf
                                            <input type="hidden" value="custom" name="interval_type">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="basicInput">Available From Date</label>
                                                        <input type="text" name="date_from"
                                                            class="form-control flatpickr-basic required"
                                                            id="basicInput">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="basicInput">Available To Date</label>
                                                        <input type="text" name="date_to"
                                                            class="form-control flatpickr-basic required"
                                                            id="basicInput">
                                                    </div>
                                                </div>
                                                <div class="col-md-6" id="pick-a-time">
                                                    <div class="form-group">
                                                        <label for="basicInput">Time From</label>
                                                        <input type="text" name="from" id="pt-default"
                                                            class="form-control pickatime required"
                                                            placeholder="8:00 AM" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6" id="pick-a-time">
                                                    <div class="form-group">
                                                        <label for="basicInput">Time To</label>
                                                        <input type="text" name="to" id="pt-default"
                                                            class="form-control pickatime required"
                                                            placeholder="8:00 AM" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="basicInput">Status</label>
                                                        <select class="form-control" name="status">
                                                            @foreach(sessionStatus() as $status)
                                                            <option value="{{$status}}" class="text-capitalize">
                                                                {{$status}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="basicInput">Schedule Type</label>
                                                        <select class="form-control" name="schedule_type">
                                                            <option value="online" class="text-capitalize">
                                                                Online</option>
                                                            <option value="ofline" class="text-capitalize">
                                                                OFF lIne</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <button type="button" class="btn btn-primary submit_btn">
                                                        Submit
                                                    </button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                    <div class="tab-pane" id="bulk_repeat" role="tabpanel"
                                        aria-labelledby="repeat-tab-fill" aria-expanded="false">
                                        <form method="POST" action="{{route('doctor.schedules.repeat')}}"
                                            class="submit_form">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="basicInput">Available Date</label>
                                                        <input type="text" id="fp-multiple" name="dates"
                                                            class="form-control flatpickr-multiple required"
                                                            placeholder="YYYY-MM-DD" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6" id="pick-a-time">
                                                    <div class="form-group">
                                                        <label for="basicInput">Time From</label>
                                                        <input type="text" id="pt-default" name="from_time"
                                                            class="form-control pickatime required"
                                                            placeholder="8:00 AM" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6" id="pick-a-time">
                                                    <div class="form-group">
                                                        <label for="basicInput">Time To</label>
                                                        <input type="text" id="pt-default" name="to_time"
                                                            class="form-control pickatime required"
                                                            placeholder="8:00 AM" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="basicInput">Status</label>
                                                        <select class="form-control" name="status">
                                                            @foreach(sessionStatus() as $status)
                                                            <option value="{{$status}}" class="text-capitalize">
                                                                {{$status}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="basicInput">Interval</label>
                                                        <select class="form-control" name="interval">
                                                            @foreach(interval() as $status)
                                                            <option value="{{$status}}" class="text-capitalize">
                                                                {{$status}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="basicInput">Repeat</label>
                                                        <select class="form-control" name="status">
                                                            <option value="no" class="text-capitalize">No</option>
                                                            <option value="yes" class="text-capitalize">Yes</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="basicInput">Schedule Type</label>
                                                        <select class="form-control" name="schedule_type">
                                                            <option value="online" class="text-capitalize">
                                                                Online</option>
                                                            <option value="ofline" class="text-capitalize">
                                                                OFF lIne</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <button type="button" class="btn btn-primary submit_btn">
                                                        Submit
                                                    </button>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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
<script src="{{asset('assets/admin/app-assets/vendors/js/pickers/pickadate/picker.js')}}"></script>
<script src="{{asset('assets/admin/app-assets/vendors/js/pickers/pickadate/picker.date.js')}}"></script>
<script src="{{asset('assets/admin/app-assets/vendors/js/pickers/pickadate/picker.time.js')}}"></script>
<script src="{{asset('assets/admin/app-assets/vendors/js/pickers/pickadate/legacy.js')}}"></script>
<script src="{{asset('assets/admin/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{asset('assets/admin/app-assets/js/scripts/forms/pickers/form-pickers.js')}}"></script>

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

<script>
    $(document).on('click', '.action_btn', function () {
        $('.create_tabs').toggleClass('hide');
        $(this).toggleClass('btn-primary btn-danger');
        var x = $(this).text();
        if (x == "Create") {
            $(this).text('Close');
        } else {
            $(this).text('Create');
        }
    })

</script>
@endpush
