<!-- Our Project Start -->
<div class="our-project">
    <div class="container">
        <div class="row section-row align-items-center">
            <div class="col-lg-5">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h2 class="text-anime" data-cursor="-opaque">مقالات</h2>
                </div>
                <!-- Section Title End -->
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <!-- Project Item Boxes start -->
                <div class="row project-item-boxes align-items-center">

                    @foreach($last_articles as $last_article)
                        <div class="col-md-6 project-item-box architecture bedroom">
                            <!-- Project Item Start -->
                            <div class="project-item wow fadeInUp">
                                <div class="project-image">
                                    <div class="project-featured-image">
                                        <figure class="image-anime">
                                            <img src="{{ asset($last_article->image_path) }}" alt="">
                                        </figure>
                                    </div>

                                    <div class="project-btn">
                                        <a href="{{ route('article', $last_article->slug) }}"><img src="images/arrow-white.svg" alt=""></a>
                                    </div>
                                </div>

                                <div class="project-content">
                                    <h3>{{ $last_article->title }}</h3>
                                    <h2><a href="{{ route('article', $last_article->slug) }}">{{ \Illuminate\Support\Str::limit($last_article->description, 50) }}</a></h2>
                                </div>
                            </div>
                            <!-- Project Item End -->
                        </div>
                    @endforeach

                </div>
                <!-- Project Item Boxes End -->
                <div class="col-lg-12">
                    <!-- All Services Button Start -->
                    <div class="all-services-btn wow fadeInUp" data-wow-delay="0.6s">
                        <a href="{{ route('articles') }}" class="btn-default">نمایش همه دسته بندی ها</a>
                    </div>
                    <!-- All Services Button End -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Our Project End -->
