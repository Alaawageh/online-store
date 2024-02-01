<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>@yield('title', 'online store')</title>
    <meta name="robots" content="index, follow"/>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>

    <!-- favicons -->
    <link rel="shortcut icon" href="images/favicon.ico">

    <!-- Style CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/fonts/jost/stylesheet.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/libs/line-awesome/css/line-awesome.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/libs/fontawesome-pro/css/fontawesome.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/libs/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/libs/slick/slick-theme.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/libs/slick/slick.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/libs/quilljs/css/quill.bubble.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/libs/quilljs/css/quill.core.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/libs/quilljs/css/quill.snow.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/libs/chosen/chosen.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/libs/datetimepicker/jquery.datetimepicker.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/libs/venobox/venobox.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/responsive.css') }}" />
    <!-- jQuery -->
    <script src="{{asset('frontend/js/jquery-1.12.4.js') }}"></script>
    <script src="{{asset('frontend/libs/popper/popper.js') }}"></script>
    <script src="{{asset('frontend/libs/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{asset('frontend/libs/slick/slick.min.js') }}"></script>
    <script src="{{asset('frontend/libs/slick/jquery.zoom.min.js') }}"></script>
    <script src="{{asset('frontend/libs/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{asset('frontend/libs/quilljs/js/quill.core.js') }}"></script>
    <script src="{{asset('frontend/libs/quilljs/js/quill.js') }}"></script>
    <script src="{{asset('frontend/libs/chosen/chosen.jquery.min.js') }}"></script>
    <script src="{{asset('frontend/libs/datetimepicker/jquery.datetimepicker.full.min.js') }}"></script>
    <script src="{{asset('frontend/libs/venobox/venobox.min.js') }}"></script>
    <script src="{{asset('frontend/libs/waypoints/jquery.waypoints.min.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script> 
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>  --}}

    <!-- orther script -->
    <script src="{{asset('frontend/js/main.js') }}"></script>
</head>

<body>
<div id="wrapper">
    <header id="header" class="site-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6 col-5">
                    <div class="site">
                        <div class="site__menu">
                            <a title="Menu Icon" href="#" class="site__menu__icon">
                                <i class="las la-bars la-24-black"></i>
                            </a>
                            <div class="popup-background"></div>
                            <div class="popup popup--left">
                                <a title="Close" href="#" class="popup__close">
                                    <i class="las la-times la-24-black"></i>
                                </a><!-- .popup__close -->
                                <div class="popup__content">
                                    <div class="popup__user popup__box open-form">
                                        @guest
                                            <a title="Login" href="#" class="open-login">Login</a>
                                            <a title="Sign Up" href="#" class="open-signup">Sign Up</a>
                                        @else
                                            <a title="Login" href="#" class="open-login">{{ Auth::user()->name }}</a>
                                        @endguest
                                    </div><!-- .popup__user -->
                                    <div class="popup__destinations popup__box">
                                        <ul class="menu-arrow">
                                            <li>
                                                <a title="Destinations" href="#">Destinations </a>
                                                <ul class="sub-menu">
                                                    <li><a href="city-details-1.html" title="Tokyo">Tokyo</a></li>
                                                    <li><a href="city-details-1.html" title="New York">New York</a></li>
                                                    <li><a href="city-details-1.html" title="Barcelona">Barcelona</a></li>
                                                    <li><a href="city-details-1.html" title="Amsterdam">Amsterdam</a></li>
                                                    <li><a href="city-details-1.html" title="Los Angeles">Los Angeles</a></li>
                                                    <li><a href="city-details-1.html" title="London">London</a></li>
                                                    <li><a href="city-details-1.html" title="Bangkok">Bangkok</a></li>
                                                    <li><a href="city-details-1.html" title="Paris">Paris</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="popup__menu popup__box">
                                        <ul class="menu-arrow">
                                            <li>
                                                <a href="#" title="Demos">Demos</a>
                                                <ul class="sub-menu">
                                                    <li><a class="nav-link" href="{{ route('users.index') }}">Manage Users</a></li>
                                                    <li><a href="home-business.html" title="Business Listing">Business Listing</a></li>
                                                    <li><a href="home-countryguide.html" title="Country Travel Guide">Country Travel Guide</a></li>
                                                    <li><a href="home-cityguide.html" title="City Travel Guide">City Travel Guide</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#" title="Listings">Listings</a>
                                                <ul class="sub-menu">
                                                    <li>
                                                        <a href="#" title="Search Layout">Search Layout</a>
                                                        <ul class="sub-menu">
                                                            <li><a href="ex-half-map-1.html" title="Half Map – Left Filter">Half Map – Left Filter</a></li>
                                                            <li><a href="ex-half-map-2.html" title="Half Map – Top Filter">Half Map – Top Filter</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="City Layout">City Layout</a>
                                                        <ul class="sub-menu">
                                                            <li><a href="city-details-1.html" title="Half Map – Left Filter">Half Map – Left Filter</a></li>
                                                            <li><a href="city-details-2.html" title="Half Map – Top Filter">Half Map – Top Filter</a></li>
                                                            <li><a href="city-details-3.html" title="Without Map">Without Map</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="Listing Detail">Single Layout</a>
                                                        <ul class="sub-menu">
                                                            <li><a href="single-1.html" title="Carousel">Default - Carousel</a></li>
                                                            <li><a href="single-2.html" title="Image">Default - Image</a></li>
                                                            <li><a href="single-3.html" title="Restaurant">Restaurant Type</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="Booking Type">Booking Type</a>
                                                        <ul class="sub-menu">
                                                            <li><a href="bk-booking-form.html" title="Appointment Booking">Appointment Booking</a></li>
                                                            <li><a href="bk-enquiry-form.html" title="Enquiry Form">Enquiry Form</a></li>
                                                            <li><a href="bk-affiliate-link.html" title="Affiliate Link">Affiliate Link</a></li>
                                                            <li><a href="bk-banner-ads.html" title="Affiliate Banner">Affiliate Banner</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a title="Page" href="#">Page</a>
                                                <ul class="sub-menu">
                                                    <li><a title="About" href="about-us.html">About Us</a></li>
                                                    <li><a title="FAQ's" href="faqs.html">FAQ's</a></li>
                                                    <li><a title="App Landing" href="app-landing.html">App Landing</a></li>
                                                    <li><a title="Contacts" href="contact-us.html">Contacts</a></li>
                                                    <li><a title="Add Listing" href="add-place.html">Add Listing</a></li>
                                                    <li><a title="Pricing" href="">Pricing</a>
                                                        <ul class="sub-menu">
                                                            <li><a title="Pricing Plan" href="pricing-plan.html">Pricing Plan</a></li>
                                                            <li><a title="Pricing Plan Checkout" href="pricing-checkout.html">Pricing Checkout</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a title="Page" href="#">Shop</a>
                                                        <ul class="sub-menu">
                                                            <li><a title="Products" href="shop.html">Products</a></li>
                                                            <li><a title="Product Detail" href="shop-detail.html">Product Detail</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a title="Page" href="#">Blog</a>
                                                        <ul class="sub-menu">
                                                            <li><a title="Fullwidth" href="blog-fullwidth.html">Fullwidth</a></li>
                                                            <li><a title="Right Sidebar" href="blog-right-sidebar.html">Right Sidebar</a></li>
                                                            <li><a title="Blog Detail" href="blog-detail.html">Blog Detail</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a title="Owner Dashboard" href="owner-dashboard.html">Owner Dashboard</a></li>
                                                    <li><a title="Owner Single" href="owner-page.html">Owner Single</a></li>
                                                    <li><a title="Construction" href="construction.html">Construction</a></li>
                                                    <li><a title="Coming Soon" href="coming-soon.html">Coming Soon </a></li>
                                                    <li><a title="404" href="404.html">404 Page</a></li>
                                                </ul>
                                            </li>

                                        </ul>
                                    </div><!-- .popup__menu -->
                                </div><!-- .popup__content -->
                                <div class="popup__button popup__box">
                                    <a title="Add place" href="add-place.html" class="btn">
                                        <i class="la la-plus"></i>
                                        <span>Add place</span>
                                    </a>
                                </div><!-- .popup__button -->
                            </div><!-- .popup -->
                        </div><!-- .site__menu -->
                        <div class="site__brand">
                            <a title="Logo" href="home-restaurant.html" class="site__brand__logo"><img src="{{ asset('frontend/images/assets/logo.png') }}" alt="Golo"></a>
                        </div><!-- .site__brand -->

                    </div><!-- .site -->
                </div><!-- .col-md-6 -->
                <div class="col-xl-6 col-7">
                    <div class="right-header align-right">
                        <nav class="main-menu">
                            <ul>
                                @if (getCategories()->isNotEmpty())
                                    @foreach (getCategories() as $category)
                                    <li>
                                        <a href="{{route('show.item',$category->id)}}" title="{{$category->name}}">{{$category->name}}</a>
                
                                    </li>
                                    @endforeach                                    
                                @endif
                               
                                @if (auth()->user() && Auth::user()->hasRole('admin'))
                                <li>
                                    <a title="AdminPanel" href="{{url('dashboard')}}">Admin Panel</a>
                                   
                                </li> 
                                @endif
                            </ul>
                        </nav>
                        <div class="right-header__login">
                            @guest
                                <a title="Login" href="{{route('login')}}">Login</a>

                            @else
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            @endguest
                        </div><!-- .right-header__login -->
                        {{-- <div class="popup popup-form">
                            <a title="Close" href="#" class="popup__close">
                                <i class="las la-times la-24-black"></i>
                            </a><!-- .popup__close -->
                            <ul class="choose-form">
                                <li class="nav-signup"><a title="Sign Up" href="#signup">Sign Up</a></li>
                                <li class="nav-login"><a title="Log In" href="#login">Log In</a></li>
                            </ul>
                            <p class="choose-more">Continue with <a title="Facebook" class="fb" href="#">Facebook</a> or <a title="Google" class="gg" href="#">Google</a></p>
                            <p class="choose-or"><span>Or</span></p>
                            <div class="popup-content">
                                <form action="#" class="form-sign form-content" id="signup">
                                    <div class="field-inline">
                                        <div class="field-input">
                                            <input type="text" placeholder="First Name" value="" name="first_name">
                                        </div>
                                        <div class="field-input">
                                            <input type="text" placeholder="Last Name" value="" name="last_name">
                                        </div>
                                    </div>
                                    <div class="field-input">
                                        <input type="email" placeholder="Email" value="" name="email">
                                    </div>
                                    <div class="field-input">
                                        <input type="password" placeholder="Password" value="" name="password">
                                    </div>
                                    <div class="field-check">
                                        <label for="accept">
                                            <input type="checkbox" id="accept" value="">
                                            Accept the <a title="Terms" href="#">Terms</a> and <a title="Privacy Policy" href="#">Privacy Policy</a>
                                            <span class="checkmark">
                                                    <i class="la la-check"></i>
                                                </span>
                                        </label>
                                    </div>
                                    <input type="submit" name="submit" value="Sign Up">
                                </form>
                                <form action="#" class="form-log form-content" id="login">
                                    <div class="field-input">
                                        <input type="text" placeholder="Username or Email" value="" name="user">
                                    </div>
                                    <div class="field-input">
                                        <input type="password" placeholder="Password" value="" name="password">
                                    </div>
                                    <a title="Forgot password" class="forgot_pass" href="#">Forgot password</a>
                                    <input type="submit" name="submit" value="Login">
                                </form>
                            </div>
                        </div>
                        <!-- .popup-form --> --}}
                        <div class="right-header__search">
                            <a title="Search" href="#" class="search-open">
                                <i class="las la-search la-24-black"></i>
                            </a>
                            <div class="site__search">
                                <a title="Close" href="#" class="search__close">
                                    <i class="la la-times"></i>
                                </a><!-- .search__close -->
                                <form action="#" class="site__search__form" method="GET">
                                    <div class="site__search__field">
                                            <span class="site__search__icon">
                                                <i class="las la-search la-24-black"></i>
                                            </span><!-- .site__search__icon -->
                                        <input class="site__search__input" type="text" name="s" placeholder="Search places, cities">
                                    </div><!-- .search__input -->
                                </form><!-- .search__form -->
                            </div><!-- .site__search -->
                        </div>
                        {{-- <div class="right-header__button btn"> --}}
                            {{-- <a title="Add place" href="add-place.html">
                                <i class="las la-plus la-24-white"></i>
                                <span>Add Listing</span>
                            </a> --}}
                        {{-- </div><!-- .right-header__button --> --}}
                    </div><!-- .right-header -->
                </div><!-- .col-md-6 -->
            </div><!-- .row -->
        </div><!-- .container-fluid -->
    </header><!-- .site-header -->

    <main id="main" class="site-main overflow">
        @yield('content')
    </main><!-- .site-main -->

    <footer id="footer" class="footer">
        <div class="container">
            <div class="footer__top">
                <div class="row">
                    <div class="col-lg-5">
                    
                    </div>
                    <div class="col-lg-2">
                        <aside class="footer__top__nav">
                            <h3>Company</h3>
                            <ul>
                                <li><a title="About Us" href="06_about-us.html">About Us</a></li>
                                <li><a title="Blog" href="07_blog-right-sidebar.html">Blog</a></li>
                                <li><a title="Faqs" href="15_faqs.html">Faqs</a></li>
                                <li><a title="Contact" href="09_contact-us.html">Contact</a></li>
                            </ul>
                        </aside>
                    </div>
                    <div class="col-lg-2">
                        <aside class="footer__top__nav">
                            <h3>Support</h3>
                            <ul>
                                <li><a title="Get in Touch" href="#">Get in Touch</a></li>
                                <li><a title="Help Center" href="#">Help Center</a></li>
                                <li><a title="Live chat" href="#">Live chat</a></li>
                                <li><a title="How it works" href="#">How it works</a></li>
                            </ul>
                        </aside>
                    </div>
                    <div class="col-lg-3">
                        <aside class="footer__top__nav footer__top__nav--contact">
                            <h3>Contact Us</h3>
                            <p>Email: support@domain.com</p>
                            <p>Phone: 1 (00) 832 2342</p>
                            <ul>
                                <li class="facebook">
                                    <a title="Facebook" href="#">
                                        <i class="la la-facebook-f"></i>
                                    </a>
                                </li>
                                <li class="twitter">
                                    <a title="Twitter" href="#">
                                        <i class="la la-twitter"></i>
                                    </a>
                                </li>
                                <li class="youtube">
                                    <a title="Youtube" href="#">
                                        <i class="la la-youtube"></i>
                                    </a>
                                </li>
                                <li class="instagram">
                                    <a title="Instagram" href="#">
                                        <i class="la la-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </aside>
                    </div>
                </div>
            </div><!-- .top-footer -->
            <div class="footer__bottom">
                <p class="footer__bottom__copyright">2020 &copy; <a title="Uxper Team" href="#">uxper.co</a>. All rights reserved.</p>
            </div><!-- .top-footer -->
        </div><!-- .container -->
    </footer><!-- site-footer -->

   
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close" data-dismiss="modal">x</span>
            <p>Loading...</p>
        </div>

    </div>

</div><!-- #wrapper -->

<script>
    window.base_url = "<?= URL::to('/'); ?>";
</script>

</body>
</html>
