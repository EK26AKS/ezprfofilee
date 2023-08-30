@extends('user.profile1.theme11.layout.layout')

@section('main-content.content-profile')


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
                    <img data-src="{{asset('assets/front/img/user/home_settings/'.$home_text->skills_image)}}" class="lazy" width="500" alt="Image">
              
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
  <!--====== Start Service Section ======-->
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
                                <img data-src="{{isset($service->image) ? asset('assets/front/img/user/services/'.$service->image) : asset('assets/front/img/profile/service-1.jpg')}}" class="lazy" width="300" alt="Service Image">
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


<section class="updates-list" id="updates-list" >
    <div class="update">
        <div class="update-box ">
            <div class="container d-flex justify-content-start align-items-center flex-wrap gap-5 px-4">
                <div class="numb">
                    <h2>1+</h2>
                    <span>Work on 3 projects simultaneously</span>
                </div>
                <div class="numb">
                    <h2>1+</h2>
                    <span>Work on 3 projects simultaneously</span>
                </div>
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
            <div class="port-image-content slick-slider d-flex align-items-center justify-content-center flex-wrap gap-3">
                <div class="port-img-con">
                    <img src="{{ ('../images/portfolio.png') }}" width="350" alt="">
                    <div class="content">Graphic design project</div>
                </div>
                <div class="port-img-con">
                    <img src="{{ ('../images/portfolio.png') }}" width="350" alt="">
                    <div class="content">Graphic design project</div>
                </div>
                <div class="port-img-con">
                    <img src="{{ ('../images/portfolio.png') }}" width="350" alt="">
                    <div class="content">Graphic design project</div>
                </div>
                <div class="port-img-con">
                    <img src="{{ ('../images/portfolio.png') }}" width="350" alt="">
                    <div class="content">Graphic design project</div>
                </div>
            </div>
        </div>

    </div>
    </div>

</section>


<section class="testimonial" id="testimonial">
    <div class="testimonial-div">
        <div class="testimonial-container">
            <div id="section-header">
                <span class="testimonial-span">testimonial</span>
                <div class="header-img d-flex justify-content-center">
                    <h2 class="testimonial-h2">testimonial</h2>
                
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="testimonial-containt testimonial-slider">
                        
                            <div class="card mb-3" style="width:600px">
                                <div class="row">
                                    <div class="col-md-2 d-flex">
                                        <img src="{{ ('../images/profile-pic.svg') }}" class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-10">
                                        <div class="card-body">
                                            <h5 class="card-title">Daren Hatcher1</h5>
                                            <div class="para-image d-flex ">
                                                <img src="{{ ('../images/quotes.svg') }}" alt="">
                                            <p class="card-text">It was a pleasure working with Margie. She did a awesome and It was a pleasure working with Margie. She did a awesome and cIt was a pleasure working with Margie. 
                                                She did a awesome and reative graphics for digital campaign. She always exceeded our expectations, and I highly recommend her for any design project.</p>
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="card mb-3" style="width:600px">
                                <div class="row">
                                    <div class="col-md-2 d-flex">
                                        <img src="{{ ('../images/profile-pic.svg') }}" class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-10">
                                        <div class="card-body">
                                            <h5 class="card-title">Daren Hatcher1</h5>
                                            <div class="para-image d-flex ">
                                                <img src="{{ ('../images/quotes.svg') }}" alt="">
                                            <p class="card-text">It was a pleasure working with Margie. She did a awesome and It was a pleasure working with Margie. She did a awesome and cIt was a pleasure working with Margie. 
                                                She did a awesome and reative graphics for digital campaign. She always exceeded our expectations, and I highly recommend her for any design project.</p>
                                            
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


<section class="blogs"  id="blogs" >
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
                <div class="row justify-content-center blog-content blogs-slider" id="blogs-slick">
            
                    <div class="col-md-4 col-lg-4 card-blog">
                        <img src="{{ asset('images/portfolio.png') }}" class="card-img-top" alt="...">
                        <div class="card-body-blog">
                            <h5>New Figma Features</h5>
                            <div class="body-content d-flex justify-content-between my-3">
                            <a href="#" class="blog-link">By Shweta</a>
                            <p class="card-text">july 06, 2023</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-lg-4 card-blog">
                        <img src="{{ asset('images/portfolio.png') }}" class="card-img-top" alt="...">
                        <div class="card-body-blog">
                            <h5>New Figma Features</h5>
                            <div class="body-content d-flex justify-content-between my-3">
                            <a href="#" class="blog-link">By Shweta</a>
                            <p class="card-text">july 06, 2023</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-lg-4 card-blog">
                        <img src="{{ asset('images/portfolio.png') }}" class="card-img-top" alt="...">
                        <div class="card-body-blog">
                            <h5>New Figma Features</h5>
                            <div class="body-content d-flex justify-content-between my-3">
                            <a href="#" class="blog-link">By Shweta</a>
                            <p class="card-text">july 06, 2023</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-lg-4 card-blog">
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
</section>


<section class="contact"  id="contact">
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
            <div class="contact-form ">
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