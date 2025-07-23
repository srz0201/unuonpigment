<a href="{{ theme_config()['home_footer_items'][3]['home_footer_url'] }}" target="_blank" class="telegram-fixed">
    <img src="{{ asset('images/telegram.png') }}" alt="تلگرام" />
</a>

<!-- Preloader Start -->
<div class="preloader">
    <div class="loading-container">
        <div class="loading"></div>
        <div id="loading-icon"><img src="{{ asset('images/loader.svg') }}" alt=""></div>
    </div>
</div>
<!-- Preloader End -->

<nav class="navbar fixed-bottom bg-light border-top shadow-sm d-md-none">
    <div class="container-fluid d-flex justify-content-around text-center">

        <a href="{{ route('home') }}" class="text-decoration-none text-dark">
            <div>
                <i class="bi bi-house-door fs-5"></i>
                <div class="small">خانه</div>
            </div>
        </a>

        <a href="{{ route('contact-us') }}" class="text-decoration-none text-dark">
            <div>
                <i class="bi bi-telephone fs-5"></i>
                <div class="small">تماس با ما</div>
            </div>
        </a>

        <a href="{{ route('category.index') }}" class="text-decoration-none text-dark">
            <div>
                <i class="bi bi-briefcase fs-5"></i>
                <div class="small">محصولات</div>
            </div>
        </a>

        <a href="{{ route('articles') }}" class="text-decoration-none text-dark">
            <div>
                <i class="bi bi-file fs-5"></i>
                <div class="small">مقالات</div>
            </div>
        </a>

        <a href="{{ route('about-us') }}" class="text-decoration-none text-dark">
            <div>
                <i class="bi bi-file-person fs-5"></i>
                <div class="small">درباره ما</div>
            </div>
        </a>

    </div>
</nav>

<!-- Header Start -->
<header class="main-header">
    <div class="header-sticky">
        <nav class="container">
            <div class="navbar navbar-expand-lg">
                <!-- Logo Start -->
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset(setting()->logo) }}" width="100" alt="Logo">
                </a>
                <!-- Logo End -->

                <!-- Main Menu Start -->
                <div class="collapse navbar-collapse main-menu">
                    <div class="nav-menu-wrapper">
                        <ul class="navbar-nav mr-auto" id="menu">
                            <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">خانه</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('category.index') }}">محصولات</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('articles') }}">مقالات</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('about-us') }}">درباره ما</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('contact-us') }}">تماس با ما</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Main Menu End -->
                <div class="navbar-toggle"></div>
            </div>
        </nav>
        <div class="responsive-menu"></div>
    </div>
</header>
