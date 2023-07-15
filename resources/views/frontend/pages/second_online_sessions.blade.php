<link href="{{ asset('new_assets/doctor_profile/style.css') }}" rel="stylesheet">
<link href="{{ asset('new_assets/booking/style.css') }}" rel="stylesheet">


@extends('new_layouts.app')

@section('title')
    <title>ipersona / {{ trans('second_online_sessions.home') }}</title>
@endsection



@extends('new_layouts.master_pages')

<!--  start Section  -->
@section('section')
    <section id="hero" class="hero">
        <div class="container position-relative">
            <div class="row gy-5 aos-init aos-animate" data-aos="fade-in">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
                    <h2 class="text-center ">{{ trans('second_online_sessions.home') }}</h2>
                    <p class="h2 text-center we"> {{ trans('second_online_sessions.brief') }}</p>
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                    <img src="https://www8.0zz0.com/2023/05/03/19/651452952.png " class="img-fluid aos-init aos-animate"
                        alt="" data-aos="zoom-out" data-aos-delay="100">
                </div>
            </div>
        </div>

    </section>
@endsection
<!-- End Hero Section -->

<!--  About Us Section  -->
@section('about_us')
    <section id="about" class="about">
    <div class="container">
            <div class="row">
                <li class="col-lg-2 col-sm-6 list btn btn-outline-secondary active we h4" data-filter="all">
                    {{ trans('second_booking_doctor.all') }}</li>
                <li class="col-lg-2 col-sm-6 list btn btn-outline-secondary we h4" data-filter="photoshop">
                    {{ trans('second_booking_doctor.matched') }}</li>
                <li class="col-lg-2 col-sm-6 list btn btn-outline-secondary we h4" data-filter="illustrator">
                    {{ trans('second_booking_doctor.rated') }}</li>
                <li class="col-lg-2 col-sm-6 list btn btn-outline-secondary we h4" data-filter="HTML- CSS">
                    {{ trans('second_booking_doctor.lowest_Price') }}</li>
                <li class="col-lg-2 col-sm-6 list btn btn-outline-secondary we h4" data-filter="javascript">
                    {{ trans('second_booking_doctor.highest_Price') }}</li>
                <li class="col-lg-2 col-sm-6 list btn btn-outline-secondary we h4" data-filter="Bootstrap">
                    {{ trans('second_booking_doctor.low_time') }}</li>
                {{-- <li class="list" data-filter="reactJS">ReactJS</li> --}}
            </div>


        <div class="product">
                    <div id="cards-section">
                        <div class="container">
                            <div class="row">
                                {{-- itemsbox javascript
                            itemsbox photoshop
                            itemsbox illustrator --}}

                                <div class="col-xs-4 col-sm-12 col-md-4 col-lg-4 m-auto p-2   itemsbox illustrator">
                                    <div class="card-complete">
                                        <div class="image-container">
                                            <img src="https://images.squarespace-cdn.com/content/v1/5efa0fe78713d718e5a23e0d/1623170942484-0DIN15JGG47O71NGWLFL/Prof+Dr+Ahmed+Hatem.png?format=1000w"
                                                alt="" />
                                        </div>
                                        <div class="text-container">
                                            <h6 class="about_us_title">دكتور عبد الرحمن </h6>
                                            <span>متخصص في الطب النفسي وعلاج الإدمان وإضطرابات الشخصيه</span>
                                            <p class="we">استشارات تربوية استشارات زوجية و علاقات استشارات تنمية ذاتيه
                                                مشاكل
                                                المراهقة الإدمان المشاكل الجنسية الإضطرابات( الإكتئاب/ القلق/ الرهاب) مشاكل
                                                الشيخوخه
                                                مشاكل الأطفال اضطرابات الشخصية الحدية اضطراب الوسواس القهري جميع التخصصات
                                                النفسية
                                                </h3< /p>
                                            <ul class="social-media">
                                                <i class="we text-warning fa-solid fa-star"></i>
                                                <i class="we text-warning fa-solid fa-star"></i>
                                                <i class="we text-warning fa-solid fa-star"></i>
                                                <i class="we text-warning fa-solid fa-star"></i>
                                                <i class="we text-warning fa-solid fa-star"></i>
                                            </ul>

                                            <div class="d-flex justify-content-around we ">
                                                <p class="we h5">السعر : 140 جنيه </p>
                                                <p class="we h5">العنوان : شبرا </p>
                                                <p class="we h5">مدة الانتظار : 60 دقيقة </p>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <a href="#" data-price="0.5"
                                                    class="add-to-cart btn btn-primary p-2 w-25 purple">

                                                    {{ trans('second_booking_doctor.book_now') }}
                                                </a>
                                                <button data-price="0.5" class="add-to-cart btn btn btn-secondary p-2 w-75"
                                                readonly>{{ trans('second_booking_doctor.booking_date') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-xs-4 col-sm-12 col-md-4 col-lg-4 m-auto p-2     itemsbox photoshop">
                                    <div class="card-complete">
                                        <div class="image-container">
                                            <img src="https://images.squarespace-cdn.com/content/v1/5efa0fe78713d718e5a23e0d/1623170942484-0DIN15JGG47O71NGWLFL/Prof+Dr+Ahmed+Hatem.png?format=1000w"
                                                alt="" />
                                        </div>
                                        <div class="text-container">
                                            <h6 class="about_us_title">دكتور عبد الرحمن </h6>
                                            <span>متخصص في الطب النفسي وعلاج الإدمان وإضطرابات الشخصيه</span>
                                            <p class="we">استشارات تربوية استشارات زوجية و علاقات استشارات تنمية ذاتيه
                                                مشاكل
                                                المراهقة الإدمان المشاكل الجنسية الإضطرابات( الإكتئاب/ القلق/ الرهاب) مشاكل
                                                الشيخوخه
                                                مشاكل الأطفال اضطرابات الشخصية الحدية اضطراب الوسواس القهري جميع التخصصات
                                                النفسية
                                                </h3< /p>
                                            <ul class="social-media">
                                                <i class="we text-warning fa-solid fa-star"></i>
                                                <i class="we text-warning fa-solid fa-star"></i>
                                                <i class="we text-warning fa-solid fa-star"></i>
                                                <i class="we text-warning fa-solid fa-star"></i>
                                                <i class="we text-warning fa-solid fa-star"></i>
                                            </ul>

                                            <div class="d-flex justify-content-around we ">
                                                <p class="we h5">السعر : 140 جنيه </p>
                                                <p class="we h5">العنوان : شبرا </p>
                                                <p class="we h5">مدة الانتظار : 60 دقيقة </p>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <a href="#" data-price="0.5"
                                                    class="add-to-cart btn btn-primary p-2 w-25 purple">{{ trans('second_booking_doctor.book_now') }}</a>
                                                <button data-price="0.5" class="add-to-cart btn btn btn-secondary p-2 w-75"
                                                    readonly>{{ trans('second_booking_doctor.booking_date') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-12 col-md-4 col-lg-4 m-auto p-2  itemsbox photoshop ">
                                    <div class="card-complete">
                                        <div class="image-container">
                                            <img src="https://images.squarespace-cdn.com/content/v1/5efa0fe78713d718e5a23e0d/1623170942484-0DIN15JGG47O71NGWLFL/Prof+Dr+Ahmed+Hatem.png?format=1000w"
                                                alt="" />
                                        </div>
                                        <div class="text-container">
                                            <h6 class="about_us_title">دكتور عبد الرحمن </h6>
                                            <span>متخصص في الطب النفسي وعلاج الإدمان وإضطرابات الشخصيه</span>
                                            <p class="we">استشارات تربوية استشارات زوجية و علاقات استشارات تنمية ذاتيه
                                                مشاكل
                                                المراهقة الإدمان المشاكل الجنسية الإضطرابات( الإكتئاب/ القلق/ الرهاب) مشاكل
                                                الشيخوخه
                                                مشاكل الأطفال اضطرابات الشخصية الحدية اضطراب الوسواس القهري جميع التخصصات
                                                النفسية
                                                </h3< /p>
                                            <ul class="social-media">
                                                <i class="we text-warning fa-solid fa-star"></i>
                                                <i class="we text-warning fa-solid fa-star"></i>
                                                <i class="we text-warning fa-solid fa-star"></i>
                                                <i class="we text-warning fa-solid fa-star"></i>
                                                <i class="we text-warning fa-solid fa-star"></i>
                                            </ul>

                                            <div class="d-flex justify-content-around we ">
                                                <p class="we h5">السعر : 140 جنيه </p>
                                                <p class="we h5">العنوان : شبرا </p>
                                                <p class="we h5">مدة الانتظار : 60 دقيقة </p>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <a href="#" data-price="0.5"
                                                    class="add-to-cart btn btn-primary p-2 w-25 purple">{{ trans('second_booking_doctor.book_now') }}</a>
                                                <button data-price="0.5"
                                                    class="add-to-cart btn btn btn-secondary p-2 w-75"
                                                    readonly>{{ trans('second_booking_doctor.booking_date') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-xs-4 col-sm-12 col-md-4 col-lg-4 m-auto p-2   itemsbox javascript">
                                    <div class="card-complete">
                                        <div class="image-container">
                                            <img src="https://images.squarespace-cdn.com/content/v1/5efa0fe78713d718e5a23e0d/1623170942484-0DIN15JGG47O71NGWLFL/Prof+Dr+Ahmed+Hatem.png?format=1000w"
                                                alt="" />
                                        </div>
                                        <div class="text-container">
                                            <h6 class="about_us_title">دكتور عبد الرحمن </h6>
                                            <span>متخصص في الطب النفسي وعلاج الإدمان وإضطرابات الشخصيه</span>
                                            <p class="we">استشارات تربوية استشارات زوجية و علاقات استشارات تنمية ذاتيه
                                                مشاكل
                                                المراهقة الإدمان المشاكل الجنسية الإضطرابات( الإكتئاب/ القلق/ الرهاب) مشاكل
                                                الشيخوخه
                                                مشاكل الأطفال اضطرابات الشخصية الحدية اضطراب الوسواس القهري جميع التخصصات
                                                النفسية
                                                </h3< /p>
                                            <ul class="social-media">
                                                <i class="we text-warning fa-solid fa-star"></i>
                                                <i class="we text-warning fa-solid fa-star"></i>
                                                <i class="we text-warning fa-solid fa-star"></i>
                                                <i class="we text-warning fa-solid fa-star"></i>
                                                <i class="we text-warning fa-solid fa-star"></i>
                                            </ul>

                                            <div class="d-flex justify-content-around we ">
                                                <p class="we h5">السعر : 140 جنيه </p>
                                                <p class="we h5">العنوان : شبرا </p>
                                                <p class="we h5">مدة الانتظار : 60 دقيقة </p>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <a href="#" data-price="0.5"
                                                    class="add-to-cart btn btn-primary p-2 w-25 purple">{{ trans('second_booking_doctor.book_now') }}</a>
                                                <button data-price="0.5"
                                                    class="add-to-cart btn btn btn-secondary p-2 w-75"
                                                    readonly>{{ trans('second_booking_doctor.booking_date') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                                <div class="col-xs-4 col-sm-12 col-md-4 col-lg-4 m-auto p-2   itemsbox photoshop">
                                    <div class="card-complete">
                                        <div class="image-container">
                                            <img src="https://images.squarespace-cdn.com/content/v1/5efa0fe78713d718e5a23e0d/1623170942484-0DIN15JGG47O71NGWLFL/Prof+Dr+Ahmed+Hatem.png?format=1000w"
                                                alt="" />
                                        </div>
                                        <div class="text-container">
                                            <h6 class="about_us_title">دكتور عبد الرحمن </h6>
                                            <span>متخصص في الطب النفسي وعلاج الإدمان وإضطرابات الشخصيه</span>
                                            <p class="we">استشارات تربوية استشارات زوجية و علاقات استشارات تنمية ذاتيه
                                                مشاكل
                                                المراهقة الإدمان المشاكل الجنسية الإضطرابات( الإكتئاب/ القلق/ الرهاب) مشاكل
                                                الشيخوخه
                                                مشاكل الأطفال اضطرابات الشخصية الحدية اضطراب الوسواس القهري جميع التخصصات
                                                النفسية
                                                </h3< /p>
                                            <ul class="social-media">
                                                <i class="we text-warning fa-solid fa-star"></i>
                                                <i class="we text-warning fa-solid fa-star"></i>
                                                <i class="we text-warning fa-solid fa-star"></i>
                                                <i class="we text-warning fa-solid fa-star"></i>
                                                <i class="we text-warning fa-solid fa-star"></i>
                                            </ul>

                                            <div class="d-flex justify-content-around we ">
                                                <p class="we h5">السعر : 140 جنيه </p>
                                                <p class="we h5">العنوان : شبرا </p>
                                                <p class="we h5">مدة الانتظار : 60 دقيقة </p>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <a href="#" data-price="0.5"
                                                    class="add-to-cart btn btn-primary p-2 w-25 purple">{{ trans('second_booking_doctor.book_now') }}</a>
                                                <button data-price="0.5"
                                                    class="add-to-cart btn btn btn-secondary p-2 w-75"
                                                    readonly>{{ trans('second_booking_doctor.booking_date') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                                <div class="col-xs-4 col-sm-12 col-md-4 col-lg-4 m-auto p-2  itemsbox photoshop">
                                    <div class="card-complete">
                                        <div class="image-container">
                                            <img src="https://images.squarespace-cdn.com/content/v1/5efa0fe78713d718e5a23e0d/1623170942484-0DIN15JGG47O71NGWLFL/Prof+Dr+Ahmed+Hatem.png?format=1000w"
                                                alt="" />
                                        </div>
                                        <div class="text-container">
                                            <h6 class="about_us_title">دكتور عبد الرحمن </h6>
                                            <span>متخصص في الطب النفسي وعلاج الإدمان وإضطرابات الشخصيه</span>
                                            <p class="we">استشارات تربوية استشارات زوجية و علاقات استشارات تنمية ذاتيه
                                                مشاكل
                                                المراهقة الإدمان المشاكل الجنسية الإضطرابات( الإكتئاب/ القلق/ الرهاب) مشاكل
                                                الشيخوخه
                                                مشاكل الأطفال اضطرابات الشخصية الحدية اضطراب الوسواس القهري جميع التخصصات
                                                النفسية
                                                </h3< /p>
                                            <ul class="social-media">
                                                <i class="we text-warning fa-solid fa-star"></i>
                                                <i class="we text-warning fa-solid fa-star"></i>
                                                <i class="we text-warning fa-solid fa-star"></i>
                                                <i class="we text-warning fa-solid fa-star"></i>
                                                <i class="we text-warning fa-solid fa-star"></i>
                                            </ul>

                                            <div class="d-flex justify-content-around we ">
                                                <p class="we h5">السعر : 140 جنيه </p>
                                                <p class="we h5">العنوان : شبرا </p>
                                                <p class="we h5">مدة الانتظار : 60 دقيقة </p>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <a href="#" data-price="0.5"
                                                    class="add-to-cart btn btn-primary p-2 w-25 purple">{{ trans('second_booking_doctor.book_now') }}</a>
                                                <button data-price="0.5"
                                                    class="add-to-cart btn btn btn-secondary p-2 w-75"
                                                    readonly>{{ trans('second_booking_doctor.booking_date') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                                <div class="col-xs-4 col-sm-12 col-md-4 col-lg-4 m-auto p-2  itemsbox illustrator">
                                    <div class="card-complete">
                                        <div class="image-container">
                                            <img src="https://images.squarespace-cdn.com/content/v1/5efa0fe78713d718e5a23e0d/1623170942484-0DIN15JGG47O71NGWLFL/Prof+Dr+Ahmed+Hatem.png?format=1000w"
                                                alt="" />
                                        </div>
                                        <div class="text-container">
                                            <h6 class="about_us_title">دكتور عبد الرحمن </h6>
                                            <span>متخصص في الطب النفسي وعلاج الإدمان وإضطرابات الشخصيه</span>
                                            <p class="we">استشارات تربوية استشارات زوجية و علاقات استشارات تنمية ذاتيه
                                                مشاكل
                                                المراهقة الإدمان المشاكل الجنسية الإضطرابات( الإكتئاب/ القلق/ الرهاب) مشاكل
                                                الشيخوخه
                                                مشاكل الأطفال اضطرابات الشخصية الحدية اضطراب الوسواس القهري جميع التخصصات
                                                النفسية
                                                </h3< /p>
                                            <ul class="social-media">
                                                <i class="we text-warning fa-solid fa-star"></i>
                                                <i class="we text-warning fa-solid fa-star"></i>
                                                <i class="we text-warning fa-solid fa-star"></i>
                                                <i class="we text-warning fa-solid fa-star"></i>
                                                <i class="we text-warning fa-solid fa-star"></i>
                                            </ul>

                                            <div class="d-flex justify-content-around we ">
                                                <p class="we h5">السعر : 140 جنيه </p>
                                                <p class="we h5">العنوان : شبرا </p>
                                                <p class="we h5">مدة الانتظار : 60 دقيقة </p>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <a href="#" data-price="0.5"
                                                    class="add-to-cart btn btn-primary p-2 w-25 purple">{{ trans('second_booking_doctor.book_now') }}</a>
                                                <button data-price="0.5"
                                                    class="add-to-cart btn btn btn-secondary p-2 w-75"
                                                    readonly>{{ trans('second_booking_doctor.booking_date') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                                <div class="col-xs-4 col-sm-12 col-md-4 col-lg-4 m-auto p-2  itemsbox illustrator">
                                    <div class="card-complete">
                                        <div class="image-container">
                                            <img src="https://images.squarespace-cdn.com/content/v1/5efa0fe78713d718e5a23e0d/1623170942484-0DIN15JGG47O71NGWLFL/Prof+Dr+Ahmed+Hatem.png?format=1000w"
                                                alt="" />
                                        </div>
                                        <div class="text-container">
                                            <h6 class="about_us_title">دكتور عبد الرحمن </h6>
                                            <span>متخصص في الطب النفسي وعلاج الإدمان وإضطرابات الشخصيه</span>
                                            <p class="we">استشارات تربوية استشارات زوجية و علاقات استشارات تنمية ذاتيه
                                                مشاكل
                                                المراهقة الإدمان المشاكل الجنسية الإضطرابات( الإكتئاب/ القلق/ الرهاب) مشاكل
                                                الشيخوخه
                                                مشاكل الأطفال اضطرابات الشخصية الحدية اضطراب الوسواس القهري جميع التخصصات
                                                النفسية
                                                </h3< /p>
                                            <ul class="social-media">
                                                <i class="we text-warning fa-solid fa-star"></i>
                                                <i class="we text-warning fa-solid fa-star"></i>
                                                <i class="we text-warning fa-solid fa-star"></i>
                                                <i class="we text-warning fa-solid fa-star"></i>
                                                <i class="we text-warning fa-solid fa-star"></i>
                                            </ul>

                                            <div class="d-flex justify-content-around we ">
                                                <p class="we h5">السعر : 140 جنيه </p>
                                                <p class="we h5">العنوان : شبرا </p>
                                                <p class="we h5">مدة الانتظار : 60 دقيقة </p>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <a href="#" data-price="0.5"
                                                    class="add-to-cart btn btn-primary p-2 w-25 purple">{{ trans('second_booking_doctor.book_now') }}</a>
                                                <button data-price="0.5"
                                                    class="add-to-cart btn btn btn-secondary p-2 w-75"
                                                    readonly>{{ trans('second_booking_doctor.booking_date') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                                <div class="col-xs-4 col-sm-12 col-md-4 col-lg-4 m-auto p-2  itemsbox illustrator">
                                    <div class="card-complete">
                                        <div class="image-container">
                                            <img src="https://images.squarespace-cdn.com/content/v1/5efa0fe78713d718e5a23e0d/1623170942484-0DIN15JGG47O71NGWLFL/Prof+Dr+Ahmed+Hatem.png?format=1000w"
                                                alt="" />
                                        </div>
                                        <div class="text-container">
                                            <h6 class="about_us_title">دكتور عبد الرحمن </h6>
                                            <span>متخصص في الطب النفسي وعلاج الإدمان وإضطرابات الشخصيه</span>
                                            <p class="we">استشارات تربوية استشارات زوجية و علاقات استشارات تنمية ذاتيه
                                                مشاكل
                                                المراهقة الإدمان المشاكل الجنسية الإضطرابات( الإكتئاب/ القلق/ الرهاب) مشاكل
                                                الشيخوخه
                                                مشاكل الأطفال اضطرابات الشخصية الحدية اضطراب الوسواس القهري جميع التخصصات
                                                النفسية
                                                </h3< /p>
                                            <ul class="social-media">
                                                <i class="we text-warning fa-solid fa-star"></i>
                                                <i class="we text-warning fa-solid fa-star"></i>
                                                <i class="we text-warning fa-solid fa-star"></i>
                                                <i class="we text-warning fa-solid fa-star"></i>
                                                <i class="we text-warning fa-solid fa-star"></i>
                                            </ul>

                                            <div class="d-flex justify-content-around we ">
                                                <p class="we h5">السعر : 140 جنيه </p>
                                                <p class="we h5">العنوان : شبرا </p>
                                                <p class="we h5">مدة الانتظار : 60 دقيقة </p>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <a href="#" data-price="0.5"
                                                    class="add-to-cart btn btn-primary p-2 w-25 purple">{{ trans('second_booking_doctor.book_now') }}</a>
                                                <button data-price="0.5"
                                                    class="add-to-cart btn btn btn-secondary p-2 w-75"
                                                    readonly>{{ trans('second_booking_doctor.booking_date') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
    </div>
    </section>
    <script src="{{ asset('new_assets/booking/js.js') }}"></script>
@endsection
<!-- End About Us Section -->
