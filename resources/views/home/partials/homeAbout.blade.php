<!-- About Us Section Start -->
<div class="about-us">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <!-- About Us Images Start -->
                <div class="about-us-images">
                    <!-- About Image 1 Start -->
                    <div class="about-img-1">
                        <figure class="image-anime reveal">
                            <img src="{{ theme_config()['home_about_image1'] }}" alt="">
                        </figure>
                    </div>
                    <!-- About Image 1 End -->

                    <!-- About Image 2 Start -->
                    <div class="about-img-2">
                        <figure class="image-anime reveal">
                            <img src="{{ theme_config()['home_about_image2'] }}" alt="">
                        </figure>

                        <!-- Feedback Counter Start -->
                        <div class="experience-counter">
                            <h3><span class="counter">15</span>+</h3>
                            <p>سابقه کاری</p>
                        </div>
                        <!-- Feedback Counter End -->
                    </div>
                    <!-- About Image 2 End -->
                </div>
                <!-- About Us Images End -->
            </div>

            <div class="col-lg-6">
                <!-- About Us Content Start -->
                <div class="about-us-content">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">در مورد ما</h3>
                        <h2 class="text-anime" data-cursor="-opaque">{{ theme_config()['home_about_title'] }}</h2>
                        <p class="wow fadeInUp" data-wow-delay="0.2s">{{ theme_config()['home_about_description'] }}</p>
                    </div>
                    <!-- Section Title End -->

                    <!-- About Us Content Body Start -->
                    <div class="about-us-content-body">
                        <!-- About Content Info Start -->
                        <div class="about-us-content-info">
                            <!-- About Us Content List Start -->
                            <div class="about-us-content-list wow fadeInUp" data-wow-delay="0.4s">
                                <ul>
                                    @foreach(theme_config()['home_about_items'] as $item)
                                        <li>{{ $item['home_about_item'] }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- About Us Content List End -->

                            <!-- About Us Content Button Start -->
                            <div class="about-us-content-btn wow fadeInUp" data-wow-delay="0.6s">
                                <a href="{{ route('about-us') }}" class="btn-default">بیشتر بخوان</a>
                            </div>
                            <!-- About Us Content Button End -->
                        </div>
                        <!-- About Content Info End -->

                        <!-- About Content List Start -->
                        <div class="about-us-contact-list">
                            <!-- About Contact Item Start -->
                            <div class="about-contact-item wow fadeInUp" data-wow-delay="0.4s">
                                <div class="icon-box">
                                    <i class="fa-solid fa-phone"></i>
                                </div>
                                <div class="about-contact-content">
                                    <p>به کمکی نیاز دارید؟</p>
                                    <a href="{{ theme_config()['home_footer_items'][0]['home_footer_url'] }}"><h3>{{ theme_config()['home_footer_items'][0]['home_footer_title'] }}</h3></a>
                                </div>
                            </div>
                            <!-- About Contact Item End -->

                            <!-- About Contact Item Start -->
                            <div class="about-contact-item wow fadeInUp" data-wow-delay="0.6s">
                                <div class="icon-box">
                                    <figure class="image-anime">
                                        <img src="images/author-1.jpg" alt="">
                                    </figure>
                                </div>
                                <div class="about-contact-content">
                                    <h3>لسلی الکساندر</h3>
                                    <p>مدیر عامل</p>
                                </div>
                            </div>
                            <!-- About Contact Item End -->
                        </div>
                        <!-- About Content Info End -->
                    </div>
                    <!-- About Us Content Body End -->
                </div>
                <!-- About Us Content End -->
            </div>
        </div>
    </div>
</div>
<!-- About Us Section End -->
