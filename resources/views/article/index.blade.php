@extends('layouts.master')
@section('header_class') menu_area-light @endsection

@section('seo')
    <title>{{ 'مقالات' }} | @if(setting()) {{setting()->title}} @endisset</title>
    <meta name="description" content="@if(setting()){{setting()->description}}@endisset"/>
    <meta property="og:title" content="{{trans('lang.articles')}}"/>
    <meta property="og:description" content="@if(setting()){{setting()->description}}@endisset"/>
    <meta property="og:image" content="@if(setting()) {{asset(setting()->logo)}} @endisset"/>
    <meta property="og:locale" content="{{session('lang')}}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="{{route('articles',session('lang'))}}"/>
    <meta property="og:site_name" content="@if(setting()) {{setting()->title}} @endisset"/>
    <link rel="canonical" href="{{route('articles',session('lang'))}}">
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
                        <h1 class="text-anime" data-cursor="-opaque">مقالات</h1>
                        <nav class="wow fadeInUp">
                            <ol class="breadcrumb mt-5">
                                <li class="breadcrumb-item" style="margin-left: 0.5rem;"><a href="{{ route('home') }}">خانه /</a></li>
                                <li aria-current="page" style="color: white;">مقالات</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Page Header Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Our Blog Section Start -->
    <div class="page-blog">
        <div class="container">
            <div class="row">

                @foreach($articles as $article)
                    <div class="col-lg-4 col-md-6">
                        <!-- Post Item Start -->
                        <div class="post-item wow fadeInUp">
                            <!-- Post Featured Image Start-->
                            <div class="post-featured-image">
                                <figure>
                                    <a href="{{ route('article', $article->slug) }}" class="image-anime" data-cursor-text="View">
                                        <img src="{{ asset($article->image_path) }}" alt="">
                                    </a>
                                </figure>
                            </div>
                            <!-- Post Featured Image End -->

                            <!-- Post Item Body Start -->
                            <div class="post-item-body">
                                <!-- Post Item Content Start -->
                                <div class="post-item-content">
                                    <h3><a href="{{ route('article', $article->slug) }}">{{ $article->title }}</a></h3>
                                </div>
                                <!-- Post Item Content End -->

                                <!-- Blog Item Button Start -->
                                <div class="post-item-btn">
                                    <a href="{{ route('article', $article->slug) }}" class="post-btn">بیشتر بخوانید</a>
                                </div>
                                <!-- Blog Item Button End -->
                            </div>
                            <!-- Post Item Body End -->
                        </div>
                        <!-- Post Item End -->
                    </div>
                @endforeach

                <div class="col-lg-12">
                    <!-- Page Pagination Start -->
                    <div class="page-pagination wow fadeInUp" data-wow-delay="1.2s">
                        {{ $articles->links() }}
                    </div>
                    <!-- Page Pagination End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Blog Section End -->

@endsection
@section('scripts')

@endsection
