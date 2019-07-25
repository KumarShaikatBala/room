<!Doctype html>
<html class="no-js" lang="en">

<!-- Mirrored from beast.theironnetwork.org/bs4/jquery/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Feb 2019 10:22:38 GMT -->
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<meta content="" name="description" />
<meta content="" name="author" />
<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('admin/assets/plugin/fontawesome/css/font-awesome.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('admin/assets/plugin/jquery-ui/jquery-ui.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('admin/assets/plugin/animate/animate.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('admin/assets/css/beast.css')}}" type="text/css" />
<title>TOMAL</title>
</head>
<body>
<div class="bst-wrapper">
<div class="bst-main login-pad">
<div class="login-bg"></div>
<a class="fixed-btn" href="index.html"><i class="fa fa-arrow-left mrgn-r-xs"></i> Back To Home</a>
<div class="login-form-wrapper mrgn-b-lg">
<div class="container-fluid">
<div class="row">
<div class="col-12 col-sm-9 col-md-8 col-lg-5 mx-auto">
<div class="bst-form-block bst-full-block overflow-wrappper">
<div class="login-bar"> <img src="{{asset('admin/assets/img/login-bars.png')}}" class="img-fluid" alt="login bar" width="743" height="7"> </div>
<div class="bst-block-title text-center">
<div class="mrgn-b-lg">
<a href="index.html"> <img src="{{asset('admin/assets/img/beast-logo-blue.png')}}" alt="login logo" class="img-fluid display-ib" width="300" height="42"> </a>
</div>
<div class="login-top mrgn-b-lg">
<div class="mrgn-b-md">
<h2 class="text-capitalize base-dark font-2x fw-normal">Register</h2> </div>
<p>Please enter your user information</p>
</div>
</div>
<div class="bst-block-content">
<form class="login-form" action="{{route('admin-store')}}" method="post">
    @csrf
<div class="form-group has-feedback">
<input class="form-control" id="user-id" name="name" type="text" placeholder="User Name" required> <span class="glyphicon glyphicon-user form-control-feedback fa-lg" aria-hidden="true"></span> </div>
    <div class="form-group has-feedback">
        <input class="form-control" id="user-id" name="email" type="email" placeholder="User Email" required=""> <span class="glyphicon glyphicon-send form-control-feedback fa-lg" aria-hidden="true"></span> </div>
<div class="form-group has-feedback">
<input class="form-control" id="user-pwd" aria-describedby="user-pwd" name="password" type="password" placeholder="Password" required> <span class="glyphicon glyphicon-lock form-control-feedback fa-lg" aria-hidden="true"></span> </div>
    <div class="form-group has-feedback">
        <input class="form-control" id="user-pwd" aria-describedby="user-pwd" name="password_confirmation" type="password" placeholder="confirm Password" required> <span class="glyphicon glyphicon-lock form-control-feedback fa-lg" aria-hidden="true"></span> </div>
<div class="mrgn-b-lg">
<button type="submit" class="btn btn-success btn-block font-2x">Sign In</button>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<script src="{{asset('admin/assets/plugin/jquery/jquery-2.2.4.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/assets/plugin/jquery-ui/jquery-ui.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/assets/plugin/tether/tether.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/assets/plugin/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/assets/plugin/scrollspy/scrollspy.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/assets/plugin/sparkline/jquery.sparkline.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/assets/plugin/countUp/countUp.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/assets/plugin/countdown/jquery.countdown.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/assets/plugin/matchmedia/matchMedia.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/assets/plugin/matchmedia/matchMedia.addListener.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/assets/js/main.js')}}" type="text/javascript"></script>
</body>

<!-- Mirrored from beast.theironnetwork.org/bs4/jquery/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Feb 2019 10:22:39 GMT -->
</html>
