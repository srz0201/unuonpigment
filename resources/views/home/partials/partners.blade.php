<!-- How We Work Start -->
<div class="how-we-work">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- How Work Company Slider Start -->
                <div class="how-work-company-slider">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            @foreach($partners as $partner)
                                <!-- Company Support Logo Start -->
                                <div class="swiper-slide">
                                    <div class="">
                                        <img src="{{ asset($partner->image) }}" alt="{{ $partner->title }}" class="rounded-circle">
                                    </div>
                                </div>
                                <!-- Company Support Logo End -->
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- How Work Company Slider End -->
            </div>
        </div>
    </div>
</div>
<!-- How We Work End -->
