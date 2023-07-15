<div class="card-item card-item-list doctor_list_item_@" data-url="{{route('doctor.show',$doctor->id)}}">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card-img" style="height:150px;width:150px">
                                    <a href="{{route('doctor.show',$doctor->id)}}" class="d-block">
                                        <img src="{{$doctor->image}}" alt="hotel-img" style="width:100%">
                                    </a>
                                    <div class="add-to-wishlist icon-element" data-toggle="tooltip" data-placement="top"
                                        title="Bookmark">
                                        <i class="la la-heart-o"></i>
                                    </div>
                                </div>
                                <p>
                                        <span class="price__from"> {{$doctor->name}}</span>
                                    </p>
                                <div class="card-rating">


                                </div>
                                <div class="card-price d-flex align-items-center justify-content-between">
                                    <p>
                                        <span class="price__from" style="font-size:14px"> {{$doctor->email}}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <p style="margin:0px">Hospital:  <span style="font-size:13px;display:inline">{{$doctor->information ? $doctor->information->hospital : '-'}}</span></p>
                                <p style="margin:0px">Clinic: <span style="font-size:13px;display:inline">{{$doctor->information ? $doctor->information->clinic : '-'}}</span></p>

                                <p style="font-size: 13px;
font-weight: lighter;
margin-top: 14px;">
                                {{$doctor->information ? $doctor->information->about : '-'}}
                                </p>
                            </div>
                            <div class="col-md-5">
                              <div>
                                @include('frontend.components.schedules')
                              </div>
                            </div>
                        </div>
                    </div>
                </div>