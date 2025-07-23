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
                    <p style="color: white;">{!! theme_config()['home_footer_about'] !!}</p>
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
{{--<!-- rts footer area start -->--}}
{{--<div class="rts-footer-area three bg_footer-1 bg_image">--}}
{{--    <div class="container-full">--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-12">--}}
{{--                <div class="nav-footer-wrapper-one">--}}
{{--                    <div class="container">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-lg-12">--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-4">--}}
{{--                <div class="footer-wrapper-left-one">--}}
{{--                    <a href="{{route('home' , session('lang'))}}" class="logo">--}}
{{--                        <img src="{{asset(setting()->logo)}}" alt="{{@asset(setting()->title)}}" title="{{@asset(setting()->title)}}">--}}
{{--                    </a>--}}
{{--                    <p class="disc">--}}
{{--                        {{theme_config()['home_footer_about']}}--}}
{{--                    </p>--}}
{{--                    @include('layouts.social')--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-8">--}}
{{--                <div class="footer-wrapper-right">--}}
{{--                    <div class="single-nav-area-footer use-link">--}}
{{--                        <h4 class="title">{{trans('lang.useful links')}}</h4>--}}
{{--                        <ul>--}}
{{--                            <li><a href="{{route('about-us',session('lang'))}}"><i class="fa-regular fa-arrow-right-long"></i>{{trans('lang.about us')}}</a></li>--}}
{{--                            <li><a href="{{route('gallery',session('lang'))}}"><i class="fa-regular fa-arrow-right-long"></i>{{trans('lang.gallery')}}</a>--}}
{{--                            </li>--}}
{{--                            <li><a href="{{route('media',session('lang'))}}"><i class="fa-regular fa-arrow-right-long"></i>{{trans('lang.media')}}</a></li>--}}
{{--                            <li><a href="{{route('articles',session('lang'))}}"><i class="fa-regular fa-arrow-right-long"></i>{{trans('lang.articles')}}</a></li>--}}
{{--                            @if(auth()->check())--}}
{{--                                <li><a href="{{route('admin.dashboard')}}">پنل مدیریت</a></li>--}}
{{--                                <li><a href="{{ route('logout') }}"--}}
{{--                                       onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">خروج</a></li>--}}
{{--                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
{{--                                    @csrf--}}
{{--                                </form>--}}
{{--                            @else--}}
{{--                                <li><a href="{{url('login')}}">ورود</a></li>--}}

{{--                            @endif--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <div class="single-nav-area-footer use-link">--}}
{{--                        <h4 class="title">{{trans('lang.links')}}</h4>--}}
{{--                        <ul>--}}
{{--                            @foreach($links as $link)--}}
{{--                                <li><a href="{{$link->url}}"><i class="fa-regular fa-arrow-right-long"></i>{{$link->title}}</a>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <div class="single-nav-area-footer news-letter">--}}
{{--                        <h4 class="title">{{trans('lang.contact us')}}</h4>--}}
{{--                        <ul>--}}
{{--                                <li><a href="#"><i class="fa-regular fa-arrow-right-long"></i>{{trans('lang.phone')}} : 09125468547</a>--}}
{{--                                </li>--}}
{{--                                <li><a href="#"><i class="fa-regular fa-arrow-right-long"></i>{{trans('lang.phone')}} : 0179874563</a>--}}
{{--                                </li>--}}
{{--                                <li><a href="#"><i class="fa-regular fa-arrow-right-long"></i>Info@test.com</a>--}}
{{--                                </li>--}}

{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="container-full copyright-area-one">--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-12">--}}
{{--                <div class="container">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-lg-12">--}}
{{--                            <div class="copyright-wrapper">--}}
{{--                                <p class="mb-0">&copy;--}}
{{--                                    <script>--}}
{{--                                        document.write(--}}
{{--                                            new Date().getFullYear()--}}
{{--                                        )--}}
{{--                                    </script>--}}
{{--                                    {{trans('lang.copyr')}}<a href="https://www.ibulud.com/" class="mr-2">{{trans('lang.ibulud')}}</a>--}}
{{--                                </p>--}}
{{--                                <div class="right-nav">--}}
{{--                                    <ul>--}}
{{--                                        <li><a href="terms-of-condition.html">Terms of use </a></li>--}}
{{--                                        <li><a href="privacy-policy.html"> Privacy</a></li>--}}
{{--                                        <li><a href="privacy-policy.html">Environmental Policy</a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<!-- rts footer area end -->--}}
