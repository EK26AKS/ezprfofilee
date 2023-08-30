@extends('user.profile1.theme15.layout')

@section('tab-title')
    {{ $keywords['Home'] ?? 'Home' }}
@endsection

@section('meta-description', !empty($userSeo) ? $userSeo->home_meta_description : '')
@section('meta-keywords', !empty($userSeo) ? $userSeo->home_meta_keywords : '')

@section('content')

<section class="hero" id="hero">
    <div class="container">
        <div class="hero-container d-flex justify-content-center align-items-center gap-5">
            <div class="row">
                <div class="col-lg-7">
                    <div class="hero-container1">
                        <h2>Hi,<br>I'm {{ $home_text->first_name ?? $user->first_name }}</h2>
                        @php
                            $designations = explode(',', $home_text->designation ?? '');
                        @endphp

                        @if (!empty($designations))
                            <div class="type-string">
                                @foreach ($designations as $designation)
                                    <span class="">I am {{ $designation }}</span>
                                @endforeach
                            </div>
                        @endif
                        <a href="#" class="btn-hireme">hire me</a>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="hero-container2">
                        <div class="hero-img">
                            @if (isset($home_text->hero_image))
                                <img src="{{ asset('/assets/front/img/user/home_settings/' . $home_text->hero_image) }}"
                                    class="lazy" alt="Hero Image">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="background-circle">
            <img src="{{ asset('assets/front/img/background-circle.svg') }}" alt="">
        </div>
        <div class="background-circle2">
            <img src="{{ asset('assets/front/img/background-circle.svg') }}" alt="">
        </div>
    </div>
</section>

<section class="about-me" id="about-me">
    <div class="container">
        <div class="aboutme-container d-flex justify-content-center gap-5">
            <div class="row">
                <div class="col-lg-4">
                    <div class="aboutme-container2">
                        <div class="aboutme-img d-flex flex-column justify-content-center align-items-center gap-5">
                            <div class="aboutmeimg">
                                @if (isset($home_text->about_image))
                                    <img width="400"
                                        src="{{ asset('assets/front/img/user/home_settings/' . $home_text->about_image) }}"
                                        class="lazy" alt="Hero Image">
                                @endif
                            </div>
                            <div class="aboutme-cv">
                                <a href="#" download>
                                    <input name="" class="form-control" id="downloadcv" value="Download CV"
                                        hidden>
                                    <label for="downloadcv">Download CV <img
                                            src="{{ asset('images/temp1-figma2/download.png') }}" alt="">
                                    </label>
                                </a>
                            </div>
                        </div>
                        <div class="background-circle">
                            <img src="{{ asset('assets/front/img/background-circle.svg') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 aboutmecontainer">
                    <div class="aboutme-container1">
                        <span class="header-aboutme">{{ $home_text->about_title ?? 'My Resume' }}</span>
                        <h4> <strong class="strong">{{ $home_text->about_subtitle ?? 'About Me' }}</strong> </h4>
                        <p>“{!! nl2br($home_text->about_content ?? '') !!}”</p>
                    </div>
                    <div class="know-more">
                        <div class="aboutme-filter-button text-center">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" align-items-center
                                justify-content-center>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-home" type="button" role="tab"
                                        aria-controls="pills-home"
                                        aria-selected="true">{{ $keywords['Experience'] ?? 'Experience' }}</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-profile" type="button" role="tab"
                                        aria-controls="pills-profile"
                                        aria-selected="false">{{ $keywords['Education'] ?? 'Education' }}</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-contact" type="button" role="tab"
                                        aria-controls="pills-contact"
                                        aria-selected="false">{{ $keywords['Awards'] ?? 'Awards' }}</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <div class="details mt-5">
                                @foreach ($job_experiences as $job_experience)
                                    <div class="details-all">
                                        <div class="header-all">
                                            <h6>{{ $job_experience->designation }}
                                                [{{ $job_experience->company_name }}]</h6>
                                            <span>
                                                {{ \Carbon\Carbon::parse($job_experience->start_date)->format('M j, Y') }}
                                                -
                                                @if ($job_experience->is_continue == 0)
                                                    {{ \Carbon\Carbon::parse($job_experience->end_date)->format('M j, Y') }}
                                                @else
                                                    {{ $keywords['Present'] ?? 'Present' }}
                                                @endif
                                            </span>
                                        </div>
                                        <div class="details-para">
                                            <p>{!! nl2br($job_experience->content) !!}.</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab">
                            <div class="details mt-5">
                                @foreach ($educations as $education)
                                    <div class="details-all">
                                        <div class="header-all">
                                            <h6>{{ $education->degree_name }}</h6>
                                            <span>
                                                {{ \Carbon\Carbon::parse($education->start_date)->format('M j, Y') }}
                                                -
                                                @if (!empty($education->end_date))
                                                    {{ \Carbon\Carbon::parse($education->end_date)->format('M j, Y') }}
                                                @else
                                                    {{ $keywords['Present'] ?? 'Present' }}
                                                @endif
                                            </span>
                                        </div>
                                        <div class="details-para">
                                            <p>{!! nl2br($education->short_description) !!}.</p>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        {{-- <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <div class="details mt-5">
                                <div class="details-all">
                                    <div class="header-all">
                                        <h6>Web Developer Intern [XYZ Company]</h6>
                                        <span>FEB 25, 2022 - MAY 10, 2022</span>
                                    </div>
                                    <div class="details-para">
                                        <p>Assisted in front-end development tasks, including coding HTML/CSS templates and implementing JavaScript functionality.Collaborated with the development team to troubleshoot and resolve website issues.Contributed to the redesign of a client's website, resulting in improved user experience and increased engagement.</p>
                                    </div>
                                </div>
        
                                <div class="details-all">
                                    <div class="header-all">
                                        <h6>Web Developer Intern [XYZ Company]</h6>
                                        <span>FEB 25, 2022 - MAY 10, 2022</span>
                                    </div>
                                    <div class="details-para">
                                        <p>Assisted in front-end development tasks, including coding HTML/CSS templates and implementing JavaScript functionality.Collaborated with the development team to troubleshoot and resolve website issues.Contributed to the redesign of a client's website, resulting in improved user experience and increased engagement.</p>
                                    </div>
                                </div>
        
                                <div class="details-all">
                                    <div class="header-all">
                                        <h6>Web Developer Intern [XYZ Company]</h6>
                                        <span>FEB 25, 2022 - MAY 10, 2022</span>
                                    </div>
                                    <div class="details-para">
                                        <p>Assisted in front-end development tasks, including coding HTML/CSS templates and implementing JavaScript functionality.Collaborated with the development team to troubleshoot and resolve website issues.Contributed to the redesign of a client's website, resulting in improved user experience and increased engagement.</p>
                                    </div>
                                </div>
                            </div>

                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="tools" id="tools">

    <div class="container">
        <div class="tools-container1">
            <h4>{{ $home_text->skills_title ?? __('Skills') }}</h4>
            <span>{{ $home_text->skills_subtitle ?? __('Technical Skills') }}</span>
            <p>{!! nl2br($home_text->skills_content ?? '') !!}</p>
        </div>
     

        <div class="tools-container2">
            <div class="background-circle">
                {{-- <img src="{{ asset('assets/front/img/background-circle.svg') }}" alt=""> --}}
            </div>
            <div class="tools-image">
                @foreach ($skills as $skill)
                    <div class="images-skills" style="width:190px">
                        <div class="skill-circle">                    
                            <div data-donutty data-radius="30" data-thickness="5"  data-round="true" data-bar-color="#F78058" data-bg="#E9F1F9" data-color="#C44467" data-value="{{$skill->percentage}}"></div>                            
                        </div>                                                  
                        <div class="chart-inner" style="position: relative;
                        top: -117px;
                        left: 65px;font-size:30px">
                            <div class="counter-wrap">
                                <span class="counter">{{$skill->percentage}}</span>
                                <span class="suffix">%</span>
                            </div>                            
                        </div>                                                                                                                            
                        <div class="skills-heading">
                            <h5>{{ $skill->title }}</h5>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</section>

@if (is_array($userPermissions) && in_array('Portfolio', $userPermissions))
<!--====== Project Section Start ======-->
<section class="portfolio-section section-gap"  id="portfolio" style="position:relative;background: linear-gradient(180deg, #E9F1F9 0%, #F1F6FB 54.17%, rgba(255, 255, 255, 0.00) 100%)">
    <div class="container" style="padding:90px 0px">
        <div class="common-heading text-center mb-50">
            <span class="tagline" style="color: #C44467; font-family: Poppins; font-size: 36px; font-weight: 600">{{ $home_text->portfolio_title ?? __('Portfolios') }}</span>
            <h2 class="title">{{ $home_text->portfolio_subtitle ?? __('Portfolios') }}</h2>
        </div>
        <div class="project-filter">
            <ul>
                <li data-filter="*" class="active">{{ $keywords['All'] ?? __('All') }}</li>
                @foreach ($portfolio_categories as $portfolio_category)
                    <li data-filter=".cat-{{ $portfolio_category->id }}">{{ $portfolio_category->name }}</li>
                @endforeach
            </ul>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="project-loop row">
                    @foreach ($portfolios as $portfolio)
                        <div class="col-lg-4 col-md-4 cat-{{ $portfolio->bcategory->id }}">
                            <div class="project-item">
                                <img class="lazy"
                                    src="{{ asset('assets/front/img/user/portfolios/' . $portfolio->image) }}"
                                    alt="ProjectImage">
                                <a href="{{ route('front.user.portfolio.detail', [getParam(), $portfolio->slug, $portfolio->id]) }}"
                                    class="title">
                                    <span>{{ strlen($portfolio->title) > 25 ? mb_substr($portfolio->title, 0, 25, 'UTF-8') . '...' : $portfolio->title }}</span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!--====== Project Section End ======-->
@endif


@if (is_array($userPermissions) && in_array('Testimonial', $userPermissions))
<section class="testimonial-section section-gap bg-offwhite-color" id="tools">
    <div class="container">
        <div class="common-heading text-center mb-50">
            <span class="tagline" style="color: #C44467; font-family: Poppins; font-size: 36px; font-weight: 600;">{{ $home_text->testimonial_title ?? __('Testimonials') }}</span>
            <h2 class="title">{{ $home_text->testimonial_subtitle ?? __('Testimonials') }}</h2>
        </div>
        <div class="card-slider w-100">
            @foreach ($testimonials as $testimonial)
            <div class="card col-lg-4 col-sm-12 col-xs-12">
                <div class="author-wrap">
                    <div class="author">
                        <img src="{{ asset('assets/front/img/user/testimonials/' . $testimonial->image) }}"
                        alt="Author">
                    </div>                    
                </div>
                <div class="content">
                    <p>{!! nl2br($testimonial->content) !!}</p>
                    <div class="author-info text-center">
                        <h6 class="name" style="line-height:2;color:#C44467;font-size:25px">{{ $testimonial->name }}</h6>
                        @if (!empty($testimonial->occupation))
                            <span class="title">{{ $testimonial->occupation }}</span>
                        @endif
                    </div>
                </div>
            </div>    
            @endforeach        
        </div>
        <div class="slider-dots"></div>        
    </div>
</section>
@endif

@if (is_array($userPermissions) && in_array('Blog', $userPermissions))
    <!--====== Latest Blog Section Start ======-->
    <section class="latest-blog-section section-gap-top" id="blog" style="background: linear-gradient(180deg, #E9F1F9 0%, #F1F6FB 54.17%, rgba(255, 255, 255, 0.00) 100%)">
        <div class="container" style="padding:90px 0px">
            <div class="common-heading text-center mb-20">
                <span class="tagline" style="color: #C44467; font-family: Poppins; font-size: 36px; font-weight: 600;">{{ $home_text->blog_title ?? __('Blogs') }}</span>
                <h2 class="title">{{ $home_text->blog_subtitle ?? 'Blogs' }}</h2>
            </div>

            <div class="row justify-content-center" style="padding-top: 25px">
                @foreach ($blogs as $blog)
                    <div class="col-lg-4 col-md-6 col-sm-8">
                        <div class="latest-blog-post mt-30" style="border:3px solid #C44467">                           
                            <a class="post-thumb"
                                href="{{ route('front.user.blog.detail', [getParam(), $blog->slug, $blog->id]) }}">
                                <img class="lazy"
                                    src="{{ asset('assets/front/img/user/blogs/' . $blog->image) }}"
                                    alt="Image">
                            </a>
                            <div class="post-content text-center">
                                <h5 class="post-title">
                                    <a style="color:#C44467" href="{{ route('front.user.blog.detail', [getParam(), $blog->slug, $blog->id]) }}">{{ strlen($blog->title) > 45 ? mb_substr($blog->title, 0, 45, 'UTF-8') . '...' : $blog->title }}</a>
                                </h5>
                                <ul class="post-meta">
                                    <li><a><i class="fas fa-user"></i> {{ $keywords['by'] ?? 'by' }}
                                            {{ $user->username }}</a></li>
                                    <li><a><i class="fas fa-calendar-alt"></i>
                                            {{ \Carbon\Carbon::parse($blog->created_at)->format('F j, Y') }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
        <!--====== Latest Blog Section End ======-->
@endif


@if (is_array($userPermissions) && in_array('Service', $userPermissions))
    <!--====== Service Section Start ======-->
    <section class="service-section section-gap bg-offwhite-color" id="service" style="background: linear-gradient(180deg, #E9F1F9 0%, #F1F6FB 54.17%, rgba(255, 255, 255, 0.00) 100%)">
        <div class="container" style="padding:90px 0px">
            <div class="common-heading text-center mb-20">
                <span class="tagline" style="color: #C44467; font-family: Poppins; font-size: 36px; font-weight: 600;">{{ $home_text->service_title ?? __('Services') }}</span>
                <h2 class="title">{{ $home_text->service_subtitle ?? __('What I Do ?') }}</h2>
            </div>

            <div class="row service-boxes justify-content-center" style="padding-top: 25px">
                @foreach ($services as $service)
                    <div class="col-lg-4 col-md-6 col-sm-10">
                        <div class="service-box-one mt-30">
                            <a class="service-thumb"
                                @if ($service->detail_page == 1) href="{{ route('front.user.service.detail', [getParam(), 'slug' => $service->slug, 'id' => $service->id]) }}" @endif>
                                <img style="height:180px" src="{{ isset($service->image) ? asset('assets/front/img/user/services/' . $service->image) : asset('assets/front/img/profile/service-1.jpg') }}"
                                    class="lazy" alt="">
                            </a>
                            @if ($service->detail_page == 1)
                                <h4 class="title">
                                    <a
                                        href="{{ route('front.user.service.detail', [getParam(), 'slug' => $service->slug, 'id' => $service->id]) }}">{{ strlen($service->name) > 30 ? mb_substr($service->name, 0, 30, 'UTF-8') . '...' : $service->name }}</a>
                                </h4>
                            @else
                                <h4 class="title">
                                    {{ strlen($service->name) > 30 ? mb_substr($service->name, 0, 30, 'UTF-8') . '...' : $service->name }}
                                </h4>
                            @endif
                            <p>
                                {{ strlen(strip_tags($service->content)) > 90 ? mb_substr(strip_tags($service->content), 0, 90, 'UTF-8') : strip_tags($service->content) }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
            
        </div>
    </section>
    <!--====== Service Section End ======-->
@endif

@if (is_array($userPermissions) && in_array('Contact', $userPermissions))
<section class="contact" id="contact">
    <div class="contact">
        <div class="container">
            <div class="contact-container">
                <div class="contact-header mb-5">
                    <h4>{{ $home_text->contact_title ?? __('Get in touch') }}</h4>
                    <span>{{ $home_text->contact_subtitle ?? __('Get in touch') }}</span>
                </div>
                <div class="contact-body pt-5">
                    <form action="{{ route('front.contact.message', [getParam()]) }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="row mb-5 justify-content-center">
                            <div class="col-auto mb-3 ">
                                <label for="name" class="visually-hidden">Name</label>
                                <input type="text" class="form-control-new" id="name" placeholder="{{ $keywords['Name'] ?? 'Name' }}" name="fullname">
                                @if ($errors->has('fullname'))
                                    <p class="text-danger mb-0">{{ $errors->first('fullname') }}</p>
                                @endif
                            </div>
                            <div class="col-auto mb-3">
                                <label for="email" class="visually-hidden">Email</label>
                                <input type="email" class="form-control-new" id="email" placeholder="{{ $keywords['Email_Address'] ?? 'Email_Address' }}" name="email">
                                @if ($errors->has('email'))
                                    <p class="text-danger mb-0">{{ $errors->first('email') }}</p>
                                @endif
                            </div>
                            <div class="col-auto mb-3">
                                <label for="subject" class="visually-hidden">Subject</label>
                                <input type="text" class="form-control-new" id="subject" placeholder="{{ $keywords['Subject'] ?? 'Subject' }}" name="subject">
                                @if ($errors->has('subject'))
                                    <p class="text-danger mb-0">{{ $errors->first('subject') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <textarea class="form-control" id="" rows="7" cols="5" placeholder="{{ $keywords['Message..'] ?? 'Message..' }}" name="message"></textarea>
                            @if ($errors->has('message'))
                                <p class="text-danger mb-0">{{ $errors->first('message') }}</p>
                            @endif
                        </div>
                        <div class="button-send m-5">
                            <button type="submit" name="submit" class="btn-sendmessage">send message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<script>
    const slider = document.querySelector('.card-slider');
    const cards = document.querySelectorAll('.card');
    const dotsContainer = document.querySelector('.slider-dots');

    let cardWidth = 0;
    cards.forEach(card => {
        cardWidth += card.offsetWidth;
    });

    slider.style.width = `${cardWidth}px`;

    const numVisibleSlides = 3; // Number of visible slides

    cards.forEach((card, index) => {
        const dot = document.createElement('span');
        dot.classList.add('slider-dot');
        dotsContainer.appendChild(dot);

        dot.addEventListener('click', () => {
            slider.scroll({
                left: card.offsetLeft - slider.offsetLeft,
                behavior: 'smooth'
            });
        });
    });

    const updateSliderDots = () => {
        const numSlides = Math.ceil(cards.length / numVisibleSlides);

        dotsContainer.innerHTML = ''; // Clear existing dots

        for (let i = 0; i < numSlides; i++) {
            const dot = document.createElement('span');
            dot.classList.add('slider-dot');
            dotsContainer.appendChild(dot);

            dot.addEventListener('click', () => {
                slider.scroll({
                    left: cards[i * numVisibleSlides].offsetLeft - slider.offsetLeft,
                    behavior: 'smooth'
                });
            });
        }
    };

    updateSliderDots();

    slider.addEventListener('scroll', () => {
        const scrollPosition = slider.scrollLeft;

        cards.forEach((card, index) => {
            const cardPosition = card.offsetLeft - slider.offsetLeft;

            if (scrollPosition >= cardPosition && scrollPosition < cardPosition + cardWidth) {
                setActiveDot(index);
            }
        });
    });

    window.addEventListener('resize', () => {
        updateSliderDots();
    });

    function setActiveDot(index) {
        const dots = dotsContainer.querySelectorAll('.slider-dot');

        dots.forEach((dot, i) => {
            if (i === index) {
                dot.classList.add('active');
            } else {
                dot.classList.remove('active');
            }
        });
    }
</script>
@endsection