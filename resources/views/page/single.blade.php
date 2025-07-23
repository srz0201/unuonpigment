@extends('layouts.master')
@section('seo')
    <title>{{$page->title}}</title>
    <meta name="description" content="{{$page->description}}"/>

    <meta property="og:title" content="{{$page->title}}"/>
    <meta property="og:description" content="{{$page->description}}"/>
    <meta property="og:image" content="{{asset($page->image_path)}}"/>
    <meta property="og:locale" content="{{session('lang')}}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="{{$page->path()}}"/>
    <meta property="og:site_name" content="@if(setting()) {{setting()->title}} @endisset"/>
    <link rel="canonical" href="{{$page->path()}}">
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
                            {{$page->title}}
                        </h1>
                        <div class="nav-area-navigation">
                            <a href="{{route('home',session('lang'))}}">{{trans('lang.home')}}</a>
                            <a href="{{route('pages',session('lang'))}}">{{trans('lang.Services')}}</a>
                            <a class="current" href="{{route('Page',$page->path())}}">{{$page->title}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rts-blog-list-area rts-section-gap">
        <div class="container">
            <div class="row g-5">
                <!-- rts blo post area -->
                <div class="col-xl-8 col-md-12 col-sm-12 col-12">
                    <!-- single post -->
                    <div class="blog-single-post-listing details mb--0">
                        <div class="thumbnail">
                            <img src="{{asset($page->image_path)}}" alt="{{$page->title}}" title="{{$page->title}}">
                        </div>
                        <div class="blog-listing-content">
                            <h3 class="title animated fadeIn">{{$page->title}}</h3>
                            <p class="disc para-1">
                                {!! $page->body !!}
                            </p>

                            @if($page->faq != null)
                                <div class="col-lg-12 mt--50 mb--15">
                                    <div class="faq-inner-wrapper-one project-detils">
                                        <div class="accordion" id="accordionExample">
                                            @foreach($page->faq as $faq)
                                                @if($faq['question'] != '')
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{$loop->index}}" aria-expanded="false" aria-controls="collapse-{{$loop->index}}">
                                                                {{$faq['question']}}
                                                            </button>
                                                        </h2>
                                                        <div id="collapse-{{$loop->index}}" class="accordion-collapse collapse" data-bs-parent="#accordionExample" style="">
                                                            <div class="accordion-body">
                                                                <div class="right-area">

                                                                    <p class="disc mb--20">
                                                                        {{$faq['answer']}}
                                                                    </p>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                @endif
                                            @endforeach

                                        </div>
                                    </div>
                                </div>

                            @endif



                            <div class="row  align-items-center">
                                <div class="col-lg-12 col-md-12">
                                    <!-- tags details -->
                                    <div class="details-share">
                                        <h6>{{trans('lang.share')}}:</h6>
                                        @php
                                            $shareUrl = urlencode(request()->fullUrl());
                                            $shareTitle = urlencode($page->title ?? '');
                                        @endphp
                                        <div class="flex gap-2">
                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}" target="_blank" title="Facebook">
                                                <button><i class="fab fa-facebook-f"></i></button>
                                            </a>
                                            <a href="https://twitter.com/intent/tweet?url={{ $shareUrl }}&text={{ $shareTitle }}" target="_blank" title="Twitter">
                                                <button><i class="fab fa-twitter"></i></button>
                                            </a>
                                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ $shareUrl }}&title={{ $shareTitle }}" target="_blank" title="LinkedIn">
                                                <button><i class="fab fa-linkedin-in"></i></button>
                                            </a>
                                            <a href="https://www.instagram.com/" target="_blank" title="Instagram (Not shareable via URL)">
                                                <button><i class="fab fa-instagram"></i></button>
                                            </a>
                                        </div>

                                    </div>
                                    <!-- tags details End -->
                                </div>

                            </div>
                            <div class="replay-area-details">
                                <h4 class="title">{{trans('lang.store comment')}}</h4>
                                <form action="{{route('page.comment.store' , $page->id)}}" method="POST">
                                    @csrf
                                    <div class="row g-4">
                                        <div class="col-lg-6">
                                            <input type="text" name="name" placeholder="{{trans('lang.name')}}">
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" name="contact_id" placeholder="{{trans('lang.email or phone')}}">
                                        </div>
                                        <div class="col-12">
                                            <textarea name="body" ></textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="rts-btn btn-primary my-4">{{trans('lang.submit')}}</button>

                                </form>
                            </div>
                            @foreach($page->comments as $comment)
                                <div class="author-area">
                                    <div class="author-details team">
                                        <span>{{convert(\Morilog\Jalali\Jalalian::forge($comment->created_at)->format('Y/m/d'))}}</span>
                                        <h5>{{$comment->name}}</h5>
                                        <p class="disc">
                                            {{$comment->body}}
                                        </p>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                    </div>
                    <!-- single post End-->
                </div>
                <!-- rts-blog post end area -->
                <!--rts blog wizered area -->
                <div class="col-xl-4 col-md-12 col-sm-12 col-12">
                    <!-- single wizered start -->
                    <div class="rts-single-wized Recent-post">
                        <div class="wized-header">
                            <h5 class="title">
                                {{trans('lang.other services')}}
                            </h5>
                        </div>
                        <div class="wized-body">
                            @foreach($otherPages as $otherPage)
                                <!-- recent-post -->
                                <div class="recent-post-single">
                                    <div class="thumbnail">
                                        <a href="{{$otherPage->path()}}"><img src="{{asset($otherPage->image_path)}}" alt="{{$otherPage->title}}" title="{{$otherPage->title}}"></a>
                                    </div>
                                    <div class="content-area">

                                        <a class="post-title" href="{{$otherPage->path()}}">
                                            <h6 class="title">{{$otherPage->title}}</h6>
                                        </a>
                                    </div>
                                </div>
                                <!-- recent-post End -->
                            @endforeach
                        </div>
                    </div>
                    <!-- single wizered End -->

                    <!-- single wizered start -->
                    <div class="rts-single-wized Recent-post">
                        <div class="wized-header">
                            <h5 class="title">
                                {{trans('lang.top articles')}}
                            </h5>
                        </div>
                        <div class="wized-body">
                            @foreach($topArticles as $topArticle)
                                <!-- recent-post -->
                                <div class="recent-post-single">
                                    <div class="thumbnail">
                                        <a href="{{$topArticle->path()}}"><img src="{{asset($topArticle->image_path)}}" alt="{{$topArticle->title}}" title="{{$topArticle->title}}"></a>
                                    </div>
                                    <div class="content-area">

                                        <a class="post-title" href="{{$topArticle->path()}}">
                                            <h6 class="title">{{$topArticle->title}}</h6>
                                        </a>
                                    </div>
                                </div>
                                <!-- recent-post End -->
                            @endforeach
                        </div>
                    </div>
                    <!-- single wizered End -->
                    <!-- single wizered start -->
                    <div class="rts-single-wized contact">
                        <div class="wized-header">
                            <a href="{{route('home',session('lang'))}}"><img src="{{asset(setting()->logo)}}" alt="{{@asset(setting()->title)}}" title="{{@asset(setting()->title)}}"></a>
                        </div>
                        <div class="wized-body">
                            <h5 class="title">{{trans('lang.Have any question?')}}</h5>
                            <a class="rts-btn btn-primary" href="{{route('contact-us' , session('lang'))}}">{{trans('lang.contact us')}}</a>
                        </div>
                    </div>
                    <!-- single wizered End -->
                </div>
                <!-- rts- blog wizered end area -->
            </div>
        </div>
    </div>




@endsection
@section('scripts')

@endsection
