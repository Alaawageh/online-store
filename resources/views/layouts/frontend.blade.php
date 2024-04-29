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
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/extensions/toastr.css') }}">
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

    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/rate.css')}}">
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
    <script src="{{asset('app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
    <script src="{{asset('app-assets/js/scripts/extensions/toastr.js') }}"></script>
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
                                    
                                </div><!-- .popup__content -->
                                <!-- .popup__button -->
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
                                <li>
                                    <a class="active" href="{{route('home')}}" title="home">Home</a>
            
                                </li>
                                <li>
                                    <a href="{{route('categories')}}" title="categories">Categories</a>
            
                                </li>
                                <li>
                                    <a href="{{route('products')}}" title="products">Products</a>
            
                                </li>
                                @if (auth()->user())
                                <li>
                                    <a class="show-cart" title="cart" href="#">Cart</a>
        
                                </li>
                                @endif
                                @if (auth()->user() && Auth::user()->hasRole('Admin'))
                                <li>
                                    <a title="AdminPanel" href="{{url('admin/dashboard')}}">Admin Panel</a>
                                   
                                </li> 
                                @endif
                            </ul>
                        </nav>
                       
                        <div  class="popup__user popup__box open-form">
                            @guest
                                <a title="Login" class="open-login" href="{{route('login')}}">Login</a>

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
                        <div class="popup popup-form">
                            <a title="Close" href="#" class="popup__close">
                                <i class="las la-times la-24-black"></i>
                            </a><!-- .popup__close -->
                            <ul class="choose-form">
                                <li class="nav-signup"><a title="Sign Up" href="#signup">Sign Up</a></li>
                                <li class="nav-login"><a title="Log In" href="#login">Log In</a></li>
                            </ul>
                            <div class="popup-content">
                                <form class="form-log form-content" method="POST" action="{{ route('login') }}" role="search" id="login">
                                    @csrf
                                    <div class="row">
                                      <div class="col-lg-12">
                                        <h4>Login</h4>
                                      </div>
                                      <div class="col-md-12">
                                            <fieldset>
                                              <input id="email" placeholder="email" type="email" class="form-control" name="email" required autocomplete="email" autofocus>
                                                @if ($errors->has('email'))
                                                    <div class="alert alert-danger">{{$errors->first('email')}}</div>
                                                @endif                 
                                            </fieldset>
                                      </div>
                        
                                      <div class="col-md-12">
                                        <fieldset>
                                            <input id="password" placeholder="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                        
                                            @if ($errors->has('password'))
                                                <div class="alert alert-danger">{{$errors->first('password')}}</div>
                                            @endif                
                                        </fieldset>
                                      </div>
                                      
                                      <div class="col-lg-12">                        
                                          <fieldset>
                                              <button type="submit" class="btn btn-primary">login</button>
                                          </fieldset>
                                      </div>
                                    </div>
                                </form>
                                <form method="POST" action="{{ route('register') }}" class="form-sign form-content" id="signup">
                                    @csrf
            
                                    <div class="form-group row">
                                        {{-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label> --}}
            
                                        <div class="col-md-12">
                                            <input id="name" placeholder="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> --}}
            
                                        <div class="col-md-12">
                                            <input id="email" placeholder="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}
            
                                        <div class="col-md-12">
                                            <input id="password" placeholder="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        {{-- <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label> --}}
            
                                        <div class="col-md-12">
                                            <input id="password-confirm" placeholder="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">                        
                                        <fieldset>
                                            <button type="submit" class="btn btn-primary" value="Login">Register</button>
                                        </fieldset>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- .popup-form -->
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
                        <div class="footer__top__info">
                            <a title="Logo" href="01_index_1.html" class="footer__top__info__logo"><img src="{{ asset('frontend/images/assets/logo.png') }}" alt="Golo"></a>
                            <p class="footer__top__info__desc">Discover amazing things to do everywhere you go.</p>
                            <div class="footer__top__info__app">
                                <a title="App Store" href="#" class="banner-apps__download__iphone"><img src="{{ asset('frontend/images/assets/app-store.png') }}" alt="App Store"></a>
                                <a title="Google Play" href="#" class="banner-apps__download__android"><img src="{{ asset('frontend/images/assets/google-play.png') }}" alt="Google Play"></a>
                            </div>
                        </div>
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
            </div>
            <div class="footer__bottom">
                <p class="footer__bottom__copyright">2023 &copy; <a title="Uxper Team" href="#">uxper.co</a>. made with love.</p>
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
<script src="{{asset('custom/show-cart.js')}}"></script>
<script>
    window.base_url = "<?= URL::to('/'); ?>";
</script>

</body>
</html>
