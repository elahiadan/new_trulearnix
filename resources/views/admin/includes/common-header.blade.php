<div>

    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item">
                        <a class="nav-link menu-toggle" href="#">
                            <i class="ficon" data-feather="menu"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <ul class="nav navbar-nav align-items-center ml-auto">

                <li class="nav-item dropdown dropdown-user">
                    <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none">
                            <span class="user-name font-weight-bolder">{{ Auth::user()->name }}</span>
                            <span class="user-status">Admin</span>
                        </div>
                        <span class="avatar">
                            @if (auth()->user()->is_admin == 1)
                                <img class="round"
                                    src="{{ asset('admin-assets/app-assets/images/portrait/small/avatar-s-11.jpg') }}"
                                    alt="avatar" height="40" width="40">
                            @else
                                <img class="round"
                                    src="{{ asset('images/vendor/profile/') . '/' . auth()->user()->image }}"
                                    alt="avatar" height="40" width="40">
                            @endif

                            <span class="avatar-status-online"></span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">

                        @if (Auth::user()->is_admin == 1)
                            <a class="dropdown-item" href="{{ route('homepages') }}"><i class="mr-50"
                                    data-feather="home"></i>Home Page</a>

                            <a class="dropdown-item" href="{{ route('cms') }}"><i class="mr-50"
                                    data-feather="file"></i>Pages</a>

                            <a class="dropdown-item" href="{{ route('vendors', ['id' => 1]) }}"><i class="mr-50"
                                    data-feather="users"></i>Users</a>

                            <a class="dropdown-item" href="{{ route('categories') }}"><i class="mr-50"
                                    data-feather="clipboard"></i>Categories</a>

                            <a class="dropdown-item" href="{{ route('referrals') }}"><i class="mr-50"
                                    data-feather="bar-chart"></i>Product Referrals</a>
                        @endif


                        <a class="dropdown-item" href="{{ route('products', ['id' => 1]) }}"><i class="mr-50"
                                data-feather="database"></i>Products</a>





                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('change.password') }}">
                            <i class="mr-50" data-feather="eye"></i>
                            Password
                        </a>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="dropdown-item w-100" type="submit">
                                <i class="mr-50" data-feather="power"></i>
                                Logout
                            </button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto">
                    <a class="navbar-brand" href="{{ route('dashboard') }}">
                        <span class="brand-logo">
                        </span>
                        <img src="{{ url('images/logos', get_setting('site_logo')) }}" alt=""
                            class="logo-img ml-3 mb-3" width="180" height="100">
                    </a>
                </li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="{{ Request::is('admin/dashboard*') ? 'active' : '' }}  nav-item">
                    <a class="d-flex align-items-center" href="{{ route('dashboard') }}">
                        <i data-feather="home"></i>
                        <span class="menu-title text-truncate">Dashboard</span>
                    </a>
                </li>
                @if (Auth::user()->is_admin == 1)
                    <li class="{{ Request::is('admin/homepage*') ? 'active' : '' }} nav-item">
                        <a class="d-flex align-items-center" href="{{ route('homepages') }}">
                            <i data-feather="home"></i>
                            <span class="menu-title text-truncate">Home Page</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/cms*') ? 'active' : '' }} nav-item">
                        <a class="d-flex align-items-center" href="{{ route('cms') }}">
                            <i data-feather="file"></i>
                            <span class="menu-title text-truncate">Pages</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/vendor*') ? 'active' : '' }} nav-item">
                        <a class="d-flex align-items-center">
                            <i data-feather="users"></i>
                            <span class="menu-title text-truncate">Users</span>
                        </a>
                        <ul class="menu-content">
                            <li>
                                <a class="d-flex align-items-center" href="{{ route('vendors', ['id' => 1]) }}">
                                    <i data-feather="circle"></i>
                                    <span class="menu-title text-truncate">Verified</span>
                                </a>
                            </li>
                            @if (Auth::user()->is_admin == 1)
                                <li>
                                    <a class="d-flex align-items-center" href="{{ route('vendors', ['id' => 2]) }}">
                                        <i data-feather="circle"></i>
                                        <span class="menu-title text-truncate">Unverified</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                <li
                    class=" nav-item {{ Request::is('admin/product*') ? 'active' : '' }}">
                    <a class="d-flex align-items-center" href="#">
                        <i data-feather="database"></i>
                        <span class="menu-title text-truncate">Products</span>
                    </a>
                    <ul class="menu-content">
                        <li>
                            <a class="d-flex align-items-center" href="{{ route('products.create') }}">
                                <i data-feather="circle"></i>
                                <span class="menu-item" data-i18n="Preview">Add Products</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-item">
                                <i data-feather="circle"></i>
                                <span class="menu-item" data-i18n="List">Products</span>
                            </a>
                            <ul class="menu-content">
                                <li>
                                    <a class="d-flex align-items-center" href="{{ route('products', ['id' => 1]) }}">
                                        <i data-feather="circle"></i>
                                        <span class="menu-title text-truncate">Verified</span>
                                    </a>
                                </li>
                                @if (Auth::user()->is_admin == 1)
                                    <li>
                                        <a class="d-flex align-items-center"
                                            href="{{ route('products', ['id' => 2]) }}">
                                            <i data-feather="circle"></i>
                                            <span class="menu-title text-truncate">Unverified</span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                </li>

                @if (Auth::user()->is_admin == 1)
                    <li class="nav-item {{ Request::is('admin/categor*') ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{{ route('categories') }}">
                            <i data-feather="file"></i>
                            <span class="menu-item" data-i18n="Preview">Categories</span>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('admin/referr*') ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{{ route('referrals') }}">
                            <i data-feather="bar-chart"></i>
                            <span class="menu-title text-truncate">Product Referrals</span>
                        </a>
                    </li>
                @endif

                <li class=" nav-item {{ Request::is('admin/quote*') ? 'active' : '' }}">
                    <a class="d-flex align-items-center" href="#">
                        <i data-feather="clipboard"></i>
                        <span class="menu-title text-truncate">Leads</span>
                    </a>
                    <ul class="menu-content">
                        <li>
                            <a class="d-flex align-items-center" href="{{ route('quotes', ['id' => 1]) }}">
                                <i data-feather="circle"></i>
                                <span class="menu-item" data-i18n="List">New</span>
                            </a>
                        </li>
                        <li>
                            <a class="d-flex align-items-center" href="{{ route('quotes', ['id' => 2]) }}">
                                <i data-feather="circle"></i>
                                <span class="menu-item" data-i18n="Preview">Junk</span>
                            </a>
                        </li>
                        <li>
                            <a class="d-flex align-items-center" href="{{ route('quotes', ['id' => 3]) }}">
                                <i data-feather="circle"></i>
                                <span class="menu-title text-truncate">Contacted</span>
                            </a>
                        </li>
                    </ul>
                </li>

                @if (Auth::user()->is_admin == 1)
                    <li class="{{ Request::is('admin/setting*') ? 'active' : '' }} nav-item">
                        <a class="d-flex align-items-center">
                            <i data-feather="settings"></i>
                            <span class="menu-title text-truncate">Settings</span>
                        </a>
                        <ul class="menu-content mb-5">
                            <li>
                                <a class="d-flex align-items-center" href="{{ route('settings') }}">
                                    <i data-feather="circle"></i>
                                    <span class="menu-item" data-i18n="Preview">Basic Info</span>
                                </a>
                            </li>
                            <!-- <li>
                                <a class="d-flex align-items-center" href="{{ route('settings.social.login') }}">
                                    <i data-feather="circle"></i>
                                    <span class="menu-item" data-i18n="Preview">Social Login</span>
                                </a>
                            </li>
                            <li>
                                <a class="d-flex align-items-center" href="{{ route('settings.smtp') }}">
                                    <i data-feather="circle"></i>
                                    <span class="menu-item" data-i18n="Preview">SMTP</span>
                                </a>
                            </li>
                            <li>
                                <a class="d-flex align-items-center" href="{{ route('settings.payment') }}">
                                    <i data-feather="circle"></i>
                                    <span class="menu-item" data-i18n="Preview">Payment</span>
                                </a>
                            </li>
                            <li>
                                <a class="d-flex align-items-center" href="{{ route('settings.file.system') }}">
                                    <i data-feather="circle"></i>
                                    <span class="menu-item" data-i18n="Preview">File System</span>
                                </a>
                            </li>
                            <li>
                                <a class="d-flex align-items-center" href="{{ route('settings.feature.activate') }}">
                                    <i data-feather="circle"></i>
                                    <span class="menu-item" data-i18n="Preview">Feature Activate</span>
                                </a>
                            </li>
                            <li>
                                <a class="d-flex align-items-center" href="{{ route('settings.tax') }}">
                                    <i data-feather="circle"></i>
                                    <span class="menu-item" data-i18n="Preview">Tax</span>
                                </a>
                            </li> -->
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->

</div>
