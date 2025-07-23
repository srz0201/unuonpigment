@extends('layouts.master')
@section('header_class') menu_area-light @endsection

@section('seo')
    <title>{{trans('lang.search')}} "{{$q}}"</title>
    <meta name="robots" CONTENT="noindex,nofollow">
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
                        <span class="water-text">{{trans('lang.search')}}</span>
                        <h1 class="title">
                            {{$q}}
                        </h1>
                        <div class="nav-area-navigation">
                            <a href="{{route('home',session('lang'))}}">{{trans('lang.home')}}</a>
                            <a class="current" href="#">{{$q}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row g-24">
            @foreach($products as $product)
                <div class="col-lg-6">
                    <div class="single-blog-card-style-5 small-blog-five">
                        <div class="top-area-blog">
                            <a href="{{$product->path()}}" class="thumbnail">
                                <img src="{{asset($product->image)}}" alt="{{$product->title}}"
                                     title="{{$product->title}}">
                            </a>
                        </div>
                        <div class="inner-content-area">

                            <div class="title-content-area">
                                <div class="tag-area">
                                    <span class="intro">{{$product->category->name}}</span>
                                </div>
                                <a href="{{$product->path()}}">
                                    <h3 class="title">
                                        {{$product->title}}
                                    </h3>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{$products->withQueryString()->links()}}
    </div>
@endsection
@section('scripts')

@endsection

