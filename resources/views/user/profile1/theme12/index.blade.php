@extends('user.profile1.theme12.layout')
@section('content')    
<section id="header">
    <div class="header-left-box">
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
                            <a href="#about" class="aboutt"><i class="fas fa-user"></i></a>
                            <span>{{ $keywords['About'] ?? 'About' }}</span>
                        </li>

                        @if (is_array($userPermissions) && in_array('Skill', $userPermissions))
                            <li>
                                <a href="#skill" class="skill"><i class="fas fa-user"></i></a>
                                <span>{{ $keywords['Skill'] ?? 'Skill' }}</span>
                            </li>
                        @endif

                        @if (is_array($userPermissions) &&
                                is_array($packagePermissions) &&
                                in_array('Service', $userPermissions) &&
                                in_array('Service', $packagePermissions))
                            <li>
                              
                                <li>
                                    <a href="#services" class="@if (request()->routeIs('front.user.services') || request()->routeIs('front.user.service.detail')) active @endif"><i class="fas fa-cog"></i></a>
                                    <span>{{ $keywords['Services'] ?? 'Services' }}</span>
                                </li>                            
                        @endif

                        @if (is_array($userPermissions) && in_array('Experience', $userPermissions))
                            <li>
                                <a href="#experience" class="experience"><i class="fas fa-portrait"></i></a>
                                <span>{{ $keywords['Experience'] ?? 'Experience' }}</span>
                            </li>
                        @endif

                        @if (is_array($userPermissions) &&
                                is_array($packagePermissions) &&
                                in_array('Portfolio', $userPermissions) &&
                                in_array('Portfolio', $packagePermissions))
                            <li>
                                <a href="#portfolio" class="portfolio"><i class="fas fa-folder-open"></i></a>
                                <span>{{ $keywords['Portfolios'] ?? 'Portfolios' }}</span>
                            </li>
                        @endif

                        @if (is_array($userPermissions) && in_array('Testimonial', $userPermissions))
                            <li>
                                <a href="#Testimonials" class="Testimonials"><i class="fas fa-thumbs-up"></i></a>
                                <span>{{ $keywords['Testimonial'] ?? 'Testimonial' }}</span>
                            </li>
                        @endif

                        @if (is_array($userPermissions) &&
                                is_array($packagePermissions) &&
                                in_array('Blog', $userPermissions) &&
                                in_array('Blog', $packagePermissions))
                            <li>
                                <a href="#Blog" class="blogg"><i class="fas fa-newspaper"></i></a>
                                <span>{{ $keywords['Blogs'] ?? 'Blogs' }}</span>
                            </li>
                        @endif


                        @if (is_array($userPermissions) && in_array('Contact', $userPermissions))
                            <li>
                                <a href="#contact" class=" @if (request()->routeIs('front.user.contact')) active @endif"><i
                                        class="fas fa-comments"></i></a>
                                <span>{{ $keywords['Contact'] ?? 'Contact' }}</span>
                                
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
            <div class="nav-button">
                @if (isset($userBs->cv))
                    <a href="{{ asset('assets/front/img/user/cv/' . $userBs->cv) }}"
                        download="{{ $user->username }}.pdf">
                        {{ $keywords['Download_CV'] ?? 'Download CV' }}</a>
                @endif
            </div>
        </div>
    </div>
    <div class="header-right-box">
        <div class="logo-div">           
            <a href="{{ route('front.user.detail.view', getParam()) }}"><img
                src="{{ isset($userBs->logo)
                    ? asset('assets/front/img/user/' . $userBs->logo)
                    : asset('assets/front/img/profile1/theme3/logo.png') }}"
                alt="Brand Logo" class="theme-3-logo"></a>
        </div>

        <div class="header-content">
            <p class="header-content-sub">Hi I'm
            <p class="header-content-name">{{ $home_text->first_name ?? $user->first_name }}
            <h1>
                @php
                    $designations = explode(',', $home_text->designation ?? '');
                @endphp

                @if (!empty($designations))
                    <div class="type-string">
                        @foreach ($designations as $designation)
                            <p class="header-content-sub">I am {{ $designation }}
                        @endforeach
                    </div>
                @endif
                <button class="main-btn btn">HIRE ME </button>
        </div>
        <div class="header-image-box">
            <img src="{{ URL::asset('assets/images/Rectangle 63.png') }}" />
        </div>
        <div class="header-image">
            @if (isset($home_text->hero_image))
                <img src="{{ asset('assets/front/img/user/home_settings/' . $home_text->hero_image) }}" class="lazy"
                    alt="Hero Image">
            @endif
        </div>
    </div>
</section>
    <section class="section-gap" id="about">
        <div class="row" id="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-7" class="about-left-box-1">
                <div class="about-content">
                    <p class="about-content-sub">{{ $home_text->about_title ?? 'My Resume' }}</p>
                    <p class="about-content-name">{{ $home_text->about_subtitle ?? 'About Me' }}</p>
                    <p>{!! nl2br($home_text->about_content ?? '') !!}</p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5" class="about-right-box-1">
                <div class="about-right-box-11">
                    @if (isset($home_text->about_image))
                        <img src="{{ asset('assets/front/img/user/home_settings/' . $home_text->about_image) }}"
                            class="lazy" alt="Hero Image">
                    @endif
                    <div class="about-orange-box"></div>
                    <div class="about-black-box"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-gap" id="skill">
        <div class="row" id="row" style="margin-top:180px">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5" style="    padding-left: 76px;">
                @isset($home_text->skills_image)
                    <img src="{{ asset('assets/front/img/user/home_settings/' . $home_text->skills_image) }}" class="lazy"
                        alt="Image">
                @endisset
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-7">
                <div class="about-content-2">
                    <p class="about-content-sub">{{ $home_text->skills_title ?? __('Skills') }}</p>
                    <p class="about-content-name">{{ $home_text->skills_subtitle ?? __('Technical Skills') }}</p>
                    @foreach ($skills as $skill)
                        <div class="row" id="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bar-section">
                                <p class="about-skills">{{ $skill->title }}</p>
                            </div>
                            <div class="progress about-progress col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="progress-bar" role="progressbar" style="width: 90%; background-color:#F76976;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                <p class="about-skills">&nbsp {{ $skill->percentage }}%</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="section-gap section-dark" id="services">
        <div class="row" id="row" style="display:grid">
            <div class="col-sm-3 col-md-3 col-lg-3 services-row-1">
                <p class="para" style="color:#F26457">{{ $home_text->service_title ?? __('Services') }}</p>
                <p class="section-head" style="color:white">{{ $home_text->service_subtitle ?? __('What I Do ?') }}</p>
            </div>
        </div>

        <div class="grid-container" id="testimonial_item">
            @foreach ($services as $service)
                <div class="grid-item" id="item_testimonial">
                        <div class="service-image">
                            <img src="{{ isset($service->image) ? asset('assets/front/img/user/services/' . $service->image) : asset('assets/front/img/profile/service-1.jpg') }}"
                                style="height:200px" alt="">
                        </div>
                        <div class="service-head">
                            {{-- <h4>{{$service->name}}</h4> --}}
                            <h4><a href="{{ route('front.user.service.detail', [getParam(), 'slug' => $service->slug, 'id' => $service->id]) }}">
                                {{ strlen($service->name) > 30 ? mb_substr($service->name, 0, 30, 'UTF-8') . '...' : $service->name }}
                            </a><h4>
                        </div>
                        {{-- <div class="service-head">
                            <ul>
                                <li class="service-li">social media creatives</li>
                                <li class="service-li">social media creatives</li>
                            </ul>
                        </div> --}}

                        {{-- <div class="service-arrow">
                            <img src="{{ URL::asset('assets/images/Group 196.svg') }}" />
                        </div> --}}
                </div>
            @endforeach
        </div>
    </section>

    

    <section class="section-light section-gap" id="experience">
        <div class="row" id="row" style="display:grid">
            <div class="col-sm-3 col-md-3 col-lg-3 services-row-1">
                <p class="para"> {{ $home_text->experience_title ?? __('Experience') }}</p>
                <p class="section-head">{{ $home_text->experience_subtitle ?? __('Experience') }}</p>
            </div>

        </div>
        <div class="grid-div-exp">
            <div class="grid-div-item">
                <div class="exp-head">
                    <img src="{{ URL::asset('assets/images/system-uicons_book-text.svg') }}" class="exp-image" /> <i
                        class="fas fa-user-graduate"></i>
                    <p class="exp-para">{{ $keywords['Education'] ?? 'Education' }}</p>
                </div>
                @foreach ($educations as $education)
                    <div class="exp-content">
                        <div class="exp-sub-content">
                            <p class="exp-sub-head">{{ $education->degree_name }}</p>
                            <p class="exp-sub-desc">{!! nl2br($education->short_description) !!}</p>
                        </div>
                        <div class="exp-sub-content">
                            <p class="exp-sub-date" style="text-align:right">
                                {{ \Carbon\Carbon::parse($education->start_date)->format('M j, Y') }}
                                -
                                @if (!empty($education->end_date))
                                    {{ \Carbon\Carbon::parse($education->end_date)->format('M j, Y') }}
                                @else
                                    {{ $keywords['Present'] ?? 'Present' }}
                                @endif
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="grid-div-item">
                <div class="exp-head">
                    <img src="{{ URL::asset('assets/images/ic_twotone-work-outline.svg') }}" class="exp-image" />
                    <p class="exp-para">{{ $keywords['Job'] ?? 'Job' }}</p>
                </div>
                @foreach ($job_experiences as $job_experience)
                    <div class="exp-content">
                        <div class="exp-sub-content">
                            <p class="exp-sub-head">{{ $job_experience->designation }}
                                <br>[{{ $job_experience->company_name }}]
                            </p>
                            <p class="exp-sub-desc">{!! nl2br($job_experience->content) !!}</p>
                        </div>
                        <div class="exp-sub-content">
                            <p class="exp-sub-date" style="text-align:right">
                                {{ \Carbon\Carbon::parse($job_experience->start_date)->format('M j, Y') }} -
                                @if ($job_experience->is_continue == 0)
                                    {{ \Carbon\Carbon::parse($job_experience->end_date)->format('M j, Y') }}
                                @else
                                    {{ $keywords['Present'] ?? 'Present' }}
                                @endif
                            </p>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="exp-content">
                    <div class="exp-sub-content">
                        <p class="exp-sub-head">Sr. Graphic designer <br>[Butterfly Creative Studio]</p>
                        <p class="exp-sub-desc">description</p>
                    </div>
                    <div class="exp-sub-content">
                        <p class="exp-sub-date" style="text-align:right">Jul 27, 2017 - Jun 27, 2020</p>
                    </div>
                </div>
                <div class="exp-content">
                    <div class="exp-sub-content">
                        <p class="exp-sub-head">Sr. Graphic designer <br>[Butterfly Creative Studio]</p>
                        <p class="exp-sub-desc">description</p>
                    </div>
                    <div class="exp-sub-content">
                        <p class="exp-sub-date" style="text-align:right">Jul 27, 2017 - Jun 27, 2020</p>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>

    @if (is_array($userPermissions) && in_array('Achievements', $userPermissions))
        <section class="section-grey section-gap" id="count">
            <div class="count-grid">
                @foreach ($achievements as $achievement)
                    <div class="count-grid-item">
                        <p class="count-head">{{ $achievement->count }}+</p>
                        <p class="count-sub-head">{{ $achievement->title }}</p>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    <section class="section-light section-gap" id="portfolio">
        <div class="row" id="row" style="display:grid">
            <div class="col-sm-3 col-md-3 col-lg-3 services-row-1">
                <p class="para"> {{ $home_text->portfolio_title ?? __('Portfolios') }}</p>
                <p class="section-head">{{ $home_text->portfolio_subtitle ?? __('Portfolios') }}</p>
            </div>
        </div>

        <div class="portfolio-grid">
            <div class="portfolio-grid-item">
                <div class="portfolio-tab-top">
                    <p class="portfolio-tab-top-content">All</p>
                </div>
                @foreach ($portfolio_categories as $portfolio_category)
                    <div class="portfolio-tab">
                        <p class="portfolio-tab-top-content portfolio-tab-content"
                            data-filter=".cat-{{ $portfolio_category->id }}">{{ $portfolio_category->name }}</p>
                    </div>
                @endforeach
            </div>
            <div class="portfolio-grid-item" style="display:flex">
                    @foreach ($portfolios as $portfolio)
                    <a class="pr" href="{{route('front.user.portfolio.detail', [getParam(), $portfolio->slug, $portfolio->id])}}">
                    <img src="{{ asset('assets/front/img/user/portfolios/' . $portfolio->image) }}" alt="Image">
                    </a>
                    @endforeach
            </div>
        </div>
    <section>

    <section class="section-light section-gap" id="Testimonials">
        <div class="row" id="row" style="display:grid">
            <div class="col-sm-3 col-md-3 col-lg-3 services-row-1">
                <p class="para">{{ $home_text->testimonial_title ?? __('Testimonials') }}</p>
                <p class="section-head">{{ $home_text->testimonial_subtitle ?? __('Testimonials') }}</p>
            </div>

            <div class="testimonial-grid">
                @foreach ($testimonials as $testimonial)
                    <div class="testimonial-grid-item">
                        <p class="testimonial-coma">66</p>
                        <p class="testimonial-para">{!! nl2br($testimonial->content) !!}</p>
                        <div class="testimonial-grid-2">
                            <div class="testimonial-grid-2-item">
                                <img src="{{ asset('assets/front/img/user/testimonials/' . $testimonial->image) }}"
                                    class="testimonial-image" alt="">
                            </div>
                            <div class="testimonial-grid-2-item">
                                <p class="testimonial-grid-2-name">{{ $testimonial->name }} </p>
                                @if (!empty($testimonial->occupation))
                                    <p class="testimonial-grid-2-para">{{ $testimonial->occupation }}</p>
                                @endif
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- <div class="testimonial-arrow-grid">
        <div class="testimonial-arrow-grid-item"> <img
                src="{{ URL::asset('assets/images/left arrow.jpeg') }}" /></div>
        <div class="testimonial-arrow-grid-item"><img src="{{ URL::asset('assets/images/Group 196.svg') }}" />
        </div>
    </div> --}}
    </section>

    <section class="section-grey section-gap" id="Blog" style="padding-bottom:0px;!important">
        <div class="row" id="row" style="display:grid">
            <div class="col-sm-3 col-md-3 col-lg-3 services-row-1">
                <p class="para">{{ $home_text->blog_title ?? __('Blogs') }}</p>
                <p class="section-head">{{ $home_text->blog_subtitle ?? 'Blogs' }}</p>
            </div>
           
            <div class="blog-grid">
                @foreach ($blogs as $blog)
                    <div class="blog-grid-item">
                        <div class="blog-image">
                            <a class="post-thumbnail d-block" href="{{route('front.user.blog.detail', [getParam(), $blog->slug, $blog->id])}}">
                                <img class="lazy" src="{{asset('assets/front/img/user/blogs/'.$blog->image)}}" alt="Blog Image" style="height
                                :350px">
                            </a>                      
                                <p>{{ \Carbon\Carbon::parse($blog->created_at)->format('d') }}</p>
                                <p class="blog-date">{{ \Carbon\Carbon::parse($blog->created_at)->format('M') }}
                                </p>
                            </div>
                            <div class="blog-orange-box">
                                <p class="orange-box-content">                                    
                                    {{ $blog->title }}
                                </p>
                                <div class="orange-sub-grid">
                                    <div class="orange-sub-grid-item-left"> {{ $keywords['by'] ?? 'by' }}
                                        {{ $user->username }} </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    </section>

    <section class="section-light section-gap" id="contact">
        <div class="row" id="row" style="display:grid">
            <div class="col-sm-3 col-md-3 col-lg-3 services-row-1">
                <p class="para"> {{ $home_text->contact_title ?? __('Get in touch') }}</p>
                <p class="section-head">{{ $home_text->contact_subtitle ?? __('Get in touch') }}</p>
            </div>
            <div class="contact-grid-2">
                <form class="row contact_form" action="{{ route('front.contact.message', [getParam()]) }}"
                    enctype="multipart/form-data" method="post" id="contactForm" novalidate="novalidate">
                    @csrf
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <input type="text"class="form-control input" id="exampleFormControlInput1"
                        placeholder="{{ $keywords['Name'] ?? 'Name' }}" name="fullname">
                    @if ($errors->has('fullname'))
                        <p class="text-danger mb-0">{{ $errors->first('fullname') }}</p>
                    @endif
                    <input type="text" class="form-control input-2" id="exampleFormControlInput1"
                        placeholder="{{ $keywords['Email_Address'] ?? 'Email Address' }}" name="email">
                    @if ($errors->has('email'))
                        <p class="text-danger mb-0">{{ $errors->first('email') }}</p>
                    @endif
                    <input type="text" class="form-control input-2" id="exampleFormControlInput1"
                        placeholder="{{ $keywords['Subject'] ?? 'Subject' }}" name="subject">
                    @if ($errors->has('subject'))
                        <p class="text-danger mb-0">{{ $errors->first('subject') }}</p>
                    @endif
                    <textarea class="form-control input" id="exampleFormControlInput1"
                        placeholder="{{ $keywords['Message'] ?? 'Message' }}" name="message" style=" height: 165px!important;"></textarea>
                    @if ($errors->has('message'))
                        <p class="text-danger mb-0">{{ $errors->first('message') }}</p>
                    @endif
                    <div class="col-md-12 text-center">
                        <button type="submit" value="submit" class="btn submit_btn"
                            style="background:#f26457">Send
                            Message</button>
                    </div>
                </form>
            </div>
    </section>
@endsection
