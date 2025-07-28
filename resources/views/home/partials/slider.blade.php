
<!-- Hero Section Start -->
<div class="hero hero-slider-layout">
    <div class="swiper">
        <div class="swiper-wrapper">
            @foreach($sliders as $slider)
            <!-- Hero Slide Start -->
            <div class="swiper-slide">
                <div class="hero-slide">
                    <!-- Slider Image Start -->
                    <div class="hero-slider-image">
                        <img src="{{asset($slider->image_path)}}" alt="{{$slider->title}}">
                    </div>
                    <!-- Slider Image End -->

                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-10">
                                <!-- Hero Content Start -->
                                <div class="hero-content">
                                    <!-- Section Title Start -->
                                    <div class="section-title">

                                        <h2 class="text-anime-style" data-cursor="-opaque">{{$slider->title}}</h2>
                                        <p class="wow fadeInUp" data-wow-delay="0.2s">{{$slider->description}}</p>
                                    </div>
                                    <!-- Section Title End -->
                                    @if($slider->url)
                                        <!-- Hero Button Start -->
                                        <div class="hero-btn wow fadeInUp" data-wow-delay="0.4s">
                                            <a href="{{$slider->url}}" class="btn-default">بیشتر بخوانید</a>
                                        </div>
                                        <!-- Hero Button End -->
                                    @endif

                                </div>
                                <!-- Hero Content End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Hero Slide End -->
            @endforeach

        </div>
        <div class="hero-pagination"></div>
    </div>
</div>
<!-- Hero Section End -->

