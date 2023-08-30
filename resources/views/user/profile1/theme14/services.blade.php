@extends('user.profile1.theme14.layout') 

@section('tab-title')
    {{ $keywords['Services'] ?? 'Services' }}
@endsection

@section('meta-description', !empty($userSeo) ? $userSeo->services_meta_description : '')
@section('meta-keywords', !empty($userSeo) ? $userSeo->services_meta_keywords : '')

@section('br-title')
{{$keywords["Services"] ?? "Services"}}
@endsection
@section('br-link')
{{$keywords["Services"] ?? "Services"}}
@endsection

@section('content')  

<!--================Feature Area =================-->
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
					<a href="{{ route('front.user.service.detail', [getParam(), 'slug' => $service->slug, 'id' => $service->id]) }}"><h4>{{$service->name}}</h4></a>  
					<p>{{ strlen(strip_tags($service->content)) > 250 ? mb_substr(strip_tags($service->content), 0, 250, 'UTF-8') : strip_tags($service->content) }}</p>					
				</div>
			</div>
			@endforeach			
		</div>
	</div>
</section>
@endif
@endsection

