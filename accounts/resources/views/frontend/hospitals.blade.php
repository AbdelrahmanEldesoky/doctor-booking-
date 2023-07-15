@extends('layouts.app')
@section('title','Home')
@push('css')
@endpush
@section('content')
<div class="bg_home-slider"></div>
<div class="tabslid" style="min-height:100% !important">
    <div class="container text-center px-0">
        <div class="main-tabs bg-site" style="margin-top:20px">
          @include('frontend.components.searchForm')
        </div>
    </div>
</div>
<div class="w-bg pb-5 statistics">

    <div class="container">
        <div class="row">

            <div class="col-12">
                <h2 class="home-titles text-center">Hospitals</h2>
            </div>
            <div class="col-12 mt-2 fitered_doctors_list">
                @if($hospitals->count() > 0)
                @foreach($hospitals as $hospital)
                @include('frontend.components.hospitalCard')
                @endforeach
                @else
                No Record Found
                @endif
            </div>
        </div>
    </div>
</div>

</div>

@endsection
@push('js')
@endpush
