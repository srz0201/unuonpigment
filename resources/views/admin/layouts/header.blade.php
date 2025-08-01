<header id="page-topbar">
    <div class="navbar-header">
        <div class="container-fluid">
            <div class="float-right">



                <div class="dropdown d-none d-lg-inline-block ml-1">
                    <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                        <i class="mdi mdi-fullscreen"></i>
                    </button>
                </div>



                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user" src="{{asset('assets/admin/images/users/user.png')}}" alt="{{auth()->user()->name}}">
                        <span class="d-none d-xl-inline-block ml-1">{{auth()->user()->name}}</span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- item-->

                        <div class="dropdown-divider"></div>
                        <form action="{{route('logout')}}" id="logout_form" method="post">
                            @csrf

                            <a class="dropdown-item text-danger" href="javascript:{}" onclick="document.getElementById('logout_form').submit();">
                                <i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i>
                                خروج</a>
                        </form>

                    </div>
                </div>


            </div>
            <div>
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="index.html" class="logo logo-dark">
                                    <span class="logo-sm">
                                        <img src="http://127.0.0.1:8000/assets/admin/images/users/user.png" alt="" height="20">
                                    </span>
                        <span class="logo-lg">
                                        <img src="http://127.0.0.1:8000/assets/admin/images/users/user.png" alt="" height="17">
                                    </span>
                    </a>

                    <a href="index.html" class="logo logo-light">
                                    <span class="logo-sm">
                                        <img src="http://127.0.0.1:8000/assets/admin/images/users/user.png" alt="" height="20">
                                    </span>
                        <span class="logo-lg">
                                        <img src="http://127.0.0.1:8000/assets/admin/images/users/user.png" alt="" height="19">
                                    </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-16 header-item toggle-btn waves-effect" id="vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>



            </div>

        </div>
    </div>
</header>


<script>
    import BootstrapColorpicker
    export default {
        components: {BootstrapColorpicker}
    }
</script>
