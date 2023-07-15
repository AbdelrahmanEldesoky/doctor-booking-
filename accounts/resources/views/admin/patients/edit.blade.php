@extends('layouts.admin')
@section('title','Patient |Detail')
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
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="card user-card">
                                <div class="card-body">
                                <form class="auth-login-form p-1" action="{{ route('admin.patients.update',$user->id) }}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input class="form-control" required type="text" name="name"
                                                    placeholder="john" value="{{$user ? $user->name : ''}}" />
                                                @error('name')
                                                <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                       
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input class="form-control" required type="email" readonly
                                                    placeholder="john@example.com" value="{{$user ? $user->email : ''}}"/>
                                                @error('email')
                                                <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label>Mobile Number</label>
                                                <input class="form-control" required type="text" name="phone" placeholder="" value="{{$user ? ($user->information ? $user->information->phone : '') : ''}}"/>
                                                @error('phone')
                                                <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <select class="form-control" name="gender">
                                                    @php($selected = $user && $user->information && $user->information->gender == 'male'  ? 'selected' : '')
                                                    <option {{$selected}} value="male">Male</option>
                                                    @php($selected = $user && $user->information && $user->information->gender == 'female'  ? 'selected' : '')
                                                    <option {{$selected}} value="female">Female</option>
                                                    @php($selected = $user && $user->information && $user->information->gender == 'other'  ? 'selected' : '')
                                                    <option {{$selected}} value="other">Other</option>
                                                </select>
                                                @error('gender')
                                                <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label>Select Residence</label>
                                                <select class="form-control" name="residence">
                                                    @php($selected = $user &&  $user->residence == 'egyption'  ? 'selected' : '')
                                                    <option {{$selected}} value="egyption">Egyption</option>
                                                    @php($selected = $user &&  $user->residence == 'NonEgyption'  ? 'selected' : '')
                                                    <option {{$selected}} value="NonEgyption">Non Egyption</option>
                                                </select>
                                                @error('residence')
                                                <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        
                                        <div class="col-md-12 mt-4 text-right">
                                            <button class="btn btn-info">@lang('site.register') </button>
                                        </div>
                                    </div>
                                </form>
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
