<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@yield('meta-description')">
    <meta name="keywords" content="@yield('meta-keywords')">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('og-meta')
    <!--====== Title ======-->

    <title>{{ isset($userBs) && $userBs->website_title ? $userBs->website_title : '' }} - @yield('tab-title')</title>


    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon"
        href="{{ !empty($userBs->favicon) ? asset('assets/front/img/user/' . $userBs->favicon) : '' }}"
        type="image/png">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/jquery.timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/plugin.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/pignose.calendar.min.css') }}">
    <!--====== Common css ======-->
    <link rel="stylesheet" href="{{ asset('assets/front/css/profile/common.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/profile/whatsapp.min.css') }}">
    <!--====== Default css ======-->
    <link rel="stylesheet" href="{{ asset('assets/front/css/profile/theme12/theme12.css') }}">
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

<body>



    <div class="navigation-wrapper">
        <div class="logo text-center">
        </div>
        <div class="primary-menu">
            <nav class="main-menu">
                <ul>
                    <li>
                        <a href="{{ route('front.user.detail.view', getParam()) }}"
                            class="
                                @if (request()->routeIs('front.user.detail.view')) active @endif    
                                "><i
                                class="fas fa-home-alt"></i></a>
                        <span>{{ $keywords['Home'] ?? 'Home' }}</span>
                    </li>

                    <li>
                        <a href="{{ route('front.user.detail.view', getParam()) }}#about" class="aboutt"><i class="fas fa-user"></i></a>
                        <span>{{ $keywords['About'] ?? 'About' }}</span>
                    </li>

                    @if (is_array($userPermissions) && in_array('Skill', $userPermissions))
                        <li>
                            <a href="{{ route('front.user.detail.view', getParam()) }}#skill" class="skill"><i class="fas fa-user"></i></a>
                            <span>{{ $keywords['Skill'] ?? 'Skill' }}</span>
                        </li>
                    @endif

                    @if (is_array($userPermissions) &&
                            is_array($packagePermissions) &&
                            in_array('Service', $userPermissions) &&
                            in_array('Service', $packagePermissions))
                        <li>
                          
                            <li>
                                <a href="{{ route('front.user.detail.view', getParam()) }}#services" class="@if (request()->routeIs('front.user.services') || request()->routeIs('front.user.service.detail')) active @endif"><i class="fas fa-cog"></i></a>
                                <span>{{ $keywords['Services'] ?? 'Services' }}</span>
                            </li>                            
                    @endif

                    @if (is_array($userPermissions) && in_array('Experience', $userPermissions))
                        <li>
                            <a href="{{ route('front.user.detail.view', getParam()) }}#experience" class="experience"><i class="fas fa-portrait"></i></a>
                            <span>{{ $keywords['Experience'] ?? 'Experience' }}</span>
                        </li>
                    @endif

                    @if (is_array($userPermissions) &&
                            is_array($packagePermissions) &&
                            in_array('Portfolio', $userPermissions) &&
                            in_array('Portfolio', $packagePermissions))
                        <li>
                            <a href="{{ route('front.user.detail.view', getParam()) }}#portfolio" class="portfolio"><i class="fas fa-folder-open"></i></a>
                            <span>{{ $keywords['Portfolios'] ?? 'Portfolios' }}</span>
                        </li>
                    @endif

                    @if (is_array($userPermissions) && in_array('Testimonial', $userPermissions))
                        <li>
                            <a href="{{ route('front.user.detail.view', getParam()) }}#Testimonials" class="Testimonials"><i class="fas fa-thumbs-up"></i></a>
                            <span>{{ $keywords['Testimonial'] ?? 'Testimonial' }}</span>
                        </li>
                    @endif

                    @if (is_array($userPermissions) &&
                            is_array($packagePermissions) &&
                            in_array('Blog', $userPermissions) &&
                            in_array('Blog', $packagePermissions))
                        <li>
                            <a href="{{ route('front.user.detail.view', getParam()) }}#Blog" class="blogg"><i class="fas fa-newspaper"></i></a>
                            <span>{{ $keywords['Blogs'] ?? 'Blogs' }}</span>
                        </li>
                    @endif


                    @if (is_array($userPermissions) && in_array('Contact', $userPermissions))
                        <li>
                            <a href="{{ route('front.user.detail.view', getParam()) }}#contact" class=" @if (request()->routeIs('front.user.contact')) active @endif"><i
                                    class="fas fa-comments"></i></a>
                            <span>{{ $keywords['Contact'] ?? 'Contact' }}</span>
                            
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
        <div class="nav-button">
            @if (isset($userBs->cv))
                <a href="{{ asset('assets/front/img/user/cv/' . $userBs->cv) }}" download="{{ $user->username }}.pdf">
                    {{ $keywords['Download_CV'] ?? 'Download CV' }}</a>
            @endif
        </div>
    </div>


    @if (request()->routeIs('front.user.service.detail') ||
            request()->routeIs('front.user.blog.detail') ||
            request()->routeIs('front.user.portfolio.detail'))
        <div class="pt-120 pb-70">
    @endif
    @yield('content')
    @if (request()->routeIs('front.user.service.detail') ||
            request()->routeIs('front.user.blog.detail') ||
            request()->routeIs('front.user.portfolio.detail'))
        </div>
    @endif
    @include('user.profile1.theme12.layout.footer')
    <script src="{{ asset('assets/front/js/vendor/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/profile/whatsapp.min.js') }}"></script>
    <!-- Bootstrap Datepicker -->
    <script src="{{ asset('assets/admin/js/plugin/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <!-- jQuery Timepicker -->
    <script src="{{ asset('assets/front/js/jquery.timepicker.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/pignose.calendar.full.min.js') }}"></script>
    <!--====== plugin js ======-->
    <script src="{{ asset('assets/front/js/plugin.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    <script>
        // Smooth scrolling for anchor links
        document.addEventListener('DOMContentLoaded', function() {
            document.addEventListener('click', function(event) {
                if (event.target.matches('a[href^="#"]')) {
                    event.preventDefault();
                    const targetId = event.target.getAttribute('href');
                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        const topOffset = targetElement.getBoundingClientRect().top + window.scrollY;
                        window.scrollTo({
                            top: topOffset,
                            behavior: 'smooth'
                        });
                    }
                }
            });
        });
    </script>
    
    
    <script>
        $(document).ready(function() {
            $('#testimonial_item').slick({
                dots: false,
                arrows: false,
                infinite: true,
                autoplaySpeed: 1500,
                autoplay: false,
                slidesToShow: 3,
                slidesToScroll: 1,
                prevArrow: '<div class="prev"><i class="ti-arrow-left"></i></div>',
                nextArrow: '<div class="next"><i class="ti-arrow-right"></i></div>',
                responsive: [{
                        breakpoint: 1199,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 1
                        }
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
            });

            // Set the height of slides to match the tallest slide
            $('#testimonial_item').on('init', function(event, slick) {
                var tallestSlideHeight = 0;

                // Loop through each slide to find the tallest height
                $('#testimonial_item .item_testimonial').each(function() {
                    var slideHeight = $(this).height();
                    if (slideHeight > tallestSlideHeight) {
                        tallestSlideHeight = slideHeight;
                    }
                });

                // Set the height of all slides to match the tallest height
                $('#testimonial_item .item_testimonial').height(tallestSlideHeight);
            });
        });
    </script>
</body>
</html>
