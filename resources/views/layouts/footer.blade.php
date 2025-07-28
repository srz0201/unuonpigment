<!-- Footer Start -->
<footer class="main-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Footer Header Start -->
                <div class="footer-header">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <!-- Footer Logo Start -->
                            <div class="footer-logo">
                                <img src="{{ asset(setting()->logo) }}" width="100" alt="">
                            </div>
                            <!-- Footer Logo End -->
                        </div>
                    </div>
                </div>
                <!-- Footer Header End -->
            </div>

            <div class="col-lg-4 col-md-6">
                <!-- Footer Links Start -->
                <div class="footer-links">
                    <h3>درباره ما</h3>
                    <p class="text-justify text-white" >{!! theme_config()['home_footer_about'] !!}</p>
                </div>
                <!-- Footer Links End -->
            </div>

            <div class="col-lg-4 col-md-6 d-flex justify-content-center">
                <!-- Footer Links Start -->
                <div class="footer-links">
                    <h3>لینک های سریع</h3>
                    <ul>
                        @foreach($links as $link)
                            <li><a href="{{ $link->url }}">{{ $link->title }}</a></li>
                        @endforeach

                            @if(auth()->check())
                                <li><a href="{{route('admin.dashboard')}}">پنل مدیریت</a></li>
                                <li><a href="{{url('logout')}}">خروج</a></li>
                            @else
                                <li><a href="{{url('login')}}">ورود</a></li>
                            @endif
                    </ul>
                </div>
                <!-- Footer Links End -->
            </div>

            <div class="col-lg-4 col-md-6">
                <!-- Footer Contact Box Start -->
                <div class="footer-contact-box footer-links">
                    <h3>تماس با ما</h3>
                    @foreach(theme_config()['home_footer_items'] as $item)
                        <!-- Footer Contact Item Start -->
                        <div class="footer-contact-item">
                            <div class="icon-box">
                                <a href="{{ $item['home_footer_url']}}" target="_blank"><i class="{{ $item['home_footer_icon']}}"></i></a>
                            </div>
                            <div class="footer-contact-content">
                                <p>{{ $item['home_footer_title']}}</p>
                            </div>
                        </div>
                        <!-- Footer Contact Item End -->
                    @endforeach
                </div>
                <!-- Footer Contact Box End -->
            </div>
        </div>
        <!-- Footer Copyright Section Start -->
        <div class="footer-copyright">
            <div class="row">
                <div class="col-md-12">
                    <!-- Footer Copyright Start -->
                    <div class="footer-copyright-text">
                        <p>طراحی و توسعه سافته در آی بولود</p>
                    </div>
                    <!-- Footer Copyright End -->
                </div>
            </div>
        </div>
        <!-- Footer Copyright Section End -->
    </div>
</footer>
<!-- Footer End -->
