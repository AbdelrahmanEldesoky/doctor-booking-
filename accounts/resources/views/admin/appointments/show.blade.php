@extends('layouts.admin')
@section('title','Appointment |Detail')
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
                            <div class="card-header">
                                <h3>Patient Detail</h3>
                            </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div
                                            class="col-xl-6 col-lg-12 d-flex flex-column justify-content-between border-container-lg">
                                            <div class="user-avatar-section">
                                                <div class="d-flex justify-content-start">
                                                    <img class="img-fluid rounded"
                                                         src="{{$user->image}}" height="104"
                                                         width="104" alt="User avatar"/>
                                                    <div class="d-flex flex-column ml-1">
                                                        <div class="user-info mb-1">
                                                            <h4 class="mb-0">{{$user->name}}</h4>
                                                            <span class="card-text">{{$user->email}}</span>
                                                        </div>
                                                        <div class="d-flex flex-wrap">
                                                            
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
                                                        <h5 class="mb-0">{{$user->patients_count}}</h5>
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
                                                    <p class="card-text mb-0">{{$user->name}}</p>
                                                </div>
                                                <div class="d-flex flex-wrap my-50">
                                                    <div class="user-info-title">
                                                        <i data-feather="check" class="mr-1"></i>
                                                        <span class="card-text user-info-title font-weight-bold mb-0">Status :</span>
                                                    </div>
                                                    <p class="card-text mb-0">Active</p>
                                                </div>
                                                <div class="d-flex flex-wrap my-50">
                                                    <div class="user-info-title">
                                                        <i data-feather="star" class="mr-1"></i>
                                                        <span class="card-text user-info-title font-weight-bold mb-0">Role :</span>
                                                    </div>
                                                    <p class="card-text mb-0">{{$user->role}}</p>
                                                </div>
                                                <div class="d-flex flex-wrap my-50">
                                                    <div class="user-info-title">
                                                        <i data-feather="flag" class="mr-1"></i>
                                                        <span class="card-text user-info-title font-weight-bold mb-0">Country :</span>
                                                    </div>
                                                    <p class="card-text mb-0">{{$user->information ? $user->information->country : '-'}}</p>
                                                </div>
                                                <div class="d-flex flex-wrap">
                                                    <div class="user-info-title">
                                                        <i data-feather="phone" class="mr-1"></i>
                                                        <span class="card-text user-info-title font-weight-bold mb-0">Contact :</span>
                                                    </div>
                                                    <p class="card-text mb-0">{{$user->information ? $user->information->phone : '-'}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($doctor)
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="card user-card">
                            <div class="card-header">
                                <h3>Doctor Detail</h3>
                            </div>
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
                                                    <p class="card-text mb-0">Active</p>
                                                </div>
                                                <div class="d-flex flex-wrap my-50">
                                                    <div class="user-info-title">
                                                        <i data-feather="star" class="mr-1"></i>
                                                        <span class="card-text user-info-title font-weight-bold mb-0">Role :</span>
                                                    </div>
                                                    <p class="card-text mb-0">{{$doctor->role}}</p>
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
                        @else
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="card user-card">
                            <div class="card-header">
                                <h3>Hospital Detail</h3>
                            </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div
                                            class="col-xl-6 col-lg-12 d-flex flex-column justify-content-between border-container-lg">
                                            <div class="user-avatar-section">
                                                <div class="d-flex justify-content-start">
                                                    <img class="img-fluid rounded"
                                                         src="{{$hospital->image}}" height="104"
                                                         width="104" alt="User avatar"/>
                                                    <div class="d-flex flex-column ml-1">
                                                        <div class="user-info mb-1">
                                                            <h4 class="mb-0">{{$hospital->name}}</h4>
                                                            <span class="card-text">{{$hospital->email}}</span>
                                                        </div>
                                                        <div class="d-flex flex-wrap">
                                                            
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
                                                        <h5 class="mb-0">{{$hospital->patients->count()}}</h5>
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
                                                    <p class="card-text mb-0">{{$hospital->name}}</p>
                                                </div>
                                                <div class="d-flex flex-wrap my-50">
                                                    <div class="user-info-title">
                                                        <i data-feather="check" class="mr-1"></i>
                                                        <span class="card-text user-info-title font-weight-bold mb-0">Status :</span>
                                                    </div>
                                                    <p class="card-text mb-0">Active</p>
                                                </div>
                                                <div class="d-flex flex-wrap my-50">
                                                    <div class="user-info-title">
                                                        <i data-feather="star" class="mr-1"></i>
                                                        <span class="card-text user-info-title font-weight-bold mb-0">Type :</span>
                                                    </div>
                                                    <p class="card-text mb-0">Hospital</p>
                                                </div>
                                                <div class="d-flex flex-wrap my-50">
                                                    <div class="user-info-title">
                                                        <i data-feather="flag" class="mr-1"></i>
                                                        <span class="card-text user-info-title font-weight-bold mb-0">Country :</span>
                                                    </div>
                                                    <p class="card-text mb-0">{{$hospital->information ? $hospital->information->country : '-'}}</p>
                                                </div>
                                                <div class="d-flex flex-wrap">
                                                    <div class="user-info-title">
                                                        <i data-feather="phone" class="mr-1"></i>
                                                        <span class="card-text user-info-title font-weight-bold mb-0">Contact :</span>
                                                    </div>
                                                    <p class="card-text mb-0">{{$hospital->information ? $hospital->information->phone : '-'}}</p>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="card user-card">
                            <div class="card-header">
                                <h3>Appointment Detail</h3>
                            </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-12 mt-2 mt-xl-0">
                                            <div class="user-info-wrapper">
                                                <div class="d-flex flex-wrap">
                                                    <div class="user-info-title">
                                                        <i data-feather="user" class="mr-1"></i>
                                                        <span class="card-text user-info-title font-weight-bold mb-0">Date :</span>
                                                    </div>
                                                    <p class="card-text mb-0">{{$appointment->schedule ? $appointment->schedule->date : ''}}</p>
                                                </div>
                                                <div class="d-flex flex-wrap my-50">
                                                    <div class="user-info-title">
                                                        <i data-feather="check" class="mr-1"></i>
                                                        <span class="card-text user-info-title font-weight-bold mb-0">Status :</span>
                                                    </div>
                                                    <p class="card-text mb-0">{{$appointment->status}}</p>
                                                </div>
                                                <div class="d-flex flex-wrap my-50">
                                                    <div class="user-info-title">
                                                        <i data-feather="star" class="mr-1"></i>
                                                        <span class="card-text user-info-title font-weight-bold mb-0">From :</span>
                                                    </div>
                                                    <p class="card-text mb-0">{{$appointment->schedule ? $appointment->schedule->from : '-'}}</p>
                                                </div>
                                                @if($appointment->room)
                                                <div class="d-flex flex-wrap my-50">
                                                    <div class="user-info-title">
                                                        <i data-feather="star" class="mr-1"></i>
                                                        <span class="card-text user-info-title font-weight-bold mb-0">From :</span>
                                                    </div>
                                                    <p class="card-text mb-0">{{$appointment->room ? $appointment->room->type : '-'}}</p>
                                                </div>
                                                @endif
                                                <div class="d-flex flex-wrap my-50">
                                                    <div class="user-info-title">
                                                        <i data-feather="star" class="mr-1"></i>
                                                        <span class="card-text user-info-title font-weight-bold mb-0">To :</span>
                                                    </div>
                                                    <p class="card-text mb-0">{{$appointment->schedule ? $appointment->schedule->to : ''}}</p>
                                                </div>
                                                <div class="d-flex flex-wrap my-50">
                                                    <div class="user-info-title">
                                                        <i data-feather="flag" class="mr-1"></i>
                                                        <span class="card-text user-info-title font-weight-bold mb-0">Amount :</span>
                                                    </div>
                                                    <p class="card-text mb-0">{{$appointment->amount}}</p>
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
                 
                </section>

            </div>
        </div>
    </div>
@endsection
@push('js')

@endpush
