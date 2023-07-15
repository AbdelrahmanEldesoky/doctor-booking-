<div class="card-item card-item-list doctor_list_item_@" data-url="">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card-img" style="height:150px;width:150px">
                                    <a href="javascript:;" class="d-block">
                                        <img src="{{ doctorProfile($hospital->getRawOriginal('image')) }}" alt="hotel-img" style="width:100%">
                                    </a>
                                    <div class="add-to-wishlist icon-element" data-toggle="tooltip" data-placement="top"
                                        title="Bookmark">
                                        <i class="la la-heart-o"></i>
                                    </div>
                                </div>
                                <p>
                                        <span class="price__from"> {{$hospital->name}}</span>
                                    </p>
                                <div class="card-rating">


                                </div>
                                <div class="card-price d-flex align-items-center justify-content-between">
                                    <p>
                                        <span class="price__from" style="font-size:14px"> {{$hospital->email}}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <p style="margin:0px">@lang('site.hospital'):  <span style="font-size:13px;display:inline">{{$hospital->information ? $hospital->information->hospital : '-'}}</span></p>
                                <p style="margin:0px">@lang('site.Clinic'): <span style="font-size:13px;display:inline">{{$hospital->information ? $hospital->information->clinic : '-'}}</span></p>

                                <p style="font-size: 13px;
font-weight: lighter;
margin-top: 14px;">
                                {{$hospital->information ? $hospital->information->about : '-'}}
                                </p>
                            </div>

                            <div class="col-md-5 text-center" style="border-left:1px solid">
                               <button class=" book_hospital btn btn-site" style="margin-top:20%" data-hospital="{{$hospital->id}}">@lang('site.book_me')</button>
                            </div>

                        </div>
                    </div>
                </div>
