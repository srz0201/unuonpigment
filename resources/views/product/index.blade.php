@extends('layouts.master')

@section('seo')

    <title>{{$category->seo_title}} | @if(setting())
            {{setting()->title}}
        @endisset</title>
    <meta name="description" content="{{$category->seo_description}}"/>
    <meta property="og:title" content="{{$category->name}}"/>
    <meta property="og:description" content="{{$category->name}}"/>
    <meta property="og:image" content="@if(setting()) {{asset(setting()->logo)}} @endisset"/>
    <meta property="og:locale" content="{{session('lang')}}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="{{url('/')}}"/>
    <meta property="og:site_name" content="{{setting()->name}}"/>
    <link rel="canonical" href="{{url($category->path())}}">

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
                        <h1 class="text-anime" data-cursor="-opaque">{{ $category->name }}</h1>
                        <nav class="wow fadeInUp">
                            <ol class="breadcrumb mt-5">
                                <li class="breadcrumb-item" style="margin-left: 0.5rem;"><a href="{{ route('home') }}">خانه /</a></li>
                                <li class="breadcrumb-item" style="margin-left: 0.5rem;"><a href="{{ route('category.index') }}">دسته بندی </a></li>
                                <li aria-current="page" style="color: white;">{{ $category->name }}</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Page Header Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Our Project Start -->
    <div class="page-project">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="project-entry">
                        <!-- Project Information Start -->
                        <div class="project-info">
                            <h2 class="text-anime">{{ $category->name }}</h2>
                            <p class="wow fadeInUp">{!! $category->body !!}</p>

                        </div>
                        <!-- Project Information End -->
                        <!-- Service Single Faq Start -->
                        <div class="service-single-faq mt-5">
                            <!-- Section Title Start -->
                            <div class="section-title">
                                <h2 class="text-anime" data-cursor="-opaque">سوالات متداول</h2>
                            </div>
                            <!-- Section Title End -->
                            <!-- FAQ Accordion Start -->
                            <div class="faq-accordion pb-5" id="accordion">
                                @if($category->faq)
                                    @foreach($category->faq as $index => $faq)
                                        <div class="accordion-item wow fadeInUp">
                                            <h2 class="accordion-header" id="heading{{ $index }}">
                                                <button class="accordion-button {{ $index != 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="{{ $index == 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $index }}">
                                                    <span>{{ $index + 1 }}.</span>{{ $faq['question'] }}
                                                </button>
                                            </h2>
                                            <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}" aria-labelledby="heading{{ $index }}" data-bs-parent="#accordion">
                                                <div class="accordion-body">
                                                    <p>{{ $faq['answer'] }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <!-- FAQ Accordion End -->
                        </div>
                        <!-- Service Single Faq End -->
                    </div>
                </div>

                <div class="col-lg-12">
                    <!-- Project Item Boxes start -->
                    <div class="row project-item-boxes align-items-center">
                        @foreach($products as $product)
                            <div class="col-md-4 project-item-box architecture bedroom">
                                <!-- Project Item Start -->
                                <div class="project-item wow fadeInUp" data-wow-delay="0.2s">
                                    <div class="project-image">
                                        <div class="project-featured-image">
                                            <figure class="image-anime">
                                                <img src="{{ asset($product->image) }}" alt="">
                                            </figure>
                                        </div>

                                        <div class="project-btn">
                                            <a href="{{ route('product.single', $product->slug) }}"><img src="{{asset('assets/base/assets/images/arrow-white.svg')}}" alt=""></a>
                                        </div>
                                    </div>

                                    <div class="project-content">
                                        <h3>{{ $product->title }}</h3>
                                        <h2><a href="{{ route('product.single', $product->slug) }}">{{ $product->description }}</a></h2>
                                    </div>
                                </div>
                                <!-- Project Item End -->
                            </div>
                        @endforeach
                    </div>
                    <!-- Project Item Boxes End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Project End -->

@endsection


