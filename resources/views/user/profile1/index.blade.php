@extends('user.profile1.layout')

@section('tab-title')
    {{ $keywords['Home'] ?? 'Home' }}
@endsection

@section('meta-description', !empty($userSeo) ? $userSeo->home_meta_description : '')
@section('meta-keywords', !empty($userSeo) ? $userSeo->home_meta_keywords : '')
<style>
    .card-slider {
  display: flex;
  overflow-x: scroll;
  scroll-snap-type: x mandatory;
  -webkit-overflow-scrolling: touch;
  scroll-behavior: smooth;
  padding: 20px;
  gap: 20px;
  width: 960px; /* Set the width to accommodate three slides */
}

.card-slider::-webkit-scrollbar {
  display: none; /* Hide scrollbar for Chrome, Safari, and Opera */
}

.card {
  flex: 0 0 calc((100% - 40px) / 3); /* Adjust the width based on the number of visible slides */
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  scroll-snap-align: start;
  text-align: center;
  justify-content: center;
}
.card .author-wrap {
  -webkit-box-flex: 0;
  -ms-flex: 0 0 60px;
  flex: 0 0 60px;
}

.card .author-wrap .author img {
  width: 60px;
  height: 60px;
  border-radius: 50%;
}

.card .author-wrap .quote-icon {
  display: block;
  margin-top: 20px;
}

.card .author-wrap .quote-icon img {
  max-width: 55px;
}

.card .content {
  text-align: justify;
}

.card .content p {
  font-weight: 500;
  margin-bottom: 15px;
}

.card .content .name {
  font-size: 18px;
}

.card .content .title {
  font-size: 14px;
  line-height: 1;
  color: var(--color-primary);
}

.card:hover {
  border-bottom-left-radius: 40px;
  border-top-right-radius: 0;
}
.slider-dots {
  display: flex;
  justify-content: center;
  margin-top: 20px; /* Increase the margin to create space between cards and dots */
}

.slider-dot {
  width: 10px;
  height: 10px;
  border-radius: 50%;
  background-color: #ccc;
  margin: 0 5px;
  cursor: pointer;
}

.slider-dot.active {
  background-color: #555;
}
@media screen and (max-width: 768px) {
  .card {
    flex: 0 0 calc(50% - 20px); /* Adjust the width for two slides on smaller screens */
    max-width: calc(50% - 20px);
  }
}

@media screen and (max-width: 576px) {
  .card {
    flex: 0 0 100%; /* Display one slide on the smallest screens */
    max-width: 100%;
  }
}
</style>
@section('content')
    <!--====== Hero Area Start ======-->
    <section class="hero-section hero-section-one" id="home">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-5 col-md-6">
                    <div class="hero-text">
                        <span class="tagline">{{ $keywords["Hi_I'm,"] ?? "Hi I'm," }}</span>
                        <h1 class="hero-title">{{ $home_text->first_name ?? $user->first_name }}
                            {{ $home_text->last_name ?? $user->last_name }}</h1>
                        <div>
                            <p id="typed" class="d-inline-block"></p>
                        </div>
                        <div class="type-string">
                            @php
                                $designations = explode(',', $home_text->designation ?? '');
                            @endphp
                            @foreach ($designations as $designation)
                                <p>{{ $designation }}</p>
                            @endforeach
                        </div>
                        @if (isset($social_medias))
                            <ul class="social-links">
                                @foreach ($social_medias as $social_media)
                                    <li>
                                        <a href="{{ $social_media->url }}" target="_blank"><i
                                                class="{{ $social_media->icon }}"></i></a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                        @if (is_array($userPermissions) && in_array('Contact', $userPermissions))
                            <a href="#contact" class="template-btn">{{ $keywords['Hire_me'] ?? 'Hire me' }}</a>
                        @endif
                    </div>
                </div>
                <div class="col-lg-7 col-md-6 col-sm-9">
                    <div class="hero-img text-right">
                        @if (isset($home_text->hero_image))
                            <img data-src="{{ asset('assets/front/img/user/home_settings/' . $home_text->hero_image) }}"
                                class="animate-float-bob-y lazy" alt="">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Hero Area End ======-->

    <!--====== About Section Start ======-->
    <section class="about-section section-gap" id="about">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-sm-9">
                    <div class="block-img text-center pr-0 pr-lg-5 md-gap-50">
                        <img data-src="{{ isset($home_text->about_image) ? asset('assets/front/img/user/home_settings/' . $home_text->about_image) : asset('assets/front/img/profile/about.png') }}"
                            class="animate-float-bob-y lazy" alt="About Image">
                    </div>
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
    </section>
    <!--====== End Text Block ======-->

    @if (is_array($userPermissions) && in_array('Skill', $userPermissions))
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
    @endif

    @if (is_array($userPermissions) && in_array('Service', $userPermissions))
        <!--====== Service Section Start ======-->
        <section class="service-section section-gap bg-offwhite-color" id="service">
            <div class="container">
                <div class="common-heading text-center mb-20">
                    <span class="tagline">{{ $home_text->service_title ?? __('Services') }}</span>
                    <h2 class="title">{{ $home_text->service_subtitle ?? __('What I Do ?') }}</h2>
                </div>

                <div class="row service-boxes justify-content-center">
                    @foreach ($services as $service)
                        <div class="col-lg-4 col-md-6 col-sm-10">
                            <div class="service-box-one mt-30">
                                <a class="service-thumb"
                                    @if ($service->detail_page == 1) href="{{ route('front.user.service.detail', [getParam(), 'slug' => $service->slug, 'id' => $service->id]) }}" @endif>
                                    <img data-src="{{ isset($service->image) ? asset('assets/front/img/user/services/' . $service->image) : asset('assets/front/img/profile/service-1.jpg') }}"
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

    @if (is_array($userPermissions) && in_array('Experience', $userPermissions))
        <!--====== Experience Section Start ======-->
        <section class="experience-section section-gap" id="experience">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-md-9">
                        <div class="common-heading text-center mb-50">
                            <span class="tagline">{{ $home_text->experience_title ?? __('Experience') }}</span>
                            <h2 class="title">{{ $home_text->experience_subtitle ?? __('Experience') }}</h2>
                        </div>
                    </div>
                </div>
                <div class="experience-wrapper boxed-wrapper">
                    <div class="row justify-content-between">
                        @if (count($educations) > 0)
                            <div class="col-lg-6 md-gap-80">
                                <h4 class="experience-wrapper-title">
                                    <span><img class="lazy"
                                            data-src="{{ asset('assets/front/img/profile1/education.png') }}"
                                            alt=""></span>
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
                                    <span><img class="lazy" data-src="{{ asset('assets/front/img/profile1/job.png') }}"
                                            alt=""></span>
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
        <!--====== Experience Section End ======-->
    @endif

    @if (is_array($userPermissions) && in_array('Achievements', $userPermissions))
        <!--====== Counter Section Start ======-->
        <section class="counter-section lazy"
            data-bg="{{ !empty($home_text->achievement_image) ? asset('assets/front/img/user/home_settings/' . $home_text->achievement_image) : asset('assets/front/img/achievement_bg.jpg') }}">
            <div class="container">
                <div class="row justify-content-center">
                    @foreach ($achievements as $achievement)
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="counter-box mb-40">
                                <div class="counter-wrap">
                                    <span class="count">
                                        {{ $achievement->count }}
                                    </span>
                                    <span class="suffix">+</span>
                                </div>
                                <h6 class="title">{{ $achievement->title }}</h6>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--====== Counter Section End ======-->
    @endif

    @if (is_array($userPermissions) && in_array('Portfolio', $userPermissions))
        <!--====== Portfolios Section Start ======-->
        <section class="portfolio-section section-gap" id="portfolio">
            <div class="container">
                <div class="common-heading text-center mb-50">
                    <span class="tagline">{{ $home_text->portfolio_title ?? __('Portfolios') }}</span>
                    <h2 class="title">{{ $home_text->portfolio_subtitle ?? __('Portfolios') }}</h2>
                </div>

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
                                    <img src="{{ asset('assets/front/img/user/portfolios/' . $portfolio->image) }}"
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
        <!--====== Testimonial Section Start ======-->
       <section class="testimonial-section section-gap bg-offwhite-color">
            <div class="container">
                <div class="common-heading text-center mb-50">
                    <span class="tagline">{{ $home_text->testimonial_title ?? __('Testimonials') }}</span>
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

                            <span class="quote-icon">
                                <img src="{{ asset('assets/front/img/profile1/quote.png') }}" alt="">
                            </span>
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
                <!--<div class="testimonial-slider">-->
                <!--    @foreach ($testimonials as $testimonial)-->
                <!--        <div class="col-lg-4 col-sm-12 col-xs-12">-->
                <!--            <div class="testimonial-box-one">-->
                <!--                <div class="author-wrap">-->
                <!--                    <div class="author">-->
                <!--                        <img src="{{ asset('assets/front/img/user/testimonials/' . $testimonial->image) }}"-->
                <!--                            alt="Author">-->
                <!--                    </div>-->

                <!--                    <span class="quote-icon">-->
                <!--                        <img src="{{ asset('assets/front/img/profile1/quote.png') }}" alt="">-->
                <!--                    </span>-->
                <!--                </div>-->
                <!--                <div class="content">-->
                <!--                    <p>{!! nl2br($testimonial->content) !!}</p>-->
                <!--                    <div class="author-info">-->
                <!--                        <h6 class="name">{{ $testimonial->name }}</h6>-->
                <!--                        @if (!empty($testimonial->occupation))-->
                <!--                            <span class="title">{{ $testimonial->occupation }}</span>-->
                <!--                        @endif-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    @endforeach-->
                <!--</div>-->
            </div>
        </section>
        <!--====== Testimonial Section End ======-->
    @endif

    @if (is_array($userPermissions) && in_array('Blog', $userPermissions))
        <!--====== Latest Blog Section Start ======-->
        <section class="latest-blog-section section-gap-top" id="blog">
            <div class="container">
                <div class="common-heading text-center mb-20">
                    <span class="tagline">{{ $home_text->blog_title ?? __('Blogs') }}</span>
                    <h2 class="title">{{ $home_text->blog_subtitle ?? 'Blogs' }}</h2>
                </div>

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
                                        data-src="{{ asset('assets/front/img/user/blogs/' . $blog->image) }}"
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

    @if (is_array($userPermissions) && in_array('Contact', $userPermissions))
        <!--====== Contact Section Start ======-->
        <section class="contact-section section-gap" id="contact">
            <div class="container">
                <div class="common-heading text-center mb-50">
                    <span class="tagline">{{ $home_text->contact_title ?? __('Get in touch') }}</span>
                    <h2 class="title">{{ $home_text->contact_subtitle ?? __('Get in touch') }}</h2>
                </div>

                <div class="contact-form-one">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <form action="{{ route('front.contact.message', [getParam()]) }}"
                                enctype="multipart/form-data" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $user->id }}">
                                <div class="row gutters-20">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="input-field mb-20">
                                            <input type="text" placeholder="{{ $keywords['Name'] ?? 'Name' }}"
                                                name="fullname">
                                            @if ($errors->has('fullname'))
                                                <p class="text-danger mb-0">{{ $errors->first('fullname') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="input-field mb-20">
                                            <input type="email"
                                                placeholder="{{ $keywords['Email_Address'] ?? 'Email Address' }}"
                                                name="email" required>
                                            @if ($errors->has('email'))
                                                <p class="text-danger mb-0">{{ $errors->first('email') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="input-field mb-20">
                                            <input type="text" placeholder="{{ $keywords['Subject'] ?? 'Subject' }}"
                                                name="subject" required>
                                            @if ($errors->has('subject'))
                                                <p class="text-danger mb-0">{{ $errors->first('subject') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="input-field mb-20">
                                            <textarea placeholder="{{ $keywords['Message'] ?? 'Message' }}" name="message" required></textarea>
                                            @if ($errors->has('message'))
                                                <p class="text-danger mb-0">{{ $errors->first('message') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="input-field text-center mt-30">
                                            <button type="submit"
                                                class="template-btn">{{ $keywords['Send_Message'] ?? 'Send Message' }}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--====== Contact Section End ======-->
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
