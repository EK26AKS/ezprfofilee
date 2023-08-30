@extends('user.profile1.theme13.layout')
@section('tab-title')
{{$keywords["Home"] ?? "Home"}}
@endsection

@section('meta-description', !empty($userSeo) ? $userSeo->home_meta_description : '')
@section('meta-keywords', !empty($userSeo) ? $userSeo->home_meta_keywords : '')

@section('content')

        <!--================Home Banner Area =================-->
        <section class="home_banner_area">
           	<div class="container box_1620">
           		<div class="banner_inner d-flex align-items-center">
					<div class="banner_content">
						<div class="media">
							<div class="d-flex">
								@if(isset($home_text->hero_image))
                                    <img src="{{asset('assets/front/img/user/home_settings/'.$home_text->hero_image)}}" class="lazy" alt="Hero Image">
                                @endif
							</div>
							<div class="media-body">
								<div class="personal_text">
									<h6>Hello Everybody, i am</h6>
									<h3>{{$home_text->first_name ?? $user->first_name}} {{$home_text->last_name ?? $user->last_name}}</h3>
                                    @php
                                    $designations = explode(",",$home_text->designation ?? "");
                                    @endphp

                                    @if (!empty($designations))
                                        <div class="type-string">
                                            @foreach($designations as $designation)
                                            <h4>{{$designation}}</h4>
                                            @endforeach
                                        </div>
                                    @endif

									<p>{{$home_text->about_content ?? $user->about_content}}</p>
									<ul class="list basic_info">
										<li><a href="#"><i class="lnr lnr-calendar-full"></i> 31st December, 1992</a></li>
										<li><a href="#"><i class="lnr lnr-phone-handset"></i> 34567898909</a></li>
										<li><a href="#"><i class="lnr lnr-envelope"></i> johndoe@gmail.com</a></li>
										<li><a href="#"><i class="lnr lnr-home"></i> Santa monica </a></li>
									</ul>
									<ul class="list personal_social">
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->

        <!--================Welcome Area =================-->
        <section class="welcome_area p_120">
        	<div class="container">
        		<div class="row welcome_inner align-items-center justify-content-center">
					@if(is_array($userPermissions) && in_array('Achievements',$userPermissions))
        			<div class="col-lg-6">
        				<div class="welcome_text">
							<h4>{{ $home_text->about_title ?? 'My Resume' }}</h4>
							<h2 class="title">{{ $home_text->about_subtitle ?? 'About Me' }}</h2>
                        	<p>{!! nl2br($home_text->about_content ?? '') !!}</p>
        					<div class="row  align-items-center justify-content-center">
        						@foreach ($achievements as $achievement)
								<div class="col">
									<div class="wel_item text-center">
										<i class="lnr lnr-database"></i>
										<h4>{{$achievement->count}}<span class="sm-text">+</span></h4>
										<p>{{$achievement->title}}</p>
									</div>
								</div>
							@endforeach
        					</div>
        				</div>
        			</div>
					@endif
					<div class="col-lg-6 d-flex">
							@if(isset($home_text->about_image))
                                <img src="{{asset('assets/front/img/user/home_settings/'.$home_text->about_image)}}" class="img-fluid" alt="Hero Image">
                            @endif
        			</div>
        	</div>
        </section>

        @if(is_array($userPermissions) && in_array('Skill',$userPermissions))
		<section class="skill_item">
        	<div class="container">
        		<div class="row welcome_skill">
        			<div class="col-sm-12 col-md-12 col-lg-12">
        				<div class="tools_expert">
        					<div class="skill_main">
                                @foreach($skills as $skill)
								<div class="skill_item">
									<h4>{{$skill->title}} <span class="counter">{{$skill->percentage}}</span>%</h4>
									<div class="progress_br">
										<div class="progress">
											<div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
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
        <!--================End Welcome Area =================-->

        <!--================My Tabs Area =================-->
        @if(is_array($userPermissions) && in_array('Experience',$userPermissions))
        <section class="mytabs_area p_120">
        	<div class="container">
        		<div class="tabs_inner">
					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">My Experiences</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">My Education</a>
						</li>
					</ul>
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            @if (count($job_experiences) > 0)
							<ul class="list">
                                @foreach($job_experiences as $job_experience)
								<li>
									<span></span>
									<div class="media">
										<div class="d-flex">
											<p> {{\Carbon\Carbon::parse($job_experience->start_date)->format('M j, Y')}} -
                                                @if ($job_experience->is_continue == 0)
                                                {{ \Carbon\Carbon::parse($job_experience->end_date)->format('M j, Y') }}
                                                @else
                                                {{$keywords["Present"] ?? "Present"}}
                                                @endif</p>
										</div>
										<div class="media-body">
											<h4>{{$job_experience->company_name}}</h4>
											<p>{{$job_experience->designation}} <br /></p>
										</div>
									</div>
								</li>
                                @endforeach
							</ul>
                            @endif
						</div>
						<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            @if (count($educations) > 0)
							<ul class="list">
                                @foreach($educations as $education)
								<li>
									<span></span>
									<div class="media">
										<div class="d-flex">
											<p>
                                                {{\Carbon\Carbon::parse($education->start_date)->format('M j, Y')}}
                                                -
                                                @if (!empty($education->end_date))
                                                    {{ \Carbon\Carbon::parse($education->end_date)->format('M j, Y') }}
                                                @else
                                                    {{$keywords["Present"] ?? "Present"}}
                                                @endif
                                            </p>
										</div>
										<div class="media-body">
											<h4>Colorlib</h4>
											<p>{{$education->degree_name}} <br /></p>
										</div>
									</div>
								</li>
                                @endforeach
							</ul>
                            @endif
						</div>
					</div>
        		</div>
        	</div>
        </section>
        @endif
        <!--================End My Tabs Area =================-->

        <!--================Feature Area =================-->
		@if (is_array($userPermissions) && in_array('Service', $userPermissions))
        <section class="feature_area p_120">
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
							<h4><a
							href="{{ route('front.user.service.detail', [getParam(), 'slug' => $service->slug, 'id' => $service->id]) }}">
							{{ strlen($service->name) > 30 ? mb_substr($service->name, 0, 30, 'UTF-8') . '...' : $service->name }}
							</a></h4>
							<p>{{ strlen(strip_tags($service->content)) > 130 ? mb_substr(strip_tags($service->content), 0, 130, 'UTF-8') : strip_tags($service->content) }}</p>
						</div>
					</div>
					@endforeach
        		</div>
        	</div>
        </section>
		@endif
        <!--================End Feature Area =================-->

        <!--================Home Gallery Area =================-->
        <section class="home_gallery_area p_120">
        	<div class="container">
        		<div class="main_title">
        			<h2>{{$home_text->portfolio_title ?? __('Portfolios')}}</h2>
        			<p>{{$home_text->portfolio_subtitle ?? __('Portfolios')}}</p>
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
        					<div class="g_img_item">
								<img class="img-fluid" src="{{ asset('assets/front/img/user/portfolios/' . $portfolio->image) }}" alt="Image">
        						<a class="light" href="img/gallery/project-1.jpg"><img src="img/gallery/icon.png" alt=""></a>
        					</div>
        					<div class="g_item_text">
        						<h4><a href="{{ route('front.user.portfolios', [getParam(), $portfolio->slug, $portfolio->id]) }}">{{ strlen($portfolio->title) > 25 ? mb_substr($portfolio->title, 0, 25, 'UTF-8') . '...' : $portfolio->title }}</a>
								</h4>
        						<p>Client Project</p>
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


        <!--================End Home Gallery Area =================-->

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
        <!--================End Testimonials Area =================-->



    <!--================ Contact =================-->
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
    <!--================ End Contact =================-->


 @endsection
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
	$(document).ready(function() {
		// Initialize Isotope
		var $grid = $('.projects_inner').isotope({
			itemSelector: '.col-lg-4',
			layoutMode: 'fitRows'
		});

		// Filter items on button click
		$('.filter li').on('click', function() {
			var filterValue = $(this).attr('data-filter');
			$grid.isotope({ filter: filterValue });

			// Toggle active class on filter buttons
			$('.filter li').removeClass('active');
			$(this).addClass('active');
		});
	});
	</script>
