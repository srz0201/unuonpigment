@extends('layouts.master')
@section('header_class')
    menu_area-light
@endsection

@section('seo')
    <title>{{trans('lang.contact us')}} | @if(setting())
            {{setting()->title}}
        @endisset</title>
    <meta name="description" content="@if(setting()){{setting()->description}}@endisset"/>

    <meta property="og:title" content="{{trans('lang.contact us')}}"/>
    <meta property="og:description" content="@if(setting()){{setting()->description}}@endisset"/>
    <meta property="og:image" content="@if(setting()) {{asset(setting()->logo)}} @endisset"/>
    <meta property="og:locale" content="{{session('lang')}}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="{{url('/')}}"/>
    <meta property="og:site_name" content="{{config('website.site_name')}}"/>

@endsection



@section('content')

    <!-- Page Header Start -->
    <div class="page-header parallaxie">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Page Header Box Start -->
                    <div class="page-header-box">
                        <h1 class="text-anime" data-cursor="-opaque">تماس با ما</h1>
                        <nav class="wow fadeInUp">
                            <ol class="breadcrumb mt-5">
                                <li class="breadcrumb-item" style="margin-left: 0.5rem;"><a href="{{ route('home') }}">خانه /</a></li>
                                <li aria-current="page" style="color: white;">تماس با ما</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Page Header Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Page Contact Us Start -->
    <div class="page-contact-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <!-- Contact Us Image Start -->
                    <div class="contact-us-image">
                        <figure class="image-anime reveal">
                            <img src="{{ asset(getBanner('contact_banner')->image_path) }}" alt="">
                        </figure>
                    </div>
                    <!-- Contact Us Image End -->
                </div>

                <div class="col-lg-6">
                    <!-- Contact Us Form Start -->
                    <div class="contact-us-form">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">تماس با ما</h3>
                            <h2 class="text-anime" data-cursor="-opaque">خیلی دوست داریم <span>صدای شما رو بشنویم</span></h2>
                        </div>
                        <!-- Section Title End -->

                        <!-- Contact Form Start -->
                        <div class="contact-form">
                            <!-- Contact Form Start -->
                            <form action="{{route('contact-us.store')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-12 mb-4">
                                        <input type="text" name="name" class="form-control" id="name" placeholder="نام" required>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group col-md-12 mb-4">
                                        <input type="text" name="phone" class="form-control" id="phone" placeholder="شماره تماس" required>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group col-md-12 mb-5">
                                        <textarea name="body" class="form-control" id="message" rows="4" placeholder="پیام شما"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="col-md-12">
                                        <button type="submit" class="btn-default">ثبت پیام</button>
                                        <div id="msgSubmit" class="h3 hidden"></div>
                                    </div>
                                </div>
                            </form>
                            <!-- Contact Form End -->
                        </div>
                        <!-- Contact Form End -->
                    </div>
                    <!-- Contact Us Form End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Contact Us End -->

    <!-- Google Map Section Start -->
    <div class="google-map">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">پل های ارتباطی ما</h3>
                        <h2 class="text-anime" data-cursor="-opaque">با ما در ارتباط باشید</h2>
                    </div>
                    <!-- Section Title End -->
                </div>

                <div class="col-lg-12">
                    <!-- Google Map IFrame Start -->
                    <div class="google-map-iframe">
                        <iframe src="{{ theme_config()['home_footer_map'] }}" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="rounded"></iframe>
                    </div>
                    <!-- Google Map IFrame End -->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <!-- Contact Info Box Start -->
                    <div class="contact-info-box">
                        <!-- Conatct Info Item Start -->
                        <div class="contact-info-item wow fadeInUp">
                            <!-- Icon Box Start -->
                            <div class="icon-box">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <!-- Icon Box End -->

                            <!-- Contact Info Content Start -->
                            <a href="{{ theme_config()['home_footer_items'][0]['home_footer_url'] }}">
                            <div class="contact-info-content">
                                <h3>شماره تماس</h3>
                                <p>{{ theme_config()['home_footer_items'][0]['home_footer_title'] }}</p>
                            </div>
                            </a>
                            <!-- Contact Info Content End -->
                        </div>
                        <!-- Conatct Info Item End -->

                        <!-- Conatct Info Item Start -->
                        <div class="contact-info-item wow fadeInUp" data-wow-delay="0.2s">
                            <!-- Icon Box Start -->
                            <div class="icon-box">
                                <i class="fa-regular fa-envelope"></i>
                            </div>
                            <!-- Icon Box End -->

                            <!-- Contact Info Content Start -->
                            <a href="{{ theme_config()['home_footer_items'][1]['home_footer_url'] }}">
                            <div class="contact-info-content">
                                <h3>پشتیبانی ایمیلی</h3>
                                <p>{{ theme_config()['home_footer_items'][1]['home_footer_title'] }}</p>
                            </div>
                            </a>
                            <!-- Contact Info Content End -->
                        </div>
                        <!-- Conatct Info Item End -->

                        <!-- Conatct Info Item Start -->
                        <div class="contact-info-item wow fadeInUp" data-wow-delay="0.4s">
                            <!-- Icon Box Start -->
                            <div class="icon-box">
                                <i class="fa-solid fa-house"></i>
                            </div>
                            <!-- Icon Box End -->

                            <!-- Contact Info Content Start -->
                            <div class="contact-info-content">
                                <h3>دفتر مرکزی</h3>
                                <p>{{ theme_config()['home_footer_items'][2]['home_footer_title'] }}</p>
                            </div>
                            <!-- Contact Info Content End -->
                        </div>
                        <!-- Conatct Info Item End -->
                    </div>
                    <!-- Contact Info Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Google Map Section End -->

@endsection
