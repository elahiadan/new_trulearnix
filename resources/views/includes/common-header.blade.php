<!-- Start Header Area -->
<header class="rbt-header rbt-header-10">
    <div class="rbt-sticky-placeholder"></div>

    <!-- Start Header Top  -->
    <div
        class="rbt-header-top rbt-header-top-1 header-space-betwween bg-not-transparent bg-color-darker top-expended-activation">
        <div class="container-fluid">
            <div class="top-expended-wrapper">
                <div class="top-expended-inner rbt-header-sec align-items-center ">
                    <div class="rbt-header-sec-col rbt-header-left d-none d-xl-block">
                        <div class="rbt-header-content">
                            <!-- Start Header Information List  -->
                            <div class="header-info">
                                <ul class="rbt-information-list">
                                    <li>
                                        <a href="#"><i class="fab fa-instagram"></i><span class="d-none d-xxl-block">{{ get_setting('site_email') }}</span></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-facebook-square"></i><span class="d-none d-xxl-block">{{ get_setting('site_contact_no') }}</span></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="feather-phone"></i>{{ get_setting('site_whatsapp_no') }}</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Header Information List  -->
                        </div>
                    </div>

                    <div class="rbt-header-sec-col rbt-header-right mt_md--10 mt_sm--10">
                        <div class="rbt-header-content justify-content-start justify-content-lg-end">
                            <div class="header-info d-none d-xl-block">
                                <ul class="social-share-transparent">
                                    <li>
                                        <a href="{{ get_setting('site_facebook_link') }}"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li>
                                        <a href="{{ get_setting('site_twitter_link') }}"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="{{ get_setting('site_linkedin_link') }}"><i class="fab fa-linkedin-in"></i></a>
                                    </li>
                                    <li>
                                        <a href="{{ get_setting('site_instagram_link') }}"><i class="fab fa-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>

                            <div class="rbt-separator d-none d-xl-block"></div>

                            <div class="header-info">
                                <ul class="rbt-dropdown-menu currency-menu">
                                    <li class="has-child-menu">
                                        <a href="#">
                                            <span class="menu-item">{{session('currecy') ?? 'INR' }}</span>
                                            <i class="right-icon feather-chevron-down"></i>
                                        </a>
                                        <ul class="sub-menu hover-reverse">
                                            @foreach (allCurrencies() as $item)
                                            <li>
                                                <a href="#">
                                                    <span class="menu-item">{{ $item->currency_code }} <img src="{{ $item->flag }}" width="22"></span>
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-info">
                    <div class="top-bar-expended d-block d-lg-none">
                        <button class="topbar-expend-button rbt-round-btn"><i class="feather-plus"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top  -->
    <div class="rbt-header-wrapper header-space-betwween header-sticky">
        <div class="container-fluid">
            <div class="mainbar-row rbt-navigation-center align-items-center">
                <div class="header-left rbt-header-content">
                    <div class="header-info">
                        <div class="logo logo-dark">
                            <a href="{{route('home')}}">
                                <img src="{{ url('images/logos', get_setting('site_logo')) }}" alt="TruLearnix Logo Images">
                            </a>
                        </div>

                        <div class="logo d-none logo-light">
                            <a href="{{route('home')}}">
                                <img src="{{ url('images/logos', get_setting('site_logo')) }}" alt="TruLearnix Logo Images">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="rbt-main-navigation d-none d-xl-block">
                    <nav class="mainmenu-nav">
                        <ul class="mainmenu">
                            <li class="with-megamenu has-menu-child-item">
                                <a href="{{route('home')}}">Home <i class="feather-chevron-down"></i></a>
                            </li>

                            <li class="with-megamenu has-menu-child-item">
                                <a href="{{route('about')}}">About <i class="feather-chevron-down"></i></a>
                            </li>

                            <li class="with-megamenu has-menu-child-item">
                                <a href="{{route('contact')}}">Contact<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="6 9 12 15 18 9"></polyline></svg></a>
                            </li>
                            <li class="with-megamenu has-menu-child-item">
                                <a href="{{route('faqs')}}">FAQs<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="6 9 12 15 18 9"></polyline></svg></a>
                            </li>

                        </ul>
                    </nav>
                </div>

                <div class="header-right">

                    <!-- Navbar Icons -->
                    <ul class="quick-access">
                        <li class="access-icon">
                            <a class="search-trigger-active rbt-round-btn" href="#">
                               <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                            </a>
                        </li>

                        <li class="access-icon rbt-mini-cart">
                            <a class="rbt-cart-sidenav-activation rbt-round-btn" href="{{route('user.cart')}}">
                                <i class="feather-shopping-cart"></i>
                                <span class="rbt-cart-count">4</span>
                            </a>
                        </li>

                        <li class="account-access rbt-user-wrapper d-none d-xl-block">
                            <a href="#"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></i>Admin</a>
                            <div class="rbt-user-menu-list-wrapper">
                                <div class="inner">
                                    <div class="rbt-admin-profile">
                                        <div class="admin-thumbnail">
                                            <img src="{{asset('assets/images/team/1-small.png')}}" alt="User Images">
                                        </div>
                                        <div class="admin-info">
                                            <span class="name">RainbowIT</span>
                                            <a class="rbt-btn-link color-primary" href="{{route('user.dashboard')}}">View
                                                Profile</a>
                                        </div>
                                    </div>
                                    <ul class="user-list-wrapper">
                                        <li>
                                            <a href="instructor-dashboard.html">
                                                <i class="feather-home"></i>
                                                <span>My Dashboard</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="feather-bookmark"></i>
                                                <span>Bookmark</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="instructor-enrolled-courses.html">
                                                <i class="feather-shopping-bag"></i>
                                                <span>Enrolled Courses</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="instructor-wishlist.html">
                                                <i class="feather-heart"></i>
                                                <span>Wishlist</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="instructor-reviews.html">
                                                <i class="feather-star"></i>
                                                <span>Reviews</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="instructor-my-quiz-attempts.html">
                                                <i class="feather-list"></i>
                                                <span>My Quiz Attempts</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="instructor-order-history.html">
                                                <i class="feather-clock"></i>
                                                <span>Order History</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="instructor-quiz-attempts.html">
                                                <i class="feather-message-square"></i>
                                                <span>Question & Answer</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <hr class="mt--10 mb--10">
                                    <ul class="user-list-wrapper">
                                        <li>
                                            <a href="#">
                                                <i class="feather-book-open"></i>
                                                <span>Getting Started</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <hr class="mt--10 mb--10">
                                    <ul class="user-list-wrapper">
                                        <li>
                                            <a href="instructor-settings.html">
                                                <i class="feather-settings"></i>
                                                <span>Settings</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="index.html">
                                                <i class="feather-log-out"></i>
                                                <span>Logout</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>

                        <li class="access-icon rbt-user-wrapper d-block d-xl-none">
                            <a class="rbt-round-btn" href="#"><i class="feather-user"></i></a>
                            <div class="rbt-user-menu-list-wrapper">
                                <div class="inner">
                                    <div class="rbt-admin-profile">
                                        <div class="admin-thumbnail">
                                            <img src="{{asset('images/logos/68a48f57daff4.jpg')}}" alt="User Images">
                                        </div>
                                        <div class="admin-info">
                                            <span class="name">RainbowIT</span>
                                            <a class="rbt-btn-link color-primary" href="profile.html">View
                                                Profile</a>
                                        </div>
                                    </div>
                                    <ul class="user-list-wrapper">
                                        <li>
                                            <a href="instructor-dashboard.html">
                                                <i class="feather-home"></i>
                                                <span>My Dashboard</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="feather-bookmark"></i>
                                                <span>Bookmark</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="instructor-enrolled-courses.html">
                                                <i class="feather-shopping-bag"></i>
                                                <span>Enrolled Courses</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="instructor-wishlist.html">
                                                <i class="feather-heart"></i>
                                                <span>Wishlist</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="instructor-reviews.html">
                                                <i class="feather-star"></i>
                                                <span>Reviews</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="instructor-my-quiz-attempts.html">
                                                <i class="feather-list"></i>
                                                <span>My Quiz Attempts</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="instructor-order-history.html">
                                                <i class="feather-clock"></i>
                                                <span>Order History</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="instructor-quiz-attempts.html">
                                                <i class="feather-message-square"></i>
                                                <span>Question & Answer</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <hr class="mt--10 mb--10">
                                    <ul class="user-list-wrapper">
                                        <li>
                                            <a href="#">
                                                <i class="feather-book-open"></i>
                                                <span>Getting Started</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <hr class="mt--10 mb--10">
                                    <ul class="user-list-wrapper">
                                        <li>
                                            <a href="instructor-settings.html">
                                                <i class="feather-settings"></i>
                                                <span>Settings</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="index.html">
                                                <i class="feather-log-out"></i>
                                                <span>Logout</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>

                    </ul>

                    <div class="rbt-btn-wrapper d-none d-xl-block">
                        <a class="rbt-btn rbt-marquee-btn marquee-auto btn-border-gradient radius-round btn-sm hover-transform-none"
                            href="#">
                            <span data-text="Enroll Now">Enroll Now</span>
                        </a>
                    </div>

                    <!-- Start Mobile-Menu-Bar -->
                    <div class="mobile-menu-bar d-block d-xl-none">
                        <div class="hamberger">
                            <button class="hamberger-button rbt-round-btn">
                                <i class="feather-menu"></i>
                            </button>
                        </div>
                    </div>
                    <!-- Start Mobile-Menu-Bar -->

                </div>
            </div>
        </div>
        <!-- Start Search Dropdown  -->
        <div class="rbt-search-dropdown">
            <div class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="#">
                            <input type="text" placeholder="What are you looking for?">
                            <div class="submit-btn">
                                <a class="rbt-btn btn-gradient btn-md" href="#">Search</a>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="rbt-separator-mid">
                    <hr class="rbt-separator m-0">
                </div>

                <div class="row g-4 pt--30 pb--60">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h5 class="rbt-title-style-2">Our Top Course</h5>
                        </div>
                    </div>

                    <!-- Start Single Card  -->
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="rbt-card variation-01 rbt-hover">
                            <div class="rbt-card-img">
                                <a href="course-details.html">
                                    <img src="{{asset('assets/images/product/1.png')}}" alt="Card image">
                                </a>
                            </div>
                            <div class="rbt-card-body">
                                <h5 class="rbt-card-title"><a href="course-details.html">React Js</a>
                                </h5>
                                <div class="rbt-review">
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <span class="rating-count"> (15 Reviews)</span>
                                </div>
                                <div class="rbt-card-bottom">
                                    <div class="rbt-price">
                                        <span class="current-price">$15</span>
                                        <span class="off-price">$25</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Card  -->

                    <!-- Start Single Card  -->
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="rbt-card variation-01 rbt-hover">
                            <div class="rbt-card-img">
                                <a href="course-details.html">
                                    <img src="{{asset('assets/images/product/2.png')}}" alt="Card image">
                                </a>
                            </div>
                            <div class="rbt-card-body">
                                <h5 class="rbt-card-title"><a href="course-details.html">Java Program</a>
                                </h5>
                                <div class="rbt-review">
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <span class="rating-count"> (15 Reviews)</span>
                                </div>
                                <div class="rbt-card-bottom">
                                    <div class="rbt-price">
                                        <span class="current-price">$10</span>
                                        <span class="off-price">$40</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Card  -->

                    <!-- Start Single Card  -->
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="rbt-card variation-01 rbt-hover">
                            <div class="rbt-card-img">
                                <a href="course-details.html">
                                    <img src="{{asset('assets/images/product/3.png')}}" alt="Card image">
                                </a>
                            </div>
                            <div class="rbt-card-body">
                                <h5 class="rbt-card-title"><a href="course-details.html">Web Design</a>
                                </h5>
                                <div class="rbt-review">
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <span class="rating-count"> (15 Reviews)</span>
                                </div>
                                <div class="rbt-card-bottom">
                                    <div class="rbt-price">
                                        <span class="current-price">$10</span>
                                        <span class="off-price">$20</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Card  -->

                    <!-- Start Single Card  -->
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="rbt-card variation-01 rbt-hover">
                            <div class="rbt-card-img">
                                <a href="course-details.html">
                                    <img src="{{asset('assets/images/product/4.png')}}" alt="Card image">
                                </a>
                            </div>
                            <div class="rbt-card-body">
                                <h5 class="rbt-card-title"><a href="course-details.html">Web Design</a>
                                </h5>
                                <div class="rbt-review">
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <span class="rating-count"> (15 Reviews)</span>
                                </div>
                                <div class="rbt-card-bottom">
                                    <div class="rbt-price">
                                        <span class="current-price">$20</span>
                                        <span class="off-price">$40</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Card  -->
                </div>

            </div>
        </div>
        <!-- End Search Dropdown  -->
    </div>
    <!-- Start Side Vav -->
    <div class="rbt-offcanvas-side-menu rbt-category-sidemenu">
        <div class="inner-wrapper">
            <div class="inner-top">
                <div class="inner-title">
                    <h4 class="title">Course Category</h4>
                </div>
                <div class="rbt-btn-close">
                    <button class="rbt-close-offcanvas rbt-round-btn"><i class="feather-x"></i></button>
                </div>
            </div>
            <nav class="side-nav w-100">
                <ul class="rbt-vertical-nav-list-wrapper vertical-nav-menu">
                    <li class="vertical-nav-item">
                        <a href="#">Course School</a>
                        <div class="vartical-nav-content-menu-wrapper">
                            <div class="vartical-nav-content-menu">
                                <h3 class="rbt-short-title">Course Title</h3>
                                <ul class="rbt-vertical-nav-list-wrapper">
                                    <li><a href="#">Web Design</a></li>
                                    <li><a href="#">Art</a></li>
                                    <li><a href="#">Figma</a></li>
                                    <li><a href="#">Adobe</a></li>
                                </ul>
                            </div>
                            <div class="vartical-nav-content-menu">
                                <h3 class="rbt-short-title">Course Title</h3>
                                <ul class="rbt-vertical-nav-list-wrapper">
                                    <li><a href="#">Photo</a></li>
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">Math</a></li>
                                    <li><a href="#">Read</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="vertical-nav-item">
                        <a href="#">Online School</a>
                        <div class="vartical-nav-content-menu-wrapper">
                            <div class="vartical-nav-content-menu">
                                <h3 class="rbt-short-title">Course Title</h3>
                                <ul class="rbt-vertical-nav-list-wrapper">
                                    <li><a href="#">Photo</a></li>
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">Math</a></li>
                                    <li><a href="#">Read</a></li>
                                </ul>
                            </div>
                            <div class="vartical-nav-content-menu">
                                <h3 class="rbt-short-title">Course Title</h3>
                                <ul class="rbt-vertical-nav-list-wrapper">
                                    <li><a href="#">Web Design</a></li>
                                    <li><a href="#">Art</a></li>
                                    <li><a href="#">Figma</a></li>
                                    <li><a href="#">Adobe</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="vertical-nav-item">
                        <a href="#">kindergarten</a>
                        <div class="vartical-nav-content-menu-wrapper">
                            <div class="vartical-nav-content-menu">
                                <h3 class="rbt-short-title">Course Title</h3>
                                <ul class="rbt-vertical-nav-list-wrapper">
                                    <li><a href="#">Photo</a></li>
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">Math</a></li>
                                    <li><a href="#">Read</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="vertical-nav-item">
                        <a href="#">Classic LMS</a>
                        <div class="vartical-nav-content-menu-wrapper">
                            <div class="vartical-nav-content-menu">
                                <h3 class="rbt-short-title">Course Title</h3>
                                <ul class="rbt-vertical-nav-list-wrapper">
                                    <li><a href="#">Web Design</a></li>
                                    <li><a href="#">Art</a></li>
                                    <li><a href="#">Figma</a></li>
                                    <li><a href="#">Adobe</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="read-more-btn">
                    <div class="rbt-btn-wrapper mt--20">
                        <a class="rbt-btn btn-border-gradient radius-round btn-sm hover-transform-none w-100 justify-content-center text-center"
                            href="#">
                            <span>Learn More</span>
                        </a>
                    </div>
                </div>
            </nav>
            <div class="rbt-offcanvas-footer">

            </div>
        </div>
    </div>
    <!-- End Side Vav -->
    <a class="rbt-close_side_menu" href="javascript:void(0);"></a>

</header>