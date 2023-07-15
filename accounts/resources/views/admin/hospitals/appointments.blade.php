@extends('layouts.admin')
@section('title','Dashboard |Admin')
@push('css')
<link rel="stylesheet" href="{{ asset('assets/admin/dashboard/css/dataTables.bootstrap4.min.css') }}" />
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
                                <h4 class="card-title">Appointments</h4>
                            </div>
                            <div class="card-body mt-2">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Patient</th>
                                                <th scope="col">Room</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Phone #</th>
                                                <th scope="col">From</th>
                                                <th scope="col">To</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($appointments as $item)
                                            <tr>
                                                <th scope="row">{{$loop->iteration}}</th>
                                                <td>{{$item->patient->name}}</td>
                                                <td>{{$item->room ? $item->room->lang_name : ''}}</td>
                                                <td>{{$item->patient->email}}</td>
                                                <td>{{$item->patient->information ? $item->patient->information->phone : '-'}}</td>
                                                <td>{{$item->from}}</td>
                                                <td>{{$item->to}}</td>
                                                <td>
                                                    @if($item->status == 'in progress')
                                                     <a href="{{route('admin.hospitals.appointments.status',$item->id)}}" class="btn btn-success">To Complete</a>
                                                     @else
                                                     @if($item->status == 'waiting_for_rating')
                                                     Complete
                                                     @else
                                                     {{$item->status}}
                                                     @endif
                                                     @endif
                                                </td>

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
@endpush
