@extends('layouts.app')
@section('title','Home')
@push('css')
<style>
    .heightapp
    {
        min-height: 0 !important;
    }
</style>
@endpush
@section('content')
<div class="bg_home-slider bg-bg"></div>
<div class="tabslid pages-banner">
    <div class="container text-center px-0 pt-5">
        <div class="main-tabs bg-site">
          @include('frontend.components.searchForm')
        </div>
    </div>
</div>
<div class="w-bg pb-5 statistics">

    <div class="container">

        <h2 class="site-heading text-center py-3">Our Doctors</h2>

        <div class="row">

            <!-- <div class="col-3 mt-2">
            @include('frontend.components.sideSearch')
            </div> -->
            <div class="col-12 mt-2 fitered_doctors_list">
                @if($doctors->count() > 0)
                @foreach($doctors as $doctor)
                    @include('frontend.components.doctorCard')
                @endforeach
                @else
                    <div class="text-center">
                        <img src="{{ asset('images/panda.png') }}" class="panda-img" alt="">

                        <h3 class="alert alert-danger p-2 mt-4">@lang('site.no_record_founded')</h3>
                        <h6 class="alert alert-danger p-1">@lang('site.try_alternate_search')</h6>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

</div>

@endsection
@push('js')
@endpush
