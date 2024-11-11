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
                            <ul class="header-menu-list d-flex align-items-center justify-content-end">
                                @guest('frontuser')

                                <li class="header-menu-item"><a href="{{route('property.list')}}">Properties</a></li>
                                <li class="header-menu-item"><a href="{{ route('home.signin') }}">Post Property Now</a></li>
                                <li class="header-menu-item">
                                    <a href="/" class="yellow-btn btn btn-primary">Create Your Builder Profile</a>
                                </li>
                                <li class="header-menu-item"><a href="{{ route('home.signin') }}" class="login-btn btn btn-primary">Login</a>
                                <a href="{{ route('home.signup') }}" class="signup-btn btn btn-primary">Sign Up</a>   
                            </li>
                                <li class="header-menu-item">
                                </li>
                                @endguest
                                @auth('frontuser')
                                <li class="header-menu-item"><a href="{{route('property.list')}}">Properties</a></li>
                                <li class="header-menu-item"><a href="{{route('frontuser.property.create')}}">Add Property</a></li>
                                <li class="header-menu-item"><a href="{{ route('frontuser.property.index') }}" class="login-btn btn btn-primary">Dashboard</a>
                                </li>
                                <li class="header-menu-item">
                                    <a href="{{ route('logout') }}">Logout
                                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                                        {{--<svg width="28" height="28" viewBox="0 0 28 28" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M14.0001 27.3334C6.63608 27.3334 0.666748 21.3641 0.666748 14.0001C0.666748 6.63608 6.63608 0.666748 14.0001 0.666748C21.3641 0.666748 27.3334 6.63608 27.3334 14.0001C27.3334 21.3641 21.3641 27.3334 14.0001 27.3334ZM7.33341 12.6667V8.66675L0.666748 14.0001L7.33341 19.3334V15.3334H18.0001V12.6667H7.33341Z"
                                                fill="#4E4E4E" />
                                        </svg>--}}
                                    </a>
                                </li>
                                @endauth
                                <li class="header-menu-item">
                                    <div class="input-group autocomplete-search">
										<span>
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
											  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
											</svg>
										</span>
                                        <input type="text" id="builder-search" name="query" class="form-control" placeholder="Builders projects...">
                                        <ul id="autocomplete-results" class="autocomplete-results"></ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>
</div>