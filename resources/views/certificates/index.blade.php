@extends('layouts.master')


@section('seo')
    <title>{{trans('lang.Certificates')}} | @if(setting())
            {{setting()->title}}
        @endisset</title>
    <meta name="description" content="@if(setting()){{setting()->description}}@endisset"/>

    <meta property="og:title" content="{{trans('lang.gallery')}}"/>
    <meta property="og:description" content="@if(setting()){{setting()->description}}@endisset"/>
    <meta property="og:image" content="@if(setting()) {{asset(setting()->logo)}} @endisset"/>
    <meta property="og:locale" content="{{session('lang')}}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="{{url('/')}}"/>
    <meta property="og:site_name" content="{{config('website.site_name')}}"/>
    <link rel="canonical" href="{{route('certificates',session('lang'))}}">
@endsection


@section('content')

    <div class="rts-banner-area rts-section-gap rts-breadcrumb-area  position-relative"
         style="background-image: url('{{asset('/assets/base/breadcrumb.webp')}}')">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area-inner">
                        <span class="water-text">{{trans('lang.Certificates')}}</span>
                        <h1 class="title">
                            {{trans('lang.Certificates')}}
                        </h1>
                        <div class="nav-area-navigation">
                            <a href="{{route('home',session('lang'))}}">{{trans('lang.home')}}</a>
                            <a class="current" href="{{route('certificates',session('lang'))}}">{{trans('lang.Certificates')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="rts-projects-area-inner rts-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                             aria-labelledby="home-tab" tabindex="0">
                            <div class="row g-24">
                                @foreach($certificates as $certificate)
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="single-project-card-inner">
                                            <a href="{{asset($certificate->image)}}" class="thumbnail gallery-image">
                                                <img src="{{asset($certificate->image)}}" alt="{{$certificate->title}}">
                                            </a>
                                            <div class="inner">

                                                <h5 class="title">{{$certificate->title}}</h5>


                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

