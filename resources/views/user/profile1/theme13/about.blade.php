@extends('user.profile1.theme13.layout')   

@section('tab-title')
{{$keywords["About"] ?? "About"}}
@endsection

@section('meta-description', !empty($userSeo) ? $userSeo->about_meta_description : '')
@section('meta-keywords', !empty($userSeo) ? $userSeo->about_meta_keywords : '')

@section('br-title')
{{$keywords["About Us"] ?? "About Us"}}
@endsection
@section('br-link')
{{$keywords["About Us"] ?? "About Us"}}
@endsection

@section('content')   

<!--================Welcome Area =================-->
<section class="welcome_area p_120">
	<div class="container">
		<div class="row welcome_inner">
			@if(is_array($userPermissions) && in_array('Achievements',$userPermissions))
			<div class="col-lg-6">
				<div class="welcome_text">
					<h4>{{ $home_text->about_title ?? 'My Resume' }}</h4>
					<h2 class="title">{{ $home_text->about_subtitle ?? 'About Me' }}</h2>
					<p>{!! nl2br($home_text->about_content ?? '') !!}</p>
					<div class="row">
						@foreach ($achievements as $achievement)
						<div class="col-sm-4">
							<div class="wel_item">
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
			<div class="col-lg-6">
				<div class="d-flex" style="height:350px; padding-left: 40%;">
					@if(isset($home_text->hero_image))                               
						<img src="{{asset('assets/front/img/user/home_settings/'.$home_text->about_image)}}" class="lazy" alt="Hero Image">
					@endif
				</div>			
		</div>
	</div>
</section>

{{-- <section class="skill_item">
	<div class="container">
		<div class="row welcome_skill">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<div class="tools_expert">
					<div class="skill_main">
						<div class="skill_item">
							<h4>After Effects <span class="counter">85</span>%</h4>
							<div class="progress_br">
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
						</div>
						<div class="skill_item">
							<h4>Photoshop <span class="counter">90</span>%</h4>
							<div class="progress_br">
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
						</div>
						<div class="skill_item">
							<h4>Illustrator <span class="counter">70</span>%</h4>
							<div class="progress_br">
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
						</div>
						<div class="skill_item">
							<h4>Sublime <span class="counter">95</span>%</h4>
							<div class="progress_br">
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
						</div>
						<div class="skill_item">
							<h4>Sketch <span class="counter">75</span>%</h4>
							<div class="progress_br">
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section> --}}
<!--================End Welcome Area =================-->

<!--================Testimonials Area =================-->
{{-- <section class="testimonials_area p_120">
	<div class="container">
		<div class="main_title">
			<h2>Testimonials</h2>
			<p>If you are looking at blank cassettes on the web, you may be very confused at the difference in price. You may see some for as low as $.17 each.</p>
		</div>
		<div class="testi_inner">
			<div class="testi_slider owl-carousel">
				<div class="item">
					<div class="testi_item">
						<p>As conscious traveling Paup ers we must always be oncerned about our dear Mother Earth. If you think about it, you travel across her face</p>
						<h4>Fanny Spencer</h4>
						<a href="#"><i class="fa fa-star"></i></a>
						<a href="#"><i class="fa fa-star"></i></a>
						<a href="#"><i class="fa fa-star"></i></a>
						<a href="#"><i class="fa fa-star"></i></a>
						<a href="#"><i class="fa fa-star-half-o"></i></a>
					</div>
				</div>
				<div class="item">
					<div class="testi_item">
						<p>As conscious traveling Paup ers we must always be oncerned about our dear Mother Earth. If you think about it, you travel across her face</p>
						<h4>Fanny Spencer</h4>
						<a href="#"><i class="fa fa-star"></i></a>
						<a href="#"><i class="fa fa-star"></i></a>
						<a href="#"><i class="fa fa-star"></i></a>
						<a href="#"><i class="fa fa-star"></i></a>
						<a href="#"><i class="fa fa-star-half-o"></i></a>
					</div>
				</div>
				<div class="item">
					<div class="testi_item">
						<p>As conscious traveling Paup ers we must always be oncerned about our dear Mother Earth. If you think about it, you travel across her face</p>
						<h4>Fanny Spencer</h4>
						<a href="#"><i class="fa fa-star"></i></a>
						<a href="#"><i class="fa fa-star"></i></a>
						<a href="#"><i class="fa fa-star"></i></a>
						<a href="#"><i class="fa fa-star"></i></a>
						<a href="#"><i class="fa fa-star-half-o"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section> --}}
<!--================End Testimonials Area =================-->

@endsection
