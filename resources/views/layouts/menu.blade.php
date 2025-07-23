<div class="menu-container order-lg-1 order-sm-0">
    <div class="d_menu">
        <nav class="navbar navbar-expand-lg mainmenu__menu">
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#direo-navbar-collapse"
                    aria-controls="direo-navbar-collapse"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon icon-menu"><i class="fal fa-bars"></i></span>
            </button>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="direo-navbar-collapse">
                <ul class="navbar-nav">
                    <li><a href="{{url('/')}}">خانه</a></li>

                    <li class="dropdown has_dropdown">
                        <a href="#" class="dropdown-toggle" id="drop3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">دسته بندی</a>
                        <ul class="dropdown-menu" aria-labelledby="drop3">
                            @foreach($menu_categories as $menu_category)
                            <li><a href="@if(Cookie::get('city') !== null && $cities->find(Cookie::get('city')))  {{route('search.category.city',[$cities->find(Cookie::get('city'))->slug,$menu_category->slug])}} @else  {{route('search.category',$menu_category->slug)}} @endif">{{$menu_category->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>

{{--                    <li>--}}
{{--                        <a href="{{url('page/شرایط-و-قوانین-استفاده')}}">پشتیبانی و قوانین</a>--}}
{{--                    </li>--}}
                    <li>
                        <a href="{{url('page/درباره-ما')}}">درباره ما</a>
                    </li>
                    <li>
                        <a href="{{route('contact')}}">تماس با ما</a>
                    </li>
                    <li>
                        <a href="{{route('complex.register.request')}}">ثبت باشگاه </a>
                    </li>
                    <li>
                        <a href="{{route('articles')}}">مجله ورزشی</a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
    </div>
</div>
