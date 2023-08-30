@extends('user.profile1.theme14.layout')   

@section('tab-title')
{{$keywords["About"] ?? "About"}}
@endsection

@section('meta-description', !empty($userSeo) ? $userSeo->about_meta_description : '')
@section('meta-keywords', !empty($userSeo) ? $userSeo->about_meta_keywords : '')

@section('br-title')
{{$keywords["About Me"] ?? "About Me"}}
@endsection
@section('br-link')
{{$keywords["About Me"] ?? "About Me"}}
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
					@if(isset($home_text->about_image))                               
						<img src="{{asset('assets/front/img/user/home_settings/'.$home_text->about_image)}}" class="lazy" alt="Hero Image">
					@endif
				</div>
			</div>
		</div>
	</div>
</section>

<!--================End Welcome Area =================-->

<!--================Feature Area =================-->
{{-- <section class="feature_area p_120">
	<div class="container">
		<div class="main_title">
			<h2>offerings to my clients</h2>
			<p>If you are looking at blank cassettes on the web, you may be very confused at the difference in price. You may see some for as low as $.17 each.</p>
		</div>
		<div class="feature_inner row">
			<div class="col-lg-4 col-md-6">
				<div class="feature_item">
					<i class="flaticon-city"></i>
					<h4>Architecture</h4>
					<p>If you are looking at blank cassettes on the web, you may be very confused at the difference in price. You may see some for as low as $17 each.</p>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="feature_item">
					<i class="flaticon-skyline"></i>
					<h4>Interior Design</h4>
					<p>If you are looking at blank cassettes on the web, you may be very confused at the difference in price. You may see some for as low as $17 each.</p>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="feature_item">
					<i class="flaticon-sketch"></i>
					<h4>Concept Design</h4>
					<p>If you are looking at blank cassettes on the web, you may be very confused at the difference in price. You may see some for as low as $17 each.</p>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="feature_item">
					<i class="flaticon-city"></i>
					<h4>Architecture</h4>
					<p>If you are looking at blank cassettes on the web, you may be very confused at the difference in price. You may see some for as low as $17 each.</p>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="feature_item">
					<i class="flaticon-skyline"></i>
					<h4>Interior Design</h4>
					<p>If you are looking at blank cassettes on the web, you may be very confused at the difference in price. You may see some for as low as $17 each.</p>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="feature_item">
					<i class="flaticon-sketch"></i>
					<h4>Concept Design</h4>
					<p>If you are looking at blank cassettes on the web, you may be very confused at the difference in price. You may see some for as low as $17 each.</p>
				</div>
			</div>
		</div>
	</div>
</section> --}}
<!--================End Feature Area =================-->

<!--================Testimonials Area =================-->
{{-- <section class="testimonials_area testi_two p_120">
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