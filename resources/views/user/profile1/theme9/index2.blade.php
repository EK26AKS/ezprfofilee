<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ isset($userBs) && $userBs->website_title ? $userBs->website_title : '' }} - @yield('tab-title')</title>
    {{-- <link rel="stylesheet" href="css/styles.css" /> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <link rel="shortcut icon"
        href="{{ !empty($userBs->favicon) ? asset('assets/front/img/user/' . $userBs->favicon) : '' }}"
        type="image/png">
    <link rel="stylesheet" href="{{ asset('assets/front/css/pignose.calendar.min.css') }}">
    <!--====== PLUGIN css ======-->
    <link rel="stylesheet" href="{{ asset('assets/front/css/plugin.min.css') }}">
    <!--====== COMMON css ======-->
    <link rel="stylesheet" href="{{ asset('assets/front/css/profile/common.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/profile/whatsapp.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/profile/theme9/theme9.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/front/css/profile/theme6-8/slick.min.css') }}" />
    {{-- @php
    if (!empty($userBs->base_color)) {
        $baseColor = $userBs->base_color;
    } else {
        $baseColor = 'F57236';
    }
    if (!empty($userBs->secondary_base_color)) {
        $secBaseColor = $userBs->secondary_base_color;
    } else {
        $secBaseColor = 'FEAF2F';
    }
    @endphp --}}

    @php
        // if (!empty($userBs->base_color)) {
        //     $baseColor = $userBs->base_color;
        // } else {
        //     $baseColor = '';
        // }

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
    <style>
        html {
            scroll-behavior: smooth;
        }

        * {
            box-sizing: border-box;
        }

        #menu {
            background-color: #ffffff79;
        }

        .starter-template {
            padding: 40px 15px;
            text-align: center;
        }

        ul.navbar-nav {
            float: right;
            text-align: center;
        }

        ul.navbar-nav li {
            padding: 0 10px;
        }

        @media only screen and (max-width:767px) {
            ul.navbar-nav {
                float: none;
            }
        }

        .container-fluid {
            padding: 0 1em;
        }

        .navbar-nav li a {
            color: black !important;
            font-size: 1.2em;
            font-family: Century gothic, sans-serif;
            font-weight: 600;
            transition: 0.4s ease;
        }

        .navbar-nav li a:hover {
            color: #fff !important;
            background-color: black !important;
        }

        .navbar-brand {
            padding: 10px 15px !important;
        }

        a.navbar-brand .fa-globe {
            font-size: 30px;
            color: black;
            transition: 0.5s ease;
        }

        a.navbar-brand .fa-globe:hover {
            color: #3935e6;
        }

        .navbar-inverse .navbar-toggle .icon-bar {
            background-color: black !important;
        }

        .navbar-inverse .navbar-toggle:hover,
        .navbar-inverse .navbar-toggle:focus {
            background-color: #fff !important;
        }

        .container {
            margin: 0 auto;
            max-width: 996px;
        }

        .splash {
            /* background: url("https://unsplash.com/photos/nd_6z4JFK4g/download?force=true") no-repeat fixed center bottom; */
            background-size: cover;
            color: #fff;
            background-color: #4c3ec7;

        }

        .splash .container {
            padding-top: 15vh;
            /* No JS fallback*/
            padding-bottom: 10vh;
            /* No JS fallback*/
        }

        .profile-image {

            display: block;
            max-height: 450px;
            max-width: 450px;
            margin: 0 auto 1em;
            width: 100%;
            opacity: 0.85;
        }

        .splash h1 {
            font-size: 40px;
            margin-bottom: .15em;
            text-align: center;
        }

        .splash .lead,
        .splash .continue {
            display: inline-block;
            text-align: center;
        }

        h1.intro-text {
            margin: 0;
            color: #fff;
        }

        .splash .lead {
            font-size: 30px;
            margin-bottom: 1em;
            font-family: Rockwell;
        }

        .navbar-inverse {
            border: none !important;
        }

        @keyframes blink {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        @-webkit-keyframes blink {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        @-moz-keyframes blink {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        @-ms-keyframes blink {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        @-o-keyframes blink {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        /* code for animated blinking cursor */
        #typed-cursor {
            opacity: 1;
            font-size: 40px;
            color: #fff;
            font-weight: 50;
            -webkit-animation: blink 1s infinite;
            -moz-animation: blink 1s infinite;
            -ms-animation: blink 1s infinite;
            -o-animation: blink 1s infinite;
            animation: blink 1s infinite;
        }

        .splash .continue {
            font-size: 3em;
            display: block;
        }

        .splash .continue a {
            border: 2px solid #fff;
            border-radius: 100%;
            color: #fff;
            display: inline-block;
            text-decoration: none;
            width: 40px;
            height: 40px;
            font-size: 30px;
        }

        .splash .continue a:hover {
            background-color: rgba(255, 255, 255, .25);
        }

        #about,
        #portfolio,
        #contact {
            padding-top: 4em !important;
        }

        section h2 {
            margin: 0;
            font-size: 3em;
        }

        section.success {
            color: #fff;
            background: rgb(13, 79, 136);
            padding: 2%;
        }

        section.success a {
            color: black;
            transition: 0.4s ease;
        }

        section.success a:hover {
            outline: 0;
            color: #fff;
            border: 2px solid #fff;
        }

        .contact-button {
            padding-bottom: 2%;
        }

        hr.star-light,
        hr.star-portfolio {
            margin: 25px auto 30px;
            padding: 0;
            max-width: 250px;
            border: 0;
            border-top: solid 3px;
            text-align: center;
        }

        hr.star-light:after,
        hr.star-portfolio:after {
            content: "\f005";
            display: inline-block;
            position: relative;
            top: -.8em;
            padding: 0 .25em;
            font-family: FontAwesome;
            font-size: 2em;
        }

        hr.star-light {
            border-color: #fff;
        }

        hr.star-portfolio {
            border-color: black;
        }

        hr.star-portfolio:after {
            color: black;
            background-color: #eee;
        }

        hr.star-light:after {
            color: #fff;
            background-color: rgb(13, 79, 136);
        }

        p.content-text {
            font-size: 25px;
        }

        /* PORTFOLIO */
        .portfolio-card {
            box-shadow: 0px 2px 5px #888888;
            background: #eee;
            border-radius: 2px;

        }

        .portfolio-card:hover {
            box-shadow: 0px 10px 10px #888888;
            cursor: pointer
        }

        .portfolio-container-holder {
            background: #4c3ec7;
            padding-bottom: 20px;
        }


        .portfolio-card-holder {
            padding: 5px;
            margin-bottom: 5px;
        }

        .portfolio-img {
            width: 100%;
            border-radius: 4px 4px 0 0;
        }

        .portfolio-img-desc {
            position: relative;
            bottom: 0px;
            left: 0px;
            right: 0px;
            background: #fff;
            color: #000;
            text-align: center;
            padding: 5px;
        }

        /* Contact */
        .contact-me-container {
            padding: 3%;
            background: rgb(13, 79, 136);
        }

        .fa-user,
        .fa-at,
        .fa-phone {
            color: black;
        }

        .submit-button {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        /* ========================
Footer
======================== */

        footer {
            background-color: #2C3E50;
            color: #fff;
            font-size: 1.5em;
            text-align: center;
            padding: 3%;
        }

        a.tel,
        a.tel:hover {
            text-decoration: none;
            color: #fff;
        }

        a.social-button {
            background: #fff;
            font-size: 20px;
            border-radius: 50%;
            margin: 5px;
        }

        .address-container {
            display: inline-block;
            margin: 0 auto;
        }

        a.link-facebook,
        a.link-twitter,
        a.link-codepen,
        a.link-linkedin,
        a.link-instagram {
            transition: 0.4s ease;
        }

        a.link-twitter {
            color: #1DA1F2;
        }

        a.link-facebook {
            color: #3b5998;
        }

        a.link-linkedin {
            color: #007bb6;
        }

        a.link-instagram {
            color: #e95950;
        }

        a.link-facebook:hover {
            background-color: #3b5998;
            color: #fff;
        }

        a.link-twitter:hover {
            background-color: #1DA1F2;
            color: #fff;
        }

        a.link-codepen:hover {
            background-color: black;
            color: #fff;
        }

        a.link-linkedin:hover {
            background-color: #007bb6;
            color: #fff;
        }

        a.link-instagram:hover {
            background-color: #e95950;
            color: #fff;
        }

        .btn-default {
            color: #333;
            background-color: #fff;
            border-color: transparent !important;
        }

        .fa-heart {
            color: #f32323;
        }

        h4.author {
            letter-spacing: 4px;
        }

        hr.footer-hr {
            width: 50%;
        }

        hr.copyright {
            opacity: 0.4;
        }

        /* experience line */
        :root {
            --color-primary: <?='#' . $userBs->base_color ?>
        }

        .experience-wrapper.boxed-wrapper {
            background-color: var(--color-offwhite);
            border-radius: 8px;
            padding: 80px 45px;
            position: relative;
        }

        .experience-wrapper.boxed-wrapper::after {
            position: absolute;
            content: "";
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            width: 1px;
            height: 50%;
        }

        .experience-wrapper .experience-wrapper-title {
            font-size: 24px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            margin-bottom: 20px;
        }

        .experience-wrapper .experience-wrapper-title span {
            margin-right: 15px;
            max-width: 35px;
        }

        .experience-wrapper .experience-wrapper-title.title-icon-boxed {
            font-size: 30px;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
        }

        .experience-wrapper .experience-wrapper-title.title-icon-boxed span {
            margin-right: 20px;
            max-width: 95px;
            width: 95px;
            height: 95px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            background-color: var(--color-offwhite);
            border-radius: 50%;
        }

        .experience-wrapper .experience-wrapper-title.title-icon-boxed span img {
            max-width: 70px;
        }

        .experience-wrapper .experience-gap {
            width: 100%;
            height: 1px;
            background-color: var(--color-border-2);
            margin: 100px 0;
        }

        .experience-list .single-experience {
            position: relative;
            z-index: 1;
            padding-left: 60px;
        }

        .experience-list .single-experience::before {
            content: "";
            position: absolute;
            left: 0;
            top: 3px;
            width: 22px;
            height: 22px;
            transform: rotate(-45deg);
            background-color: var(--color-primary-2);
            border: 5px solid #FFE5ED;
            z-index: 1;
        }

        .experience-list .single-experience:not(:last-child) {
            padding-bottom: 40px;
        }

        .experience-list .single-experience:not(:last-child)::after {
            content: "";
            position: absolute;
            left: 11px;
            top: 3px;
            height: 100%;
            width: 1px;
            background-color: var(--color-primary-2);
            -webkit-transform: translateX(-50%);
            transform: translateX(-50%);
            z-index: -1;
        }

        .experience-list .single-experience .title {
            font-size: 20px;
            margin-bottom: 5px;
        }

        .experience-list .single-experience .duration {
            color: var(--color-primary-2);
            font-size: 18px;
            font-family: Poppins;
            font-style: normal;
            font-weight: 400;
            line-height: normal
        }

        .experience-list .single-experience p {
            margin-top: 15px;
        }

        .experience-boxes .single-experience {
            height: 100%;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            text-align: center;
            padding: 50px;
            background-color: var(--color-offwhite);
            border: 1px solid var(--color-border);
            border-radius: 50%;
        }

        .experience-boxes .single-experience .title {
            font-size: 20px;
            margin-bottom: 15px;
        }

        .experience-boxes .single-experience .duration {
            font-size: 14px;
            color: var(--color-primary);
            margin-bottom: 10px;
            line-height: 1.3;
        }

        /* experrience end */
    </style>
</head>

<body>
    <section id="banner">
        <!-- check start -->
        <nav class="nav">
            <input type="checkbox" id="nav-check" />
            <div class="nav-header">
                <img src="{{ isset($userBs->logo)
                    ? asset('assets/front/img/user/' . $userBs->logo)
                    : asset('assets/front/img/profile/lgoo.png') }}"
                    height="90px" width="90px" />
            </div>
            <div class="nav-btn">
                <label for="nav-check">
                    <span></span>
                    <span></span>
                    <span></span>
                </label>
            </div>

            <ul class="nav-list">
                <li><a href="#home">Home</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#portfolio">Portfolio</a></li>
                <li><a href="#blog">Blog</a></li>
                <li><a href="#">Appointment</a></li>
                <li><a href="#contact">Contact</a></li>
                <li style="padding-top:11px">
                    <form action="{{ route('changeUserLanguage', getParam()) }}" id="userLangForm">
                        <input type="hidden" name="username" value="{{ $user->username }}">
                        <select name="code" onchange="document.getElementById('userLangForm').submit();">
                            @foreach ($userLangs as $userLang)
                                <option value="{{ $userLang->code }}"
                                    {{ $userLang->id == $userCurrentLang->id ? 'selected' : '' }}>
                                    {{ $userLang->name }}</option>
                            @endforeach
                        </select>
                    </form>
                    </a>
                </li>
                <li>
                    <a href="#"><button class="main-btn login-btn">
                            LOGIN
                        </button></a>
                </li>
            </ul>
        </nav>
        <!-- check end -->
    </section>


    {{-- Profileo start --}}
    {{-- <div class="banner">
        <div class="container">
            <div class="row">
                <div class="banner-image col-lg-6 col-md-12 col-sm-12">
                    <img src="{{ asset('assets/front/img/user/home_settings/' . $home_text->hero_image) }}" />
                </div>
                <div class="banner-content col-lg-9 col-md-12 col-sm-12 row">
                    <h2><span>{{ $keywords["Hi_I'm,"] ?? "Hi I'm," }}</span></h2>

                    <h1 class="hero-title">{{ $home_text->first_name ?? $user->first_name }}
                        {{ $home_text->last_name ?? $user->last_name }}</h1>

                    <p class="animated-text cd-headline clip is-full-width">
                        @php
                            $designations = explode(',', $home_text->designation ?? '');
                        @endphp
                        <span class="cd-words-wrapper">
                            @foreach ($designations as $key => $designation)
                                <b class="{{ $key == 0 ? 'is-visible' : '' }}">{{ $designation }}</b>
                            @endforeach
                        </span>
                    </p>
                    @if (is_array($userPermissions) && in_array('Contact', $userPermissions))
                        <a href="{{ route('front.user.contact', getParam()) }}"
                            class="main-btn hire-me-btn">{{ $keywords['Hire_me'] ?? 'Hire me' }}</a>
                    @endif
                </div>
            </div>
        </div>
    </div> --}}
    {{-- Profileo end --}}


    {{-- profile start --}}
    <div class="container-fluid splash" id="splash">
        <div class="container">
            {{-- <img src="https://s-media-cache-ak0.pinimg.com/736x/71/9e/59/719e59481d2be40a77ab6c3386fc0a45--photoshop-illustrator-illustrator-tutorials.jpg"
                alt="Portrait of Mr. Roboto" class="profile-image"> --}}
            <img class="profile-image"
                src="{{ asset('assets/front/img/user/home_settings/' . $home_text->hero_image) }}" />

            {{-- <h2><span>{{ $keywords["Hi_I'm,"] ?? "Hi I'm," }}</span></h2>
            <h1 class="intro-text"><span class="lead" id="typed">I am a </span></h1>
            <span class="continue"><a href="#about"><i class="fa fa-angle-down"></i></a></span> --}}
            <div class="banner-content col-lg-9 col-md-12 col-sm-12 row">
                <h2><span>{{ $keywords["Hi_I'm,"] ?? "Hi I'm," }}</span></h2>

                <h1 class="hero-title">{{ $home_text->first_name ?? $user->first_name }}
                    {{ $home_text->last_name ?? $user->last_name }}</h1>

                <p class="animated-text cd-headline clip is-full-width">
                    @php
                        $designations = explode(',', $home_text->designation ?? '');
                    @endphp
                    <span class="cd-words-wrapper">
                        @foreach ($designations as $key => $designation)
                            <b class="{{ $key == 0 ? 'is-visible' : '' }}">{{ $designation }}</b>
                        @endforeach
                    </span>
                </p>
                @if (is_array($userPermissions) && in_array('Contact', $userPermissions))
                    <a href="{{ route('front.user.contact', getParam()) }}"
                        class="main-btn hire-me-btn">{{ $keywords['Hire_me'] ?? 'Hire me' }}</a>
                @endif
            </div>
        </div>
    </div>
    {{-- Profile end --}}



    {{-- achievements --}}
    <section id="about">
        <div class="container">
            <div class="about-row col-lg-9 col-sm-12 col-md-12">
                <div class="row">
                    @foreach ($achievements as $achievement)
                        <div class="col">
                            <div>
                                <p class="about-head">{{ $achievement->count }}+</p>
                            </div>
                            <div class="about-para">{{ $achievement->title }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    {{-- achievements --}}


    <!-- About Section -->
    {{-- <section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>About Me</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-2">
                    <p class="content-text" style="text-align:justify;">Hey there! I am a junior software developer
                        based in Mumbai, India. I work with some of the popular front end technologies to create
                        beautiful websites that get noticed. I seek experience to gain more knowledge in the web
                        development field.
                    </p>
                </div>
                <div class="col-lg-4">
                    <p class="content-text">If you are in need of a beautiful simple website, I'm your guy. I look
                        forward to talking to you soon!</p>
                </div>
                <div class="col-lg-8 col-lg-offset-2 text-center contact-button">
                    <a href="#contact" class="btn btn-lg btn-outline">
                        <i class="fa fa-envelope"></i> Contact Me
                    </a>
                </div>
            </div>
        </div>
    </section> --}}









    {{-- permission --}}
    <!-- Portfolio -->
    @if (is_array($userPermissions) && in_array('Service', $userPermissions))
        <section id="services" class="services-section">
            <div class="container-fluid portfolio-container-holder content-section" id="portfolio">
                <div class="portfolio-container container">
                    {{-- <h1 class="text-center">My Portfolio</h1>
            <hr class="star-portfolio"> --}}
                    <div class="row mb-5" style="width: 100%">
                        <div class="col-sm-12 col-md-12 col-lg-12 services-row-1">
                            <p class="section-head">{{ $home_text->service_title ?? __('Services') }}</p>
                            <p class="about-me-para">{{ $home_text->service_subtitle ?? __('What I Do ?') }}</p>
                            <div class="about-me-line" style="margin: 0 auto; width: 40%"></div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($services as $service)
                            <div class="col-md-6 col-xs-12 col-sm-6 portfolio-card-holder">
                                <div class=" portfolio-card">
                                    {{-- <img src="https://cdn2.hubspot.net/hubfs/145335/responsive-vs-adaptive-design-compressor.jpg"
                            alt="Portfolio" class="img-responsive portfolio-img"> --}}
                                    <a
                                        @if ($service->detail_page == 1) href="{{ route('front.user.service.detail', [getParam(), 'slug' => $service->slug, 'id' => $service->id]) }}" @endif>
                                        <img class="img-responsive portfolio-img"
                                            src="{{ isset($service->image) ? asset('assets/front/img/user/services/' . $service->image) : asset('assets/front/img/profile/service-1.jpg') }}"
                                            alt="Portfolio">
                                    </a>
                                    <div class="services-box-2">
                                        <p class="service-head"><a style="color: 4c3ec7;"
                                                @if ($service->detail_page == 1) href="{{ route('front.user.service.detail', [getParam(), 'slug' => $service->slug, 'id' => $service->id]) }}" @endif>{{ strlen($service->name) > 30 ? mb_substr($service->name, 0, 30, 'UTF-8') . '...' : $service->name }}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
            <section>
    @endif

    {{-- permission  --}}
    {{-- @if (is_array($userPermissions) && in_array('Service', $userPermissions))
    <section id="services" class="services-section">
        <div class="row" style="width: 100%">
            <div class="col-sm-12 col-md-12 col-lg-12 services-row-1">
                <p class="section-head">{{ $home_text->service_title ?? __('Services') }}</p>
                <p class="about-me-para">{{ $home_text->service_subtitle ?? __('What I Do ?') }}</p>
                <div
                    class="about-me-line"
                    style="margin: 0 auto; width: 40%"
                ></div>
            </div>
        </div>
        <div class="row services-row-2" style="width: 100%">
            @foreach ($services as $service)
            <div class="col-sm-12 col-md-12 col-lg-3 services-box-main">
                <div>
                    <a @if ($service->detail_page == 1) href="{{ route('front.user.service.detail', [getParam(), 'slug' => $service->slug, 'id' => $service->id]) }}" @endif>
                        <div class="thumbnail">
                            <img src="{{ isset($service->image) ? asset('assets/front/img/user/services/' . $service->image) : asset('assets/front/img/profile/service-1.jpg') }}"  alt="Image">
                        </div>
                    </a>
                </div>
                <div class="services-box-2">
                    <p class="service-head"><a
                            @if ($service->detail_page == 1) href="{{ route('front.user.service.detail', [getParam(), 'slug' => $service->slug, 'id' => $service->id]) }}" @endif>{{ strlen($service->name) > 30 ? mb_substr($service->name, 0, 30, 'UTF-8') . '...' : $service->name }}</a>
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @endif --}}
    {{-- permission --}}



    {{-- exp --}}
    @if (is_array($userPermissions) && in_array('Achievements', $userPermissions))
        <section class="experience-section section-gap" id="experience" style="background-color: rgb(255, 255, 255)">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-md-9">
                        <div class="common-heading text-center mb-50">
                            <span class="tagline">{{ $home_text->portfolio_title ?? __('Portfolios') }}</span>
                            <h2 class="title">{{ $home_text->portfolio_subtitle ?? __('Portfolios') }}</h2>
                        </div>
                    </div>
                </div>
                <div class="experience-wrapper boxed-wrapper">
                    <div class="row justify-content-between">
                        @if (count($educations) > 0)
                            <div class="col-lg-6 md-gap-80">
                                <h4 class="experience-wrapper-title">
                                    <span> <img src="{{ asset('assets/front/img/profile1/education.png') }}"
                                            style="max-width:100%" class="exp-logo" /></span>
                                    {{ $keywords['Education'] ?? 'Education' }}
                                </h4>
                                <div class="experience-list">
                                    @foreach ($educations as $education)
                                        <div class="single-experience">
                                            <h5 class="title">{{ $education->degree_name }}</h5>
                                            <span class="duration">
                                                {{ \Carbon\Carbon::parse($education->start_date)->format('M j, Y') }}
                                                -
                                                @if (!empty($education->end_date))
                                                    {{ \Carbon\Carbon::parse($education->end_date)->format('M j, Y') }}
                                                @else
                                                    {{ $keywords['Present'] ?? 'Present' }}
                                                @endif
                                            </span>
                                            <p>{!! nl2br($education->short_description) !!}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        @if (count($job_experiences) > 0)
                            <div class="col-lg-6">
                                <h4 class="experience-wrapper-title">
                                    <span> <img src="{{ asset('assets/front/img/profile1/job.png') }}"
                                            class="exp-logo" /></span>
                                    {{ $keywords['Job'] ?? 'Job' }}
                                </h4>
                                <div class="experience-list">
                                    @foreach ($job_experiences as $job_experience)
                                        <div class="single-experience">
                                            <h5 class="title">{{ $job_experience->designation }}
                                                [{{ $job_experience->company_name }}]</h5>
                                            <span class="duration">
                                                {{ \Carbon\Carbon::parse($job_experience->start_date)->format('M j, Y') }}
                                                -
                                                @if ($job_experience->is_continue == 0)
                                                    {{ \Carbon\Carbon::parse($job_experience->end_date)->format('M j, Y') }}
                                                @else
                                                    {{ $keywords['Present'] ?? 'Present' }}
                                                @endif
                                            </span>
                                            <p>{!! nl2br($job_experience->content) !!}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endif
    {{-- exp --}}

    {{-- df --}}
    @if (is_array($userPermissions) && in_array('Portfolio', $userPermissions))
        <section id="" class="services-section">
            <div class="row" style="width:100%">
                <div class="col-sm-6 col-md-6 col-lg-6 services-row-1">
                    <p class="section-head">{{ $keywords['All'] ?? 'All' }}</p>
                    <p class="about-me-para">{{ $home_text->portfolio_subtitle ?? __('Portfolios') }}</p>
                    <div class="about-me-line" style="margin: 0 auto; width: 40%;"></div>
                </div>


                <div class="row">
                    <div class="filter-tab-row">
                        <div class="filter-tab"><button type="button" data-filter="*"
                                class="btn btn-outline-secondary filter-btn">All</button></div>
                        @foreach ($portfolio_categories as $portfolio_category)
                            <div class="filter-tab1"><button type="button"
                                    data-filter=".cat-{{ $portfolio_category->id }}"
                                    class="btn btn-outline-secondary filter-btn">{{ $portfolio_category->name }}</button>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="container container-style">
                    <div class="row portfolio-row-2">
                        @foreach ($portfolios as $portfolio)
                            <div
                                class="col-md-6 col-xs-12 col-sm-6 portfolio-box cat-{{ $portfolio->bcategory->id }}">
                                <div><img src="{{ asset('assets/front/img/user/portfolios/' . $portfolio->image) }}"
                                        alt="Image"></div>
                                <div class="portfolio-box-2">
                                    <h4 class="title"><a
                                            href="{{ route('front.user.portfolio.detail', [getParam(), $portfolio->slug, $portfolio->id]) }}">{{ strlen($portfolio->title) > 25 ? mb_substr($portfolio->title, 0, 25, 'UTF-8') . '...' : $portfolio->title }}</a>
                                    </h4>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
        </section>
    @endif
    {{-- end df --}}


    {{-- 3 --}}
    @if (is_array($userPermissions) && in_array('Portfolio', $userPermissions))
        <div class="container-fluid portfolio-container-holder content-section" id="portfolio"
            style="background-color: white">
            <div class="portfolio-container container">
                <h1 class="text-center">My Portfolio</h1>
                <hr class="star-portfolio">

                <div class="row">
                    @foreach ($portfolios as $portfolio)
                        <div class="col-md-6 col-xs-12 col-sm-6 portfolio-card-holder">
                            <div><img src="{{ asset('assets/front/img/user/portfolios/' . $portfolio->image) }}"
                                    alt="Image"></div>
                            <div class="portfolio-box-2">
                                <h4 class="title"><a
                                        href="{{ route('front.user.portfolio.detail', [getParam(), $portfolio->slug, $portfolio->id]) }}">{{ strlen($portfolio->title) > 25 ? mb_substr($portfolio->title, 0, 25, 'UTF-8') . '...' : $portfolio->title }}</a>
                                </h4>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    @endif
    {{-- 3 --}}

<h1>1</h1>

    {{-- testimonial --}}
    @if(is_array($userPermissions) && in_array('Testimonial',$userPermissions))
    <section id="about" class="experience-section">
            <div class="col-sm-6 col-md-6 col-lg-6 services-row-1">
                <p class="section-head">{{$home_text->testimonial_title ?? __('Testimonials')}}</p>
                <p class="about-me-para">{{$home_text->testimonial_subtitle ?? __('Testimonials')}}</p>
                <div class="about-me-line" style="margin: 0 auto; width: 40%; margin-bottom:30px"></div>
            </div>
            <div class="row testimonial-slider" id="testimonials_item">
                    @foreach ($testimonials as $testimonial)
                        <div class="col" id="item_testimonials">
                            <div class="testimonial-box">
                                <div class="author-photo">
                                    <img class="lazy" src="{{ asset('assets/front/img/user/testimonials/' . $testimonial->image) }}"
                                        alt="Image">
                                    <svg width="117" height="114" viewBox="0 0 117 114">
                                        <path d="M89.8169 85.345L65.5127 98.7562C60.3865 101.585 54.145 101.463 49.1422 98.4367L25.3831 84.1077C20.3803 81.0815 17.3725 75.6305 17.4795 69.7846L18.0246 42.0444C18.1316 36.1985 21.3562 30.8531 26.4824 28.0244L50.7866 14.6132C55.9128 11.7846 62.1543 11.9065 67.1571 14.9327L90.9162 29.2617C95.919 32.2879 98.9268 37.7389 98.8198 43.5848L98.2747 71.325C98.1677 77.1709 94.9431 82.5163 89.8169 85.345Z" />
                                    </svg>
                                </div>
                                <div class="author-info">
                                    <h5 class="name">{{ $testimonial->name }}</h5>
                                    @if (!empty($testimonial->occupation))
                                        <span class="title">{{ $testimonial->occupation }}</span>
                                    @endif
                                </div>
                                <p class="content">{!! nl2br($testimonial->content) !!}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
    </section>
@endif
    {{-- testimonial --}}


    <!-- Contact form -->
    <div class="container-fluid contact-me-container content-section" id="contact">
        <div class="container">
            <h1 class="intro-text text-center">Contact Me</h1>
            <hr class="star-light">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            <input type="text" class="form-control" id="name" placeholder="Name">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-at"></i></div>
                            <input type="text" class="form-control" id="email" placeholder="Email ID">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                            <input type="text" class="form-control" id="phone" placeholder="Phone Number">
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <textarea class="form-control" rows="5" placeholder="Message"></textarea>
                </div>
            </div>

            <div class="text-center">
                <button class="btn btn-default submit-button btn-lg btn-primary"><i class="fa fa-paper-plane"></i>
                    Send</button>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer>
        <div class="container footer-container">
            <div class="row footer-row">
                <div class="col-xs-12 col-sm-6 col-md-6 text-center">
                    <h4 class="text-center">Find me here</h4>
                    <address>
                        <strong><i class="fa fa-location-arrow"></i> Monsters Inc.</strong><br>Lorem ipsum dolor, sir
                        amet,<br>Mumbai, India 400050<br><br>
                        <a class="tel" href="tel:9999988888" type="tel"><i class="fa fa-mobile"></i><span>
                                +91 9876543210</span></a>
                    </address>
                </div>

                <div class="col-xs-12 col-md-6 col-sm-6 social-section">
                    <div class="text-center">
                        <h4 class="text-center">Also, I can be found here</h4>
                        <div class="text-center social-buttons">
                            <a href="#" class="btn btn-default btn-lg social-button link-facebook"><i
                                    class="fa fa-facebook"></i>
                            </a>

                            <a href="https://codepen.io/simplysuvi/"
                                class="btn btn-default btn-lg social-button link-codepen"><i
                                    class="fa fa-codepen"></i>
                            </a>

                            <a href="#" class="btn btn-default btn-lg social-button link-twitter"><i
                                    class="fa fa-twitter"></i>
                            </a>

                            <a href="https://www.linkedin.com/in/simplysuvi"
                                class="btn btn-default btn-lg social-button link-linkedin"><i
                                    class="fa fa-linkedin"></i>
                            </a>
                            <a href="https://instagram.com/simplysuvi"
                                class="btn btn-default btn-lg social-button link-instagram"><i
                                    class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <hr class="footer-hr">
                        <h4 class="author">Made with <i class="fa fa-heart"></i> by <strong>Suvrat Jain</strong></h4>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
</body>

</html>
