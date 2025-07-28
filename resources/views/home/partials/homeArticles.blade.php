
<!-- Our Blog Section Start -->
<div class="our-blog">
    <div class="container">
        <div class="row section-row align-items-center">
            <div class="col-lg-6">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h2 class="text-anime-style" data-cursor="-opaque"><span>مقالات</span></h2>
                </div>
                <!-- Section Title End -->
            </div>
        </div>

        <div class="row">
            @foreach($last_articles as $last_article)
            <div class="col-lg-4 col-md-6">
                <!-- Post Item Start -->
                <div class="post-item wow fadeInUp">
                    <!-- Post Featured Image Start-->
                    <div class="post-featured-image">
                        <figure>
                            <a href="{{ route('article', $last_article->slug) }}" class="image-anime" data-cursor-text="View">
                                <img src="{{ asset($last_article->image_path) }}" alt="{{$last_article->title}}">
                            </a>
                        </figure>
                    </div>
                    <!-- Post Featured Image End -->

                    <!-- Post Item Body Start -->
                    <div class="post-item-body">
                        <!-- Post Item Content Start -->
                        <div class="post-item-content">
                            <h3><a href="{{ route('article', $last_article->slug) }}">{{$last_article->title}}</a></h3>
                            <p class="pt-1 text-justify">{{Str::limit($last_article->description,200)}}</p>
                        </div>
                        <!-- Post Item Content End -->

                        <!-- Blog Item Button Start -->
                        <div class="post-item-btn">
                            <a href="{{ route('article', $last_article->slug) }}" class="post-btn">ادامه مطلب</a>
                        </div>
                        <!-- Blog Item Button End -->
                    </div>
                    <!-- Post Item Body End -->
                </div>
                <!-- Post Item End -->
            </div>
            @endforeach


            <div class="col-lg-12">
                <!-- Our Blog Footer Start -->
                <div class="our-blog-footer wow fadeInUp" data-wow-delay="0.6s">
                    <a href="{{route('articles')}}" class="btn-default">همه مقالات</a>
                </div>
                <!-- Our Blog Footer End -->
            </div>
        </div>
    </div>
</div>
<!-- Our Blog Section End -->
