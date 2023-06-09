<div class="header_padd">
    <div class="container">
        <header class="site-header">
            <div class="site-header-wrap">
                <div class="container">
                    <div class="d-flex align-items-center">
                        <div class="site-logo">
                            <a href="/" class="navbar-brand">
                                <img src="{{ url('estate/images/logo.png')}}" alt="" />
                            </a>
                        </div>
                        <span class="menu-icon open-menu"></span>
                        <div class="header-navbar header-wrap">
                        @guest('frontuser')
                            <ul class="header-menu-list d-flex align-items-center justify-content-end">
                                <li class="header-menu-item"><a href="{{route('property.list')}}">Local Properties</a></li>
                                <li class="header-menu-item"><a href="/">Explore Our Builders</a></li>
                                <li class="header-menu-item"><a href="{{ route('home.signin') }}">Post Property Now</a></li>
                                <li class="header-menu-item">
                                    <a href="/" class="yellow-btn btn btn-primary">Create Your Builder Profile</a>
                                </li>
                                <li class="header-menu-item"><a href="{{ route('home.signin') }}" class="login-btn btn btn-primary">Login</a>
                                </li>
                            </ul>
                            @endguest
                            @auth('frontuser')
                            <ul class="header-menu-list d-flex align-items-center justify-content-end">
                                <li class="header-menu-item"><a href="/">Home</a></li>
                                <li class="header-menu-item"><a href="{{ route('frontuser.property.index') }}" class="login-btn btn btn-primary">Dashboard</a>
                                </li>
                                <li class="header-menu-item">
                                    <a href="{{ route('logout') }}"><svg width="28" height="28" viewBox="0 0 28 28" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M14.0001 27.3334C6.63608 27.3334 0.666748 21.3641 0.666748 14.0001C0.666748 6.63608 6.63608 0.666748 14.0001 0.666748C21.3641 0.666748 27.3334 6.63608 27.3334 14.0001C27.3334 21.3641 21.3641 27.3334 14.0001 27.3334ZM7.33341 12.6667V8.66675L0.666748 14.0001L7.33341 19.3334V15.3334H18.0001V12.6667H7.33341Z"
                                                fill="#4E4E4E" />
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                             @endauth
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>
</div>