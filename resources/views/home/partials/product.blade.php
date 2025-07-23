<!-- Our Services Section Start -->
<div class="our-services">
    <div class="container">
        <div class="row section-row align-items-center">
            <div class="col-lg-6">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h2 class="text-anime" data-cursor="-opaque">دسته بندی محصولات</h2>
                </div>
                <!-- Section Title End -->
            </div>
        </div>

        <div class="row">
            @foreach(collect(getCategories())->take(3) as $category)
                <div class="col-lg-4 col-md-6">
                    <!-- Service Item Start -->
                    <div class="service-item wow fadeInUp">
                        <!-- Service Image Start -->
                        <div class="service-image">
                            <a href="{{ route('product.index', $category->slug) }}" data-cursor-text="View">
                                <figure class="image-anime">
                                    <img src="{{ asset($category->image) }}" alt="">
                                </figure>
                            </a>
                        </div>
                        <!-- Service Image End -->

                        <!-- Service Button Start -->
                        <div class="service-btn">
                            <a href="{{ route('product.index', $category->slug) }}"><img src="images/arrow-white.svg" alt=""></a>
                        </div>
                        <!-- Service Button End -->

                        <!-- Service Content Start -->
                        <div class="service-content">
                            <h3><a href="{{ route('product.index', $category->slug) }}">{{ $category->name }}</a></h3>
                            <p>{{ $category->description }}</p>
                        </div>
                        <!-- Service Content End -->
                    </div>
                    <!-- Service Item End -->
                </div>
            @endforeach
            <div class="col-lg-12">
                <!-- All Services Button Start -->
                <div class="all-services-btn wow fadeInUp" data-wow-delay="0.6s">
                    <a href="{{ route('category.index') }}" class="btn-default">نمایش همه دسته بندی ها</a>
                </div>
                <!-- All Services Button End -->
            </div>
        </div>
    </div>
</div>
<!-- Our Services Section End -->
