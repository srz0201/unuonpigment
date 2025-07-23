<!DOCTYPE html>
<html lang="{{session('lang')}}">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @if (trim($__env->yieldContent('seo')))
        @yield('seo')
    @else
        @if(setting())
            <title>@if(setting())
                    {{setting()->title}}
                @endisset</title>
            <meta name="description" content="@if(setting()){{setting()->description}}@endisset"/>
            {{--            <meta name="keywords" lang="{{session('lang')}}" content="@if(setting()) {{setting()->keywords}} @endisset">--}}
            <meta property="og:title" content="@if(setting()) {{setting()->title}} @endisset"/>
            <meta property="og:description" content="@if(setting())  {{setting()->description}} @endisset"/>
            <meta property="og:image" content="@if(setting()) {{asset(setting()->logo)}} @endisset"/>
            <meta property="og:locale" content="{{session('lang')}}"/>
            <meta property="og:type" content="website"/>
            <meta property="og:url" content="{{url('/')}}"/>
            <meta property="og:site_name" content="@if(setting()) {{setting()->title}} @endisset"/>

            @if(setting()->language->brevity == 'fa')
                <link rel="canonical" href="{{url('/')}}">
            @else
                <link rel="canonical" href="{{url('/'.setting()->language->brevity)}}">
            @endif

        @endif
    @endif
    @include('layouts.head')
    @yield('styles')
    @if(setting())
        <link rel="shortcut icon" href="{{asset(setting()->fave_logo)}}" type="image/png">
    @endif
</head>

<body>

<!-- header area start -->
@include('layouts.header')

@yield('content')

@include('layouts.footer')

@include('layouts.scripts')

@include('errors.toastr')

@yield('scripts')

</body>
</html>
