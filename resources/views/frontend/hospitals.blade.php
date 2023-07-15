@extends('layouts.app')
@section('title','Home')
@push('css')
<style>
    .hide {
        display: none;
    }

    .heightapp {
        min-height: 0 !important;
    }

    .card-img img {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        object-position: top;
        border: 2px solid #3da8c0;
        padding: 2px;
        box-shadow: 0 0 6px #3da8c04d;
    }

    .doctor_card .about_section {
        color: #4d4d4f;
        font-size: 12px;
        min-height: 36px;
    }

    .doctor_card .sessions {
        color: #666669;
        font-size: 12px;
    }

</style>
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

            <div class="col-12 mt-3">
                <h2 class="site-heading text-center">@lang('site.hospitals')</h2>
            </div>
            @if($hospitals->count() > 0)
            @foreach($hospitals as $hospital)
            <div class=" col-md-4 mt-2 fitered_doctors_list">

                @include('frontend.components.hospitalCard')
            </div>

            @endforeach
            @else
            <div class="w-100 text-center">@lang('site.no_record')</div>
            @endif
        </div>
    </div>
</div>

</div>

@endsection
@push('js')
@endpush
