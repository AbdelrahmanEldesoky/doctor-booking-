<div class="filter_sidebar mt-0">
                    <form action="{{route('doctor.search')}}">
                        <input type="hidden" name="country_id" value="{{$request->country_id}}">
                        <input type="hidden" name="speciality_id" value="{{$request->speciality_id}}">
                        <input type="hidden" name="city_id" value="{{$request->city_id}}">
                        <input type="hidden" name="name" value="{{$request->name}}">
                        <div class="filter_header">
                            <div>
                                <i class="fa fa-filter"></i>
                                Filter
                            </div>
                        </div>
                        <div class="filter_body">
                            <div>
                                <div class="filter_title">
                                    <i class="fa fa-intersex"></i>
                                    Gender
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="allgender" value="" checked
                                        name="gender">
                                    <label class="form-check-label" for="allgender">
                                        All
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="malegender" value="male"
                                        name="gender">
                                    <label class="form-check-label" for="malegender">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="femalegender" value="female"
                                        name="gender">
                                    <label class="form-check-label" for="femalegender">
                                        Female
                                    </label>
                                </div>
                            </div>
                            <div class="mt-2">
                                <div class="filter_title">
                                    <i class="fa fa-calendar"></i>
                                    Availability
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="availabilityall" value="" checked
                                        name="availability">
                                    <label class="form-check-label" for="availabilityall">
                                        All
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="availabilityonline" value="online"
                                        name="availability">
                                    <label class="form-check-label" for="availabilityonline">
                                        Online
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="availabilityofline" value="ofline"
                                        name="availability">
                                    <label class="form-check-label" for="availabilityofline" value="female">
                                        Offline
                                    </label>
                                </div>
                            </div>
                            <div class="mt-2">
                                <div class="filter_title">
                                    <i class="fa fa-stethoscope"></i>
                                    Entity
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="entityall" value="" checked
                                        name="entity">
                                    <label class="form-check-label" for="entityall">
                                        All
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="hospital" value="hospital"
                                        name="entity">
                                    <label class="form-check-label" for="hospital">
                                        Hospital
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="flexRadioDefault2" value="clinic"
                                        name="entity">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Clinic
                                    </label>
                                </div>
                            </div>
                        </div>

                        <button  type="submit" class="theme-btn w-100 text-center m-auto"
                            style="width:200px">Search Now</button>
                    </form>

                </div>