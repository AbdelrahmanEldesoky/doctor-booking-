@extends('layouts.admin')
@section('title','Doctor |Detail')
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
                            <div class="card user-card">
                                <div class="card-body">
                                    <div class="row">
                                        <div
                                            class="col-xl-6 col-lg-12 d-flex flex-column justify-content-between border-container-lg">
                                            <div class="user-avatar-section">
                                                <div class="d-flex justify-content-start">
                                                    <img class="img-fluid rounded"
                                                         src="{{$doctor->image}}" height="104"
                                                         width="104" alt="User avatar"/>
                                                    <div class="d-flex flex-column ml-1">
                                                        <div class="user-info mb-1">
                                                            <h4 class="mb-0">{{$doctor->name}}</h4>
                                                            <span class="card-text">{{$doctor->email}}</span>
                                                        </div>
                                                        <div class="d-flex flex-wrap">
                                                            @php($color = $doctor->status == 1 ? 'success' : 'danger')
                                                            @php($status = $doctor->status == 1 ? 'Active' : 'Inactive')
                                                            <a href="{{route('admin.doctors.status',$doctor->id)}}"
                                                               class="btn btn-{{$color}}">Approve</a>
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center user-total-numbers">
                                                <div class="d-flex align-items-center">
                                                    <div class="color-box bg-light-success">
                                                        <i data-feather="trending-up" class="text-success"></i>
                                                    </div>
                                                    <div class="ml-1">
                                                        <h5 class="mb-0">{{$doctor->patients->count()}}</h5>
                                                        <small>Appointments</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-12 mt-2 mt-xl-0">
                                            <div class="user-info-wrapper">
                                                <div class="d-flex flex-wrap">
                                                    <div class="user-info-title">
                                                        <i data-feather="user" class="mr-1"></i>
                                                        <span class="card-text user-info-title font-weight-bold mb-0">Username :</span>
                                                    </div>
                                                    <p class="card-text mb-0">{{$doctor->name}}</p>
                                                </div>
                                                <div class="d-flex flex-wrap my-50">
                                                    <div class="user-info-title">
                                                        <i data-feather="check" class="mr-1"></i>
                                                        <span class="card-text user-info-title font-weight-bold mb-0">Status :</span>
                                                    </div>
                                                    <p class="card-text mb-0">{{$doctor->status == 1 ? 'active' : 'Inactive'}}</p>
                                                </div>
                                                <div class="d-flex flex-wrap my-50">
                                                    <div class="user-info-title">
                                                        <i data-feather="star" class="mr-1"></i>
                                                        <span class="card-text user-info-title font-weight-bold mb-0">Role :</span>
                                                    </div>
                                                    <p class="card-text mb-0">Doctor</p>
                                                </div>
                                                <div class="d-flex flex-wrap my-50">
                                                    <div class="user-info-title">
                                                        <i data-feather="flag" class="mr-1"></i>
                                                        <span class="card-text user-info-title font-weight-bold mb-0">Country :</span>
                                                    </div>
                                                    <p class="card-text mb-0">{{$doctor->information ? $doctor->information->country : '-'}}</p>
                                                </div>
                                                <div class="d-flex flex-wrap">
                                                    <div class="user-info-title">
                                                        <i data-feather="phone" class="mr-1"></i>
                                                        <span class="card-text user-info-title font-weight-bold mb-0">Contact :</span>
                                                    </div>
                                                    <p class="card-text mb-0">{{$doctor->information ? $doctor->information->phone : '-'}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- User Card & Plan Ends -->

                    <!-- User Timeline & Permissions Starts -->
                    <div class="row">
                        <!-- User Permissions Starts -->
                        <div class="col-md-12">
                            <!-- User Permissions -->
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Patients</h4>
                                </div>
                                    <div class="card-body mt-2">
                                        <div class="row">
                                        </div>
                                        <!--RECORD WILL BE APPEND HERE in #append-record FROM RENDERED VIEW VIA AJAX-->
                                        <div id="append-record">
                                            <div class="table-responsive">
                                                <table class="table table-sm">
                                                    <thead>
                                                    <tr>
                                                        <th>User</th>
                                                        <th>Email</th>
                                                        <th>Date</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody id="tag_container">
                                                    @foreach($doctor->patients as $doc)
                                                        <tr>
                                                            <td>{{$doc->name}}</td>
                                                            <td>{{$doc->email}}</td>
                                                            <td>{{customDate($doc->created_at,'M d, Y')}}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <!-- /User Permissions -->
                        </div>
                        <!-- User Permissions Ends -->
                    </div>
                </section>

            </div>
        </div>
    </div>
@endsection
@push('js')

@endpush
