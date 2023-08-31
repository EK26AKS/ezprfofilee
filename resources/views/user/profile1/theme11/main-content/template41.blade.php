@extends('user.profile1.theme11.layout.layout')

@section('main-content.content-profile')
    <style>
        /* @import url("https://fonts.googleapis.com/css2?family=Shippori+Antique&display=swap"); */

        /* * {
                 margin: 0;
                 padding: 0;
                 box-sizing: border-box;
                }

                button,
                input,
                select {
                 font-family: inherit;
                 font-size: 100%;
                 box-sizing: border-box;
                 padding: 0;
                 margin: 0;
                }

                html {
                 font-size: 12px;
                }

                body {
                 color: #000;
                 font-family: "Shippori Antique", sans-serif;
                 height: 100vh;
                 display: grid;
                 place-items: center;
                } */

        .content-wrapper {
            height: 100%;
            width: 70%;
            max-width: 100rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding-bottom: 5rem;
        }

        h1 {
            margin-bottom: calc(0.7rem + 0.5vmin);
            font-size: calc(2.3rem + 1vmin);
        }

        .blue-line {
            height: 0.3rem;
            width: 6rem;
            background-color: rgb(79, 143, 226);
            margin-bottom: calc(3rem + 2vmin);
        }

        .wrapper-for-arrows {
            position: relative;
            width: 70%;
            border-radius: 2rem;
            box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
            overflow: hidden;
            display: grid;
            place-items: center;
        }

        .review-wrap {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding-top: calc(2rem + 1vmin);
            width: 100%;
        }

        #imgDiv {
            border-radius: 50%;
            width: calc(6rem + 4vmin);
            height: calc(6rem + 4vmin);
            position: relative;
            box-shadow: 5px -3px rgb(79, 143, 226);
            background-size: cover;
            margin-bottom: calc(0.7rem + 0.5vmin);
        }

        .chicken {
            background-image: url("https://media0.giphy.com/media/A8Cdznswn5vnG/200w.gif?cid=790b7611e8c5980ee7141bc18ec12c49962b871eb404ba5b&rid=200w.gif&ct=s");
            width: 200px;
            height: 250px;
            position: absolute;
            top: 12%;
        }

        #imgDiv::after {
            content: "''";
            font-size: calc(2rem + 2vmin);
            font-family: sans-serif;
            line-height: 150%;
            color: #fff;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background-color: rgb(79, 143, 226);
            position: absolute;
            top: 10%;
            left: -10%;
            width: calc(2rem + 2vmin);
            height: calc(2rem + 2vmin);
        }

        #personName {
            margin-bottom: calc(0.7rem + 0.5vmin);
            font-size: calc(1rem + 0.5vmin);
            letter-spacing: calc(0.1rem + 0.1vmin);
            font-weight: bold;
        }

        #profession {
            font-size: calc(0.8rem + 0.3vmin);
            margin-bottom: calc(0.7rem + 0.5vmin);
            color: rgb(79, 143, 226);
        }

        #description {
            font-size: calc(0.8rem + 0.3vmin);
            width: 70%;
            max-width: 40rem;
            text-align: center;
            margin-bottom: calc(1.4rem + 1vmin);
            color: rgb(92, 92, 92);
            line-height: 2rem;
        }

        .arrow-wrap {
            position: absolute;
            top: 50%;
        }

        .arrow {
            width: calc(1.4rem + 0.6vmin);
            height: calc(1.4rem + 0.6vmin);
            border: solid rgb(79, 143, 226);
            border-width: 0 calc(0.5rem + 0.2vmin) calc(0.5rem + 0.2vmin) 0;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .arrow:hover {
            transition: 0.3s;
            transform: scale(1.15);
        }

        .left-arrow-wrap {
            left: 5%;
            transform: rotate(135deg);
            -webkit-transform: rotate(135deg);
        }

        .right-arrow-wrap {
            transform: rotate(-45deg);
            -webkit-transform: rotate(-45deg);
            right: 5%;
        }

        .surprise-me-btn {
            border: 2px solid rgb(79, 143, 226);
            background-color: rgb(224, 238, 255);
            color: rgb(79, 143, 226);
            border-radius: 2rem;
            padding: calc(0.5rem + 0.2vmin) 0;
            width: calc(7rem + 5vmin);
            text-align: center;
            transition: background-color 0.3s, transform 0.3s;
            cursor: pointer;
            margin-bottom: calc(1.4rem + 1vmin);
        }

        .surprise-me-btn:hover {
            transition: background-color 0.3s, transform 0.3s;
            background-color: rgb(255, 255, 255);
            transform: rotate(5deg);
        }

        .move-head {
            animation: moveHead 1.55s infinite;
            animation-delay: -0.8s;
        }

        .hide-chicken-btn {
            border: 2px solid rgb(226, 89, 79);
            background-color: rgb(255, 224, 224);
            color: rgb(226, 79, 79);
            border-radius: 2rem;
            padding: calc(0.5rem + 0.2vmin) 0;
            width: calc(10rem + 5vmin);
            text-align: center;
            transition: background-color 0.3s, transform 0.3s;
            cursor: pointer;
            margin-bottom: calc(1.4rem + 1vmin);
        }

        .hide-chicken-btn:hover {
            transition: background-color 0.3s, transform 0.3s;
            background-color: rgb(255, 255, 255);
            transform: rotate(5deg);
        }

        @keyframes moveHead {
            0% {}

            25% {
                transform: translate(0.5rem, 1rem) rotate(5deg);
            }

            100% {
                transform: translate(0, 0) rotate(-5deg);
            }
        }

        @media screen and (max-width: 900px) {
            .content-wrapper {
                width: 100%;
            }
        }
    </style>

    <section class="hero-section" id="hero-section">
        <div class="hero d-flex">
            <div class="hero-part1">
                <img src="{{ asset('assets/front/css/profile/theme11/images/hero-back1.svg') }}" alt="">
            </div>
            <div class="hero-part2">
                <img src="{{ asset('assets/front/css/profile/theme11/images/hero-back2.svg') }}" alt="">
            </div>
        </div>


        <div class="container hero-content">
            <div class="row">
                <div class="col-md-6 profile-pic">
                    @if (isset($home_text->hero_image))
                        <img src="{{ asset('assets/front/img/user/home_settings/' . $home_text->hero_image) }}"
                            alt="">
                    @endif
                </div>

                <div class="col-md-6 my-name d-flex flex-column justify-content-start">
                    <h2>{{ $keywords["Hi_I'm,"] ?? "Hi I'm," }} {{ $home_text->first_name ?? $user->first_name }}
                        {{ $home_text->last_name ?? $user->last_name }}</h2>
                    @php
                        $designations = explode(',', $home_text->designation ?? '');
                    @endphp
                    @foreach ($designations as $designation)
                        <span class="">
                            {{ $designation }}
                        </span>
                    @endforeach
                    @if (is_array($userPermissions) && in_array('Contact', $userPermissions))
                        <a href="#" class="hire-me">hire me</a>
                    @endif
                </div>
            </div>
        </div>
    </section>


    <section class="about-me" id="about-me">
        <div class="container m-2">
            <div class="talk-about-me">
                <div id="section-header">
                    <span>{{ $home_text->about_title ?? 'My Resume' }}</span>
                    <div class="header-img d-flex justify-content-center">
                        <h2> {{ $home_text->about_subtitle ?? 'About Me' }} </h2>
                    </div>
                </div>
                <div class="aboutme-content d-flex align-items-center">
                    <div class="row align-items-center">
                        <div class="col-lg-7 order-1 order-lg-1">
                            <p>{!! nl2br($home_text->about_content ?? '') !!}</p>
                        </div>
                        <div class="col-lg-5 order-2 order-lg-2 aboutme-img">
                            <img src="{{ isset($home_text->about_image) ? asset('assets/front/img/user/home_settings/' . $home_text->about_image) : asset('assets/front/img/profile/about.png') }}"
                                width="500" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <h1>!!</h1>
    @if (is_array($userPermissions) && in_array('Skill', $userPermissions))
        <section class="skills" id="skills">
            <div class="container">
                <div class="my-skills">
                    <div id="section-header">
                        <span>{{ $home_text->skills_subtitle ?? __('Technical Skills') }} </span>
                        <div class="header-img d-flex justify-content-center">
                            <h2>{{ $home_text->skills_title ?? __('Skills') }}</h2>
                        </div>
                    </div>

                    <div class="skills-content">
                        <div class="row align-items-center">
                            <div class="col-lg-5 order-1 order-lg-1">
                                {{-- <img data-src="{{ asset('assets/front/img/user/home_settings/' . $home_text->skills_image) }}"
                                    class="lazy" width="500" alt="Image"> --}}
                                <img data-src="{{ asset('assets/front/img/user/test/prog.jpg') }}" class="lazy"
                                    width="500" alt="Image">
                            </div>

                            <div class="col-lg-7 order-2 order-lg-2">
                                <div class="skills-description mb-5">
                                    <span>{!! nl2br($home_text->skills_content ?? '') !!}</span>
                                </div>
                                <div class="progressbar d-flex flex-wrap align-items-center justify-content-center gap-5">
                                    @foreach ($skills as $skill)
                                        <div class="circle-progress">
                                            <div class="progressbar-all">
                                                <div class="progressbar-value">
                                                    {{ $skill->percentage }}%
                                                </div>
                                            </div>
                                            <h3>{{ $skill->title }}</h3>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>
    @endif







    {{-- @if (is_array($userPermissions) && in_array('Service', $userPermissions))
        <!--====== Start Service Section ======-->
        <section class="services" id="services">
            <div class="myservices">
                <div id="section-header">
                    <span class="service-span">{{ $home_text->service_subtitle ?? __('What I Do ?') }}</span>
                    <div class="header-img d-flex justify-content-center">
                        <h2 class="service-h2">{{ $home_text->service_title ?? __('Services') }}</h2>

                    </div>
                </div>
                <div class="container">
                    <div class="all-services">
                        <div class="row">
                            <div class="allservices-content d-flex justify-content-center align-items-center gap-5 mt-5">
                                @foreach ($services as $service)
                                    <div class=" col-md-4 col-lg-4 allservices-flex">
                                        <a class="service-img d-block" href="#">
                                            <img data-src="{{ isset($service->image) ? asset('assets/front/img/user/services/' . $service->image) : asset('assets/front/img/profile/service-1.jpg') }}"
                                                class="lazy" width="300" alt="Service Image">
                                        </a>

                                        @if ($service->detail_page == 1)
                                            <h4 class=""><a
                                                    href="{{ route('front.user.service.detail', [getParam(), 'slug' => $service->slug, 'id' => $service->id]) }}">{{ $service->name }}</a>
                                            </h4>
                                        @else
                                            <h4 class="">{{ $service->name }}</h4>
                                        @endif
                                        <a @if ($service->detail_page == 1) href="#" @endif style="color: #f9fafb;"
                                            class="btn-link"> <span class="">
                                                {{ $keywords['Read_More'] ?? 'Read More' }}</span></a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="mt-5" style="text-align:center">
                        <input type="button" class="btn btn-view-all" value="View All">
                    </div>
                </div>

            </div>
        </section>
    @endif --}}



    <style>
        .container {
            max-width: 1320px;
        }

        section {
            overflow: hidden;
        }

        .section-bg {
            background: #f5f8fd;
        }

        .section-header h3 {
            font-size: 36px;
            color: #fff;
            text-align: center;
            font-weight: 700;
            position: relative;
            font-family: "Montserrat", sans-serif;
        }

        .section-header p {
            text-align: center;
            margin: auto;
            font-size: 15px;
            padding-bottom: 60px;
            color: # #fff;
            width: 50%;
        }

        @media (max-width: 767px) {
            .section-header p {
                width: 100%;
            }
        }

        #services {
            padding: 60px 0 40px 0;
        }

        #services .box {
            padding: 30px;
            position: relative;
            overflow: hidden;
            border-radius: 5px;
            margin: 0 10px 40px 10px;
            background: #fff;
            box-shadow: 0 10px 29px 0 rgba(68, 88, 144, 0.1);
            transition: all 0.3s ease-in-out;
            text-align: center;
        }

        #services .box:hover {
            transform: scale(1.1);
        }

        #services .icon {
            margin: 0 auto 15px auto;
            padding-top: 12px;
            display: inline-block;
            text-align: center;
            border-radius: 50%;
            width: 60px;
            height: 60px;
        }

        #services .icon .service-icon {
            font-size: 36px;
            line-height: 1;
        }

        #services .title {
            font-weight: 700;
            margin-bottom: 15px;
            font-size: 18px;
        }

        #services .title a {
            color: #111;
        }

        #services .box:hover .title a {
            color: #c59c35;
        }

        #services .box:hover .title a:hover {
            text-decoration: none;
        }

        #services .description {
            font-size: 14px;
            line-height: 28px;
            margin-bottom: 0;
            text-align: left;
        }
    </style>
    <section class="services section-bg" id="services" style="background-color: #0a58ca;">
        <div class="container">
            <header class="section-header">
                <h3>Services</h3>

                <p style="color: #fff">Laudem latine persequeris id sed, ex fabulas delectus quo. No vel partiendo
                    abhorreant vituperatoribus.
                </p>
            </header>

            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="box">
                        <div class="icon" style="background: #000;">
                            <i class="fa fa-briefcase service-icon" style="color: #c59c35;"></i>
                        </div>

                        <h4 class="title"><a href="">Service 1</a></h4>

                        <p class="description">Laudem latine persequeris id sed, ex fabulas delectus quo. No vel partiendo
                            abhorreant vituperatoribus.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="box">
                        <div class="icon" style="background: #000;">
                            <i class="fa fa-clipboard service-icon" style="color: #c59c35;"></i>
                        </div>

                        <h4 class="title"><a href="">Service 2</a></h4>

                        <p class="description">Laudem latine persequeris id sed, ex fabulas delectus quo. No vel partiendo
                            abhorreant vituperatoribus.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="box">
                        <div class="icon" style="background: #000;">
                            <i class="fa fa-chart-bar service-icon" style="color: #c59c35;"></i>
                        </div>

                        <h4 class="title"><a href="">Service 3</a></h4>

                        <p class="description">Laudem latine persequeris id sed, ex fabulas delectus quo. No vel partiendo
                            abhorreant vituperatoribus.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="box">
                        <div class="icon" style="background: #000;">
                            <i class="fa fa-binoculars service-icon" style="color: #c59c35;"></i>
                        </div>

                        <h4 class="title"><a href="">Service 4</a></h4>

                        <p class="description">Laudem latine persequeris id sed, ex fabulas delectus quo. No vel partiendo
                            abhorreant vituperatoribus.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="box">
                        <div class="icon" style="background: #000;">
                            <i class="fa fa-cog service-icon" style="color:#c59c35;"></i>
                        </div>

                        <h4 class="title"><a href="">Service 5</a></h4>

                        <p class="description">Laudem latine persequeris id sed, ex fabulas delectus quo. No vel partiendo
                            abhorreant vituperatoribus.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="box">
                        <div class="icon" style="background: #000;">
                            <i class="fa fa-calendar-alt service-icon" style="color: #c59c35;"></i>
                        </div>

                        <h4 class="title"><a href="">Service 6</a></h4>

                        <p class="description">Laudem latine persequeris id sed, ex fabulas delectus quo. No vel partiendo
                            abhorreant vituperatoribus.</p>
                    </div>
                </div>


            </div>
        </div>
    </section>

    @if (is_array($userPermissions) && in_array('Experience', $userPermissions))
        <!--====== Start Resume Section ======-->
        <section class="experiance" id="experiance">
            <div class="my-experiance">
                <div id="section-header">
                    <span>{{ $home_text->experience_title ?? __('Experience') }} </span>
                    <div class="header-img d-flex justify-content-center">
                        <h2 class="exp-header">{{ $home_text->experience_subtitle ?? __('Experience') }}</h2>
                    </div>
                </div>
                <div class="container">
                    @if (count($educations) > 0)
                        <div class="experiance-content">
                            <div class="expc">
                                <div class="ec-header my-5">
                                    <div class="ech-title d-flex gap-3 align-items-center justify-content-center">
                                        <img src="{{ asset('assets/front/css/profile/theme11/images/education-icon.svg') }}"
                                            class="ech-icon" alt="">
                                        <h3>{{ $keywords['Education'] ?? 'Education' }}</h3>
                                    </div>
                                </div>

                                <div class="ec-education d-flex gap-5 justify-content-center">
                                    @foreach ($educations as $education)
                                        <div class="ece-degree d-flex flex-column gap-3">
                                            <div class="eced-header d-flex gap-3 align-items-center">
                                                {{ $education->degree_name }}
                                            </div>
                                            <div class="ece-content">
                                                <span class="">
                                                    {{ \Carbon\Carbon::parse($education->start_date)->format('M j, Y') }}
                                                    -
                                                    @if (!empty($education->end_date))
                                                        {{ \Carbon\Carbon::parse($education->end_date)->format('M j, Y') }}
                                                    @else
                                                        {{ $keywords['Present'] ?? 'Present' }}
                                                    @endif
                                                </span>
                                            </div>

                                            <div class="ece-description">
                                                <span class=""> {!! nl2br($education->short_description) !!} </span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    @if (count($job_experiences) > 0)
                        <div class="experiance-content">
                            <div class="expc">
                                <div class="ec-header mx-3 my-5">
                                    <div class="ech-title d-flex gap-3 align-items-center justify-content-center">
                                        <img src="{{ asset('assets/front/css/profile/theme11/images/job-icon.svg') }}"
                                            class="ech-icon" alt="">
                                        <h3>{{ $keywords['Job'] ?? 'Job' }}</h3>
                                    </div>
                                </div>

                                <div class="ec-education d-flex gap-5 justify-content-center">
                                    @foreach ($job_experiences as $job_experience)
                                        <div class="ece-degree d-flex flex-column gap-3">
                                            <div class="eced-header d-flex gap-3 align-items-center">

                                                {{ $job_experience->designation }} [{{ $job_experience->company_name }}]
                                            </div>
                                            <div class="ece-content">
                                                <span class="date date-bg-one">
                                                    {{ \Carbon\Carbon::parse($job_experience->start_date)->format('M j, Y') }}
                                                    -
                                                    @if ($job_experience->is_continue == 0)
                                                        {{ \Carbon\Carbon::parse($job_experience->end_date)->format('M j, Y') }}
                                                    @else
                                                        {{ $keywords['Present'] ?? 'Present' }}
                                                    @endif
                                                </span>
                                            </div>
                                            <div class="ece-description">
                                                <span class=""> {!! nl2br($job_experience->content) !!}</span>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endif

    {{-- 1 --}}
    {{-- <section class="updates-list" id="updates-list">
        <div class="update">
            <div class="update-box ">
                <div class="container">

                    <div class="about-row">
                        <div class="row">
                            <div class="col-lg-9 col-sm-12 col-md-12">
                                <div class="numb">
                                    <h2>1+</h2>
                                    <span>Work on 3 projects simultaneously</span>
                                </div>
                            </div>
                            <div class="col-lg-9 col-sm-12 col-md-12">
                                <div class="numb">
                                    <h2>1+</h2>
                                    <span>Work on 3 projects simultaneously</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section> --}}



    <style>
        .about{
            background-color: #0a58ca;

        }

        .about-row {
            margin: 0 auto !important;
        }

        .about-box {
            /* padding: 80px 0px; */
        }

        .about-head {
            font-size: 80px;
            text-align: center;
            font-family: var(--font-poppins);
            color: white;
            margin-bottom: 5px;
        }

        .about-para {
            font-size: 25px;
            text-align: center;
            color: white;
            font-weight: 700;
            line-height: 30px;
            margin-top: -2px;
        }
    </style>

    <section class="about">
        <div class="container p-5">
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




    <section class="portfolio" id="portfolio">
        <div class="portfolio-section">
            <div id="section-header">
                <span>Portfolio</span>
                <div class="header-img d-flex justify-content-center">
                    <h2 class="exp-header">Portfolio</h2>
                    <img src="{{ asset('images/Rectangle-experiance.svg') }}" class="bar-image" alt="">
                </div>
            </div>
            <div class="container">
                <div class="portfolio-filter d-flex align-items-center justify-content-center my-3">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="portfolio-filter-button text-center">
                                <ul class="filter-btn mb-30">
                                    <li data-filter="" class="active">All</li>

                                    <li data-filter="">ui/ux design</li>
                                    <li data-filter="">ui/ux design</li>
                                    <li data-filter="">ui/ux design</li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--div class="filter-portfolio">
                                <div class="filter-box d-flex gap-3 flex-wrap">
                                    <div class="filter-button">
                                        <button class="btn-all">All</button>
                                    </div>
                                    <div class="filter-button">
                                        <button class="btn-uiux">ui/ux design</button>
                                    </div>
                                    <div class="filter-button">
                                        <button class="btn-graphic">graphic design</button>
                                    </div>
                                </div>
                            </div--->
                </div>
                <div class="portfolio-content mt-5">
                    <div
                        class="port-image-content slick-slider d-flex align-items-center justify-content-center flex-wrap gap-3">
                        <div class="port-img-con">
                            <img src="{{ '../images/portfolio.png' }}" width="350" alt="">
                            <div class="content">Graphic design project</div>
                        </div>
                        <div class="port-img-con">
                            <img src="{{ '../images/portfolio.png' }}" width="350" alt="">
                            <div class="content">Graphic design project</div>
                        </div>
                        <div class="port-img-con">
                            <img src="{{ '../images/portfolio.png' }}" width="350" alt="">
                            <div class="content">Graphic design project</div>
                        </div>
                        <div class="port-img-con">
                            <img src="{{ '../images/portfolio.png' }}" width="350" alt="">
                            <div class="content">Graphic design project</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>





    {{-- 2 --}}
    <section class="testimonial" id="testimonial">
        <div class="testimonial-div">
            <div class="testimonial-container">
                <div id="section-header">
                    <span class="testimonial-span">testimonial</span>
                    <div class="header-img d-flex justify-content-center">
                        <h2 class="testimonial-h2">testimonial</h2>

                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row">
                        <div class="testimonial-containt testimonial-slider">
                            <div class="card mb-3" style="width:600px">
                                <div class="row">
                                    <div class="col-md-2 d-flex">
                                        <img src="{{ '../images/profile-pic.svg' }}" class="img-fluid rounded-start"
                                            alt="...">
                                    </div>
                                    <div class="col-md-10">
                                        <div class="card-body">
                                            <h5 class="card-title">Daren Hatcher1</h5>
                                            <div class="para-image d-flex ">
                                                <img src="{{ '../images/quotes.svg' }}" alt="">
                                                <p class="card-text">It was a pleasure working with Margie. She did a
                                                    awesome and It was a pleasure working with Margie. She did a awesome and
                                                    cIt was a pleasure working with Margie.
                                                    She did a awesome and reative graphics for digital campaign. She always
                                                    exceeded our expectations, and I highly recommend her for any design
                                                    project.</p>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-3" style="width:600px">
                                <div class="row">
                                    <div class="col-md-2 d-flex">
                                        <img src="{{ '../images/profile-pic.svg' }}" class="img-fluid rounded-start"
                                            alt="...">
                                    </div>
                                    <div class="col-md-10">
                                        <div class="card-body">
                                            <h5 class="card-title">Daren Hatcher1</h5>
                                            <div class="para-image d-flex ">
                                                <img src="{{ '../images/quotes.svg' }}" alt="">
                                                <p class="card-text">It was a pleasure working with Margie. She did a
                                                    awesome and It was a pleasure working with Margie. She did a awesome and
                                                    cIt was a pleasure working with Margie.
                                                    She did a awesome and reative graphics for digital campaign. She always
                                                    exceeded our expectations, and I highly recommend her for any design
                                                    project.</p>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>









    {{-- <section class="blogs" id="blogs">
        <div class="blogs-all">
            <div class="blogs-container">
                <div id="section-header">
                    <span>blogs</span>
                    <div class="header-img d-flex justify-content-center">
                        <h2 class="exp-header">blogsblogsblogs</h2>
                        <img src="{{ asset('images/Rectangle-experiance.svg') }}" class="bar-image" alt="">
                    </div>
                </div>
                <div class="container">
                    <div class="row justify-content-center blog-content blogs-slider m-5" id="blogs-slick">
                        <div class="col-md-4 col-lg-4 col-sm-4 card-blog">
                            <img src="{{ asset('images/portfolio.png') }}" class="card-img-top" alt="...">
                            <div class="card-body-blog">
                                <h5>New Figma Features</h5>
                                <div class="body-content d-flex justify-content-between my-3">
                                    <a href="#" class="blog-link">By Shweta</a>
                                    <p class="card-text">july 06, 2023</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4 col-lg-4 col-md-4 card-blog">
                            <img src="{{ asset('images/portfolio.png') }}" class="card-img-top" alt="...">
                            <div class="card-body-blog">
                                <h5>New Figma Features</h5>
                                <div class="body-content d-flex justify-content-between my-3">
                                    <a href="#" class="blog-link">By Shweta</a>
                                    <p class="card-text">july 06, 2023</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-lg-4 col-sm-4 col-md-4 card-blog">
                            <img src="{{ asset('images/portfolio.png') }}" class="card-img-top" alt="...">
                            <div class="card-body-blog">
                                <h5>New Figma Features</h5>
                                <div class="body-content d-flex justify-content-between my-3">
                                    <a href="#" class="blog-link">By Shweta</a>
                                    <p class="card-text">july 06, 2023</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}


    <style>
        /* section {
                        padding: 60px 0;
                        min-height: 100vh;
                    }

                    a,
                    a:hover,
                    a:focus,
                    a:active {
                        text-decoration: none;
                        outline: none;
                    }

                    ul {
                        margin: 0;
                        padding: 0;
                        list-style: none;
                    }

                    .bg-gray {
                        background-color: #f9f9f9;
                    } */

        .site-heading h2 {
            display: block;
            font-weight: 700;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .site-heading h2 span {
            color: blue;
        }

        .site-heading h4 {
            display: inline-block;
            padding-bottom: 20px;
            position: relative;
            text-transform: capitalize;
            z-index: 1;
        }

        .site-heading h4::before {
            background: blue none repeat scroll 0 0;
            bottom: 0;
            content: "";
            height: 2px;
            left: 50%;
            margin-left: -25px;
            position: absolute;
            width: 50px;
        }

        .site-heading {
            margin-bottom: 60px;
            overflow: hidden;
            margin-top: -5px;
        }

        .carousel-shadow .owl-stage-outer {
            margin: -15px -15px 0;
            padding: 15px;
        }

        .we-offer-area .our-offer-carousel .owl-dots .owl-dot span {
            background: #ffffff none repeat scroll 0 0;
            border: 2px solid;
            height: 15px;
            margin: 0 5px;
            width: 15px;
        }

        .we-offer-area .our-offer-carousel .owl-dots .owl-dot.active span {
            background: blue none repeat scroll 0 0;
            border-color: blue;
        }

        .we-offer-area .item {
            background: #ffffff none repeat scroll 0 0;
            border-left: 2px solid blue;
            -moz-box-shadow: 0 0 10px #cccccc;
            -webkit-box-shadow: 0 0 10px #cccccc;
            -o-box-shadow: 0 0 10px #cccccc;
            box-shadow: 0 0 10px #cccccc;
            overflow: hidden;
            padding: 30px;
            position: relative;
            z-index: 1;
        }

        .we-offer-area.text-center .item {
            background: #ffffff none repeat scroll 0 0;
            border: medium none;
            padding: 67px 40px 64px;
        }

        .we-offer-area.text-center .item i {
            background: blue none repeat scroll 0 0;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
            color: #ffffff;
            font-size: 40px;
            height: 80px;
            line-height: 80px;
            position: relative;
            text-align: center;
            width: 80px;
            z-index: 1;
            transition: all 0.35s ease-in-out;
            -webkit-transition: all 0.35s ease-in-out;
            -moz-transition: all 0.35s ease-in-out;
            -ms-transition: all 0.35s ease-in-out;
            -o-transition: all 0.35s ease-in-out;
            margin-bottom: 25px;
        }

        .we-offer-area.text-center .item i::after {
            border: 2px solid blue;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
            content: "";
            height: 90px;
            left: -5px;
            position: absolute;
            top: -5px;
            width: 90px;
            z-index: -1;
            transition: all 0.35s ease-in-out;
            -webkit-transition: all 0.35s ease-in-out;
            -moz-transition: all 0.35s ease-in-out;
            -ms-transition: all 0.35s ease-in-out;
            -o-transition: all 0.35s ease-in-out;
        }

        .we-offer-area.item-border-less .item {
            border: medium none;
        }

        .we-offer-area .our-offer-items.less-carousel .equal-height {
            margin-bottom: 30px;
        }

        .we-offer-area.item-border-less .item .number {
            font-family: "Poppins", sans-serif;
            font-size: 50px;
            font-weight: 900;
            opacity: 0.1;
            position: absolute;
            right: 30px;
            top: 30px;
        }

        .our-offer-carousel.center-active .owl-item:nth-child(2n) .item,
        .we-offer-area.center-active .single-item:nth-child(2n) .item {
            background: blue none repeat scroll 0 0;
        }

        .our-offer-carousel.center-active .owl-item:nth-child(2n) .item i,
        .our-offer-carousel.center-active .owl-item:nth-child(2n) .item h4,
        .our-offer-carousel.center-active .owl-item:nth-child(2n) .item p,
        .we-offer-area.center-active .single-item:nth-child(2n) .item i,
        .we-offer-area.center-active .single-item:nth-child(2n) .item h4,
        .we-offer-area.center-active .single-item:nth-child(2n) .item p {
            color: #ffffff;
        }

        .we-offer-area .item i {
            color: blue;
            display: inline-block;
            font-size: 60px;
            margin-bottom: 20px;
        }

        .we-offer-area .item h4 {
            font-weight: 600;
            text-transform: capitalize;
        }

        .we-offer-area .item p {
            margin: 0;
        }

        .we-offer-area .item i,
        .we-offer-area .item h4,
        .we-offer-area .item p {
            transition: all 0.35s ease-in-out;
            -webkit-transition: all 0.35s ease-in-out;
            -moz-transition: all 0.35s ease-in-out;
            -ms-transition: all 0.35s ease-in-out;
            -o-transition: all 0.35s ease-in-out;
        }

        .we-offer-area .item::after {
            background: blue none repeat scroll 0 0;
            content: "";
            height: 100%;
            left: -100%;
            position: absolute;
            top: 0;
            transition: all 0.35s ease-in-out;
            -webkit-transition: all 0.35s ease-in-out;
            -moz-transition: all 0.35s ease-in-out;
            -ms-transition: all 0.35s ease-in-out;
            -o-transition: all 0.35s ease-in-out;
            width: 100%;
            z-index: -1;
        }

        .we-offer-area .item:hover::after {
            left: 0;
        }

        .we-offer-area .item:hover i,
        .we-offer-area .item:hover h4,
        .we-offer-area .item:hover p {
            color: #ffffff !important;
        }

        .we-offer-area.text-center .item:hover i::after {
            border-color: #ffffff !important;
        }

        .we-offer-area.text-center .item:hover i {
            background-color: #ffffff !important;
            color: blue !important;
        }

        .we-offer-area.text-left .item i {
            background: blue none repeat scroll 0 0;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
            color: #ffffff;
            display: inline-block;
            font-size: 60px;
            height: 100px;
            line-height: 100px;
            margin-bottom: 30px;
            position: relative;
            width: 100px;
            z-index: 1;
            text-align: center;
        }

        .we-offer-area.text-left .item i::after {
            border: 2px solid blue;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
            content: "";
            height: 120px;
            left: -10px;
            position: absolute;
            top: -10px;
            width: 120px;
        }
    </style>
    <section class="we-offer-area text-center bg-gray p-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="site-heading text-center">
                        <h2>My <span>Blogs</span></h2>
                        <h4>Lorem Ipsum is simply dummy text</h4>
                    </div>
                </div>
            </div>
            <div class="row our-offer-items less-carousel">
                <!-- Single Item -->
                <div class="col-md-4 col-sm-6 equal-height">
                    <div class="item">
                        <i class="fas fa-pen-fancy"></i>
                        <h4>Project creation</h4>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </p>
                    </div>
                </div>
                <!-- End Single Item -->

                <!-- Single Item -->
                <div class="col-md-4 col-sm-6 equal-height">
                    <div class="item">
                        <i class="fas fa-dharmachakra"></i>
                        <h4>Software Development</h4>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </p>
                    </div>
                </div>
                <!-- End Single Item -->

                <!-- Single Item -->
                <div class="col-md-4 col-sm-6 equal-height">
                    <div class="item">
                        <i class="fas fa-tasks"></i>
                        <h4>Porject Management</h4>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </p>
                    </div>
                </div>
                <!-- End Single Item -->

                <!-- Single Item -->
                <div class="col-md-4 col-sm-6 equal-height">
                    <div class="item">
                        <i class="fas fa-tachometer-alt"></i>
                        <h4>Porject Impliment</h4>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </p>
                    </div>
                </div>
                <!-- End Single Item -->

                <!-- Single Item -->
                <div class="col-md-4 col-sm-6 equal-height">
                    <div class="item">
                        <i class="fas fa-recycle"></i>
                        <h4>Software Update</h4>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </p>
                    </div>
                </div>
                <!-- End Single Item -->

                <!-- Single Item -->
                <div class="col-md-4 col-sm-6 equal-height">
                    <div class="item">
                        <i class="fas fa-headset"></i>
                        <h4>24/7 Support</h4>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </p>
                    </div>
                </div>
                <!-- End Single Item -->
            </div>
        </div>
    </section>



    <section class="contact" id="contact">
        <div class="contact">
            <div class="contact-box">
                <div id="section-header">
                    <span>contact</span>
                    <div class="header-img d-flex justify-content-center">
                        <h2 class="exp-header">Contact</h2>
                        <img src="{{ asset('images/Rectangle-experiance.svg') }}" class="bar-image" alt="">
                    </div>
                </div>
                <div class="container">
                    <div class="contact-form p-3">
                        <form action="" method="" class="contact">

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="" placeholder=" Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <input type="email" class="form-control" id="" placeholder=" Email">
                                    </div>
                                </div>
                            </div>


                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="" placeholder="Subject">
                                    </div>
                                </div>

                            </div>

                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <textarea type="text" class="form-control" name="" id="" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4 contact-btn">
                                <input type="button" class="btn btn-settings" value="Save Settings">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection
