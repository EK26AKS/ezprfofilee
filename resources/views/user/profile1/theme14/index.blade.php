@extends('user.profile1.theme14.layout')
@section('tab-title')
    {{ $keywords['Home'] ?? 'Home' }}
@endsection

@section('meta-description', !empty($userSeo) ? $userSeo->home_meta_description : '')
@section('meta-keywords', !empty($userSeo) ? $userSeo->home_meta_keywords : '')

@section('content')

    <!--================Home Banner Area =================-->
    <section class="home_banner_area" style="background: url(assets/front/img/profile1/theme14/home-banner.jpg) ">
        <div class="banner_inner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="banner_content">
                            <h2>Hii,</h2>
                            <h2>I'am {{ $home_text->first_name ?? $user->first_name }}
                                {{ $home_text->last_name ?? $user->last_name }}</h2>
                            @php
                                $designations = explode(',', $home_text->designation ?? '');
                            @endphp
                            @if (!empty($designations))
                                <div class="type-string">
                                    @foreach ($designations as $designation)
                                        <h5>I'am {{ $designation }}</h5>
                                    @endforeach
                                </div>
                            @endif
                            <p>{{ $home_text->about_content ?? $user->about_content }}</p>
                            {{-- @if (is_array($userPermissions) && in_array('Contact', $userPermissions))
								<a href="#contact" class="banner_btn">{{ $keywords['Hire_me'] ?? 'Hire me' }}</a>
							@endif --}}
                            <a class="banner_btn" href="#">Hire Me</a>
                        </div>
                    </div>
                    <div class="col-lg-6">

                            @if (isset($home_text->hero_image))
                                <img src="{{ asset('assets/front/img/user/home_settings/' . $home_text->hero_image) }}"
                                    class="img-fluid align-self-center" alt="Hero Image">
                            @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->


    <!--================Welcome Area =================-->
    {{-- <section class="welcome_area p_120">
        <div class="container">
            <div class="row welcome_inner align-items-center justify-content-center">
                <div class="col-lg-6 d-flex">
                    @if (isset($home_text->about_image))
                        <img src="{{ asset('assets/front/img/user/home_settings/' . $home_text->about_image) }}"
                            class="image-fluid" alt="Hero Image" style="width: 400px; height:300px;">
                    @endif
                </div>
                <div class="col-lg-6">
                    <div class="welcome_text">
                        <h4>{{ $home_text->about_title ?? 'My Resume' }}</h4>
                        <h2 class="title">{{ $home_text->about_subtitle ?? 'About Me' }}</h2>
                        <p>{!! nl2br($home_text->about_content ?? '') !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <section class="welcome_area p_120">
        <div class="container">
            <div class="row welcome_inner align-items-center justify-content-center">
                <div class="col-lg-6 d-flex">
                    @if (isset($home_text->about_image))
                            <img src="{{ asset('assets/front/img/user/home_settings/' . $home_text->about_image) }}"
                                class="img-fluid" alt="Hero Image">
                    @endif
                </div>
                @if (is_array($userPermissions) && in_array('Achievements', $userPermissions))
                    <div class="col-lg-6">
                        <div class="welcome_text">
                            <h4>{{ $home_text->about_title ?? 'My Resume' }}</h4>
                            <h2 class="title">{{ $home_text->about_subtitle ?? 'About Me' }}</h2>
                            <p>{!! nl2br($home_text->about_content ?? '') !!}</p>
                        </div>
                    </div>
                @endif

            </div>
    </section>



     @if (is_array($userPermissions) && in_array('Skill', $userPermissions))
        <section class="welcome_area ">
            <div class="container">
                <div class="row welcome_inner align-items-center justify-content-center">
                    <div class="col-lg-7">
                        <div class="welcome_text">
                            <h4>{{ $home_text->skills_title ?? __('Skills') }}</h4>
                            <h2 class="title">{{ $home_text->skills_subtitle ?? __('Technical Skills') }}</h2>
                            <p>{!! nl2br($home_text->about_content ?? '') !!}</p>
                        </div>
                        <div class="tools_expert">

                            <div class="skill_main">
                                @foreach ($skills as $skill)
                                    <div class="skill_item">
                                        <h4>{{ $skill->title }} <span class="counter">{{ $skill->percentage }}</span>%</h4>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="{{ $skill->percentage }}" aria-valuemin="0" aria-valuemax="100" data-bg="#E9F1F9"></div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 order-lg-last col-sm-9">
                        {{-- <div class="block-img pl-0 pl-xl-5 md-gap-50"> --}}
                            <img src="{{ isset($home_text->skills_image) ? asset('assets/front/img/user/home_settings/' . $home_text->skills_image) : asset('assets/front/img/profile/skill.png') }}"
                                class="img-fluid" alt="Image">
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </section>
    @endif











    <!--====== About Section Start ======-->
    {{-- <section class="about-section section-gap" id="about">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-sm-9">
                    <div class="text-center pr-0 pr-lg-5 md-gap-50">
                        <img src="{{ asset('assets/front/img/user/home_settings/' . $home_text->about_image) }}"
                            class="lazy" alt="About Image">


                    </div>
                    <div class="col-lg-6 col-md-10">
                        <div class="about-content">
                            <div class="common-heading mb-30">
                                <span class="tagline">{{ $home_text->about_title ?? 'My Resume' }}</span>
                                <h2 class="title">{{ $home_text->about_subtitle ?? 'About Me' }}</h2>
                            </div>
                            <p class="mb-30">{!! nl2br($home_text->about_content ?? '') !!}
                            </p>
                            @if (isset($userBs->cv))
                                <a href="{{ asset('assets/front/img/user/cv/' . $userBs->cv) }}" class="template-btn"
                                    download="{{ $user->username }}.pdf" target="_blank">
                                    {{ $keywords['Download_CV'] ?? 'Download CV' }}</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
    </section> --}}
    <!--====== End Text Block ======-->






    {{-- @if (is_array($userPermissions) && in_array('Skill', $userPermissions))
            <!--====== Skill Section Start ======-->
            <section class="skill-section section-gap" id="skill">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-lg-6 order-lg-last col-sm-9">
                            <div class="block-img pl-0 pl-xl-5 md-gap-50">
                                <img data-src="{{ isset($home_text->skills_image) ? asset('assets/front/img/user/home_settings/' . $home_text->skills_image) : asset('assets/front/img/profile/skill.png') }}"
                                    class="animate-float-bob-y lazy" alt="Image">
                            </div>
                        </div>
                        <div class="col-lg-6 order-lg-first col-md-10">
                            <div class="skill-content">
                                <div class="common-heading mb-30">
                                    <span class="tagline">{{ $home_text->skills_title ?? __('Skills') }}</span>
                                    <h2 class="title">{{ $home_text->skills_subtitle ?? __('Technical Skills') }}</h2>
                                    <p>{!! nl2br($home_text->skills_content ?? '') !!}</p>
                                </div>
                                <div class="progress-bars">
                                    @foreach ($skills as $skill)
                                        <div class="single-progress-bar color-1" data-percentage="{{ $skill->percentage }}">
                                            <h6 class="title">{{ $skill->title }}</h6>
                                            <div class="progress-bar-wrap">
                                                <div class="progress-line">
                                                    <div class="line" style="background-color: #{{ $skill->color }};"></div>
                                                </div>
                                                <div class="counter-wrap">
                                                    <span class="count">{{ $skill->percentage }}</span>
                                                    <span class="suffix">%</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--====== Skill Section End ======-->
        @endif --}}



    {{-- <section class="section-dark section-gap info-background" id="info">
        <div class="info-back">
            <img src="{{ URL::asset('assets/template-12-styling/images/UNLEASHING CREATIVITY AND.png') }}" />
        </div>

        <div class="info-content margin">
            <p class="info-content-1">UNLEASHING CREATIVITY AND EXPERTISE:</p>
            <p class="info-content-2">MEET <span class="info-span">JOHN DOE</span>, FREELANCE WEB DEVELOPER</p>
            <p class="info-content-3">Crafting Tailored Digital Solutions to Bring Your Vision to Life</p>
            <p class="info-content-4">As a freelance web developer, I have embraced the freedom and flexibility that comes
                with working independently. With a passion for creativity and a drive for excellence, I bring a unique blend
                of technical expertise and artistic vision to every project. As a freelancer, I thrive on building strong
                client relationships and delivering personalized solutions that align with their goals and aspirations. With
                a keen eye for detail and a commitment to staying up-to-date with the latest industry trends, I consistently
                deliver high-quality work that exceeds expectations. My strong communication and project management skills
                allow me to collaborate effectively with clients, ensuring a smooth and seamless experience from inception
                to completion. As a freelancer, I am dedicated to bringing innovative ideas to life, empowering businesses
                and individuals to stand out in the digital landscape.</p>

        </div>
    </section> --}}

    <!--================Testimonials Area =================-->
    @if (is_array($userPermissions) && in_array('Testimonial', $userPermissions))
        <section class="testimonials_area p_120">
            <div class="container">
                <div class="main_title">
                    <h2>{{ $home_text->testimonial_title ?? __('Testimonials') }}</h2>
                    {{-- <p>{{ $home_text->testimonial_subtitle ?? __('Testimonials') }}</p> --}}
                </div>
                <div class="testi_inner">
                    <div class="testi_slider owl-carousel">
                        @foreach ($testimonials as $testimonial)
                            <div class="item" id="rr">
                                <div class="testi_item" id="vv">
                                    <p>{!! nl2br($testimonial->content) !!}</p>
                                    <h4>{{ $testimonial->name }}</h4>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star-half-o"></i></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if (is_array($userPermissions) && in_array('Service', $userPermissions))
        <section class="feature_area feature_tow p_120">
            <div class="container">
                <div class="main_title">
                    <h2>{{ $home_text->service_title ?? __('Services') }}</h2>
                    <p>{{ $home_text->service_subtitle ?? __('What I Do ?') }}</p>
                </div>
                <div class="feature_inner row">
                    @foreach ($services as $service)
                        <div class="col-lg-4">
                            <div class="feature_item">
                                <i class="flaticon-city"></i>
                                <a
                                    href="{{ route('front.user.service.detail', [getParam(), 'slug' => $service->slug, 'id' => $service->id]) }}">
                                    <h4>{{ $service->name }}</h4>
                                </a>
                                <p>{{ strlen(strip_tags($service->content)) > 250 ? mb_substr(strip_tags($service->content), 0, 250, 'UTF-8') : strip_tags($service->content) }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if (is_array($userPermissions) && in_array('Blog', $userPermissions))
        <section class="blog_categorie_area">
            <div class="container">
                <div class="main_title">
                    <h2>{{ $home_text->blog_title ?? __('Blogs') }}</h2>
                    <p>{{ $home_text->blog_subtitle ?? 'Blogs' }}</p>
                </div>
                <div class="row">
                    @foreach ($blogs as $blog)
                        <div class="col-lg-4">
                            <div class="categories_post">
                                <img class="lazy" src="{{ asset('assets/front/img/user/blogs/' . $blog->image) }}"
                                    width="500" style="height:250px" alt="Image">
                                <div class="categories_details">
                                    <div class="categories_text">
                                        <a
                                            href="{{ route('front.user.blog.detail', [getParam(), $blog->slug, $blog->id]) }}">
                                            <h5>{{ strlen($blog->title) > 45 ? mb_substr($blog->title, 0, 45, 'UTF-8') . '...' : $blog->title }}
                                            </h5>
                                        </a>
                                        <div class="border_line"></div>
                                        <p><a><i class="fas fa-user"></i> {{ $keywords['by'] ?? 'by' }}
                                                {{ $user->username }}</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif


    <section class="home_gallery_area p_120">
        <div class="container">
            <div class="main_title">
                <h2>{{ $home_text->portfolio_title ?? __('Portfolios') }}</h2>
                <p>{{ $home_text->portfolio_subtitle ?? __('Portfolios') }}</p>
            </div>
            <div class="isotope_fillter">
                <ul class="gallery_filter list">
                    <li class="" data-filter="*"><a href="#">All Categories</a></li>
                    @foreach ($portfolio_categories as $portfolio_category)
                        <li><a href="#"
                                data-filter=".cat-{{ $portfolio_category->id }}">{{ $portfolio_category->name }}</a>
                        </li>
                        {{-- <li data-filter=".brand" class=""><a href="#">Branding</a></li>
                        <li data-filter=".work" class=""><a href="#">Creative Work </a></li>
                        <li data-filter=".web" class="active"><a href="#">Web Design</a></li> --}}
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="gallery_f_inner row imageGallery1">
                @foreach ($portfolios as $portfolio)
                    <div class="col-lg-4 col-md-4 col-sm-6 brand manipul design print">
                        <div class="h_gallery_item">
                            <div class="g_img_item align-self-center">
                                <img class="img-fluid"
                                    src="{{ asset('assets/front/img/user/portfolios/' . $portfolio->image) }}"
                                    alt="Image">
                                <a class="light" href="img/gallery/project-1.jpg"><img src="img/gallery/icon.png"
                                        alt=""></a>
                            </div>
                            <div class="g_item_text text-center">
                                <h4><a href="{{ route('front.user.portfolios', [getParam(), $portfolio->slug, $portfolio->id]) }}">{{ strlen($portfolio->title) > 25 ? mb_substr($portfolio->title, 0, 25, 'UTF-8') . '...' : $portfolio->title }}</a>
                                </h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="more_btn">
                <a class="main_btn" href="#">Load More Items</a>
            </div>
        </div>
    </section>


    <!--================End Latest Blog Area =================-->
    {{-- @if (is_array($userPermissions) && in_array('Contact', $userPermissions))
    <section class="contact_area p_120">
        <div class="margin footer-div" style="text-align: center;line-height:1">
            <h4>{{ $home_text->contact_title ?? __('Get in touch') }}
            </h4>
            <p class="footer-head">{{ $home_text->contact_subtitle ?? __('Get in touch') }} </p>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="contact_form p-3">
                    <form class="row" action="{{ route('front.contact.message', [getParam()]) }}" enctype="multipart/form-data" method="post" id="contactForm" novalidate="novalidate">
						@csrf
						<input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="{{ $keywords['Name'] ?? 'Name' }}" name="fullname">
                                    @if ($errors->has('fullname'))
                                        <p class="text-danger mb-0">{{ $errors->first('fullname') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input class="form-control" type="email" placeholder="{{ $keywords['Email_Address'] ?? 'Email Address' }}" name="email" required>
                                    @if ($errors->has('email'))
                                        <p class="text-danger mb-0">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="{{ $keywords['Subject'] ?? 'Subject' }}" name="subject" required>
                                        @if ($errors->has('subject'))
                                            <p class="text-danger mb-0">{{ $errors->first('subject') }}</p>
                                        @endif
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <textarea class="form-control" placeholder="{{ $keywords['Message'] ?? 'Message' }}" name="message"  rows="1" required></textarea>
                                    @if ($errors->has('message'))
                                        <p class="text-danger mb-0">{{ $errors->first('message') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="mb-4 contact-btn">
                            <button type="submit" value="submit" class="main_btn">Send Message</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
	@endif --}}





    @if (is_array($userPermissions) && in_array('Contact', $userPermissions))
        <section class="contact_area mt-5" id="contact">
            <div class="contact">
                <div class="contact-box">
                    {{-- <div id="section-header">
                    <span>contact</span>
                    <div class="header-img d-flex justify-content-center">
                        <h2 class="exp-header">Contact</h2>
                        <img src="{{ asset('images/Rectangle-experiance.svg') }}" class="bar-image" alt="">
                    </div>
                </div> --}}
                    <div class="margin footer-div" style="text-align: center;line-height:1">
                        <h4>{{ $home_text->contact_title ?? __('Get in touch') }}
                        </h4>
                        <p class="footer-head">{{ $home_text->contact_subtitle ?? __('Get in touch') }} </p>
                    </div>

                    <div class="container">
                        <div class="contact-form p-3">
                            <form action="{{ route('front.contact.message', [getParam()]) }}"
                                enctype="multipart/form-data" method="post" class="contact">
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <input type="text" class="form-control" id=""
                                                placeholder="{{ $keywords['Name'] ?? 'Name' }}" name="fullname">
                                            @if ($errors->has('fullname'))
                                                <p class="text-danger mb-0">{{ $errors->first('fullname') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <input type="email" class="form-control" id=""
                                                placeholder="{{ $keywords['Email_Address'] ?? 'Email Address' }}"
                                                name="email" required>
                                            @if ($errors->has('email'))
                                                <p class="text-danger mb-0">{{ $errors->first('email') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row mb-4">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <input type="text" class="form-control" id=""
                                                placeholder="{{ $keywords['Subject'] ?? 'Subject' }}" name="subject"
                                                required>
                                            @if ($errors->has('subject'))
                                                <p class="text-danger mb-0">{{ $errors->first('subject') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <textarea type="text" class="form-control" placeholder="{{ $keywords['Message'] ?? 'Message' }}" name="message"
                                                rows="10" required></textarea>
                                            @if ($errors->has('message'))
                                                <p class="text-danger mb-0">{{ $errors->first('message') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4 contact-btn">
                                    <input type="button" class="main_btn" value="Send Message">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

@endsection
