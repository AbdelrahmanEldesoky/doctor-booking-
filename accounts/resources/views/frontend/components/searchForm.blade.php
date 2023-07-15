@php($request = $request ?? null)
<ul class="nav nav-tabs" id="esaalTab" role="tablist">
                    <li  class="nav-item text-center d-flex align-items-center" role="presentation" style="width: 33.33%;">
                        <a style="font-size: 20px;font-weight: 900;"
                           class="nav-link book-tab w-100 active" id="book-tab" data-toggle="tab" href="#book"
                            role="tab" aria-controls="book" aria-selected="true"><i class="sessionswhite-icon"></i>@lang('site.book_doctor')</a>
                    </li>
                    <li class="nav-item text-center d-flex align-items-center" role="presentation" style="width: 33.33%;">
                        <a class="nav-link faq-tab w-100" id="faq-tab" data-toggle="tab" href="#faq" role="tab"
                            aria-controls="faq" aria-selected="false"><i class="teleconsultation-icon"></i>@lang('site.tele_health')</a>
                    </li>
                    <li class="nav-item text-center d-flex align-items-center" role="presentation" style="width: 33.33%;">
                        <a class="nav-link faq-tab1 w-100" id="faq-tab1" data-toggle="tab" href="#divExpertCall"
                            role="tab" aria-controls="divExpertCall" aria-selected="false"><i
                                class="chattingwhite-icon"></i>@lang('site.book_hospital')</a>
                    </li>
                </ul>
                <div class="tab-content px-3 py-2 " id="essalTabContent">
                    <div class="tab-pane px-4 fade show active" id="book" role="tabpanel" aria-labelledby="book-tab">

                        <form action="{{ route('doctor.search') }}" class="">
                        <div class="row pb-3">
                                <div class="col-lg-4  mt-3">
                                        <label>@lang('site.select_speciality')</label>
                                            <select class="form-control" name="speciality_id">
                                                <option class="" value="">@lang('site.select_speciality')</option>
                                                @foreach ($specialities as $item)
                                                    @php($selected = $request && $request->speciality_id == $item->id ? 'selected' : '')
                                                    <option {{$selected}} value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                </div>
                                <div class="col-lg-4  mt-3">
                                        <label >@lang('site.select_city')</label>
                                            <select class="form-control search_country_id" name="city_id">
                                                <option class="" value="">@lang('site.select_city')</option>
                                                @foreach ($cities as $item)
                                                @php($selected = $request && $request->city_id == $item->id ? 'selected' : '')
                                                <option {{$selected}} value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                </div>
                                <div class="col-lg-4  mt-3">
                                    <div class="input-box">
                                        <label class="label-text">@lang('site.select_area')</label>
                                        <div class="form-group">
                                            <select class="form-control appendCities" name="area_id">
                                                <option class="hidden" disabled="" value="">@lang('site.select_area')
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <div class="input-box">
                                        <label class="label-text">@lang('site.or_search_by_name')</label>
                                        <div class="form-group">

                                            <input class="form-control" name="name" type="text" value="{{$request ? $request->name : ''}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6" style="margin-top: 40px">
                                    <button type="submit" class="w-100 btn bg-site-2">@lang('site.search_now')</button>
                                </div>
                        </div>
                    </form>

                    </div>

                    <div class="tab-pane px-4 fade" id="faq" role="tabpanel" aria-labelledby="faq-tab">
                        <div class="row">
                        <form action="{{ route('doctor.search') }}" class="row align-items-center">
                                <input type="hidden" name="telehealth" value="true">
                                <div class="col-lg-8 pr-0">
                                    <div class="input-box">
                                        <div class="form-group">
                                            <select class="form-control" name="speciality_id">
                                                <option class="" value="">@lang('site.select_speciality')
                                                </option>
                                                @foreach ($specialities as $item)
                                                @php($selected = $request && $request->speciality_id == $item->id ? 'selected' : '')
                                                    <option {{$selected}} value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4"><button  type="submit" class="btn bg-site-2 w-100">@lang('site.search_now')</button></div>
                            </form>
                        </div>
                    </div>

                    <div class="tab-pane px-4 fade" id="divExpertCall" role="tabpanel" aria-labelledby="faq-tab1">
                        <form action="{{route('hospitals.search')}}" method="GET" class="">
                        <div class="row pb-3">
                        <div class="col-lg-6  mt-3">
                                        <label>@lang('site.select_speciality')</label>
                                            <select class="form-control" name="speciality_id">
                                                <option class="" value="">@lang('site.select_speciality')</option>
                                                @foreach ($specialities as $item)
                                                    @php($selected = $request && $request->speciality_id == $item->id ? 'selected' : '')
                                                    <option {{$selected}} value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                </div>
                                <div class="col-lg-6kjk  mt-3">
                                        <label >@lang('site.select_city')</label>
                                            <select class="form-control search_country_id" name="city_id">
                                                <option class="" value="">@lang('site.select_city')</option>
                                                @foreach ($cities as $item)
                                                @php($selected = $request && $request->city_id == $item->id ? 'selected' : '')
                                                <option {{$selected}} value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                </div>
                                <div class="col-lg-4 mt-3">
                                    <label class="label-text">@lang('site.from')</label>
                                    <input type="date" class="form-control" required name="from" value="{{$request ? $request->from : ''}}">
                                </div>
                                <div class="col-lg-4 mt-3">
                                        <label class="label-text">@lang('site.to')</label>
                                        <input type="date" class="form-control" required name="to" value="{{$request ? $request->to : ''}}">
                                </div>
                                <div class="col-lg-4"  style="margin-top: 40px">
                                    <button href="javascript:;" type="submit" class="btn bg-site-2 w-100">@lang('site.search_now')</button></div>
                        </div>
                    </form>
                    </div>
                </div>
