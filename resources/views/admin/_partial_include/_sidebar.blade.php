<div class="bst-sidebar">
    <div class="bst-sidebar-nav-wrapper">
        <div class="bst-site-link mrgn-b-md bg-white overflow-wrapper">
            <div class="bst-site-info pull-left"><i class="ti-world mrgn-r-sm"> </i> <span>Hotel </span> </div>
            <button class="c-hamburger c-hamburger--htra bst-bars pull-right"> <span>toggle menu</span></button>
        </div>
        <div class="bst-sidebar-link mrgn-b-sm bg-white bst-shadow">
            <a href="{{route('dashboard')}}"> <i class="ti-dashboard mrgn-r-sm {{ (request()->routeIs('dashboard')) ? 'active' : '' }}"> </i> <span class="closed-menu-title {{ (request()->routeIs('dashboard')) ? 'active' : '' }}">Dashboard</span> </a>
        </div>
        <div class="bst-sidebar-menu pad-lr-lg pad-tb-md bg-white bst-shadow">
            <div class="sidebar-nav navbar-nav">
                <ul class="nav nav-pills flex-column sidebar-menu">
                    <li class="sidenav-heading text-uppercase"><i class="ti-panel" aria-hidden="true"></i> Dashboards <i class="ti-settings" aria-hidden="true"></i> <i class="ti-settings" aria-hidden="true"></i></li>
                    <li class="has-children {{ (request()->routeIs('categories','rooms','img-index')) ? 'active' : '' }} nav-item"><a href="#/"><i class="ti-home" aria-hidden="true"></i> <span>Hotel</span></a>
                        <ul class="list-unstyled sub-menu {{ (request()->routeIs('categories','room','img-index','facilities')) ? '' : 'collapse' }}">
                            <li class="nav-item"><a class="{{ (request()->routeIs('categories')) ? 'active' : '' }}" href="{{route('categories')}}"><span>Room Type</span></a></li>
                            <li class="nav-item"><a class="{{ (request()->routeIs('rooms')) ? 'active' : '' }}" href="{{route('rooms')}}"><span>Room</span></a></li>
                            <li class="nav-item"><a class="{{ (request()->routeIs('img-index')) ? 'active' : '' }}" href="{{route('img-index')}}"><span><i class="ti-image" aria-hidden="true"></i> Image</span></a></li>
                            <li class="nav-item"><a class="{{ (request()->routeIs('facilities')) ? 'active' : '' }}" href="{{route('facilities')}}"><span>Facility</span></a></li>
                        </ul>
                    </li>
                    <li class="has-children {{ (request()->routeIs('logo','slider-index','slider2-index','gallery-index','contactinfo','counter','about','copyright','meeting','dinning','facilitySingle','slider3-index','social')) ? 'active' : '' }} nav-item"><a href="#/"><i class="ti-files" aria-hidden="true"></i> <span>Pages</span></a>
                        <ul class="list-unstyled sub-menu {{ (request()->routeIs('logo','slider-index','slider2-index','gallery-index','contactinfo','counter','about','copyright','meeting','dinning','facilitySingle','slider3-index','social')) ? '' : 'collapse' }}">
                            <li class="nav-item"><a class="{{ (request()->routeIs('logo')) ? 'active' : '' }}" href="{{route('logo')}}"><span><i class="ti-flickr-alt" aria-hidden="true"></i>Logos</span></a></li>
                            <li class="nav-item"><a class="{{ (request()->routeIs('slider-index')) ? 'active' : '' }}" href="{{route('slider-index')}}"><span><i class="ti-layout-slider" aria-hidden="true"></i>Slider</span></a></li>
                            <li class="nav-item"><a class="{{ (request()->routeIs('slider-index')) ? 'active' : '' }}" href="{{route('slider2-index')}}"><span><i class="ti-comments" aria-hidden="true"></i> Testimonial</span></a></li>
                            <li class="nav-item"><a class="{{ (request()->routeIs('gallery-index')) ? 'active' : '' }}" href="{{route('gallery-index')}}"><span><i class="ti-gallery" aria-hidden="true"></i>Gallery</span></a></li>
                            <li class="nav-item"><a class="{{ (request()->routeIs('contactinfo')) ? 'active' : '' }}" href="{{route('contactinfo')}}"><span><i class="ti-email" aria-hidden="true"></i>Contactinfo</span></a></li>
                            <li class="nav-item"><a class="{{ (request()->routeIs('counter')) ? 'active' : '' }}" href="{{route('counter')}}"><span><i class="ti-notepad" aria-hidden="true"></i>Counter</span></a></li>
                            <li class="nav-item"><a class="{{ (request()->routeIs('copyright')) ? 'active' : '' }}" href="{{route('copyright')}}"><span>&copy; Copyright</span></a></li>
                            <li class="nav-item"><a class="{{ (request()->routeIs('about')) ? 'active' : '' }}" href="{{route('about')}}"><span><i class="ti-thought" aria-hidden="true"></i>About</span></a></li>
                            <li class="nav-item"><a class="{{ (request()->routeIs('dinning')) ? 'active' : '' }}" href="{{route('dinning')}}"><span><i class="ti-email" aria-hidden="true"></i> Dinning</span></a></li>
                            <li class="nav-item"><a class="{{ (request()->routeIs('slider3-index')) ? 'active' : '' }}" href="{{route('slider3-index')}}"><span><i class="ti-pencil-alt2" aria-hidden="true"></i>Food Menu</span></a></li>
                            <li class="nav-item"><a class="{{ (request()->routeIs('meeting')) ? 'active' : '' }}" href="{{route('meeting')}}"><span><i class="ti-announcement" aria-hidden="true"></i> Meeting</span></a></li>
                            <li class="nav-item"><a class="{{ (request()->routeIs('facilitySingle')) ? 'active' : '' }}" href="{{route('facilitySingle')}}"><span><i class="ti-panel" aria-hidden="true"></i> Facility</span></a></li>
                            <li class="nav-item"><a class="{{ (request()->routeIs('social')) ? 'active' : '' }}" href="{{route('social')}}"><span><i class="ti-facebook" aria-hidden="true"></i> Social Link</span></a></li>
                        </ul>
                    </li>
                    <li class="nav-item {{(request()->routeIs('bookings'))?'active':''}}">
                        <a href="{{route('bookings')}}"><i class="ti-bookmark" aria-hidden="true"></i><span>Booking</span></a>
                    </li>
                    <li class="nav-item {{(request()->routeIs('payments'))?'active':''}}">
                        <a href="{{route('payments')}}"><i class="ti-credit-card" aria-hidden="true"></i><span>Card</span></a>
                    </li>
                    <li class="nav-item {{(request()->routeIs('cashes'))?'active':''}}">
                        <a href="{{route('cashes')}}"><i class="ti-money" aria-hidden="true"></i><span>Cash</span></a>
                    </li>
                    <li class="nav-item {{(request()->routeIs('expenses'))?'active':''}}">
                        <a href="{{route('expenses')}}"><i class="ti-money" aria-hidden="true"></i><span>Expense</span></a>
                    </li>
                    <li class="nav-item {{(request()->routeIs('statements'))?'active':''}}">
                        <a href="{{route('statements')}}"><i class="ti-printer" aria-hidden="true"></i><span>Statements</span></a>
                    </li>
                    <li class="nav-item {{(request()->routeIs('users'))?'active':''}}">
                        <a href="{{route('users')}}"><i class="ti-user" aria-hidden="true"></i><span>Users</span></a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</div>
