@extends('layouts.doctor')
@section('title','Appointments')
@push('css')
@endpush
@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-12 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12 d-flex justify-content-between">
                        <h2 class="content-header-title float-left mb-0">Transactions & payment detail</h2>
                        <div class="btn-group">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="row-grouping-datatable">
                <div class="row">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-body mt-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="colspan" colspan="2">Sender Detail</th>
                                            
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                <th>Name</th>
                                                    <td>{{$transaction->senderUser->name}}</td>
                                                </tr>
                                                <tr>
                                                <th>Email</th>
                                                    <td>{{$transaction->senderUser->email}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="colspan" colspan="2">Reciever Detail</th>
                                            
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                <th>Name</th>
                                                    <td>{{$transaction->user->name}}</td>
                                                </tr>
                                                <tr>
                                                <th>Email</th>
                                                    <td>{{$transaction->user->email}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <q></q>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
@push('js')

@endpush
