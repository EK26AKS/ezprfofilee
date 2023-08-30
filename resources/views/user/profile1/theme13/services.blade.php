@extends('user.profile1.theme13.layout')   
<!--================Home Banner Area =================-->

@section('br-title')
{{$keywords["Services"] ?? "Services"}}
@endsection
@section('br-link')
{{$keywords["Services"] ?? "Services"}}
@endsection

@section('content')

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
					<a href="{{ route('front.user.service.detail', [getParam(), 'slug' => $service->slug, 'id' => $service->id]) }}"><h4>{{$service->name}}</h4></a>
					<p>{{ strlen(strip_tags($service->content)) > 130 ? mb_substr(strip_tags($service->content), 0, 130, 'UTF-8') : strip_tags($service->content) }}</p>							
				</div>
			</div>
			@endforeach	        			
		</div>
	</div>
</section>
@endif
<!--================End Feature Area =================-->

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