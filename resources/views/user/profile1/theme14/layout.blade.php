<!DOCTYPE html>
<html lang="en" @if ($userCurrentLang->rtl == 1) dir="rtl" @endif>

<head>
    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@yield('meta-description')">
    <meta name="keywords" content="@yield('meta-keywords')">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('og-meta')
    <!--====== Title ======-->

    <title>{{ isset($userBs) && $userBs->website_title ? $userBs->website_title : '' }} - @yield('tab-title')</title>
    <link rel="stylesheet" href="{{ asset('assets/front/css/profile/theme14/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/profile/theme14/linericon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/profile/theme14/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/profile/theme14/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/profile/theme14/lightbox/simpleLightbox.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/profile/theme14/nice-select/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/profile/theme14/animate-css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/front/css/profile/theme14/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/profile/theme14/responsive.css') }}">

    @if ($userCurrentLang->rtl == 1)
        <!--====== Common RTL Style css ======-->
        <link rel="stylesheet" href="{{ asset('assets/front/css/profile/common-rtl.css') }}">
        <!--====== RTL Style css ======-->
        <link rel="stylesheet" href="{{ asset('assets/front/css/profile/theme4/rtl.css') }}">
        <!--====== RTL Responsive css ======-->
        <link rel="stylesheet" href="{{ asset('assets/front/css/profile/theme4/rtl-responsive.css') }}">
    @endif
    @php
        if (!empty($userBs->base_color)) {
            $baseColor = $userBs->base_color;
        } else {
            $baseColor = 'F57236';
        }
    @endphp
    @php

        $holidays = App\Models\User\UserHoliday::where('user_id', $user->id)
            ->pluck('date')
            ->toArray();
        $dats = [];
        foreach ($holidays as $value) {
            $dats[] = Carbon\Carbon::parse($value)->format('Y-m-d');
        }
        $holidays = $dats;
        $weekends = App\Models\User\UserDay::where('user_id', $user->id)
            ->where('weekend', 1)
            ->pluck('index')
            ->toArray();
    @endphp
    @yield('styles')
</head>

<body data-spy="scroll" data-target=".main-menu" data-offset="0">
    <!--====== Header Section ======-->
    <header class="header_area">
        <div class="main_menu" id="mainNav">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container box_1620">
                    <!-- Brand and toggle get grouped for better mobile display -->

                    <a class="navbar-brand logo_h" href="{{ route('front.user.detail.view', getParam()) }}"><img
                            style="height:50px"
                            src="{{ isset($userBs->logo)
                                ? asset('assets/front/img/user/' . $userBs->logo)
                                : asset('assets/front/css/profile/theme14/img/logo.png') }}"
                            alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item active">
                                <a href="{{ route('front.user.detail.view', getParam()) }}"
                                    class="nav-link @if (request()->routeIs('front.user.detail.view')) active @endif">{{ $keywords['Home'] ?? 'Home' }}</a>
                            </li>
                            <li class="nav-item active">
                                <a href="{{ route('front.user.about', getParam()) }}"
                                    class="nav-link @if (request()->routeIs('front.user.about')) active @endif">{{ $keywords['About'] ?? 'About' }}</a>
                            </li>
                            @if (is_array($userPermissions) &&
                                    is_array($packagePermissions) &&
                                    in_array('Service', $userPermissions) &&
                                    in_array('Service', $packagePermissions))
                                <li class="nav-item">
                                    <a href="{{ route('front.user.services', getParam()) }}"
                                        class="nav-link @if (request()->routeIs('front.user.services') || request()->routeIs('front.user.service.detail')) active @endif">{{ $keywords['Services'] ?? 'Services' }}</a>
                                </li>
                            @endif

                            @if (is_array($userPermissions) &&
                                    is_array($packagePermissions) &&
                                    in_array('Portfolio', $userPermissions) &&
                                    in_array('Portfolio', $packagePermissions))
                                <li class="nav-item">
                                    <a href="{{ route('front.user.portfolios', getParam()) }}"
                                        class="nav-link @if (request()->routeIs('front.user.portfolios') || request()->routeIs('front.user.portfolio.detail')) active @endif">{{ $keywords['Portfolios'] ?? 'Portfolios' }}</a>
                                </li>
                            @endif

                            @if (is_array($userPermissions) &&
                                    is_array($packagePermissions) &&
                                    in_array('Blog', $userPermissions) &&
                                    in_array('Blog', $packagePermissions))
                                <li class="nav-item">
                                    <a href="{{ route('front.user.blogs', getParam()) }}"
                                        class="nav-link @if (request()->routeIs('front.user.blogs') || request()->routeIs('front.user.blog.detail')) active @endif">{{ $keywords['Blogs'] ?? 'Blogs' }}</a>
                                </li>
                            @endif




                            @if (is_array($userPermissions) && in_array('Contact', $userPermissions))
                                <li class="nav-item @if (request()->routeIs('front.user.contact')) active @endif">
                                    <a href="{{ route('front.user.contact', getParam()) }}"
                                        class="nav-link">{{ $keywords['Contact'] ?? 'Contact' }}</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--====== End Header Section ======-->

    @if (!request()->routeIs('front.user.detail.view'))
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
                <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0"
                    data-background=""></div>
                <div class="container">
                    <div class="banner_content text-center">
                        <h2>@yield('br-title')</h2>
                        <div class="page_link">
                            <a
                                href="{{ route('front.user.detail.view', getParam()) }}">{{ $keywords['Home'] ?? 'Home' }}</a>
                            <a href="#">@yield('br-link')</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @yield('content')

    <!--================Footer Area =================-->
    {{-- <footer class="footer_area p_120">
        <div class="container">

                @if (is_array($userPermissions) && in_array('Footer Mail', $userPermissions))
                <div class="row justify-content-center align-items-center">
                    <div class="col-sm-12 col-md-12 col-lg-3 justify-content-center align-items-center">
                        <p class="about-me-para" >{{ $keywords['Stay_Connected'] ?? 'Stay Connected' }}</p>
                    </div>
                </div>
                <div class="row justify-content-center align-items-center">
                    <div class="col-sm-12 col-md-12 col-lg-3 justify-content-center align-items-center">
                        <a class="section-head" style="color:#777777" href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </footer> --}}

    <footer class="footer_area">
        <header class="container h-100">
          <div class="d-flex align-items-center justify-content-center">
            <div class="d-flex flex-column">
              <p class="about-me-para text align-self-center pt-5" >{{ $keywords['Stay_Connected'] ?? 'Stay Connected' }}</p>
              <a class="section-head text align-self-center pt-5 pb-5" href="mailto:{{ $user->email }}">{{ $user->email }}</a>
            </div>
          </div>
        </header>
    </footer>



    <!--====== Jquery ======-->

    <script src="{{ asset('assets/front/js/profile/theme14/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/profile/theme14/popper.js') }}"></script>
    <script src="{{ asset('assets/front/js/profile/theme14/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/profile/theme14/stellar.js') }}"></script>

    <script src="{{ asset('assets/front/css/profile/theme14/lightbox/simpleLightbox.min.js') }}"></script>
    <script src="{{ asset('assets/front/css/profile/theme14/nice-select/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/front/css/profile/theme14/isotope/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/front/css/profile/theme14/isotope/isotope-min.js') }}"></script>
    <script src="{{ asset('assets/front/css/profile/theme14/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/front/css/profile/theme14/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/front/js/profile/theme14/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('assets/front/css/profile/theme14/counter-up/jquery.waypoints.min.js') }}"></script>


    <script src="{{ asset('assets/front/js/profile/theme14/mail-script.js') }}"></script>
    <script src="{{ asset('assets/front/js/profile/theme14/theme.js') }}"></script>



    <script>
        "use strict";
        var rtl = {{ $userCurrentLang->rtl }};
    </script>

    <script>
        $(document).ready(function() {
            $('.testi_slider').owlCarousel({
                items: 3, // Display 3 items at a time
                loop: true,
                margin: 30,
                nav: false,
                dots: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    992: {
                        items: 3
                    }
                }
            });
        });
    </script>
    @yield('scripts')
</body>

</html>
