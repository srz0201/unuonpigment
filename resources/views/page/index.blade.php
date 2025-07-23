@extends('layouts.master')
@section('header_class') menu_area-light @endsection

@section('seo')
    <title>{{trans('lang.pages')}} | @if(setting()) {{setting()->title}} @endisset</title>
    <meta name="description" content="@if(setting()){{setting()->description}}@endisset"/>
    <meta property="og:title" content="{{trans('lang.pages')}}"/>
    <meta property="og:description" content="@if(setting()){{setting()->description}}@endisset"/>
    <meta property="og:image" content="@if(setting()) {{asset(setting()->logo)}} @endisset"/>
    <meta property="og:locale" content="{{session('lang')}}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="{{route('pages',session('lang'))}}"/>
    <meta property="og:site_name" content="@if(setting()) {{setting()->title}} @endisset"/>
    <link rel="canonical" href="{{route('pages',session('lang'))}}">
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
                        <span class="water-text">{{trans('lang.Services')}}</span>
                        <h1 class="title">
                            {{trans('lang.Services')}}
                        </h1>
                        <div class="nav-area-navigation">
                            <a href="{{route('home',session('lang'))}}">{{trans('lang.home')}}</a>
                            <a class="current" href="{{route('pages',session('lang'))}}">{{trans('lang.Services')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rts-ervice-area rts-section-gap">
        <div class="container">
            <div class="row g-24">
                @foreach($pages as $page)
                   <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="single-service-area-inner">
                        <a href="{{$page->path()}}"  class="thumbnail">
                            <img src="{{asset($page->image_path)}}"  alt="{{$page->title}}" title="{{$page->title}}">
                        </a>
                        <div class="innr">
                            <a href="{{$page->path()}}">
                                <h5 class="title">{{$page->title}}</h5>
                            </a>
                            <p class="disc">
                                {{$page->description}}
                            </p>

                            <a class="btn" href="{{$page->path()}}">{{trans('lang.show more')}} <i class="fa-light fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            {{$pages->links()}}
        </div>
    </div>


@endsection
@section('scripts')

@endsection
