<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">
            <li class="nav-item">
                <a href="{{ route("admin.home") }}" class="nav-link">
                    <i class="nav-icon fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('users_manage')
            {{-- <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users nav-icon">

                    </i>
                   UI Sections
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a href="{{ route("admin.abilities.index") }}" class="nav-link {{ request()->is('admin/abilities') || request()->is('admin/abilities/*') ? 'active' : '' }}">
            <i class="fas fa-home nav-icon"></i>
            Home Page
            </a>
            </li>
        </ul>
        </li> --}}
        <li class="nav-item nav-dropdown">
            <a class="nav-link  nav-dropdown-toggle" href="#">
                <i class="fas fa-money-bill-wave nav-icon"></i>
                Subscription
            </a>
            <ul class="nav-dropdown-items">
                <li class="nav-item">
                    <a href="{{ route("admin.subscription.plan") }}" class="nav-link">
                        <i class="fas fa-clipboard-list nav-icon"></i>
                        Plans
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route("admin.user.subscription") }}" class="nav-link">
                    <i class="fas fa-receipt nav-icon"></i>
                        User Subscription
                    </a>
                </li>
            </ul>
        </li>


        <li class="nav-item nav-dropdown">
            <a class="nav-link  nav-dropdown-toggle" href="#">
                <i class="fa-fw fas fa-users nav-icon">

                </i>
                {{ trans('cruds.userManagement.title') }}
            </a>
            <ul class="nav-dropdown-items">
                <li class="nav-item">
                    <a href="{{ route("admin.abilities.index") }}" class="nav-link {{ request()->is('admin/abilities') || request()->is('admin/abilities/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-unlock-alt nav-icon">

                        </i>
                        {{ trans('cruds.ability.title') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-briefcase nav-icon">

                        </i>
                        {{ trans('cruds.role.title') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-user nav-icon">

                        </i>
                        {{ trans('cruds.user.title') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route("admin.testimonials.index") }}" class="nav-link {{ request()->is('admin/testimonials') || request()->is('admin/testimonials/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-quote-left nav-icon">

                        </i>
                        {{ trans('cruds.testimonials.title') }}
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="{{ route('admin.content.index') }}" class="nav-link {{ request()->is('admin/content') || request()->is('admin/content/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-quote-left nav-icon">

                        </i>
                        Content
                    </a>
                </li> --}}
            </ul>
        </li>

        <li class="nav-item nav-dropdown">
            <a class="nav-link  nav-dropdown-toggle" href="#">
                <i class="fas fa-flag  nav-icon"></i>

                </i>
                {{ trans('cruds.propertyManagement.title') }}
            </a>
            <ul class="nav-dropdown-items">
                <li class="nav-item">
                    <a href="{{ route("admin.amenity.index") }}" class="nav-link {{ request()->is('admin/amenity') || request()->is('admin/amenity/*') ? 'active' : '' }}">
                        <i class="fas fa-bath nav-icon"></i>

                        </i>
                        {{ trans('cruds.amenity.title') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route("admin.propertytype.index") }}" class="nav-link {{ request()->is('admin/propertytype') || request()->is('admin/propertytype/*') ? 'active' : '' }}">
                        <i class="fas fa-monument nav-icon"></i>
                        </i>
                        {{ trans('cruds.types.title') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route("admin.vastu.index") }}" class="nav-link {{ request()->is('admin/vastu') || request()->is('admin/vastu/*') ? 'active' : '' }}">
                        <i class="fas fa-sun nav-icon"></i>
                        </i>
                        {{ trans('cruds.vastu.title') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route("admin.preference.index") }}" class="nav-link {{ request()->is('admin/preference') || request()->is('admin/preference/*') ? 'active' : '' }}">
                        <i class="fas fa-map-marker-alt nav-icon"></i>

                        </i>
                        {{ trans('cruds.preferences.title') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route("admin.property.index") }}" class="nav-link {{ request()->is('admin/property') || request()->is('admin/property/*') ? 'active' : '' }}">
                        <i class="fas fa-building nav-icon"></i>

                        </i>
                        {{ trans('cruds.property.title') }}
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item nav-dropdown">
            <a class="nav-link  nav-dropdown-toggle" href="#">
                <i class="fa fa-building nav-icon"></i>
                Builder Management
            </a>
            <ul class="nav-dropdown-items">  
            <li class="nav-item">
                    <a href="{{route('admin.builders.requests')}}" class="nav-link {{ request()->is('admin/builders') || request()->is('admin/builders/*') ? 'active' : '' }}">
                    <i class="fa fa-file-text nav-icon" aria-hidden="true"></i>
                        Builder Requests
                    </a>
                </li>        
                <li class="nav-item">
                    <a href="{{route('admin.card.create')}}" class="nav-link {{ request()->is('admin/cards') || request()->is('admin/cards/*') ? 'active' : '' }}">
                        <i class="fa fa-file-image-o nav-icon" aria-hidden="true"></i>
                        Cards
                    </a>
                </li>
            </ul>
        </li>


       <li class="nav-item nav-dropdown">
            <a class="nav-link  nav-dropdown-toggle" href="#">
                <i class="fas fa-flag  nav-icon"></i>

                </i>
                Sliders
            </a>
            <ul class="nav-dropdown-items">                
                <li class="nav-item">
                    <a href="{{ route('admin.sliders.index') }}" class="nav-link {{ request()->is('admin/sliders') || request()->is('admin/sliders/*') ? 'active' : '' }}">
                        <i class="fa fa-sliders nav-icon"></i>

                        </i>
                        Sliders List
                    </a>
                </li>
            </ul>
        </li> 
        <li class="nav-item">
            <a href="{{ route('admin.contactqueries.list') }}" class="nav-link {{ request()->is('contactqueries') ? 'active' : '' }}">
                <i class="nav-icon fas fa-comment-alt"></i>
                Queries
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.visitors.list') }}" class="nav-link {{ request()->is('visitors') ? 'active' : '' }}">
            <i class="nav-icon fa fa-motorcycle"></i>
                Visitors
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.leads.list') }}" class="nav-link {{ request()->is('leads') ? 'active' : '' }}">
            <i class="nav-icon fa fa-line-chart"></i>
                Leads
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.blogs.index') }}" class="nav-link {{ request()->is('blogs') ? 'active' : '' }}">
            <i class="nav-icon fa fa-rss" aria-hidden="true"></i>
                Blogs
            </a>
        </li>
        @endcan

        @if(Auth::user()->user_level == 2)
        <li class="nav-item nav-dropdown">
            <a class="nav-link  nav-dropdown-toggle" href="#">
                <i class="fas fa-flag  nav-icon"></i>

                </i>
                {{ trans('cruds.propertyManagement.title') }}
            </a>
            <ul class="nav-dropdown-items">              
                <li class="nav-item">
                    <a href="{{ route("adminuser.property.index") }}" class="nav-link {{ request()->is('adminuser/property') || request()->is('adminuser/property/*') ? 'active' : '' }}">
                        <i class="fas fa-building nav-icon"></i>

                        </i>
                        {{ trans('cruds.property.title') }}
                    </a>
                </li>
            </ul>
        </li>
        @endif

        @can('assistance')
        <li class="nav-item">
            <a href="{{ route('admin.assigned.queries') }}" class="nav-link {{ request()->is('assigned') ? 'active' : '' }}">
                <i class="nav-icon fas fa-comment-alt"></i>
                Assigned Queries
            </a>
        </li>
        @endcan
        <li class="nav-item">
            <a href="{{ route('auth.change_password') }}" class="nav-link {{ request()->is('change_password') ? 'active' : '' }}">
                <i class="nav-icon fas fa-fw fa-key">

                </i>
                Change Password
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
        </ul>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>