<!-- Hero Section Start -->
<div class="hero parallaxie">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-10">
                <!-- Hero Content Start -->
                @foreach($sliders as $slider)
                    <div class="hero-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h1 class="text-anime" data-cursor="-opaque">{{$slider->title}}</h1>
                            <p class="wow fadeInUp" data-wow-delay="0.2s">{{$slider->description}}</p>
                        </div>
                        <!-- Section Title End -->
                    </div>
                @endforeach
                <!-- Hero Content End -->
            </div>
        </div>
    </div>
</div>
