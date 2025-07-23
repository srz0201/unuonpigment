@extends('layouts.master')

@section('seo')

    <title>
        دسته بندی محصولات | @if(setting())
            {{setting()->title}}
        @endisset
    </title>
{{--    <meta name="description" content="{{$category->seo_description}}"/>--}}

{{--    <meta property="og:title" content="{{$category->name}}"/>--}}
{{--    <meta property="og:description" content="{{$category->name}}"/>--}}
{{--    <meta property="og:image" content="{{asset($category->image)}}"/>--}}
{{--    <meta property="og:locale" content="{{session('lang')}}"/>--}}
{{--    <meta property="og:type" content="website"/>--}}
{{--    <meta property="og:url" content="{{url('/')}}"/>--}}
{{--    <meta property="og:site_name" content="{{setting()->name}}"/>--}}
{{--    <link rel="canonical" href="{{url($category->path())}}">--}}

@endsection

@section('content')
    <!-- Page Header Start -->
    <div class="page-header parallaxie">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Page Header Box Start -->
                    <div class="page-header-box">
                        <h1 class="text-anime" data-cursor="-opaque">دسته بندی محصولات</h1>
                        <nav class="wow fadeInUp">
                            <ol class="breadcrumb mt-5">
                                <li class="breadcrumb-item" style="margin-left: 0.5rem;"><a href="{{ route('home') }}">خانه /</a></li>
                                <li aria-current="page" style="color: white;">دسته بندی محصولات</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Page Header Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Our Services Section Start -->
    <div class="page-services">
        <div class="container">
            <div class="row">

                @foreach($categories as $category)
                    <div class="col-lg-4 col-md-6">
                        <!-- Service Item Start -->
                        <div class="service-item wow fadeInUp">
                            <!-- Service Image Start -->
                            <div class="service-image">
                                <a href="{{ route('product.index', $category->slug) }}" data-cursor-text="View">
                                    <figure class="image-anime">
                                        <img src="{{ $category->image }}" alt="">
                                    </figure>
                                </a>
                            </div>
                            <!-- Service Image End -->

                            <!-- Service Button Start -->
                            <div class="service-btn">
                                <a href="{{ route('product.index', $category->slug) }}"><img src="images/arrow-white.svg" alt=""></a>
                            </div>
                            <!-- Service Button End -->

                            <!-- Service Content Start -->
                            <div class="service-content">
                                <h3><a href="{{ route('product.index', $category->slug) }}">{{ $category->title }}</a></h3>
                                <p>{{ $category->description }}</p>
                            </div>
                            <!-- Service Content End -->
                        </div>
                        <!-- Service Item End -->
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Our Services Section End -->

    <div class="d-flex justify-content-center">
        {{ $categories->render() }}
    </div>

@endsection

