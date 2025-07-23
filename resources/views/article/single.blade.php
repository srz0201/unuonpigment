@extends('layouts.master')

@section('seo')
    <title>{{$article->seo_title}} | @if(setting())
            {{setting()->title}}
        @endisset</title>
    <meta name="description" content="{{$article->seo_description}}"/>

    <meta property="og:title" content="{{$article->seo_title}}"/>
    <meta property="og:description" content="{{$article->seo_description}}"/>
    <meta property="og:image" content="{{asset($article->image_path)}}"/>
    <meta property="og:locale" content="{{session('lang')}}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="{{$article->path()}}"/>
    <meta property="og:site_name" content="@if(setting()) {{setting()->title}} @endisset"/>
    <link rel="canonical" href="{{$article->path()}}">
@endsection

@section('styles')
    <style>
        .comment-box {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            transition: transform 0.2s;
            border: 1px solid #e9ecef;
        }

        .comment-box:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .user-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }

        .comment-actions {
            font-size: 0.9rem;
        }

        .comment-actions a {
            color: #6c757d;
            text-decoration: none;
            margin-right: 15px;
            transition: color 0.2s;
        }

        .comment-actions a:hover {
            color: #0d6efd;
        }

        .comment-time {
            color: #adb5bd;
            font-size: 0.85rem;
        }

    </style>
@endsection

@section('content')

    <!-- Page Header Start -->
    <div class="page-header parallaxie">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Page Header Box Start -->
                    <div class="page-header-box">
                        <h1 class="text-anime" data-cursor="-opaque">{{$article->title}}</h1>
                        <nav class="wow fadeInUp">
                            <ol class="breadcrumb mt-5">
                                <li class="breadcrumb-item" style="margin-left: 0.5rem;"><a href="{{ route('home') }}">خانه /</a></li>
                                <li style="margin-left: 0.5rem;"><a href="{{ route('articles') }}" style="color: white; font-size: 22px;">مقالات /</a></li>
                                <li aria-current="page" style="color: white;">{{$article->title}}</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Page Header Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Page Single Post Start -->
    <div class="page-single-post">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <!-- Service Sidebar Start -->
                    <div class="service-sidebar">
                        <!-- Service Category List Start -->
                        <div class="service-catagery-list wow fadeInUp">
                            <h3>مقالات مرتبط</h3>
                            <ul>
                                @foreach($topArticles as $topArticle)
                                    <li><a href="{{ route('article', $topArticle->slug) }}">{{ $topArticle->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- Service Category List End -->
                    </div>
                    <!-- Service Sidebar End -->
                </div>
                <div class="col-lg-8">
                    <!-- Post Featured Image Start -->
                    <div class="post-image">
                        <figure class="image-anime reveal">
                            <img src="{{ asset($article->image_path) }}" alt="">
                        </figure>
                    </div>
                    <!-- Post Featured Image Start -->

                    <!-- Post Single Content Start -->
                    <div class="post-content">
                        <!-- Post Entry Start -->
                        <div class="post-entry">
                            <p class="wow fadeInUp">{!! $article->body !!}</p>
                        </div>
                        <!-- Post Entry End -->

                        <!-- Service Single Faq Start -->
                        <div class="service-single-faq mt-5">
                            <!-- Section Title Start -->
                            <div class="section-title">
                                <h2 class="text-anime" data-cursor="-opaque">سوالات متداول</h2>
                            </div>
                            <!-- Section Title End -->

                            <!-- FAQ Accordion Start -->
                            <div class="service-single-faq mt-5">
                                <!-- FAQ Accordion Start -->
                                <div class="faq-accordion pb-5" id="accordion">
                                    @if($article->faq)
                                        @foreach($article->faq as $index => $faq)
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
                            <!-- FAQ Accordion End -->
                            <!-- Contact Form Start -->
                            <div class="contact-form shadow-lg p-5 mb-5">
                                <!-- Contact Form Start -->
                                <form action="{{route('article.comment.store' , $article->id)}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-6 mb-4">
                                            <input type="text" name="name" class="form-control" id="name" placeholder="نام و نام خانوادگی" required>
                                        </div>

                                        <div class="form-group col-md-6 mb-4">
                                            <input type="text" name ="contact_id" class="form-control" id="phone" placeholder="شماره تماس یا ایمیل" required>
                                        </div>

                                        <div class="form-group col-md-12 mb-5">
                                            <textarea name="body" class="form-control" id="message" rows="4" placeholder="پیام شما"></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <button type="submit" class="btn-default">ثبت نظر</button>
                                            <div id="msgSubmit" class="h3 hidden"></div>
                                        </div>
                                    </div>
                                </form>
                                <!-- Contact Form End -->
                            </div>
                            @foreach($article->comments as $comment)
                            <div class="comment-box">
                                <div class="d-flex gap-3">
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <h6 class="mb-0">{{$comment->name}}</h6>
                                            <span class="comment-time">{{ jdate($comment->created_at)->ago() }}</span>
                                        </div>
                                        <p class="mb-2">{{$comment->body}}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!-- Service Single Faq End -->
                    </div>
                    <!-- Post Single Content End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Single Post End -->

@endsection
@section('scripts')
    <script src="https://cdn.plyr.io/3.5.10/plyr.js"></script>
    <script>
        const players = Plyr.setup('.player');
    </script>


@endsection
