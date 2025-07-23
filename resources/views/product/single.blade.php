@extends('layouts.master')

@section('header_class')
    menu_area-light
@endsection

@section('seo')
    <title>{{$product->seo_title}} | {{setting()->name}}</title>
    <meta name="description" content="{{$product->seo_description}}"/>
    <meta property="og:title" content="{{$product->seo_title}}"/>
    <meta property="og:description" content="{{$product->seo_description}}"/>
    <meta property="og:image" content="{{asset($product->image)}}"/>
    <meta property="og:locale" content="{{session('lang')}}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="{{url('/')}}"/>
    <meta property="og:site_name" content="{{setting()->name}}"/>
    <link rel="canonical" href="{{$product->path()}}">
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
                        <h1 class="text-anime" data-cursor="-opaque">عقب‌نشینی شهری</h1>
                        <nav class="wow fadeInUp">
                            <ol class="breadcrumb mt-5">
                                <li class="breadcrumb-item" style="margin-left: 0.5rem;"><a href="{{ route('home') }}">خانه /</a></li>
                                <li style="margin-left: 0.5rem; font-size: 22px;"><a style="color: white;" href="{{ route('product.index', ['slug' => $product->category->slug]) }}">محصولات /</a></li>
                                <li aria-current="page" style="color: white;">عقب‌نشینی شهری</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Page Header Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Page Project Single Start -->
    <div class="page-project-single">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Project Single Content Start -->
                    <div class="project-single-content">
                        <!-- Project Single Image Start -->
                        <div class="project-single-image">
                            <figure class="image-anime reveal">
                                <img src="{{ asset($product->image) }}" alt="">
                            </figure>
                        </div>
                        <!-- Project Single Image End -->

                        <!-- Project Entry Start -->
                        <div class="project-entry">
                            <!-- Project Information Start -->
                            <div class="project-info">
                                <h2 class="text-anime">{{ $product->title }}</h2>
                                <p class="wow fadeInUp">{{ $product->description }}</p>
                            </div>
                            <!-- Project Information End -->

                            @if($galleries->count() > 0)
                                <!-- Project Gallery Images Start -->
                                <div class="project-gallery gallery-items">
                                    <h2 class="text-anime">گالری محصول</h2>

                                    <div class="project-gallery-images">
                                        @foreach($galleries as $gallery)
                                            <!-- Project Gallery img Start -->
                                            <div class="project-gallery-img wow fadeInUp" data-cursor-text="View">
                                                <a href="{{asset($gallery->image)}}">
                                                    <figure class="image-anime reveal">
                                                        <img src="{{asset($gallery->image)}}" alt="{{ $product->title }}">
                                                    </figure>
                                                </a>
                                            </div>
                                            <!-- Project Gallery img End -->
                                        @endforeach
                                    </div>
                                </div>
                                <!-- Project Gallery Images End -->
                            @endif
                            <!-- Service Single Faq Start -->
                            <div class="service-single-faq mt-5">
                                <!-- FAQ Accordion Start -->
                                <div class="faq-accordion pb-5" id="accordion">
                                    @if($product->faq)
                                        @foreach($product->faq as $index => $faq)
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
                            <!-- Contact Form Start -->
                            <div class="contact-form shadow-lg p-5">
                                <!-- Contact Form Start -->
                                <form action="{{route('product.comment.store' , $product->id)}}" method="POST">
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
                            <div class="comment-box mt-5">
                                <div class="d-flex gap-3">
                                    @foreach($product->comments as $comment)
                                        <div class="flex-grow-1">
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <h6 class="mb-0">{{$comment->name}}</h6>
                                                <span class="comment-time">{{ jdate($comment->created_at)->ago() }}</span>
                                            </div>
                                            <p class="mb-2">{{$comment->body}}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- Project Entry End -->
                    </div>
                    <!-- Project Single Content End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Project Single End -->
@endsection
@section('scripts')
    <script src="https://cdn.plyr.io/3.5.10/plyr.js"></script>

    <script>
        const players = Plyr.setup('.player');


    </script>

@endsection

