<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="html/ltr/vertical-menu-template/index.html">
                    <div class="brand-logo"></div>
                    <h2 class="brand-text mb-0">Ashion</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" navigation-header"><span>Services</span>
            </li>
            <li class=" nav-item">
                <a href="{{ url('admin/dashboard') }}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Email">Dashboard</span>
                </a>
            </li>
            <li class=" nav-item">
                <a href="{{ route('category.index') }}"><i class="feather icon-menu"></i><span class="menu-title" data-i18n="Email">Categories</span>
                </a>
            </li>
            <li class=" nav-item">
                <a href="{{ route('product.index') }}"><i class="feather icon-list"></i><span class="menu-title" data-i18n="Email">Products</span>
                </a>
            </li>
            <li class=" nav-item">
                <a href="{{ route('specification.index') }}"><i class="feather icon-server"></i><span class="menu-title" data-i18n="Email">Specifications</span>
                </a>
            </li>
           {{-- @can('permissions.index') --}}
            <li class=" nav-item">
                <a href="{{ route('permissions.index') }}"><i class="feather icon-lock"></i><span class="menu-title" data-i18n="Email">Permissions</span>
                </a>
            </li>
           {{-- @endcan --}}
           {{-- @can('roles.index') --}}
            <li class=" nav-item">
                <a href="{{ route('roles.index') }}"><i class="feather icon-unlock"></i><span class="menu-title" data-i18n="Email">Roles</span>
                </a>
            </li>
           {{-- @endcan --}}
               {{-- @can('users.index') --}}
            <li class=" nav-item">
                <a href="{{ route('users.index') }}"><i class="feather icon-users"></i><span class="menu-title" data-i18n="Email">Users</span> 
                </a>
            </li>
        {{-- @endcan --}}
        
        <li class=" nav-item">
            <a href="{{route('email')}}"><i class="feather icon-mail"></i><span class="menu-title" data-i18n="Email">Emails</span>
            </a>
        </li>
        <li class=" nav-item">
            <a href="{{ route('order.index') }}"><i class="feather icon-shopping-cart"></i><span class="menu-title" data-i18n="Email">Orders</span>
            </a>
        </li>
        <li class=" nav-item">
            <a href="{{ route('home') }}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Email">Home Page</span>
            </a>
        </li>
        </ul>
    </div>
</div>
