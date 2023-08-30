@extends('user.profile1.theme11.layout')

@section('tab-title')
    {{ $keywords['Home'] ?? 'Home' }}
@endsection

@section('meta-description', !empty($userSeo) ? $userSeo->home_meta_description : '')
@section('meta-keywords', !empty($userSeo) ? $userSeo->home_meta_keywords : '')

@section('content')

<section class="hero-section" id="hero-section">
    <div class="hero d-flex">
        <div class="hero-part1">
            <img src="{{asset('assets/front/css/profile/theme11/images/hero-back1.svg')}}" alt="">            
        </div>
        <div class="hero-part2">
            <img src="{{asset('assets/front/css/profile/theme11/images/hero-back2.svg')}}" alt="">           
        </div>       
    </div>
    <div class="hero-content">
        <div class="profile-pic">
            @if (isset($home_text->hero_image))
            <img src="{{ asset('assets/front/img/user/home_settings/' . $home_text->hero_image) }}"
                alt="">
             @endif
        </div>

        <div class="my-name d-flex flex-column justify-content-start">
            <h2>{{ $keywords["Hi_I'm,"] ?? "Hi I'm," }} {{ $home_text->first_name ?? $user->first_name }}
                {{ $home_text->last_name ?? $user->last_name }}</h2>

            @php
                $designations = explode(',', $home_text->designation ?? '');
                @endphp
                @foreach ($designations as $designation)
                <span class="" >
                    {{ $designation }}
                </span>@endforeach
                @if (is_array($userPermissions) && in_array('Contact', $userPermissions))
                <a href="#" class="hire-me">hire me</a>
                @endif
            
        </div>

    </div>   
</section>

<section class="about-me" id="about-me">
    <div class="container">
    <div class="talk-about-me">
        <div id="section-header">
            <span>{{ $home_text->about_title ?? 'My Resume' }}</span>
            <div class="header-img d-flex justify-content-center">
                <h2> {{ $home_text->about_subtitle ?? 'About Me' }} </h2>
                
            </div>
        </div>
        <div class="aboutme-content d-flex align-items-center justify-content-center ">
            <div class="row align-items-center">
                <div class="col-lg-7 order-1 order-lg-1">
                
                    <p>{!! nl2br($home_text->about_content ?? '') !!}</p>
                </div>
                <div class="col-lg-5 order-2 order-lg-2 aboutme-img">
                    <img src="{{ isset($home_text->about_image) ? asset('assets/front/img/user/home_settings/' . $home_text->about_image) : asset('assets/front/img/profile/about.png') }}" width="500" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

@if (is_array($userPermissions) && in_array('Skill', $userPermissions))
    <section class="skills" id="skills">
        <div class="container">
        <div class="my-skills">
            <div id="section-header">
                <span>{{$home_text->skills_subtitle ?? __('Technical Skills')}} </span>
                <div class="header-img d-flex justify-content-center">
                    <h2>{{$home_text->skills_title ?? __('Skills')}}</h2>
                    
                </div>
            </div>

            <div class="skills-content">
                <div class="row align-items-center">                
                    <div class="col-lg-5 order-1 order-lg-1">
                        <img src="{{asset('assets/front/img/user/home_settings/'.$home_text->skills_image)}}" class="lazy" width="500" alt="Image">              
                    </div>

                    <div class="col-lg-7 order-2 order-lg-2">
                        <div class="skills-description mb-5">
                            <span>{!! nl2br($home_text->skills_content ?? "") !!}</span>
                        </div>
                    <div class="progressbar d-flex flex-wrap align-items-center justify-content-center gap-5">
                        @foreach($skills as $skill)    
                        <div class="circle-progress">
                            <div class="progressbar-all">
                                <div class="progressbar-value">
                                    {{$skill->percentage}}%
                                </div>
                            </div>
                            <h3>{{$skill->title}}</h3>
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

@if(is_array($userPermissions) && in_array('Service',$userPermissions))
    <section class="services" id="services">
        <div class="myservices">
            <div id="section-header">
                <span class="service-span">{{$home_text->service_subtitle ?? __('What I Do ?')}}</span>
                <div class="header-img d-flex justify-content-center">
                    <h2 class="service-h2">{{$home_text->service_title ?? __('Services')}}</h2>
                    
                </div>
            </div>
            <div class="container">
                <div class="all-services">
                    <div class="row">
                        <div class="allservices-content d-flex justify-content-center align-items-center gap-5 mt-5">
                            @foreach($services as $service)
                                <div class=" col-md-4 col-lg-4 allservices-flex">
                                    <a class="service-img d-block" href="#">
                                        <img src="{{isset($service->image) ? asset('assets/front/img/user/services/'.$service->image) : asset('assets/front/img/profile/service-1.jpg')}}" class="lazy" width="300" alt="Service Image">
                                    </a>
                                    @if($service->detail_page == 1)
                                    <h4 class=""><a href="{{route('front.user.service.detail',[getParam(),'slug' => $service->slug,'id' => $service->id])}}">{{$service->name}}</a></h4>
                                    @else
                                    <h4 class="">{{$service->name}}</h4>
                                    @endif
                                    <a @if($service->detail_page == 1) href="#" @endif class="btn-link"> <span class=""> {{$keywords["Read_More"] ?? "Read More"}}</span></a>                            
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
@endif

@if(is_array($userPermissions) && in_array('Experience',$userPermissions))
    <!--====== Start Resume Section ======-->
    <section class="experiance" id="experiance">
        <div class="my-experiance">
            <div id="section-header">
                <span>{{$home_text->experience_title ?? __('Experience')}} </span>
                <div class="header-img d-flex justify-content-center">
                    <h2 class="exp-header">{{$home_text->experience_subtitle ?? __('Experience')}}</h2>
                </div>
            </div>
            <div class="container">
        @if (count($educations) > 0)
                <div class="experiance-content">
                    <div class="expc">
                        <div class="ec-header my-5">
                            <div class="ech-title d-flex gap-3 align-items-center justify-content-center">
                            
                                <img src="{{ asset('assets/front/css/profile/theme11/images/education-icon.svg') }}" class="ech-icon" alt="">
                            <h3>{{$keywords["Education"] ?? "Education"}}</h3>
                            </div>
                        </div>

                        <div class="ec-education d-flex gap-5 justify-content-center">
                            @foreach($educations as $education)
                            <div class="ece-degree d-flex flex-column gap-3">
                                <div class="eced-header d-flex gap-3 align-items-center">
                                
                                    {{$education->degree_name}}
                                </div>
                                <div class="ece-content">
                                    <span class="">
                                        {{\Carbon\Carbon::parse($education->start_date)->format('M j, Y')}}
                                        -
                                        @if (!empty($education->end_date))
                                            {{ \Carbon\Carbon::parse($education->end_date)->format('M j, Y') }}
                                        @else
                                            {{$keywords["Present"] ?? "Present"}}
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
                        <div class="ec-header my-5">
                            <div class="ech-title d-flex gap-3 align-items-center justify-content-center">
                                <img src="{{ asset('assets/front/css/profile/theme11/images/job-icon.svg') }}" class="ech-icon" alt="">
                                <h3>{{$keywords["Job"] ?? "Job"}}</h3>
                            </div>
                        </div>

                        <div class="ec-education d-flex gap-5 justify-content-center">
                            @foreach($job_experiences as $job_experience)
                            <div class="ece-degree d-flex flex-column gap-3">
                                <div class="eced-header d-flex gap-3 align-items-center">
                                
                                    {{$job_experience->designation}} [{{$job_experience->company_name}}]
                                </div>
                                <div class="ece-content">
                                    <span class="date date-bg-one">
                                        {{\Carbon\Carbon::parse($job_experience->start_date)->format('M j, Y')}} - 
                                        @if ($job_experience->is_continue == 0)
                                        {{ \Carbon\Carbon::parse($job_experience->end_date)->format('M j, Y') }}
                                        @else
                                        {{$keywords["Present"] ?? "Present"}}
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

@if(is_array($userPermissions) && in_array('Achievements',$userPermissions))        
    <section class="updates-list" id="updates-list" >
        <div class="update">
            <div class="update-box ">
                <div class="container d-flex justify-content-start align-items-center flex-wrap gap-5 px-4">
                    @foreach ($achievements as $achievement)
                    <div class="numb">
                        <h2>{{$achievement->count}}+</h2>
                        <span>{{$achievement->title}}</span>
                    </div>  
                    @endforeach                 
                </div>
            </div>
        </div>
    </section>
@endif

@if (is_array($userPermissions) && in_array('Portfolio', $userPermissions))
    <section class="portfolio" id="portfolio">
        <div class="portfolio-section">
            <div id="section-header">
                <span>{{ $home_text->portfolio_subtitle ?? __('Portfolios') }}</span>
                <div class="header-img d-flex justify-content-center">
                    <h2 class="exp-header">{{ $home_text->portfolio_title ?? __('Portfolios') }}</h2>
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
                                @foreach ($portfolio_categories as $portfolio_category)                           
                                    <li><a style="color:#555555" href="#" data-filter=".cat-{{ $portfolio_category->id }}">{{ $portfolio_category->name }}</a></li>                                                                        
                                @endforeach                              
                            </ul>
                        </div>
                    </div>
                </div>             
            </div>
            <div class="portfolio-content mt-5">
                <div class="port-image-content slick-slider d-flex align-items-center justify-content-center flex-wrap gap-3">
                    @foreach ($portfolios as $portfolio)
                        <div class="port-img-con">
                            <img src="{{ asset('assets/front/img/user/portfolios/' . $portfolio->image) }}" width="350" alt="Image">                                       
                            <div class="content">
                                <a href="{{ route('front.user.portfolio.detail', [getParam(), $portfolio->slug, $portfolio->id]) }}">{{ strlen($portfolio->title) > 25 ? mb_substr($portfolio->title, 0, 25, 'UTF-8') . '...' : $portfolio->title }}</a>
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
    <section class="testimonial" id="testimonial">
        <div class="testimonial-div">
            <div class="testimonial-container">
                <div id="section-header">
                    <span class="testimonial-span">{{$home_text->testimonial_subtitle ?? __('Testimonials')}}</span>
                    <div class="header-img d-flex justify-content-center">
                        <h2 class="testimonial-h2">{{$home_text->testimonial_title ?? __('Testimonials')}}</h2>                
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="testimonial-containt testimonial-slider">   
                            @foreach ($testimonials as $testimonial)                   
                            <div class="card mb-3" style="width:600px">
                                <div class="row">
                                    <div class="col-md-2 d-flex">
                                        <img class="lazy" src="{{ asset('assets/front/img/user/testimonials/' . $testimonial->image) }}" class="img-fluid rounded-start" alt="Image">                                   
                                    </div>
                                    <div class="col-md-10">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $testimonial->name }}</h5>
                                            <div class="para-image d-flex ">
                                                <img src="{{ ('../images/quotes.svg') }}" alt="">
                                            <p class="card-text">{!! nl2br($testimonial->content) !!}</p>                                        
                                            </div>
                                        </div>
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
@endif

@if(is_array($userPermissions) && in_array('Blog',$userPermissions))
    <section class="blogs"  id="blogs" >
        <div class="blogs-all">
            <div class="blogs-container">
                <div id="section-header">
                    <span>{{$home_text->blog_title ?? __('Blogs')}}</span>
                    <div class="header-img d-flex justify-content-center">
                        <h2 class="exp-header">{{$home_text->blog_subtitle ?? "Blogs"}}</h2>
                        <img src="{{ asset('images/Rectangle-experiance.svg') }}" class="bar-image" alt="">
                    </div>
                </div>
                <div class="container">
                    <div class="row justify-content-center blog-content blogs-slider" id="blogs-slick"> 
                        @foreach($blogs as $blog)           
                        <div class="col-md-4 col-lg-4 card-blog">
                            <div ><a class="post-thumbnail d-block" href="{{route('front.user.blog.detail', [getParam(), $blog->slug, $blog->id])}}">
                                <img class="card-img-top" src="{{asset('assets/front/img/user/blogs/'.$blog->image)}}" alt="Blog Image">
                            </a></div>                      
                            <div class="card-body-blog">
                                <h5><a href="{{route('front.user.blog.detail', [getParam(), $blog->slug, $blog->id])}}">{{strlen($blog->title) > 45 ? mb_substr($blog->title, 0, 45, 'UTF-8') . '...' : $blog->title}}</a></h5>
                                <div class="body-content d-flex justify-content-between my-3">
                                <a href="#" class="blog-link">{{$keywords['by'] ?? "by"}} {{$user->username}}</a>
                                <p class="card-text">{{\Carbon\Carbon::parse($blog->created_at)->format('F j, Y')}}</p>
                                </div>
                            </div>
                        </div>  
                        @endforeach              
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif

@if(is_array($userPermissions) && in_array('Contact',$userPermissions))
    <section class="contactt"  id="contact">
        <div class="contact">
            <div class="contact-box">
                <div id="section-header">
                    <span>{{$home_text->contact_title ??  __('Get in touch')}}</span>
                    <div class="header-img d-flex justify-content-center">
                        <h2 class="exp-header">{{$home_text->contact_subtitle ?? __('Get in touch')}}</h2>
                        <img src="{{ asset('images/Rectangle-experiance.svg') }}" class="bar-image" alt="">
                    </div>
                </div>
                <div class="container">
                <div class="contact-form ">
                    <form action="{{route('front.contact.message', [getParam()])}}" enctype="multipart/form-data" method="post" class="contact">              
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="mb-3">                            
                                    <input type="text" class="form-control" placeholder="{{$keywords["Name"] ?? "Name"}}" name="fullname" required>
                                    @if ($errors->has('fullname'))
                                        <p class="text-danger mb-0">{{$errors->first('fullname')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">                            
                                    <input type="email" class="form-control" placeholder="{{$keywords["Email_Address"] ?? "Email Address"}}" name="email" required>
                                    @if ($errors->has('email'))
                                        <p class="text-danger mb-0">{{$errors->first('email')}}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <div class="mb-3">                                
                                    <input type="text" class="form-control" placeholder="{{$keywords["Subject"] ?? "Subject"}}" name="subject" required>
                                    @if ($errors->has('subject'))
                                        <p class="text-danger mb-0">{{$errors->first('subject')}}</p>
                                    @endif
                                </div>
                            </div>                    
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <div class="mb-3">                            
                                    <textarea class="form-control" placeholder="{{$keywords["Message"] ?? "Message"}}" name="message" cols="30" rows="10"></textarea>
                                    @if ($errors->has('message'))
                                        <p class="text-danger mb-0">{{$errors->first('message')}}</p>
                                    @endif                        
                                </div>
                            </div>                    
                        </div>
                        <div class="mb-4 contact-btn">                        
                            <input type="submit" class="btn btn-settings" value="{{$keywords["Send_Message"] ?? "Send Message"}}"> 
                        </div>               
                    </form>
                </div>
            </div>
            </div>
        </div>
    </section>
@endif

@endsection