@extends('user.profile1.theme16.layout')

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
                <div class="col-lg-6">
                    <div class="hero-container1">
                        <h2>Hi,<br>I'm {{ $home_text->first_name ?? $user->first_name }}</h2>
                        @php
                            $designations = explode(',', $home_text->designation ?? '');
                        @endphp
                        @if (!empty($designations))
                            <div class="type-string">
                                @foreach ($designations as $designation)
                                    <span class="hero-span">I am {{ $designation }}</span>
                                @endforeach
                            </div>
                        @endif                                               
                        <a href="#" class="btn-hireme">hire me</a>
                    </div>
                    <div class="social mt-5">
                        <ul >
                            <li><a href="#">
                                <i class="fa fa-instagram"></i>Instagram
                            </a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></i>Instagram</a></li>
                            <li><a href="#"><i class="fa fa-facebook"></i>Instagram</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 second-container">
                    <div class="hero-container2"> 
                            <img src="{{ asset('assets/front/img/hero2-edited.png') }}" class="logoimage" alt="">                      
                            {{-- <img src="{{asset('../../images/temp2-figma2/hero2-edited.png')}}" class="logoimage" alt="">                                --}}
                    </div>
                </div>
            </div>


            <div class="card mb-3" style="max-width: 540px;">
                <div class="card-inside d-flex justify-content-center align-items-center">
                    <div class="card-header" style="background: white;
                    border-radius: 50%;">
                         <img data-src="{{ asset('/assets/front/img/user/home_settings/' . $home_text->hero_image) }}" src="{{ asset('/assets/front/img/user/home_settings/' . $home_text->hero_image) }}"
                         class="logoimage" width="180" alt="Hero Image">                   
                        {{-- <img src="{{asset('../../images/temp2-figma2/profile.png')}}" class="logoimage" width="150" alt=""> --}}
                    </div>
                    <div class="card-body text-center">
                        <h4>{{ $home_text->first_name ?? $user->first_name }}</h4>
                        @php
                        $designations = explode(',', $home_text->designation ?? '');
                    @endphp
                    @if (!empty($designations))
                        <div class="type-string">
                            @foreach ($designations as $designation)
                                <span class="hero-span">{{ $designation }}</span>
                            @endforeach
                        </div>
                    @endif 
                    {{-- <span class="" >I am a Freelancer</span> --}}
                    </div>
                </div>
            </div>

        </div>
        
    </div>
</section>

<section class="about-me" id="about-me">    
        <div class="aboutme-container">
            <div class="container">
                <div id="section-header">
                    <div class="header-inside">
                        <h2>{{ $home_text->about_title ?? 'My Resume' }}</h2>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-12">
                        <div class="card-about-me mb-3 justify-content-center">
                            <div class="card-inside d-flex justify-content-center align-items-center">
                                <div class="card-header">
                                    @if(isset($home_text->about_image))                               
                                        <img src="{{asset('assets/front/img/user/home_settings/'.$home_text->about_image)}}" class="logoimage" width="300" alt="Hero Image">
                                    @endif                                   
                                </div>
                                <div class="card-body">
                                    <h4>{{ $home_text->about_subtitle ?? 'About Me' }}</h4>
                                    <span class="" >{!! nl2br($home_text->about_content ?? '') !!}</span>
                                    
                                    <div class="aboutme-cv">
                                        <a href="#" download>
                                            <input  name="" class="form-control" id="downloadcv" value="Download CV" hidden >
                                            <label for="downloadcv">Download</label>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    <div class="experiance d-flex justify-content-center align-items-center ">
        <div class="experiance-content ">

       
  <!----------------------tab buttons ------------------------>
            <div class="know-more">
                <div class="aboutme-filter-button text-center">
                    <ul class="nav nav-pills align-items-center justify-content-center mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">{{ $keywords['Experience'] ?? 'Experience' }}</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">{{ $keywords['Education'] ?? 'Education' }}</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">{{ $keywords['Awards'] ?? 'Awards' }}</button>
                        </li>
                      </ul>

                </div>
            </div>

    <!----------------------tab content ------------------------>

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="details mt-5">
                        @foreach ($job_experiences as $job_experience)
                        <div class="details-all">
                            <div class="header-all">
                                <h6>{{ $job_experience->designation }}  [{{ $job_experience->company_name }}]</h6>
                                <span>{{ \Carbon\Carbon::parse($job_experience->start_date)->format('M j, Y') }}
                                    -
                                    @if ($job_experience->is_continue == 0)
                                        {{ \Carbon\Carbon::parse($job_experience->end_date)->format('M j, Y') }}
                                    @else
                                        {{ $keywords['Present'] ?? 'Present' }}
                                    @endif</span>
                            </div>
                            <div class="details-para">
                                <p>{!! nl2br($job_experience->content) !!}.</p>                       
                            </div>
                        </div> 
                        @endforeach                 
                    </div>
                </div>

                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="details mt-5">
                        @foreach ($educations as $education)
                        <div class="details-all">
                            <div class="header-all">
                                <h6>{{ $education->degree_name }}</h6>
                                <span> {{ \Carbon\Carbon::parse($education->start_date)->format('M j, Y') }}
                                    -
                                    @if (!empty($education->end_date))
                                        {{ \Carbon\Carbon::parse($education->end_date)->format('M j, Y') }}
                                    @else
                                        {{ $keywords['Present'] ?? 'Present' }}
                                    @endif</span>
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
<!----------------------tab content ends------------------------>
        </div>
        <div class="experiance-img">
            <div class="img-know-more">
                <img src="{{ asset('assets/front/img/about-me.png') }}" class="logoimage" width="300" alt="">                  
            </div>     
        </div>
    </div>
      
    </div>
</section>

<section class="tools" id="tools">
    
        <div class="tools-container1">
            <h4>{{ $home_text->skills_title ?? __('Skills') }}</h4>
            <span>{{ $home_text->skills_subtitle ?? __('Technical Skills') }}</span>
            <p>{!! nl2br($home_text->skills_content ?? '') !!}</p>
            {{-- <p>
                As a freelance web developer, I have honed a diverse and comprehensive skill set that enables me to deliver exceptional digital solutions. Proficient in front-end development languages such as HTML, CSS, and JavaScript, I possess the ability to create visually stunning and user-friendly websites. I am well-versed in popular frameworks like React, Angular, and Vue.js, allowing me to build dynamic and interactive web applications. Additionally, my expertise extends to back-end technologies such as Node.js, PHP, and Ruby on Rails, empowering me to develop robust server-side functionalities and integrate databases effectively. With a strong foundation in responsive design, I ensure that websites I create are fully optimized and seamlessly adapt to different screen sizes and devices. I am dedicated to staying up-to-date with the latest industry trends and technologies, enabling me to provide innovative and cutting-edge solutions to my clients. With a passion for problem-solving, attention to detail, and a commitment to delivering excellence, I am well-equipped to meet the unique requirements of any freelance web development project
            </p> --}}
        </div>

        <div class="tools-container2 mt-5">
            <div class="container">
                @foreach ($skills as $skill)
                <div class="progress-div">
                        <label for="" class="form-label">{{ $skill->title }}</label>
                        <div class="progress">                           
                            <div class="progress-bar w-75" role="progressbar" aria-valuenow="{{ $skill->percentage }}" aria-valuemin="0" aria-valuemax="100"></div>                                               
                        </div> 
                        {{-- <div class="counter-wrap" style="color:white;display:flex">
                            <span class="count">{{ $skill->percentage }}</span>
                            <span class="suffix">%</span>
                        </div>                                                          --}}
                </div>              
                @endforeach
            </div>
        </div>
</section>

@if (is_array($userPermissions) && in_array('Portfolio', $userPermissions))
<!--====== Portfolios Section Start ======-->
<section class="portfolio-section section-gap"  id="portfolio" style="position:relative">
    <div class="tools-container1">
        <h4>{{ $home_text->portfolio_title ?? __('Portfolios') }}</h4>
        <span>{{ $home_text->portfolio_subtitle ?? __('Portfolios') }}</span>        
    </div>
    <div class="container">        

        <div class="portfolio-filter-wrap mb-20">
            <ul class="portfolio-filter">
                <li><a href="#" data-filter="*" class="filter-active">All</a></li>
                @foreach ($portfolio_categories as $portfolio_category)
                    <li><a href="#"
                            data-filter=".cat-{{ $portfolio_category->id }}">{{ $portfolio_category->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="row portfolio-items filter-items justify-content-center" style="position: inherit !important">
            @foreach ($portfolios as $portfolio)
                <div class="col-lg-4 col-md-6 filter-item cat-{{ $portfolio->bcategory->id }}" style="position: inherit !important">
                    <div class="portfolio-item mt-30">
                        <div class="portfolio-thumb">
                            <img src="{{ asset('assets/front/img/user/portfolios/' . $portfolio->image) }}" data-src="{{ asset('assets/front/img/user/portfolios/' . $portfolio->image) }}"
                                alt="Image">
                            <a href="{{ route('front.user.portfolio.detail', [getParam(), $portfolio->slug, $portfolio->id]) }}"
                                class="portfolio-link">
                                <span></span>
                            </a>
                        </div>
                        <div class="portfolio-content">
                            <h4 class="title"><a
                                    href="{{ route('front.user.portfolio.detail', [getParam(), $portfolio->slug, $portfolio->id]) }}">{{ strlen($portfolio->title) > 25 ? mb_substr($portfolio->title, 0, 25, 'UTF-8') . '...' : $portfolio->title }}</a>
                            </h4>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!--====== Portfolios Section End ======-->
@endif

@if (is_array($userPermissions) && in_array('Testimonial', $userPermissions))
<section class="testimonial-section section-gap bg-offwhite-color" id="tools">
    <div class="tools-container1">
        <h4>{{ $home_text->testimonial_title ?? __('Testimonials') }}</h4>
        <span>{{ $home_text->testimonial_subtitle ?? __('Testimonials') }}</span>        
    </div>
    <div class="container">        
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
                        <h6 class="name" style="line-height:2">{{ $testimonial->name }}</h6>
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
    <section class="latest-blog-section section-gap-top" id="blog">
        <div class="tools-container1">
            <span>{{ $home_text->blog_subtitle ?? 'Blogs' }}</span>        
            <h4>{{ $home_text->blog_title ?? __('Blogs') }}</h4>
        </div>
        <div class="container">            
            <div class="row justify-content-center">
                @foreach ($blogs as $blog)
                    <div class="col-lg-4 col-md-6 col-sm-8">
                        <div class="latest-blog-post mt-30">
                            <div class="post-content text-center">
                                <h5 class="post-title">
                                    <a
                                        href="{{ route('front.user.blog.detail', [getParam(), $blog->slug, $blog->id]) }}">{{ strlen($blog->title) > 45 ? mb_substr($blog->title, 0, 45, 'UTF-8') . '...' : $blog->title }}</a>
                                </h5>
                                <ul class="post-meta">
                                    <li><a><i class="fas fa-user"></i> {{ $keywords['by'] ?? 'by' }}
                                            {{ $user->username }}</a></li>
                                    <li><a><i class="fas fa-calendar-alt"></i>
                                            {{ \Carbon\Carbon::parse($blog->created_at)->format('F j, Y') }}</a></li>
                                </ul>
                            </div>
                            <a class="post-thumb"
                                href="{{ route('front.user.blog.detail', [getParam(), $blog->slug, $blog->id]) }}">
                                <img class="lazy"
                                    src="{{ asset('assets/front/img/user/blogs/' . $blog->image) }}"
                                    alt="Image">
                            </a>
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
    <section class="service-section section-gap bg-offwhite-color" id="service">
        <div class="tools-container1">
            <span>{{ $home_text->service_subtitle ?? __('What I Do ?') }}</span>        
            <h4>{{ $home_text->service_title ?? __('Services') }}</h4>
        </div>
        <div class="container">           
            <div class="row service-boxes justify-content-center mt-5">
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

{{-- <section class="creativity" id="creativity">
    <div class="container creativity-box">
        <div class="creativity-container">
            <div class="row creative-row">
                <div class="col-lg-12">
                    <div class="creativity-container1">
                        <span class="span1" >UNLEASHING CREATIVITY AND EXPERTISE: </span>
                        <h2> MEET JOHN DOE, FREELANCE WEB DEVELOPER</h2>
                        <span class="span2" >Crafting Tailored Digital Solutions to Bring Your Vision to Life</span>
                        
                    </div>
                </div>
             
            </div>
        </div>
        <img src="{{asset('../../images/temp2-figma2/creativity.png')}}" class="logoimage" width="300" alt="">
   
        <div class="row">
            <div class="para">
                <p>As a freelance web developer, I have embraced the freedom and flexibility that comes with working independently. With a passion for creativity and a drive for excellence, I bring a unique blend of technical expertise and artistic vision to every project. As a freelancer, I thrive on building strong client relationships and delivering personalized solutions that align with their goals and aspirations. With a keen eye for detail and a commitment to staying up-to-date with the latest industry trends, I consistently deliver high-quality work that exceeds expectations. My strong communication and project management skills allow me to collaborate effectively with clients, ensuring a smooth and seamless experience from inception to completion. As a freelancer, I am dedicated to bringing innovative ideas to life, 
                    empowering businesses and individuals to stand out in the digital landscape.</p>
            </div>
        </div>
        </div>
</section> --}}


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
                                <input type="text" class="form-control-new" id="subject" placeholder="{{ $keywords['subject'] ?? 'subject' }}" name="subject">
                                @if ($errors->has('subject'))
                                    <p class="text-danger mb-0">{{ $errors->first('subject') }}</p>
                                @endif
                            </div>                            
                        </div>
                        <div class="row justify-content-center">                                
                            <textarea class="form-control" id="" rows="7" cols="5" name="" placeholder="{{ $keywords['Message..'] ?? 'Message..' }}" name="message"></textarea>
                            @if ($errors->has('message'))
                                <p class="text-danger mb-0">{{ $errors->first('message') }}</p>
                            @endif
                        </div>
                        <div class="button-send text-center m-5">
                            <button type="submit" name="" class="btn-sendmessage" >send message</button>
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
