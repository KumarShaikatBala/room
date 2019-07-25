@extends('frontEnd.master')
@section('content')
    <div class="hero-wrap" style="background-image: url('frontEnd/images/bg_1.jpg');height:200px;">
        <div class="overlay"></div>

    </div>
    <section class="ftco-section services-section bg-light">
        <div class="container">
            <div class="row">
                <!--login area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form">
                        <h2 class="text-center">login</h2>
                        @if(Session::has('msg'))
                            <h5 id="msg"class="alert-danger">{{session::get('msg')}}</h5>
                        @endif
                        <script>
                            setTimeout(function() {
                                $('#msg').fadeOut('fast');
                            }, 4000);
                        </script>
                        <form action="{{route('user-login-action')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>

                        </form>
                    </div>
                </div>
                <!--login area start-->

                <!--register area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form register">
                        <h2 class="text-center">Register</h2>
                        <form action="{{route('user-registration')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Password</label>
                                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
                <!--register area end-->
            </div>
        </div>
    </section>



@endsection
