@extends('layouts.master')
@section('header_class') menu_area-light @endsection
@section('seo')
    <title>{{ 'اخبار' }} | @if(setting()) {{setting()->title}} @endisset</title>
    <meta name="description" content="@if(setting()){{setting()->description}}@endisset"/>

    <meta property="og:title" content="{{trans('lang.news')}} | @if(setting()) {{setting()->title}} @endisset"/>
    <meta property="og:description" content="@if(setting()){{setting()->description}}@endisset"/>
    <meta property="og:image" content="@if(setting()) {{asset(setting()->logo)}} @endisset"/>
    <meta property="og:locale" content="{{session('lang')}}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="{{url('/')}}"/>
    <meta property="og:site_name" content="{{config('website.site_name')}}"/>
    <link rel="canonical" href="{{route('Newss',session('lang'))}}">

@endsection

@section('styles')
@endsection

@section('content')

    <div class="rts-banner-area rts-section-gap rts-breadcrumb-area  position-relative"
         style="background-image: url('{{asset('/assets/base/breadcrumb.webp')}}')">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area-inner">
                        <span class="water-text">{{trans('lang.news')}}</span>
                        <h1 class="title">
                            {{trans('lang.news')}}
                        </h1>
                        <div class="nav-area-navigation">
                            <a href="{{route('home',session('lang'))}}">{{trans('lang.home')}}</a>
                            <a class="current" href="{{route('Newss',session('lang'))}}">{{trans('lang.news')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Page Header End-->

    <!-- rts blog area start -->
    <div class="rts-blog-area rts-section-gap">
        <div class="container">
            <div class="row g-24 mt--40">
                @foreach($news as $news_item)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="single-blog-three">
                            <a href="{{$news_item->path()}}" class="thumbnail">
                                <img src="{{asset($news_item->thumb_path)}}"  alt="{{$news_item->title}}" title="{{$news_item->title}}">
                            </a>
                            <div class="inner-content-area">

                                <a href="{{$news_item->path()}}">
                                    <h3 class="title">
                                        {{$news_item->title}}
                                    </h3>
                                </a>
                                <div class="bottom-area">
                                    <div class="left">
                                        <div class="info">
                                            <h5 class="title">{{trans('lang.SEO team')}}</h5>
                                            <span>{{trans('lang.author')}}</span>
                                        </div>
                                    </div>
                                    <a href="{{$news_item->path()}}" class="rts-btn btn-primary">{{trans('lang.read detail')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{$news->links()}}
        </div>
    </div>
    <!-- rts blog area end -->

@endsection

@section('scripts')

@endsection
