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
            <section>
                <div class="card">
                    <div class="card-header d-sm-flex d-block">
                        <div class="me-auto mb-sm-0  text-primary">
                            <h4 class="card-title mb-0 text-primary">Messages</h4>
                        </div>
                    </div>
                    <hr class="mt-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Name</label>
                                <input value="{{$m->name}}" class="form-control" readonly>
                            </div>
                            <div class="col-md-6">
                                <label>Email</label>
                                <input value="{{$m->email}}" class="form-control" readonly>
                            </div>
                            <div class="col-md-12">
                                <label>Message</label>
                                <div class="w-100" style="border: 1px solid;
border-radius: 3px;
padding: 10px;">
                                {{$m->message}}
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
