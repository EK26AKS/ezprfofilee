@extends('user.profile1.theme10.layout')

@section('tab-title')
{{$keywords["Home"] ?? "Home"}}
@endsection

@section('meta-description', !empty($userSeo) ? $userSeo->home_meta_description : '')
@section('meta-keywords', !empty($userSeo) ? $userSeo->home_meta_keywords : '')

@section('content')

            <div class="main-wrap ">

                <div class="main-container">

                    <div class="details d-flex justify-content-between align-items-center">
                        <div class="contact">
                            <div class="details-me d-flex flex-column gap-3 mx-5">
                                <span>{{ $keywords["Hi_I'm,"] ?? "Hi I'm," }}</span>
                                <h2>{{ $home_text->first_name ?? $user->first_name }}
                            {{ $home_text->last_name ?? $user->last_name }}</h2>
                                <h6> @php
                                        $designations = explode(',', $home_text->designation ?? '');
                                    @endphp
                                    @foreach ($designations as $designation)
                                        <p>{{ $designation }}</p>
                                    @endforeach</h6>
                                    @if (is_array($userPermissions) && in_array('Contact', $userPermissions))
                                        <a href="#contact" class="btn btn-hireme">{{ $keywords['Hire_me'] ?? 'Hire me' }}</a>
                                    @endif
                            </div>
                        </div>

                        <div class="my-image">
                            @if (isset($home_text->hero_image))
                                <img src="{{ asset('assets/front/img/user/home_settings/' . $home_text->hero_image) }}"
                                    alt="">
                            @endif
                        </div>
                    </div>
                </div>

                <section class="about-me" id="about-me">
                    <div class="about-me" >
                        <div class="am-all d-flex flex-column gap-3 ms-5">
                            <div class="am-header">
                                <span><img src="{{asset('assets/front/img/profile1/theme10/rectangle.svg') }}" class="me-3" id="bar-img" alt="">{{ $home_text->about_title ?? 'My Resume' }}</span>
                                <h3>{{ $home_text->about_subtitle ?? 'About Me' }}</h3>

                            </div>

                            <div class="am-content">
                                <div class="amc-flex d-flex">
                                    <div class="amc-flex-box1 w-75">
                                        <p class="am-para">{!! nl2br($home_text->about_content ?? '') !!}</p>

                                        <div class="am-four d-flex align-items-center flex-wrap gap-4 mt-5">
                                        @foreach ($achievements as $achievement)
                                            <div class="am-1">
                                                <div class="card">
                                                <span>{{ $achievement->count }}+</span>
                                                <p>{{ $achievement->title }}</p>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="amc-flex-box2">
                                        <div class="am-image">
                                            <img src="{{ isset($home_text->about_image) ? asset('assets/front/img/user/home_settings/' . $home_text->about_image) : asset('assets/front/img/profile/about.png') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                @if (is_array($userPermissions) && in_array('Skill', $userPermissions))
                <section class="skills" id="skills">
                    <div class="about-me" id="">
                        <div class="my-skills d-flex flex-column gap-3 ms-5">
                            <div class="mys-header">
                                <span><img src="{{asset('assets/front/img/profile1/theme10/rectangle.svg') }}" class="me-3" id="bar-img" alt="">{{ $home_text->skills_subtitle ?? __('Technical Skills') }}</span>
                                <h3>{{ $home_text->skills_subtitle ?? __('Technical Skills') }}</h3>

                            </div>

                            <div class="mys-content">
                                <div class="mys-box d-flex justify-content-between">
                                    <div class="mys-box1">
                                        <div class="skills-list mt-5">
                                            <ul>
                                                <li>Logos</li>
                                                <li>Invitaions</li>
                                                <li>social media</li>
                                                <li>Graphics</li>
                                                <li>Info-graphics and more</li>
                                            </ul>

                                            <div class="mys-four d-flex flex-wrap gap-5 mt-5">
                                                <div class="am-1">
                                                    <div class="card-skills">
                                                    @foreach ($skills as $skill)
                                                    <label for="" class="form-label">{{ $skill->title }}</label>
                                                    <div class="progress">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    @endforeach
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="mys-box2">
                                        <div class="mys-image">
                                            <img src="{{asset('assets/front/img/user/home_settings/'.$home_text->skills_image)}}" class="skills-image" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                @endif
                @if (is_array($userPermissions) && in_array('Service', $userPermissions))
                <section class="services" id="services">
                    <div class="about-me">
                        <div class="am-all d-flex flex-column gap-3 mx-5">
                            <div class="am-header">
                                <span><img src="{{asset('assets/front/img/profile1/theme10/rectangle.svg') }}" class="me-3" id="bar-img" alt="">{{$home_text->service_title ?? __('Services')}}</span>
                                <h3>{{$home_text->service_subtitle ?? __('What I Do ?')}}</h3>
                            </div>

                            <div class="slick-slider services-content my-3" id="service-slick">
                            @foreach($services as $service)
                                    <div class="sr-img mx-5">
                                    <a class="service-img d-block" href="{{route('front.user.service.detail',[getParam(),'slug' => $service->slug,'id' => $service->id])}}">
                                        <img src="{{isset($service->image) ? asset('assets/front/img/user/services/'.$service->image) : asset('assets/front/img/profile/service-1.jpg')}}" alt="Service Image">
                                    </a>
                                    </div>
                            @endforeach

                            </div>
                        </div>
                    </div>
                </section>
                @endif
                @if (is_array($userPermissions) && in_array('Experience', $userPermissions))
                <section class="experiance" id="experiance">
                    <div class="about-me" >
                        <div class="am-all d-flex flex-column gap-3 mx-5">
                            <div class="am-header">
                                <span><img src="{{asset('assets/front/img/profile1/theme10/rectangle.svg') }}" class="me-3" id="bar-img" alt="">{{$home_text->experience_title ?? __('Experience')}}</span>
                                <h3>{{$home_text->experience_subtitle ?? __('Experience')}}</h3>
                            </div>

                            <div class="experiance-content">
                                <div class="expc">
                                    <div class="ec-header my-5">
                                        <div class="ech-title d-flex gap-3 align-items-center">
                                            <img src="{{asset('assets/front/img/profile1/education.png')}}" class="ech-icon" alt="">
                                            <h3>{{$keywords["Education"] ?? "Education"}}</h3>
                                        </div>
                                    </div>

                                    <div class="ec-education d-flex gap-5 justify-content-center">
                                    @foreach($educations as $education)
                                        <div class="ece-degree d-flex flex-column gap-3">
                                            <div class="eced-header d-flex gap-3 align-items-center">
                                                <img src="{{asset('assets/front/img/profile1/theme10/rectangle.svg') }}" alt="">
                                                {{$education->degree_name}}
                                            </div>
                                            <div class="ece-content">
                                                <span class="">{{\Carbon\Carbon::parse($education->start_date)->format('M j, Y')}}
                                                -
                                                @if (!empty($education->end_date))
                                                    {{ \Carbon\Carbon::parse($education->end_date)->format('M j, Y') }}
                                                @else
                                                    {{$keywords["Present"] ?? "Present"}}
                                                @endif</span>
                                            </div>
                                            <div class="ece-description">
                                                <span class="">{!! nl2br($education->short_description) !!}</span>

                                            </div>
                                        </div>
                                    @endforeach


                                </div>
                            </div>


                            <div class="experiance-content">
                                <div class="expc">
                                    <div class="ec-header my-5">
                                        <div class="ech-title d-flex gap-3 align-items-center">
                                            <img src="{{asset('assets/front/img/profile1/job.png')}}" class="ech-icon" alt="">
                                            <h3>{{$keywords["Job"] ?? "Job"}}</h3>
                                        </div>
                                    </div>

                                    <div class="ec-education d-flex gap-5 justify-content-center">
                                    @foreach($job_experiences as $job_experience)
                                        <div class="ece-degree d-flex flex-column gap-3">
                                            <div class="eced-header d-flex gap-3 align-items-center">
                                                <img src="{{asset('assets/front/img/profile1/theme10/rectangle.svg') }}" alt="">
                                                {{$job_experience->designation}} [{{$job_experience->company_name}}]
                                            </div>
                                            <div class="ece-content">
                                                <span class=""> jul 28, 2020 <{{\Carbon\Carbon::parse($job_experience->start_date)->format('M j, Y')}} -
                                                @if ($job_experience->is_continue == 0)
                                                {{ \Carbon\Carbon::parse($job_experience->end_date)->format('M j, Y') }}
                                                @else
                                                {{$keywords["Present"] ?? "Present"}}
                                                @endif/span>
                                            </div>
                                            <div class="ece-description">
                                                <span class="">{!! nl2br($job_experience->content) !!}</span>

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
                @if(is_array($userPermissions) && in_array('Portfolio',$userPermissions))
                <section class="portfolio" id="portfolio">
                    <div class="about-me" >
                        <div class="am-all d-flex flex-column gap-3 mx-5">
                            <div class="am-header">
                                <span><img src="{{asset('assets/front/img/profile1/theme10/rectangle.svg') }}" class="me-3" id="bar-img" alt="">{{$home_text->portfolio_title ?? __('Portfolios')}}</span>
                                <h3>{{$home_text->portfolio_subtitle ??  __('Portfolios')}}</h3>
                            </div>

                            <div class="filter-portfolio my-3">
                                <div class="filter-box d-flex gap-3">
                                    <div class="filter-button">
                                        <button class="btn-all">{{$keywords["All"] ?? "All"}}</button>
                                    </div>
                                    @foreach($portfolio_categories as $portfolio_category)
                                    <div class="filter-button">
                                        <button class="btn-uiux">{{$portfolio_category->name}}</button>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="slick-slider-portfolio services-content my-3" id="portfolio-slick">
                            @foreach($portfolios as $portfolio)
                                <div class="sr-img mx-3">
                                <a href="{{route('front.user.portfolio.detail', [getParam(), $portfolio->slug, $portfolio->id])}}" class="d-block">
                                            <img src="{{asset('assets/front/img/user/portfolios/'.$portfolio->image)}}" alt="Image">
                                        </a>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </section>
                @endif
                @if(is_array($userPermissions) && in_array('Testimonial',$userPermissions))
                <section class="testimonial" id="testimonial">
                <div class="about-me" >
                        <div class="am-all d-flex flex-column gap-3 mx-5">
                            <div class="am-header">
                                <span><img src="{{asset('assets/front/img/profile1/theme10/rectangle.svg') }}" class="me-3" id="bar-img" alt="">{{$home_text->testimonial_title ?? __('Testimonials')}}</span>
                                <h3>{{$home_text->testimonial_subtitle ?? __('Testimonials')}}</h3>
                            </div>

                            <div class="slick-slider-testimonial services-content  my-3" id="testimonial-slick">
                            @foreach($testimonials as $testimonial)
                            <div class="card mb-3 ms-2">
                                <div class="row">
                                    <div class="col-md-4">
                                    <img src="{{asset('assets/front/img/user/testimonials/'.$testimonial->image)}}" class="" alt="">
                                    </div>
                                    <div class="col-md-8">
                                    <div class="card-body">
                                    <p class="card-text">{!! nl2br($testimonial->content) !!}</p>
                                        <h5 class="card-title">{{$testimonial->name}}</h5>

                                        <p class="card-text"><small class="text-muted">@if (!empty($testimonial->occupation))
                                            <span class="position">{{$testimonial->occupation}}</span>
                                            @endif</small></p>
                                    </div>
                                    </div>
                                </div>
                            </div>
                               @endforeach
                                </div>
                            </div>
                        </div>
                </section>
                @endif
                @if(is_array($userPermissions) && in_array('Blog',$userPermissions))
                <section class="blogs" id="blogs">
                    <div class="about-me" >
                        <div class="am-all d-flex flex-column gap-3 mx-5">
                            <div class="am-header">
                                <span><img src="{{asset('assets/front/img/profile1/theme10/rectangle.svg') }}" class="me-3" id="bar-img" alt="">{{$home_text->blog_title ?? __('Blogs')}}</span>
                                <h3>{{$home_text->blog_subtitle ?? "Blogs"}}</h3>
                            </div>

                            <div class="slick-slider-blog blog-content  my-3" id="blogs-slick">
                            @foreach($blogs as $blog)
                            <div class="card-blog">
                            <a class="post-thumbnail d-block" href="{{route('front.user.blog.detail', [getParam(), $blog->slug, $blog->id])}}">
                                        <img src="{{asset('assets/front/img/user/blogs/'.$blog->image)}}" alt="Blog Image">
                                    </a>
                                <div class="card-body-blog">
                                    <h5>{{$keywords['by'] ?? "by"}} <a>{{$user->username}}</h5>
                                    <div class="body-content d-flex justify-content-between my-3">
                                    <a href="{{route('front.user.blog.detail', [getParam(), $blog->slug, $blog->id])}}" class="blog-link">{{strlen($blog->title) > 45 ? mb_substr($blog->title, 0, 45, 'UTF-8') . '...' : $blog->title}}</a>
                                    <p class="card-text">{{\Carbon\Carbon::parse($blog->created_at)->format('F j, Y')}}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                </section>
                @endif
                @if(is_array($userPermissions) && in_array('Contact',$userPermissions))
                <section class="contact" id="contact">
                    <div class="about-me" >
                        <div class="am-all d-flex flex-column gap-3 mx-5">
                            <div class="am-header">
                                <span><img src="{{asset('assets/front/img/profile1/theme10/rectangle.svg') }}" class="me-3" id="bar-img" alt="">{{$home_text->contact_title ??  __('Get in touch')}}</span>
                                <h3>{{$home_text->contact_subtitle ?? __('Get in touch')}}</h3>
                            </div>

                            <div class="contact-form my-5">
                            <form action="{{route('front.contact.message', [getParam()])}}" enctype="multipart/form-data" class="contact" method="post">
                            @csrf
                                    <input type="hidden" name="id" value="{{$user->id}}">
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

                                        <textarea class="form-control" placeholder="{{$keywords["Message"] ?? "Message"}}" name="message"></textarea>
                                                @if ($errors->has('message'))
                                                    <p class="text-danger mb-0">{{$errors->first('message')}}</p>
                                                @endif
                                        </div>
                                    </div>

                                </div>

                                <div class="mb-4">
                                <button type="submit" class="btn btn-settings">{{$keywords["Send_Message"] ?? "Send Message"}}</button>
                                </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </section>
                @endif
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js" integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(".slick-slider").slick({
            slidesToShow: 3,
            infinite:false,
            slidesToScroll: 1,

        });

        $(".slick-slider-portfolio").slick({

            slidesToShow: 3,
            infinite:false,
            slidesToScroll: 1,

        });

    </script>

    <script>
        $(".slick-slider-testimonial").slick({
            rows:1,
            slidesToShow: 1,
            infinite:true,
            slidesToScroll: 1,
            variableWidth: true,
        });


    </script>

    <script>
        $(".slick-slider-blog").slick({
            slidesToShow: 3,
            infinite:false,
            slidesToScroll:1,
            variableWidth: true,
        });

    </script>

    <script>
        $('.default-link').click(function(){
            //alert('abcd');
            $('#sidebar .nav-bar .default-show').toggleClass("show");
            //$('#sidebar .nav-manage .icon-svg').toggleClass("rotate");
        });
    </script>

    <script>
        function myFunction() {
        var x = document.getElementById("sidebar");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
        }
    </script>
@endsection
