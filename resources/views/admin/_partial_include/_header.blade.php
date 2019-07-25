<header class="bst-header">
    <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
        <a class="navbar-brand" href="{{route('dashboard')}}">
            <img class="img-fluid display-ib" src="/admin/assets/img/logoHeader.png" alt="logo" width="130" height="16">
        </a>
        <div class="bst-mobile-toggle-btn text-right float-right">
            <ul class="list-inline">
                <li class="list-inline-item">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </li>
                <li class="list-inline-item">
                    <button class="c-hamburger bst-bars"> <span>toggle menu</span></button>
                </li>
            </ul>
        </div>
        <div id="nav-content" class="collapse navbar-collapse justify-content-between">
            <ul class="bst-mega-menu-wrapper navbar-nav hidden-md-down">
                <li class="nav-item dropdown hidden-lg-down">
                    <a href="javascript:;" id="mega-menu" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        Mega Menu
                    </a>
                    <div class="dropdown-menu bst-mega-menu bst-shadow" aria-labelledby="mega-menu">
                        <div class="bst-mega-menu-wrap pad-all-lg">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-3 col-lg-2">
                                    <h4 class="sidenav-heading text-uppercase mrgn-b-md">Booking</h4>
                                    <ul class="list-unstyled">
                                        <li><a href="{{route('payments')}}" class="btn-default mrgn-b-xs pad-l-sm"><i class="ti-credit-card" aria-hidden="true"></i>Card</a></li>
                                        <li><a href="{{route('cashes')}}" class="btn-default mrgn-b-xs pad-l-sm"><i class="ti-money" aria-hidden="true"></i>Cash</a></li>
                                    </ul>
                                </div>
                                <div class="col-12 col-sm-12 col-md-3 col-lg-2">
                                    <h4 class="sidenav-heading text-uppercase mrgn-b-md">Hotel</h4>
                                    <ul class="list-unstyled">
                                        <li><a href="{{route('categories')}}"><i class="ti-home" aria-hidden="true"></i>Room Type</a></li>
                                        <li><a href="{{route('rooms')}}">Room</a></li>
                                        <li><a href="{{route('img-index')}}"><i class="ti-image" aria-hidden="true"></i> Image</a></li>
                                        <li><a href="{{route('facilities')}}">Facility</a></li>
                                    </ul>
                                </div>
                                <div class="col-12 col-sm-12 col-md-3 col-lg-2">
                                    <h4 class="sidenav-heading text-uppercase mrgn-b-md"><i class="ti-receipt" aria-hidden="true"></i> Report</h4>
                                    <ul class="list-unstyled">
                                        <li><a href="{{route('statements')}}"><i class="ti-printer" aria-hidden="true"></i>Statement</a></li>
                                    </ul>
                                </div>
                                <div class="col-12 col-sm-12 col-md-3 col-lg-2">
                                    <h4 class="sidenav-heading text-uppercase mrgn-b-md"><i class="ti-bookmark-alt" aria-hidden="true"></i> Pages</h4>
                                    <ul class="list-unstyled">
                                        <li><a href="{{route('about')}}">About</a></li>
                                        <li><a href="{{route('dinning')}}">Dinning</a></li>
                                        <li><a href="{{route('slider3-index')}}">Food Menu</a></li>
                                        <li><a href="{{route('facilitySingle')}}">Facility</a></li>
                                    </ul>
                                </div>
                                @php
$user=\App\Customer::all();
$rooms=\App\Room::all();
@endphp
                                <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                    <div class="bst-sparkline">
                                        <div class="bst-card-box bst-sparkline-list d-flex bg-success clearfix">
                                            <div class="col-12 col-sm-6 col-md-6 col-lg-6"> <span class="show count-item" data-count="{{$rooms->sum('price')}}">0</span> <span>Total Room Price</span> </div>
                                        </div>
                                        <div class="bst-card-box bst-sparkline-list d-flex clearfix bg-info">
                                            <div class="col-12 col-sm-6 col-md-6 col-lg-6"> <span class="show count-item" data-count="{{$rooms->sum('total')}}">0</span> <span>Total Room</span> </div>
                                        </div>
                                        <div class="bst-card-box bst-sparkline-list d-flex clearfix bg-warning">
                                            <div class="col-12 col-sm-6 col-md-6 col-lg-6"> <span class="show count-item" data-count="{{count($user)}}">0</span> <span>Active Users</span> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            @if(Session::has('msg'))
                <h5 id="msg" style="color: #ffffff">{{session::get('msg')}}</h5>
            @endif
            <script>
                setTimeout(function() {
                    $('#msg').fadeOut('fast');
                }, 4000);
            </script>
            <ul class="navbar-nav bst-user-notifications">
                <li class="dropdown dropdown-right">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="user-dropdown">{{Auth::guard('admin')->user()->name}}</span>
                        @php
                        $logo=\App\Logo::get()->first();
                        @endphp
                        <img class="img-fluid display-ib mrgn-l-sm rounded-circle" src="/image/logo/{{$logo->logo_image}}" width="64" height="64" alt="User-image">
                    </a>
                    <ul class="dropdown-menu bst-shadow">
                        <li class="dropdown-item"><a href="login.html"><i class="fa fa-power-off"></i>Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
