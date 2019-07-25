<!DOCTYPE html>
<html lang="en">
<head>
    <title>Adventure</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{asset('frontEnd/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontEnd/css/animate.css')}}">

    <link rel="stylesheet" href="{{asset('frontEnd/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontEnd/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontEnd/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('frontEnd/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('frontEnd/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{asset('frontEnd/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('frontEnd/css/jquery.timepicker.css')}}">
    <script src="{{asset('frontEnd/js/bootstrap-datepicker.js')}}"></script>

    <link rel="stylesheet" href="{{asset('frontEnd/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('frontEnd/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('frontEnd/css/style.css')}}">
</head>
<body>

@include('frontEnd._partial_include._header')
<!-- END nav -->

@yield('content')
@include('frontEnd._partial_include._footer')




<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


{{--//<script src="{{asset('frontEnd/js/jquery.min.js')}}"></script>--}}
<script src="{{asset('frontEnd/js/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{asset('frontEnd/js/popper.min.js')}}"></script>
<script src="{{asset('frontEnd/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontEnd/js/jquery.easing.1.3.js')}}"></script>
<script src="{{asset('frontEnd/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('frontEnd/js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('frontEnd/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('frontEnd/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('frontEnd/js/aos.js')}}"></script>
<script src="{{asset('frontEnd/js/jquery.animateNumber.min.js')}}"></script>
<script src="{{asset('frontEnd/js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('frontEnd/js/jquery.timepicker.min.js')}}"></script>
<script src="{{asset('frontEnd/js/scrollax.min.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="{{asset('frontEnd/js/google-map.js')}}"></script>
<script src="{{asset('frontEnd/js/main.js')}}"></script>

</body>
</html>
