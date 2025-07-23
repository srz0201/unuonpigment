<div class="vertical-menu">

    <div class="h-100">

        <div class="user-wid text-center py-4">
            <div class="user-img">
                <img src="{{asset('assets/admin/images/users/user.png')}}" alt="" class="avatar-md mx-auto rounded-circle">
            </div>

            <div class="mt-3">

                <p class="text-body mt-1 mb-0 font-size-13">{{auth()->user()->name}}</p>

            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">پنل کاربری</li>

                <li>
                    <a href="{{route('admin.dashboard')}}" ><i class="mdi mdi-monitor-dashboard"></i><span>پیشخوان</span></a>
                </li>

                <li>
                    <a href="javascript:void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-settings"></i>
                        <span>صفحه اصلی</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('admin.home-slider.index')}}">اسلایدر اصلی</a></li>

                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-settings"></i>
                        <span>مدیرت محصولات</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('admin.category.index')}}">دسته بندی</a></li>
                        <li><a href="{{route('admin.product.index')}}">محصولات</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-settings"></i>
                        <span>عمومی</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('admin.page.index')}}">صفحات</a></li>
                        <li><a href="{{route('admin.article.index')}}">مقالات</a></li>
                        <li><a href="{{route('admin.newss.index')}}">اخبار</a></li>
                        <li><a href="{{route('admin.galleries.index')}}">گالری تصاویر</a></li>
                        <li><a href="{{route('admin.video.index')}}">گالری ویدئو</a></li>
                        <li><a href="{{route('admin.about.index')}}">درباره ما</a></li>
                        <li><a href="{{route('admin.partner.index')}}">شرکای تجاری</a></li>
                        <li><a href="{{route('admin.certificate.index')}}">تقدیرنامه ها</a></li>
                        <li><a href="{{route('admin.download.index')}}">دانلودها</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-settings"></i>
                        <span>تنظیمات اصلی</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('admin.banners.index')}}">مدیریت بنر</a></li>
                        <li><a href="{{route('admin.links.index')}}">مدیریت لینکهای سریع</a></li>
                        <li><a href="{{route('admin.users.index')}}">لیست کاربران</a></li>
                        <li><a href="{{route('admin.user.role.index')}}">ثبت مقام</a></li>
                        <li><a href="{{route('admin.setting.index')}}">تنظیمات اصلی</a></li>

                    </ul>
                </li>



                <li>
                    <form action="{{route('logout')}}" id="logout_form" method="post">
                        @csrf
                        <a href="javascript:{}" onclick="document.getElementById('logout_form').submit();" class=" waves-effect">
                            <i class="mdi mdi-logout"></i>
                            <span>خروج</span>
                        </a>
                    </form>
                </li>



            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>











