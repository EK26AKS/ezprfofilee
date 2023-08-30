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
    <title>{{ isset($userBs) && $userBs->website_title ? $userBs->website_title : '' }} - @yield('tab-title')</title>

    <link rel="stylesheet" href="{{ asset('assets/front/css/profile/theme13/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/profile/theme13/linericon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/profile/theme13/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/profile/theme13/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/profile/theme13/lightbox/simpleLightbox.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/profile/theme13/nice-select/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/profile/theme13/animate-css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/profile/theme13/popup/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/front/css/profile/theme13/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/profile/theme13/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/profile/theme13/flaticon/flaticon.css') }}">



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
    @foreach ($weekends as $wek)
        <style>
            .pignose-calendar .pignose-calendar-header div.pignose-calendar-week:nth-child({{ $wek + 1 }}) {
                color: #ff6060 !important;
                /* Set the color of the text in the weekend cells */
            }

            .pignose-calendar .pignose-calendar-body .pignose-calendar-row .pignose-calendar-unit-date:nth-child({{ $wek + 1 }}) a {
                color: #ff6060;
                /* Set the color of the text in the weekend cells */
            }
        </style>
    @endforeach

    <link rel="stylesheet" href="{{ asset('assets/front/css/profile/common-base-color.php?color=' . $baseColor) }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/profile/theme4/base-color.php?color=' . $baseColor) }}">

    @yield('styles')
</head>

<body data-spy="scroll" data-target=".main-menu" data-offset="0">
    @if (!empty($userBs->preloader))
        <!--====== Start Preloader ======-->
        <div class="preloader">
            <div class="lds-ellipsis">
                <img src="{{ asset('assets/front/img/user/' . $userBs->preloader) }}" alt="">
            </div>
        </div>
        <!--====== End Preloader ======-->
    @endif

    <header class="header_area">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container box_1620">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="{{ route('front.user.detail.view', getParam()) }}"><img style="height:50px" src="{{ isset($userBs->logo)
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
                                <li class="nav-item submenu dropdown">
                                    <a href="{{ route('front.user.blogs', getParam()) }}"
                                        class="nav-link @if (request()->routeIs('front.user.blogs') || request()->routeIs('front.user.blog.detail')) active @endif">{{ $keywords['Blog'] ?? 'Blogs' }}</a>
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
		<div class="box_1620">
			<div class="banner_inner d-flex align-items-center">
				<div class="container">
					<div class="banner_content text-center">
						<h2>@yield('br-title')</h2>
						<div class="page_link">
							<a href="{{ route('front.user.detail.view', getParam()) }}">{{ $keywords['Home'] ?? 'Home' }}</a>
							<a href="#">@yield('br-link')</a>
						</div>
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
            <div class="row footer_inner">
                @if (is_array($userPermissions) && in_array('Footer Mail', $userPermissions))
                <div class="col-sm-3 col-md-3 col-lg-3">
                    <p class="about-me-para">{{ $keywords['Stay_Connected'] ?? 'Stay Connected' }}</p>
                    <a class="section-head" style="color:#777777" href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                </div>
                @endif
            </div>
        </div>
    </footer> --}}


    <footer class="footer_area">
        <header class="container">
          <div class="d-flex align-items-center justify-content-center">
            <div class="d-flex flex-column">
              <p class="about-me-para text align-self-center pt-5" >{{ $keywords['Stay_Connected'] ?? 'Stay Connected' }}</p>
              <a class="section-head text align-self-center pt-2 pb-5" href="mailto:{{ $user->email }}">{{ $user->email }}</a>
            </div>
          </div>
        </header>
    </footer>

    <!--================End Footer Area =================-->

    <!--====== Jquery ======-->
    <script src="{{ asset('assets/front/js/profile/theme13/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/profile/theme13/popper.js') }}"></script>
    <script src="{{ asset('assets/front/js/profile/theme13/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/profile/theme13/stellar.js') }}"></script>
    <script src="{{ asset('assets/front/css/profile/theme13/lightbox/simpleLightbox.min.js') }}"></script>
    <script src="{{ asset('assets/front/css/profile/theme13/nice-select/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/front/css/profile/theme13/isotope/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/front/css/profile/theme13/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/front/css/profile/theme13/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/front/css/profile/theme13/popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/profile/theme13/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('assets/front/css/profile/theme13/counter-up/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/front/css/profile/theme13/counter-up/jquery.waypoints.min.js') }}"></script>

    <script src="{{ asset('assets/front/js/profile/theme13/theme.js') }}"></script>
    <script src="{{ asset('assets/front/js/profile/theme13/mail-script.js') }}"></script>

    <!--====== Common js ======-->
    <script>
        $(document).ready(function(){
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
    @if (session()->has('success'))
        <script>
            "use strict";
            toastr['success']("{{ __(session('success')) }}");
        </script>
    @endif
    {{-- plugins --}}
    @includeif('user.profile1.partials.plugins')
    {{-- plugins end --}}
    @yield('scripts')
</body>
</html>
