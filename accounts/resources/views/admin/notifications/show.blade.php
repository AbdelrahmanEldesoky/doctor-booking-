@extends('layouts.admin')
@section('title','Notification |Detail')
@push('cs')
@endpush
@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="app-user-view">
                <!-- User Card & Plan Starts -->
                <div class="row">
                    <!-- User Card starts-->
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        @if($log->type == 'profile')
                        <div class="card user-card">
                            <div class="card-header">
                                Profile
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @foreach($data as $key => $item)
                                    @if(in_array($key,userColumns()))
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Previous {{$key}}</label>
                                            <input value="{{$item}}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Current {{$key}}</label>
                                            <input value="{{$doc->$key}}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    @endif
                                    @if(in_array($key,informationColumns()))
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <label>Previous {{$key}}</label>
                                            @if($key == 'about')
                                            <textarea class="form-control w-100" rows="5"
                                                readonly>{!! $item !!}</textarea>
                                            @else
                                            <input value="{{$item}}" class="form-control" readonly>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Current {{$key}}</label>
                                            @if($key == 'about')
                                            <textarea class="form-control w-100" readonly
                                                rows="5">{!! $doc->information->$key !!}</textarea>
                                            @else
                                            <input value="{{$doc->information->$key}}" class="form-control" readonly>
                                            @endif
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="card user-card">
                            <div class="card-header">
                                Schedule
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @foreach($data as $key => $item)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Previous {{$key}}</label>
                                            <input value="{{$item}}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Current {{$key}}</label>
                                            <input value="{{$schedule->$key}}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
@push('js')

@endpush
