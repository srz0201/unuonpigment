<!DOCTYPE html>
<html lang="{{session('lang')}}">
<head>

    <title>ثبت نام</title>
    <meta name="description" content="@if(setting()){{setting()->description}}@endisset"/>

    <meta property="og:title" content="@if(setting()) {{setting()->title}} @endisset"/>
    <meta property="og:description" content="@if(setting()) {{setting()->description}} @endisset"/>
    <meta property="og:image" content="@if(setting()) {{asset(setting()->logo)}} @endisset"/>
    <meta property="og:locale" content="{{session('lang')}}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="{{url('/')}}"/>
    <meta property="og:site_name" content="{{config('website.site_name')}}"/>


    @include('admin.layouts.head')


    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#283D92">

    <link rel="shortcut icon" href="@if(setting()) {{asset(setting()->fave_logo)}} @endif"
          type="image/png"/>

    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.7/dist/sweetalert2.min.css" rel="stylesheet" type="text/css">


</head>


<body>
<div class="home-btn d-none d-sm-block">
    <a href="{{url('/')}}" class="text-dark"><i class="fas fa-home h2"></i></a>
</div>
<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden">
                    <div class="bg-login text-center">
                        <div class="bg-login-overlay"></div>
                        <div class="position-relative">
                            <h5 class="text-white font-size-20">ثبت نام</h5>
                            <p class="text-white-50 mb-0">ایجاد حساب کاربری</p>
                            <a href="{{url('/')}}" class="logo logo-admin mt-4">
                                <img src="@if(setting()) {{asset(setting()->logo)}} @endisset" alt="" height="30">
                            </a>
                        </div>
                    </div>
                    <div class="card-body pt-5">

                        <div class="p-2">
                            <form class="form-horizontal" method="POST" action="{{ route('mobile.verify.register') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="useremail">نام</label>
                                    <input name="name" value="{{ old('name') }}" class="form-control"  placeholder="نام و نام خانوادگی">
                                </div>

                                <div class="form-group">
                                    <label for="username">نام کاربری</label>
                                    <input name="mobile" value="{{old('mobile')}}" type="text" class="form-control" id="username" placeholder="شماره موبایل">
                                </div>

                                <div class="form-group">
                                    <label for="userpassword">رمز عبور</label>
                                    <input name="password" type="password" class="form-control" id="userpassword" placeholder="رمز عبور را وارد کنید">
                                </div>
                                <div class="form-group">
                                    <label for="userpassword">تکرار رمز عبور</label>
                                    <input name="password_confirmation" type="password" class="form-control" id="userpassword" placeholder="رمز عبور را وارد کنید">
                                </div>

                                <div class="mt-4">
                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">ثبت نام</button>
                                </div>

                                <div class="mt-4 text-center">
                                    <p class="mb-0">با ثبت نام شما موافقت می کنید با <a href="#" class="text-primary">قوانین و مقررات</a></p>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="mt-5 text-center">
                    <p>حساب کاربری دارید؟ <a href="{{route('login')}}" class="font-weight-medium text-primary"> ورود </a> </p>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- JAVASCRIPT -->
@include('admin.layouts.scripts')

{{--@include('errors.toastr')--}}
@include('errors.sweetalert2')



</body>

</html>
