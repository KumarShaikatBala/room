<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="/"><img src="{{asset('frontEnd/images/logo2.png')}}" style="width:80px;height:20px;">AS101</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ (request()->routeIs('home')) ? 'active' : '' }}"><a href="{{route('home')}}" class="nav-link">Home</a></li>
                <li class="nav-item {{ (request()->routeIs('frontend-about')) ? 'active' : '' }}"><a href="{{route('frontend-about')}}" class="nav-link">About</a></li>
                <li class="nav-item {{ (request()->routeIs('frontend-room')) ? 'active' : '' }}"><a href="{{route('frontend-room')}}" class="nav-link">Rooms & Suites</a></li>
                <li class="nav-item {{ (request()->routeIs('frontend-facilities')) ? 'active' : '' }}"><a href="{{route('frontend-facilities')}}" class="nav-link">Facilities</a></li>
                <li class="nav-item {{ (request()->routeIs('frontend-dinning')) ? 'active' : '' }}"><a href="{{route('frontend-dinning')}}" class="nav-link">Dinning & Restaurant</a></li>
                <li class="nav-item {{ (request()->routeIs('frontend-meeting')) ? 'active' : '' }}"><a href="{{route('frontend-meeting')}}" class="nav-link">Meeting & Events</a></li>
                <li class="nav-item {{ (request()->routeIs('frontend-gallery')) ? 'active' : '' }}"><a href="{{route('frontend-gallery')}}" class="nav-link">Gallery</a></li>
                <li class="nav-item {{ (request()->routeIs('frontend-contact')) ? 'active' : '' }}"><a href="{{route('frontend-contact')}}" class="nav-link">Contact</a></li>
                @guest('customer')
                    <li class="nav-item {{ (request()->routeIs('user-login')) ? 'active' : '' }}"><a href="{{route('user-login')}}" class="nav-link">Login</a></li>
                @else
                    <li class="nav-item {{ (request()->routeIs('account')) ? 'active' : '' }}"><a href="{{route('account')}}" class="nav-link">{{Auth::guard('customer')->user()->name}}</a></li>
                @endguest
            </ul>
        </div>
    </div>
    @if(Session::has('msg'))
        <h6 id="msg" style="color: #ffffff;z-index: 999999999999;text-align: center">{{session::get('msg')}}</h6>
    @endif
    <script>
        setTimeout(function() {
            $('#msg').fadeOut('fast');
        }, 4000);
    </script>
</nav>
