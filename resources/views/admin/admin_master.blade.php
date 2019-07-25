<!Doctype html>
<html class="no-js" lang="en">

<!-- Mirrored from beast.theironnetwork.org/bs4/jquery/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Feb 2019 10:18:25 GMT -->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('admin/assets/img/favicon.ico')}}">
    @yield('stylesheets')
@include('admin._partial_include._stylesheets')
    <title>Hotel|Admin|Dashboard</title>
</head>
<body>
<div class="bst-wrapper">
    @include('admin._partial_include._header')
    <div class="bst-main">
        <div class="fyt-main-top"></div>
        <div class="bst-main-wrapper pad-all-md">
            @include('admin._partial_include._sidebar')

            @yield('content')

        </div>
    </div>
    @include('admin._partial_include._footer')

</div>
@yield('scripts')
</body>
</html>
