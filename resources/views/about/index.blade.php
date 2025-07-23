@extends('layouts.master')
@section('header_class') menu_area-light @endsection

@section('seo')
    <title>{{trans('lang.about us')}} | @if(setting()) {{setting()->title}} @endisset</title>
    <meta name="description" content="@if(setting()){{setting()->description}}@endisset"/>

    <meta property="og:title" content="{{trans('lang.about us')}}"/>
    <meta property="og:description" content="@if(setting()){{setting()->description}}@endisset"/>
    <meta property="og:image" content="@if(setting()) {{asset(setting()->logo)}} @endisset"/>
    <meta property="og:locale" content="{{session('lang')}}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="{{url('/')}}"/>
    <meta property="og:site_name" content="{{config('website.site_name')}}"/>

@endsection

@section('styles')

@endsection

@section('content')

    <!-- Page Header Start -->
    <div class="page-header parallaxie">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Page Header Box Start -->
                    <div class="page-header-box">
                        <h1 class="text-anime" data-cursor="-opaque">درباره ما</h1>
                        <nav class="wow fadeInUp">
                            <ol class="breadcrumb mt-5">
                                <li class="breadcrumb-item" style="margin-left: 0.5rem;"><a href="{{ route('home') }}">خانه /</a></li>
                                <li aria-current="page" style="color: white;">درباره ما</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Page Header Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- About Us Section Start -->
    <div class="about-us page-about-us">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <!-- About Us Images Start -->
                    <div class="about-us-images">
                        <!-- About Image 1 Start -->
                        <div class="about-img-1">
                            <figure class="image-anime reveal">
                                <img src="{{asset($about_us->image)}}" alt="">
                            </figure>
                        </div>
                        <!-- About Image 1 End -->

                        <!-- About Image 2 Start -->
                        <div class="about-img-2">
                            <figure class="image-anime reveal">
                                <img src="{{asset($about_us->image2)}}" alt="">
                            </figure>

                            <!-- Feedback Counter Start -->
                            <div class="experience-counter">
                                <h3><span class="counter">15</span>+</h3>
                                <p>سال های تجربه</p>
                            </div>
                            <!-- Feedback Counter End -->
                        </div>
                        <!-- About Image 2 End -->
                    </div>
                    <!-- About Us Images End -->
                </div>

                <div class="col-lg-6">
                    <!-- About Us Content Start -->
                    <div class="about-us-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">در مورد ما</h3>
                            <h2 class="text-anime" data-cursor="-opaque">{{$about_us->title}}</h2>
                            <p class="wow fadeInUp" data-wow-delay="0.2s">{!! $about_us->body !!}</p>
                        </div>
                        <!-- Section Title End -->
                    </div>
                    <!-- About Us Content End -->
                </div>

                <div class="col-lg-12">
                    <!-- About Facility List Start -->
                    <div class="about-facility-list">
                        @foreach($about_us->about_items as $item)
                            <!-- About Facility Item Start -->
                            <div class="about-facility-item wow fadeInUp">
                                <div class="icon-box">
                                    <span class="{{ $item['about_icon'] }}"></span>
                                </div>

                                <div class="about-facility-content">
                                    <h3>{{ $item['about_title'] }}</h3>
                                    <p>{{ $item['about_description'] }}</p>
                                </div>
                            </div>
                            <!-- About Facility Item End -->
                        @endforeach
                    </div>
                    <!-- About Facility List End -->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

@endsection
