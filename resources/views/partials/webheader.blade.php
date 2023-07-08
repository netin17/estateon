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
                                <li class="header-menu-item"><a href="/">Local Properties</a></li>
                                <li class="header-menu-item"><a href="/">Explore Our Builders</a></li>
                                <li class="header-menu-item"><a href="/">Post Property Now</a></li>
                                <li class="header-menu-item">
                                    <a href="/sign-up.html" class="yellow-btn btn btn-primary">Create Your Builder Profile</a>
                                </li>
                                <li class="header-menu-item"><a href="{{ route('home.signin') }}" class="login-btn btn btn-primary">Login</a>
                                </li>
                            </ul>
                            @endguest
                            @auth('frontuser')
                            <ul class="header-menu-list d-flex align-items-center justify-content-end">
                                <li class="header-menu-item"><a href="/">Home</a></li>
                                <li class="header-menu-item"><a href="/">DashBoard</a></li>
                                <li class="header-menu-item"><a href="/">LogOut</a></li>
                               
                            </ul

                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>
</div>