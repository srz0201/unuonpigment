@extends('layouts.master')
@section('header_class') menu_area-light @endsection

@section('seo')
    <title>{{trans('lang.media gallery')}} | @if(setting()) {{setting()->title}} @endisset</title>
    <meta name="description" content="@if(setting()){{setting()->description}}@endisset"/>

    <meta property="og:title" content="{{trans('lang.media gallery')}}"/>
    <meta property="og:description" content="@if(setting()){{setting()->description}}@endisset"/>
    <meta property="og:image" content="@if(setting()) {{asset(setting()->logo)}} @endisset"/>
    <meta property="og:locale" content="{{session('lang')}}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="{{url('/')}}"/>
    <meta property="og:site_name" content="{{config('website.site_name')}}"/>
    <link rel="canonical" href="{{route('media',session('lang'))}}">

@endsection


@section('styles')
    <link rel="stylesheet" href="https://cdn.plyr.io/3.5.10/plyr.css" />

@endsection

@section('content')
    <div class="rts-banner-area rts-section-gap rts-breadcrumb-area  position-relative"
         style="background-image: url('{{asset('/assets/base/breadcrumb.webp')}}')">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area-inner">
                        <span class="water-text">{{trans('lang.media gallery')}}</span>
                        <h1 class="title">
                            {{trans('lang.media gallery')}}
                        </h1>
                        <div class="nav-area-navigation">
                            <a href="{{route('home',session('lang'))}}">{{trans('lang.home')}}</a>
                            <a class="current" href="{{route('media',session('lang'))}}">{{trans('lang.media gallery')}}</a>
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
                                @foreach($medias as $media)
                                    @if($media->video == null)
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            {!! $media->iframe !!}
                                        </div>
                                    @else
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <video class="player" width="100%" controls poster="{{asset($media->image)}}">
                                                <source src="{{asset($media->video)}}" type="video/mp4">
                                            </video>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>

                    {{$medias->links()}}
                </div>
            </div>
        </div>
    </div>
    <!--Page Header End-->


@endsection
@section('scripts')
    <script src="https://cdn.plyr.io/3.5.10/plyr.js"></script>
    <script>
        const players = Plyr.setup('.player');
    </script>

@endsection
