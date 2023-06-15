@extends('front.layout')

@section('pagename')
    - {{__('Home')}}
@endsection

@section('meta-description', !empty($seo) ? $seo->home_meta_description : '')
@section('meta-keywords', !empty($seo) ? $seo->home_meta_keywords : '')

@section('content')
    <!--====== Start Saas-banner section ======-->
    <section class="saas-banner" style="background-image: url('{{asset('assets/front/img/banner.png')}}');">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-content">
                        {{-- <span class="span">
                            {{$be->hero_section_title}}
                        </span> --}}
                        {{-- <h1>{{$be->hero_section_text}}</h1> --}}
                        <h1 class="banner-title">Easily create appealing portfolios, vCards, and resumes!</h1>
                        <p class="banner-description">Ektasi Technology's EZ Profile is a flexible portfolio building tool. It offers customers a simple platform on which to build their own unique portfolio websites, vCards, and CVs.</p>
                        <ul>
                            @if(!empty($be->hero_section_button_url))
                                <li>
                                    <a href="{{$be->hero_section_button_url}}" class="main-btn banner_button">{{$be->hero_section_button_text}}
                                        <i class="fal fa-long-arrow-alt-right"></i>
                                    </a>
                                </li>
                            @endif
                            @if(!empty($be->hero_section_video_url))
                                <li>
                                    <a href="{{$be->hero_section_video_url}}" class="video-popup"><i class="fas fa-play"></i></a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-img">
                        <img data-src="{{asset('assets/front/img/'.$be->hero_img)}}" class="img-fluid lazy" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section><!--====== End Saas-banner section ======-->

    @if ($bs->intro_section == 1)
    <!--====== Start saas-analysis section ======-->
    <section class="saas-analysis pt-120 pb-80">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="choose-img mb-40">
                        <img data-src="{{asset('assets/front/img/'.$bs->intro_main_image)}}" class="img-fluid lazy" alt="">
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="choose-content-box mb-40">
                        <div class="section-title-one section-title-two mb-20">
                            <span class="span">{{$bs->intro_title}}</span>
                            <h2>{{$bs->intro_subtitle}}</h2>
                        </div>
                        <p>{!! nl2br($bs->intro_text) !!} </p>
                    </div>
                </div>
            </div>
        </div>
    </section><!--====== End saas-analysis section ======-->
    @endif

    @if ($bs->feature_section == 1)
    <!--====== Start saas-features section ======-->
    <section class="saas-features pb-80">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title-one section-title-two">
                        @if (!empty($bs->feature_title))
                        <span class="span">{{$bs->feature_title}}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($features as $feature)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="features-item features-box">
                            <i class="{{$feature->icon}}"></i>
                            <h4>{{$feature->title}}</h4>
                            <p>{{ $feature->text }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section><!--====== End saas-features section ======-->
    @endif

     <!--====== Start saas-features card section ======-->
     <section class="saas-features-card">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title-one text-center mb-55">
                        @if (!empty($bs->work_process_title))
                        <span class="span">{{ 'All Features' }}</span>
                        @endif
                        @if (!empty($bs->work_process_subtitle))
                        <h2>{{ 'Unlock the Power of EZ Profile' }}</h2>
                        @endif
                    </div>
                </div>
            </div>
            <div class="features-slider">
                <div class="featurecard-slide">
                    <div class="ezprofile-feature-card">
                        <span class="ezprofile-feature-card-icon">
                            <i class="far fa-folders"></i>
                        </span>
                        <div class="ezprofile-feature-card-content-wrapper">
                            <h3 class="ezprofile-feature-card-title">Easy Portfolio Creation</h3>
                            <div class="ezprofile-feature-card-content">With its user-friendly layout and simple tools, EZ Profile makes the process of building professional portfolios, vCards, and CVs easier. Without technological knowledge, users may exhibit their abilities and accomplishments, saving time and effort.</div>
                        </div>
                    </div>
                </div>
                <div class="featurecard-slide">
                    <div class="ezprofile-feature-card">
                        <span class="ezprofile-feature-card-icon">
                            <i class="far fa-file"></i>
                        </span>
                        <div class="ezprofile-feature-card-content-wrapper">
                            <h3 class="ezprofile-feature-card-title">Customizable Templates</h3>
                            <div class="ezprofile-feature-card-content">Customers of the initiatives may develop distinctive and aesthetically pleasing profiles that are in line with their own brands or industry standards using a selection of customisable portfolio themes.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="featurecard-slide">
                    <div class="ezprofile-feature-card">
                        <span class="ezprofile-feature-card-icon">
                            <i class="fas fa-qrcode"></i>
                        </span>
                        <div class="ezprofile-feature-card-content-wrapper">
                            <h3 class="ezprofile-feature-card-title">Advanced QR Code Builder</h3>
                            <div class="ezprofile-feature-card-content">Users can generate unique QR codes for their portfolio websites, vCards, or CVs using the sophisticated QR code creator offered by EZ Profile. This tool makes it simple to share contact details and links to online portfolios, making it easy for prospective clients or employers to access and browse their work. </div>
                        </div>
                    </div>
                </div>
                <!-- card 4 start -->
                <div class="featurecard-slide">
                    <div class="ezprofile-feature-card">
                        <span class="ezprofile-feature-card-icon">
                            <i class="fal fa-language"></i>
                        </span>
                        <div class="ezprofile-feature-card-content-wrapper">
                            <h3 class="ezprofile-feature-card-title">Multilingual Support</h3>
                            <div class="ezprofile-feature-card-content">With the help of EZ Profile, users may exhibit their portfolios in a variety of languages, appealing to a worldwide clientele and broadening their prospective customer or employer base.
                            </div>
                        </div>
                    </div>
                </div>
                <!-- card 4 End -->
                <div class="featurecard-slide">
                    <div class="ezprofile-feature-card">
                        <span class="ezprofile-feature-card-icon">
                            <svg fill="#FFFFFF" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" xml:space="preserve" stroke="#FFFFFF"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M6.501,6.249c0.44,0.335,0.892,0.654,1.361,0.939C7.623,7.764,7.411,8.372,7.221,9h1.927 c0.11-0.322,0.215-0.649,0.34-0.955C10.381,8.454,11.312,8.766,12.267,9h7.471c0.967-0.235,1.912-0.554,2.812-0.972 c0.125,0.31,0.229,0.644,0.343,0.972h1.891c-0.189-0.629-0.4-1.235-0.641-1.812c0.471-0.285,0.924-0.604,1.36-0.939 c0.84,0.818,1.572,1.743,2.179,2.751h2.688c-2.604-5.318-8.057-9-14.368-9C9.689,0,4.238,3.682,1.635,9h2.686 C4.929,7.992,5.661,7.065,6.501,6.249z M24.109,5.073c-0.246,0.176-0.493,0.349-0.75,0.509c-0.319-0.587-0.666-1.144-1.041-1.646 C22.95,4.266,23.544,4.651,24.109,5.073z M21.794,6.422c-0.808,0.371-1.64,0.67-2.496,0.88c-0.239-1.728-0.584-3.396-1.075-4.672 C19.605,3.329,20.829,4.655,21.794,6.422z M15.82,2.379c0.061-0.001,0.12-0.008,0.182-0.008s0.121,0.007,0.182,0.008 c0.438,0.717,0.965,2.507,1.354,5.229c-0.509,0.06-1.021,0.098-1.535,0.098c-0.517,0-1.028-0.038-1.535-0.098 C14.855,4.886,15.382,3.096,15.82,2.379z M13.771,2.658c-0.485,1.272-0.827,2.927-1.065,4.645c-0.843-0.206-1.661-0.5-2.453-0.86 C11.214,4.692,12.421,3.366,13.771,2.658z M9.684,3.936C9.31,4.438,8.965,4.996,8.642,5.582C8.386,5.423,8.139,5.25,7.893,5.074 C8.459,4.651,9.052,4.266,9.684,3.936z"></path> <path d="M25.503,25.752c-0.438-0.336-0.894-0.654-1.36-0.941c0.237-0.574,0.45-1.182,0.641-1.811h-1.891 c-0.109,0.328-0.216,0.66-0.341,0.971c-0.901-0.418-1.848-0.734-2.813-0.971h-7.47c-0.955,0.234-1.885,0.547-2.778,0.955 C9.364,23.648,9.26,23.32,9.149,23H7.223c0.189,0.629,0.401,1.236,0.64,1.812c-0.47,0.285-0.921,0.604-1.361,0.938 C5.663,24.934,4.931,24.008,4.325,23H1.638c2.603,5.316,8.054,9,14.366,9c6.312,0,11.764-3.684,14.367-9h-2.688 C27.075,24.008,26.343,24.934,25.503,25.752z M7.893,26.928c0.246-0.176,0.494-0.35,0.749-0.508 c0.323,0.586,0.668,1.143,1.042,1.645C9.052,27.734,8.459,27.35,7.893,26.928z M10.251,25.559c0.792-0.356,1.61-0.653,2.453-0.858 c0.238,1.719,0.58,3.368,1.065,4.645C12.421,28.635,11.214,27.307,10.251,25.559z M16.184,29.621 c-0.061,0.002-0.12,0.008-0.182,0.008s-0.121-0.006-0.182-0.008c-0.438-0.717-0.966-2.508-1.354-5.229 c0.507-0.06,1.019-0.099,1.535-0.099c0.517,0,1.028,0.039,1.536,0.099C17.146,27.113,16.622,28.904,16.184,29.621z M18.223,29.369 c0.491-1.275,0.836-2.943,1.075-4.672c0.856,0.211,1.688,0.51,2.496,0.881C20.829,27.346,19.605,28.672,18.223,29.369z M22.318,28.064c0.375-0.504,0.722-1.062,1.041-1.646c0.257,0.16,0.504,0.334,0.75,0.51C23.544,27.35,22.95,27.734,22.318,28.064z "></path> <path d="M4.795,19.18l0.637-2.236c0.169-0.596,0.299-1.183,0.416-1.977h0.026c0.13,0.78,0.247,1.354,0.403,1.977l0.598,2.236 h1.859l1.95-6.355H8.748l-0.546,2.521c-0.143,0.729-0.273,1.443-0.364,2.171H7.812c-0.13-0.729-0.299-1.441-0.468-2.158 l-0.637-2.534h-1.56l-0.676,2.612c-0.156,0.623-0.338,1.353-0.468,2.08H3.977c-0.104-0.729-0.234-1.431-0.364-2.094l-0.507-2.601 H1.09l1.846,6.357h1.859V19.18z"></path> <path d="M18.314,15.344c-0.145,0.729-0.272,1.443-0.362,2.172h-0.027c-0.129-0.729-0.299-1.442-0.467-2.159l-0.64-2.534h-1.56 l-0.676,2.612c-0.156,0.624-0.338,1.353-0.468,2.081h-0.026c-0.104-0.729-0.234-1.432-0.364-2.095l-0.507-2.601h-2.015 l1.846,6.357h1.859l0.637-2.235c0.169-0.599,0.299-1.184,0.416-1.978h0.026c0.13,0.78,0.248,1.354,0.404,1.978l0.598,2.235h1.859 l1.947-6.357h-1.938L18.314,15.344z"></path> <path d="M28.43,15.344c-0.144,0.729-0.273,1.443-0.363,2.172h-0.025c-0.129-0.729-0.3-1.442-0.469-2.159l-0.637-2.534h-1.562 l-0.677,2.612c-0.155,0.624-0.338,1.353-0.469,2.081h-0.024c-0.104-0.729-0.233-1.432-0.363-2.095l-0.508-2.601h-2.017 l1.849,6.357h1.856l0.64-2.235c0.168-0.599,0.299-1.184,0.416-1.978h0.024c0.129,0.78,0.246,1.354,0.402,1.978l0.598,2.235h1.859 l1.949-6.357h-1.938L28.43,15.344z"></path> </g> </g> </g></svg>
                        </span>
                        <div class="ezprofile-feature-card-content-wrapper">
                            <h3 class="ezprofile-feature-card-title">Custom Domain/Subdomain</h3>
                            <div class="ezprofile-feature-card-content">Users may choose their own custom domain or subdomain to display their portfolios, giving them a polished and unique web address that improves their identity and makes it simpler for others to find their profile.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="featurecard-slide">
                    <div class="ezprofile-feature-card">
                        <span class="ezprofile-feature-card-icon">
                            <i class="far fa-calendar-alt"></i>
                        </span>
                        <div class="ezprofile-feature-card-content-wrapper">
                            <h3 class="ezprofile-feature-card-title">Appointment Booking System</h3>
                            <div class="ezprofile-feature-card-content">Users may plan meetings or consultations using the application's appointment booking feature on their portfolio website. By streamlining the coordination and communication process, this feature makes it simpler for customers or employers to work with the user.</div>
                        </div>
                    </div>
                </div>
                <div class="featurecard-slide">
                    <div class="ezprofile-feature-card">
                        <span class="ezprofile-feature-card-icon">
                            <i class="fas fa-money-check"></i>
                        </span>
                        <div class="ezprofile-feature-card-content-wrapper">
                            <h3 class="ezprofile-feature-card-title">Seamless Payment Integration</h3>
                            <div class="ezprofile-feature-card-content">Through the integration of EZ Profile with several online payment processors, customers are able to take payments for goods, services, or reservations right on their portfolio website. With this feature, they may more easily monetize their abilities and speed up the payment process.</div>
                        </div>
                    </div>
                </div>
                <div class="featurecard-slide">
                    <div class="ezprofile-feature-card">
                        <span class="ezprofile-feature-card-icon">
                            <i class="fas fa-adjust"></i>
                        </span>
                        <div class="ezprofile-feature-card-content-wrapper">
                            <h3 class="ezprofile-feature-card-title">Light and Dark Dashboard</h3>
                            <div class="ezprofile-feature-card-content">By allowing users to choose between bright and dark dashboard designs, users may improve user experience and work in a setting that best matches their tastes.</div>
                        </div>
                    </div>
                </div>
                <div class="featurecard-slide">
                    <div class="ezprofile-feature-card">
                        <span class="ezprofile-feature-card-icon">
                            <i class="fas fa-share-alt"></i>
                        </span>
                        <div class="ezprofile-feature-card-content-wrapper">
                            <h3 class="ezprofile-feature-card-title">Social Media Integration</h3>
                            <div class="ezprofile-feature-card-content"> Users of EZ Profile may add social media accounts from sites like LinkedIn, Instagram, or Behance to their online portfolios. Through this connection, they improve their online visibility and give users a simple method to communicate with them across numerous platforms.</div>
                        </div>
                    </div>
                </div>
                <div class="featurecard-slide">
                    <div class="ezprofile-feature-card">
                        <span class="ezprofile-feature-card-icon">
                            <i class="fas fa-analytics"></i>
                        </span>
                        <div class="ezprofile-feature-card-content-wrapper">
                            <h3 class="ezprofile-feature-card-title">Analytics Integration</h3>
                            <div class="ezprofile-feature-card-content">Users can integrate analytics tools like Google Analytics to track and analyze the performance of their portfolio websites. This feature provides valuable insights into visitor behavior, allowing users to optimize their portfolios and make data-driven decisions.</div>
                        </div>
                    </div>
                </div>
                <div class="featurecard-slide">
                    <div class="ezprofile-feature-card">
                        <span class="ezprofile-feature-card-icon">
                            <svg fill="#FFFFFF" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 480 480" xml:space="preserve" stroke="#FFFFFF" stroke-width="9.6"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M456,232V56c0-22.056-17.944-40-40-40H64c-22.056,0-40,17.944-40,40v120c-13.232,0-24,10.768-24,24v240 c0,13.232,10.768,24,24,24h176c13.232,0,24-10.768,24-24h67.048c7.544,0,14.496-3.44,19.072-9.432s6.064-13.608,4.08-20.88 L298.472,352H344v88c0,13.232,10.768,24,24,24h88c13.232,0,24-10.768,24-24V256C480,242.768,469.232,232,456,232z M208,440 c0,4.408-3.592,8-8,8H24c-4.408,0-8-3.592-8-8v-16h192V440z M208,408H16V232h192V408z M208,216H16v-16c0-4.408,3.592-8,8-8h176 c4.408,0,8,3.592,8,8V216z M298.768,413.896c0.664,2.424,0.168,4.96-1.36,6.96s-3.84,3.144-6.36,3.144H224v-16h73.16 L298.768,413.896z M224,392v-40h57.888l10.912,40H224z M344,336H224v-48h120V336z M344,256v16H224v-72c0-13.232-10.768-24-24-24 H40V56c0-13.232,10.768-24,24-24h352c13.232,0,24,10.768,24,24v176h-72C354.768,232,344,242.768,344,256z M464,440 c0,4.408-3.592,8-8,8h-88c-4.408,0-8-3.592-8-8v-16h104V440z M464,408H360V288h104V408z M464,272H360v-16c0-4.408,3.592-8,8-8h88 c4.408,0,8,3.592,8,8V272z"></path> </g> </g> <g> <g> <rect x="41.372" y="327.994" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -218.8385 143.6649)" width="45.256" height="16"></rect> </g> </g> <g> <g> <rect x="60.114" y="319.995" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -194.4378 186.5751)" width="135.767" height="16"></rect> </g> </g> <g> <g> <rect x="86.054" y="272.005" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -162.8477 166.8601)" width="67.879" height="16"></rect> </g> </g> <g> <g> <rect x="375.705" y="324.008" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -116.4408 382.9028)" width="56.559" height="16"></rect> </g> </g> <g> <g> <rect x="391.702" y="356.042" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -134.4066 403.5971)" width="56.559" height="16"></rect> </g> </g> <g> <g> <rect x="206.052" y="128.002" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -25.876 209.5337)" width="67.879" height="16"></rect> </g> </g> <g> <g> <rect x="278.057" y="112.001" transform="matrix(0.7071 -0.7071 0.7071 0.7071 6.5281 255.7627)" width="67.879" height="16"></rect> </g> </g> <g> <g> <rect x="233.364" y="168.01" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -49.4797 232.5655)" width="45.256" height="16"></rect> </g> </g> <g> <g> <rect x="273.302" y="72.062" transform="matrix(0.7071 -0.7071 0.7071 0.7071 30.0796 232.7427)" width="45.368" height="16"></rect> </g> </g> <g> <g> <rect x="56" y="48" width="16" height="16"></rect> </g> </g> <g> <g> <rect x="88" y="48" width="16" height="16"></rect> </g> </g> <g> <g> <rect x="120" y="48" width="16" height="16"></rect> </g> </g> </g></svg>
                        </span>
                        <div class="ezprofile-feature-card-content-wrapper">
                            <h3 class="ezprofile-feature-card-title">Responsive Design</h3>
                            <div class="ezprofile-feature-card-content">The responsiveness and mobile-friendliness of portfolio websites built using the platform are ensured by EZ Profile. This guarantees a smooth user experience for visitors by ensuring that user profiles appear correctly across a variety of gadgets, including smartphones and tablets. </div>
                        </div>
                    </div>
                </div>
                <div class="featurecard-slide">
                    <div class="ezprofile-feature-card">
                        <span class="ezprofile-feature-card-icon">
                            <i class="far fa-headset"></i>
                        </span>
                        <div class="ezprofile-feature-card-content-wrapper">
                            <h3 class="ezprofile-feature-card-title">Continuous Updates and Support</h3>
                            <div class="ezprofile-feature-card-content">We regularly update and support EZ Profile so that users may take advantage of new functions, enhancements, and technical support. This dedication to continuous improvement improves user experience overall and guarantees that consumers may take advantage of the most recent developments in portfolio building technologies.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--====== End saas-features card section ======-->

    @if ($bs->process_section == 1)
    <!--====== Start saas-project section ======-->
    <section class="saas-project">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title-one text-center mb-55">
                        @if (!empty($bs->work_process_title))
                        <span class="span">{{$bs->work_process_title}}</span>
                        @endif
                        @if (!empty($bs->work_process_subtitle))
                        <h2>{{$bs->work_process_subtitle}}</h2>
                        @endif
                    </div>
                </div>
            </div>
            <div class="work-slide">
                @foreach($processes as $key => $process)
                    <div class="work-item">
                        <div class="work-img">
                            <img data-src="{{asset('assets/front/img/process/'.$process->image)}}" class="img-fluid lazy" alt="">
                            <a href="#" class="count">{{$key < 9 ? "0".++$key : ++$key }}</a>
                        </div>
                        <div class="work-info">
                            <h5>{{$process->title}}</h5>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section><!--====== End saas-project section ======-->
    @endif

    @if ($bs->templates_section == 1 && count($templates) > 0)
    <section class="saas-features pt-120">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-6">
                    <div class="section-title-one mb-55">
                        <span class="span">{{$bs->preview_templates_title}}</span>
                        <h2>{{$bs->preview_templates_subtitle}}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($templates as $template)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <a class="d-block features-item mb-40 p-0" href="{{detailsUrl($template)}}" target="_blank">
                            <img src="{{asset('assets/front/img/template-previews/' . $template->template_img)}}" alt="" class="w-100 lazy">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @if ($bs->featured_users_section == 1) 
    <!--====== Start saas-featured-users section ======-->
    <section class="saas-featured-users pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title-one section-title-two mb-50">
                        @if (!empty($bs->featured_users_title))
                        <span class="span">{{$bs->featured_users_title}}</span>
                        @endif
                        @if (!empty($bs->featured_users_subtitle))
                        <h2>{{$bs->featured_users_subtitle}}</h2>
                        @endif
                    </div>
                </div>
            </div>
            <div class="user-slide">
                @foreach($featured_users as $featured_user)
                    <div class="user-item">
                        <div class="title">
                            <img class="lazy" data-src="{{ isset($featured_user->photo) ? asset('assets/front/img/user/'.$featured_user->photo) : asset('assets/admin/img/propics/blank_user.jpg')}}" alt="user">
                            <h5>{{$featured_user->first_name." ".$featured_user->last_name}}</h5>
                            <span>{{$featured_user->username}}</span>
                        </div>
                        <div class="user-button">
                            @php
                                if (!empty($featured_user)) {
                                    $currentPackage = App\Http\Helpers\UserPermissionHelper::userPackage($featured_user->id);
                                    $preferences = App\Models\User\UserPermission::where([
                                        ['user_id',$featured_user->id],
                                        ['package_id',$currentPackage->package_id]
                                    ])->first();
                                    $permissions = isset($preferences) ? json_decode($preferences->permissions, true) : [];
                                }
                            @endphp  
                            <ul>
                                <li><a href="{{detailsUrl($featured_user)}}"
                                       class="main-btn"><i class="fas fa-eye"></i>{{__('View Profile')}}</a></li>
                                @guest       
                                    @if (!empty($permissions) && in_array('Follow/Unfollow', $permissions))
                                    <li>
                                        <a href="{{route('user.follow',['id' => $featured_user->id])}}" class="main-btn"><i class="fal fa-user-plus"></i>{{__('Follow')}}
                                        </a>
                                    </li>
                                    @endif
                                @endguest
                                @if(Auth::check() && Auth::id() != $featured_user->id)       
                                    @if (!empty($permissions) && in_array('Follow/Unfollow', $permissions))
                                    <li>
                                        @if (App\Models\User\Follower::where('follower_id', Auth::id())->where('following_id', $featured_user->id)->count() > 0)
                                            <a href="{{route('user.unfollow', $featured_user->id)}}" class="main-btn"><i class="fal fa-user-minus"></i>{{__('Unfollow')}}
                                        </a>
                                        @else
                                           <a href="{{route('user.follow',['id' => $featured_user->id])}}" class="main-btn"><i class="fal fa-user-plus"></i>{{__('Follow')}}
                                        @endif
                                        </a>
                                    </li>
                                    @endif
                                @endif
                            </ul>
                        </div>
                        <div class="social-box">
                            <ul class="social-link">
                                @foreach($featured_user->social_media as $social)
                                    <li><a href="{{$social->url}}" class="facebook" target="_blank"><i
                                                class="{{$social->icon}}"></i></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section><!--====== End saas-featured-users section ======-->
    @endif

    @if ($bs->pricing_section == 1)
    <!--====== Start saas-pricing section ======-->
    <section class="saas-pricing pt-110 pb-120" id="ezprofile-pricing-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 ezprofile-tab_wrapper">
                    <div class="section-title-one text-center mb-50">
                        @if (!empty($bs->pricing_title))
                        <span class="span">{{$bs->pricing_title}}</span>
                        @endif
                        @if (!empty($bs->pricing_subtitle))
                        <h2>{{$bs->pricing_subtitle}}</h2>
                        @endif
                    </div>
                </div>
            </div>

            @if (count($terms) > 1)
            <div class="row justify-content-center">
                <div class="col-lg-4 ezprofile-tab_wrapper">
                    <div class="pricing-tabs text-center">
                        <ul class="nav nav-tabs">
                            @foreach ($terms as $term)
                            <li class="nav-item mr-1">
                                <a class="nav-link {{$loop->first ? 'active' : ''}}" data-toggle="tab" href="#{{strtolower($term)}}">{{__("$term")}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endif

            <div class="pricing-wrapper tab-content">
                @foreach ($terms as $term)
                <div id="{{strtolower($term)}}" class="tab-pane {{$loop->first ? 'show active' : ''}} fade">
                    <div class="row no-gutters ezprofile-pricing__wrap">
                        @php
                            $packages = \App\Models\Package::where('status', '1')->where('featured', '1')->where('term', strtolower($term))->get();
                        @endphp
                        @foreach($packages as $package)
                            @php
                                $pFeatures = json_decode($package->features);
                            @endphp
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="pricing-item">
                                    @if($package->is_trial === "1" && $package->price != 0)
                                    <div class="listing-badges">
                                        <span class="featured">Introductory Offer</span>
                                    </div>
                                    @endif
                                    <div class="title">
                                        <h3>{{$package->title}}</h3>
                                        <h2 class="price">{{$package->price != 0 && $be->base_currency_symbol_position == 'left' ? $be->base_currency_symbol : ''}}{{$package->price == 0 ? "Free" : $package->price}}{{$package->price != 0 && $be->base_currency_symbol_position == 'right' ? $be->base_currency_symbol : ''}}<span class="month">/ {{__("$package->term")}}</span>
                                        </h2>
                                    </div>
                                    <div class="pricing-body">
                                        <ul class="list">
                                            @foreach ($allPfeatures as $feature)
                                                <li class="{{is_array($pFeatures) && in_array($feature, $pFeatures) ? 'checked' : 'unchecked'}}">{{__("$feature")}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="pricing-button">
                                        @if($package->is_trial === "1" && $package->price != 0)
                                            <a href="{{route('front.register.view',['status' => 'trial','id'=> $package->id])}}"
                                                class="main-btn">{{__('Free Trial')}}</a>
                                        @endif
                                        @if ($package->price == 0)
                                            <a href="{{route('front.register.view',['status' => 'regular','id'=> $package->id])}}"
                                            class="main-btn">{{__('Sign Up')}}</a>
                                        @else
                                            <a href="{{route('front.register.view',['status' => 'regular','id'=> $package->id])}}"
                                            class="main-btn">{{__('Buy Now')}}</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </section><!--====== End saas-pricing section ======-->
    @endif

    @if ($bs->testimonial_section == 1)
    <!--====== Start saas-testimonial section ======-->
    <section class="saas-testimonial pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title-one section-title-two mb-50">
                        @if (!empty($bs->testimonial_title))
                        <span class="span">{{$bs->testimonial_title}}</span>
                        @endif
                        @if (!empty($bs->testimonial_subtitle))
                        <h2>{{$bs->testimonial_subtitle}}</h2>
                        @endif
                    </div>
                </div>
            </div>
            <div class="testimonial-slide">
                @foreach($testimonials as $testimonial)
                    <div class="testimonial-item">
                        <div class="thumb">
                            <img class="lazy"
                                data-src="{{$testimonial->image ? asset('assets/front/img/testimonials/'. $testimonial->image) : asset('assets/front/img/thumb-1.jpg')}}"
                                alt="">
                        </div>
                        <div class="content">
                            <p>{{$testimonial->comment}}</p>
                            <h5>{{$testimonial->name}}</h5>
                            <small>{{$testimonial->rank}}</small>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section><!--====== End saas-testimonial section ======-->
    @endif

    @if ($bs->news_section == 1)
    <!--====== Start saas-blog section ======-->
    <section class="saas-blog pb-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title-one text-center mb-50">
                        @if (!empty($bs->blog_title))
                        <span class="span">{{$bs->blog_title}}</span>
                        @endif
                        @if (!empty($bs->blog_subtitle))
                        <h2>{{$bs->blog_subtitle}}</h2>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($blogs as $blog)
                    <div class="col-lg-6">
                        <div class="blog-item mb-40">
                            <div class="entry-content">
                                <div class="entry-meta">
                                    <ul>
                                        <li><span><i class="fas fa-user"></i><a
                                                    href="{{route('front.blogs', ['category'=>$blog->bcategory->id])}}">{{$blog->bcategory->name}}</a></span></li>
                                        <li>
                                        <span>
                                            <i class="fas fa-calendar-alt"></i>
                                            <a href="#">{{\Carbon\Carbon::parse($blog->created_at)->format("F j, Y")}}</a>
                                        </span>
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="title"><a href="{{route('front.blogdetails',['id' => $blog->id,'slug' => $blog->slug])}}">{{$blog->title}}</a></h3>
                                <a href="{{route('front.blogdetails',['id' => $blog->id,'slug' => $blog->slug])}}" class="read-btn">{{__('Read More')}}</a>
                            </div>
                            <a class="post-img d-block" href="{{route('front.blogdetails',['id' => $blog->id,'slug' => $blog->slug])}}">
                                <img data-src="{{asset('assets/front/img/blogs/'.$blog->main_image)}}" class="img-fluid lazy"
                                     alt="">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section><!--====== End saas-blog section ======-->
    @endif

    @if ($bs->partners_section == 1)
    <!--====== Start saas-sponsor section ======-->
    <section class="saas-sponsor">
        <div class="container">
            <div class="row sponsor-slide">
                @foreach($partners as $partner)
                    <div class="col-lg-3 sponsor-item">
                        <a href="{{$partner->url}}" target="_blank">
                            <img data-src="{{asset('assets/front/img/partners/'.$partner->image)}}" class="img-fluid lazy" alt="">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section><!--====== End saas-sponsor section ======-->
    @endif
@endsection
