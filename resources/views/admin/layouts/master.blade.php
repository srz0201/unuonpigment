<!DOCTYPE html>
<html lang="en">
<head>

    @if (trim($__env->yieldContent('seo')))
        @yield('seo')
    @else
        <title>@if(setting()) {{setting()->title}} @endisset</title>
        <meta name="description" content="@if(setting()){{setting()->description}}@endisset"/>
    @endif

    @include('admin.layouts.head')


    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="theme-color" content="#283D92">

        <link rel="shortcut icon" href="@if(setting()) {{asset(setting()->fave_logo)}} @endif"
          type="image/png"/>

</head>



<body data-layout="detached" data-topbar="colored">

<div class="container-fluid">
    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('admin.layouts.header')
        @include('admin.layouts.sidebar')
        <div class="main-content">

            <div class="page-content">
                @yield('content')
            </div>
            <!-- End Page-content -->
            @include('admin.layouts.footer')
        </div>



    </div>
</div>


@include('admin.layouts.scripts')
{{--@include('errors.toastr')--}}
@include('errors.sweetalert2')


</body>

</html>
