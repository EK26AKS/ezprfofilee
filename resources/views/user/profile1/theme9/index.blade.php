

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>{{ isset($userBs) && $userBs->website_title ? $userBs->website_title : '' }} - @yield('tab-title')</title>
        {{-- <link rel="stylesheet" href="css/styles.css" /> --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
            crossorigin="anonymous" />
        <link rel="shortcut icon" href="{{ !empty($userBs->favicon) ? asset('assets/front/img/user/' . $userBs->favicon) : '' }}" type="image/png">
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
    {{-- <link rel="stylesheet" href="{{ asset('assets/front/css/profile/common-base-color.php?color=' . $baseColor) }}"> --}}

    <style>
        :root {
            --color-primary: <?='#'. $userBs->base_color ?>
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

        
    </style>
        <!-- JavaScript Bundle with Popper -->      
        <script src="{{ asset('assets/front/js/profile/theme6-8/jquery-3.6.0.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <section id="banner">
            <!-- check start -->
            <nav class="nav">
                <input type="checkbox" id="nav-check" />
                <div class="nav-header">
                    <img
                        src="{{ isset($userBs->logo)
                            ? asset('assets/front/img/user/' . $userBs->logo)
                            : asset('assets/front/img/profile/lgoo.png') }}"
                        height="90px"
                        width="90px"
                    />
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
                    @if (is_array($userPermissions) &&
                            is_array($packagePermissions) &&
                            in_array('Appointment', $userPermissions) &&
                            in_array('Appointment', $packagePermissions))
                    <li class="@if (request()->routeIs('front.user.appointment') ||
                            request()->routeIs('front.user.appointment.form') ||
                            request()->routeIs('front.user.appointment.booking')) active @endif">
                        <a href="{{ route('front.user.appointment', getParam()) }}">{{ $keywords['Appointment'] ?? 'Appointment' }}</a>
                    </li>
                    @endif              
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
                        @if (is_array($userPermissions) &&
                        is_array($packagePermissions) &&
                        in_array('Appointment', $userPermissions) &&
                        in_array('Appointment', $packagePermissions))
                            <li>
                                @if (!Auth::guard('customer')->check())
                                <a href="{{ route('customer.login', getParam()) }}"><button class="main-btn login-btn">{{ $keywords['Login'] ?? 'Login' }}</button></a>
                                @else
                                <div class="dropdown show">
                                    <a  href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::guard('customer')->user()->username }}
                                    </a>
                                    <li class="nav-item" aria-labelledby="dropdownMenuLink">
                                    <a class="nav-link"
                                        href="{{ route('customer.dashboard', getParam()) }}">{{ $keywords['Dashboard'] ?? __('Dashboard') }}</a>
                                    <a class="nav-link"
                                        href="{{ route('customer.logout', getParam()) }}">{{ $keywords['Signout'] ?? __('Sign out') }}</a>
                                    </li>
                                </div>
                                @endif
                            </li>
                        @endif                          
                    </li>
                </ul>
            </nav>

            <div class="banner p-5">
                <div class="container">
                    <div class="row">
                        <div class="banner-image col-lg-6 col-md-12 col-sm-12">
                            <img
                                src="{{ asset('assets/front/img/user/home_settings/' . $home_text->hero_image) }}"
                            />
                        </div>
                        <div
                            class="banner-content col-lg-9 col-md-12 col-sm-12 row"
                        >
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
            </div>
        </section>

        <section id="about">
            <div class="container" style="margin-top:20px">
                <div class="about-row col-lg-9 col-sm-12 col-md-12">
                    <div class="row">
                        @foreach ($achievements as $achievement)
                            <div class="col-lg-3 col-md-6">
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
        <section id="about">
            <div class="row" style="width: 100%; margin-top: 50px !important; margin-right: 0px!important;">
                <div class="col-sm-12 col-md-12 col-lg-8" >
                    <div class="about-me-head">
                        <h1 style="font-weight: 700">{{ $home_text->about_title ?? 'My Resume' }}</h1>
                        <p class="about-me-para">{{ $home_text->about_subtitle ?? 'About Me' }}</p>
                        <div class="about-me-line"></div>
                        <div class="about-me-para2">
                            <p>
                            {!! nl2br($home_text->about_content ?? '') !!}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-4 about-me-image-cover">
                    <div class="about-me-image">
                    <img
                            src="{{ isset($home_text->about_image) ? asset('assets/front/img/user/home_settings/' . $home_text->about_image) : asset('assets/front/img/profile/about.png') }}"
                            alt="Image">
                    </div>
                </div>
            </div>
            @if (is_array($userPermissions) && in_array('Skill', $userPermissions))
            <div
                class="row"
                style="margin-top: 60px; width: 100%; margin-bottom: 80px">
                <div class="col-sm-12 col-md-12 col-lg-4 about-me-image-cover">
                    <div class="about-me-image-right">
                        <img src="{{isset($home_text->skills_image) ? asset('assets/front/img/user/home_settings/'.$home_text->skills_image) : asset('assets/front/img/profile/skill.png')}}" height="450px" />
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-8">
                    <div class="about-me-head-right">
                        <h1 style="font-weight: 700">{{ $home_text->skills_subtitle ?? __('Technical Skills') }}</h1>
                        <p class="about-me-para">{{ $home_text->skills_subtitle ?? __('Technical Skills') }}</p>
                        <div class="about-me-line"></div>
                        @foreach ($skills as $skill)
                        <div class="row" style="margin-top: 20px">
                            
                            <div class="col-sm-3 col-md-3 col-lg-3">
                                <h5>{{ $skill->title }}</h5>
                            </div>
                            <div
                                class="progress col-sm-6 col-md-6 col-lg-6"
                                style="
                                    margin: 2px 20px 0px 20px;

                                    padding-left: 0px;
                                    box-shadow: 0px 4px 10px 0px
                                        rgba(0, 0, 0, 0.25);
                                    height: 25px !important;
                                    border-radius: 4px;
                                    padding-right: 0px;
                                "
                            >
                                <div
                                    class="progress-bar"
                                    role="progressbar"
                                    style="
                                        width: 90%;
                                        background-color: #6578f7;
                                    "
                                    aria-valuenow="{{ $skill->percentage }}"
                                    aria-valuemin="0"
                                    aria-valuemax="100"
                                ></div>
                            </div>
                            <div class="col-sm-1 col-md-1 col-lg-1">
                                <h5>{{ $skill->percentage }}%</h5>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        @endif
        @if (is_array($userPermissions) && in_array('Service', $userPermissions))
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
                        <a
                            @if ($service->detail_page == 1) href="{{ route('front.user.service.detail', [getParam(), 'slug' => $service->slug, 'id' => $service->id]) }}" @endif>
                            <div class="thumbnail">
                                <img src="{{ isset($service->image) ? asset('assets/front/img/user/services/' . $service->image) : asset('assets/front/img/profile/service-1.jpg') }}"
                                    alt="Image">
                            </div>
                        </a>
                    </div>
                    <div class="services-box-2">
                        <p class="service-head"><a
                                @if ($service->detail_page == 1) href="{{ route('front.user.service.detail', [getParam(), 'slug' => $service->slug, 'id' => $service->id]) }}" @endif>{{ strlen($service->name) > 30 ? mb_substr($service->name, 0, 30, 'UTF-8') . '...' : $service->name }}</a>
                        </p>
                    </div>
                    <!-- <div class="services-box-2">
                        <p style="font-size: 18px">Logo design</p>
                    </div>
                    <div class="services-box-2">
                        <img src="css/images/ei_arrow-down.svg" />
                    </div> -->
                </div>
                @endforeach
            </div>
        </section>
        @endif

        @if (is_array($userPermissions) && in_array('Achievements', $userPermissions))
        {{-- <section id="experience" class="experience-section">
            <div class="row" style="width: 100%;">
                <div class="col-sm-6 col-md-6 col-lg-6 services-row-1">
                    <p class="section-head">{{ $home_text->portfolio_title ?? __('Portfolios') }}</p>
                    <p class="about-me-para">{{ $home_text->portfolio_subtitle ?? __('Portfolios') }}</p>
                    <div class="about-me-line" style="margin: 0 auto; width: 40%;"></div>
                </div>
            </div>

            <div class="row">
                 @if (count($educations) > 0)
                    <div class="col-sm-6 col-md-6 col-lg-6 experience-box">
                        <div class="col-sm-6 col-md-6 col-lg-6 ">
                        
                            <div style="display: inline-block;">
                                <img src="{{asset('assets/front/img/profile1/education.png')}}" style="max-width:100%" class="exp-logo"/>
                            </div>
                            <div class="service-head">
                                <p>{{$keywords["Education"] ?? "Education"}}</p>
                            </div>
                        </div>
                        @foreach($educations as $education)
                        <div
                            class="col-sm-6 col-md-6 col-lg-6 "
                            style="margin-top: 30px"
                        >
                            <div class="row">
                                <div class="col-sm-3 col-md-3 col-lg-3">
                                    <div class="bullet"></div>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9">
                                    <h5 class="bold">{{$education->degree_name}}</h5>
                                </div>
                            </div>
                        </div>
                        <div
                            class="col-sm-5 col-md-5 col-lg-5 "
                            style="margin-top: 15px"
                        >
                        <div class="row">
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <div
                                    class="vertical-line"
                                    style="height: 100px"
                                ></div>
                            </div>
                            <div class="col-sm-8 col-md-8 col-lg-8" style="width:100% !important">
                                    <span class="date">
                                                    {{\Carbon\Carbon::parse($education->start_date)->format('M j, Y')}}
                                                    -
                                                    @if (!empty($education->end_date))
                                                        {{ \Carbon\Carbon::parse($education->end_date)->format('M j, Y') }}
                                                    @else
                                                        {{$keywords["Present"] ?? "Present"}}
                                                    @endif
                                                </span>
                                <p>{!! nl2br($education->short_description) !!}</p>
                            </div>
                        </div>
                        </div>
                        @endforeach
                        
                    </div>
                    @endif
            
                    @if (count($job_experiences) > 0)
                    <div class="col-sm-6 col-md-6 col-lg-6 experience-box">
                        <div class="col-sm-6 col-md-6 col-lg-6 ">
                        
                            <div style="display: inline-block;">
                                <img src="{{asset('assets/front/img/profile1/job.png')}}" class="exp-logo"/>
                            </div>
                            <div class="service-head">
                                <p>{{$keywords["Job"] ?? "Job"}}</p>
                            </div>
                        </div>
                        @foreach($job_experiences as $job_experience)
                        <div
                            class="col-sm-6 col-md-6 col-lg-6 "
                            style="margin-top: 30px"
                        >
                        <div class="row">
                            <div class="col-sm-3 col-md-3 col-lg-3">
                                <div class="bullet"></div>
                            </div>
                            <div class="col-sm-9 col-md-9 col-lg-9">
                                <h5 class="bold">{{$job_experience->designation}} [{{$job_experience->company_name}}]</h5>
                            </div>
                        </div>
                        </div>
                        <div
                            class="col-sm-5 col-md-5 col-lg-5 "
                            style="margin-top: 15px"
                        >
                        <div class="row">
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <div
                                    class="vertical-line"
                                    style="height: 100px"
                                ></div>
                            </div>
                            <div class="col-sm-8 col-md-8 col-lg-8">
                            <span class="date">
                                                    {{\Carbon\Carbon::parse($job_experience->start_date)->format('M j, Y')}} - 
                                                    @if ($job_experience->is_continue == 0)
                                                    {{ \Carbon\Carbon::parse($job_experience->end_date)->format('M j, Y') }}
                                                    @else
                                                    {{$keywords["Present"] ?? "Present"}}
                                                    @endif
                                                </span>
                                                <p>{!! nl2br($job_experience->content) !!}</p>  
                            </div>
                        </div>
                        </div>
                        @endforeach
                        
                    </div>
                @endif
            </div>
        </section> --}}

        <section class="experience-section section-gap" id="experience">
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
                                    <span> <img src="{{asset('assets/front/img/profile1/education.png')}}" style="max-width:100%" class="exp-logo"/></span>
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
                                    <span> <img src="{{asset('assets/front/img/profile1/job.png')}}" class="exp-logo"/></span>
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
        
        @if(is_array($userPermissions) && in_array('Portfolio',$userPermissions))
            <section id="portfolio" class="services-section">
                <div class="row" style="width:100%">
                    <div class="col-sm-6 col-md-6 col-lg-6 services-row-1">
                        <p class="section-head">{{$keywords["All"] ?? "All"}}</p>
                        <p class="about-me-para">{{$home_text->portfolio_subtitle ??  __('Portfolios')}}</p>
                        <div class="about-me-line" style="margin: 0 auto; width: 40%;"></div>
                    </div>
                    <div class="row">
                        <div  class="filter-tab-row">
                            <div  class="filter-tab"><button type="button" data-filter="*" class="btn btn-outline-secondary filter-btn" >All</button></div>
                                @foreach($portfolio_categories as $portfolio_category)
                                <div class="filter-tab1">
                                    <button type="button" data-filter=".cat-{{$portfolio_category->id}}" class="btn btn-outline-secondary filter-btn" >{{$portfolio_category->name}}</button>
                                </div>
                                @endforeach                     
                            </div>           
                        </div>
                        <div class="container container-style">
                            <div class="row portfolio-row-2">
                                @foreach($portfolios as $portfolio)
                                    <div class="col-sm-3 col-md-3 col-lg-3 portfolio-box cat-{{$portfolio->bcategory->id}}" >
                                        <div>
                                            <img src="{{asset('assets/front/img/user/portfolios/'.$portfolio->image)}}" alt="Image">
                                        </div>
                                        <div class="portfolio-box-2" >
                                            <h4 class="title"><a href="{{route('front.user.portfolio.detail', [getParam(), $portfolio->slug, $portfolio->id])}}">{{strlen($portfolio->title) > 25 ? mb_substr($portfolio->title, 0, 25, 'UTF-8') . '...' : $portfolio->title}}</a></h4>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

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

        @if(is_array($userPermissions) && in_array('Blog',$userPermissions))
            <section id="blog" class="services-section">
                <div class="row" style="width: 100%;">
                <div class="col-sm-6 col-md-6 col-lg-6 services-row-1">
                    <p class="section-head">{{$home_text->blog_title ?? __('Blogs')}}</p>
                    <p class="about-me-para">{{$home_text->blog_subtitle ?? "Blogs"}}</p>
                    <div class="about-me-line" style="margin: 0 auto; width: 40%;"></div>
                </div></div>
                <div class="row testimonial-row-1" style="width: 100%;">
                @foreach($blogs as $blog)
                <div class="col-sm-3 col-md-3 col-lg-3 blog-box" >
                <div ><a class="post-thumbnail d-block" href="{{route('front.user.blog.detail', [getParam(), $blog->slug, $blog->id])}}">
                                            <img class="lazy" src="{{asset('assets/front/img/user/blogs/'.$blog->image)}}" alt="Blog Image">
                                        </a></div>
                    <div class="blog-box-2" >
                    <p class="section-head" style="font-size: 20px;"><a href="{{route('front.user.blog.detail', [getParam(), $blog->slug, $blog->id])}}">{{strlen($blog->title) > 45 ? mb_substr($blog->title, 0, 45, 'UTF-8') . '...' : $blog->title}}</a></p>
                    <p>{!! strlen(strip_tags($blog->content)) > 100 ? mb_substr(strip_tags($blog->content), 0, 100, 'utf-8') . '...' : strip_tags($blog->content) !!}</p>
                    <div  class="blog-date-row">
                        <div class="blog-date">{{$keywords['by'] ?? "by"}} <a>{{$user->username}}</div>
                        <div  class="blog-date"><span><i class="fas fa-calendar-alt"></i><a>{{\Carbon\Carbon::parse($blog->created_at)->format('F j, Y')}}</a></span></div>
                    </div>
                    
                    </div>
                            
                    </div>
                @endforeach                    
                </div>
            </section>
        @endif

        @if (is_array($userPermissions) && in_array('Contact', $userPermissions))
            <section id="contact" class="experience-section">
                <div class="row" style="width: 100%;">
                <div class="col-sm-6 col-md-6 col-lg-6 services-row-1">
                    <p class="section-head">{{ $home_text->contact_title ?? __('Get in touch') }}</p>
                    <p class="about-me-para">{{ $home_text->contact_subtitle ?? __('Get in touch') }}</p>
                    <div class="about-me-line" style="margin: 0 auto; width: 40%;"></div>
                </div>
                </div>
                <div class="row" style="width: 100%; margin: 0px!important; ">
                <div class="col-sm-7 col-md-7 col-lg-7 testimonial-row-1">
                    <div class="row" style="width: 100%;">
                        <div class="col-sm-6 col-md-6 col-lg-6"><div class="input-field mb-30">
                                        <label for="name">{{ $keywords['Name'] ?? 'Name' }}</label>
                                        <input type="text" placeholder="{{ $keywords['Name'] ?? 'Name' }}"
                                            name="fullname" required id="name">
                                        @if ($errors->has('fullname'))
                                            <p class="text-danger mb-0">{{ $errors->first('fullname') }}</p>
                                        @endif
                                    </div></div>
                        <div class="col-sm-6 col-md-6 col-lg-6"><div class="input-field mb-30">
                                        <label for="email">{{ $keywords['Email_Address'] ?? 'Email Address' }}</label>
                                        <input type="email"
                                            placeholder="{{ $keywords['Email_Address'] ?? 'Email Address' }}" name="email"
                                            required id="email">
                                        @if ($errors->has('email'))
                                            <p class="text-danger mb-0">{{ $errors->first('email') }}</p>
                                        @endif
                                    </div></div>
                        <div class="col-sm-12 col-md-12 col-lg-12" style="margin-top:20px ;"><div class="input-field mb-30">
                                        <label for="subject">{{ $keywords['Subject'] ?? 'Subject' }}</label>
                                        <input type="text" placeholder="{{ $keywords['Subject'] ?? 'Subject' }}"
                                            name="subject" required id="subject">
                                        @if ($errors->has('subject'))
                                            <p class="text-danger mb-0">{{ $errors->first('subject') }}</p>
                                        @endif
                                    </div></div>
                        <div class="col-sm-12 col-md-12 col-lg-12" style="margin-top:20px ;"><div class="input-field mb-30">
                                        <label for="message">{{ $keywords['Message'] ?? 'Message' }}</label>
                                        <textarea placeholder="{{ $keywords['Message'] ?? 'Message' }}" name="message" id="message"></textarea>
                                        @if ($errors->has('message'))
                                            <p class="text-danger mb-0">{{ $errors->first('message') }}</p>
                                        @endif
                                    </div></div>
                                    <div class="col-12">
                                    <div class="input-field text-center">
                                        <button type="submit"
                                            class="main-btn login-btn snd-msg">{{ $keywords['Send_Message'] ?? 'Send Message' }}</button>
                                    </div>
                                </div>
                        </div>
                </div>
                </div>
            </section>
        @endif

        <section id="footer" class="services-section">
            <div class="col-sm-3 col-md-3 col-lg-3 testimonial-row-1" style="text-align: center;">
                <p class="about-me-para">{{ $keywords['Stay_Connected'] ?? 'Stay Connected' }}</p>
                <a class="section-head" href="mailto:{{ $user->email }}">{{ $user->email }}</a>
            </div>
        </section>
        
    </body>
    <script src="{{ asset('assets/front/js/profile/theme6-8/slick.min.js') }}"></script>
    <script>
        $('#testimonials_item').slick({
            dots: false,
            arrows: false,
            infinite: true,
            autoplaySpeed: 1500,
            autoplay: false,
            slidesToShow: 3,
            slidesToScroll: 1,
            prevArrow: '<div class="prev"><i class="ti-arrow-left"></i></div>',
            nextArrow: '<div class="next"><i class="ti-arrow-right"></i></div>',            
            responsive: [
                {
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
        
        $(document).ready(function () {
            $('#testimonials_item').on('setPosition', function (event, slick) {
                var tallestSlideHeight = 0;
        
                // Loop through each slide to find the tallest height
                $('#testimonials_item #item_testimonials').each(function () {
                    var slideHeight = $(this).height();
                    if (slideHeight > tallestSlideHeight) {
                        tallestSlideHeight = slideHeight;
                    }
                });
        
                // Set the height of all slides to match the tallest height
                $('#testimonials_item #item_testimonials').height(tallestSlideHeight);
            });
        });
    </script>
</html>

