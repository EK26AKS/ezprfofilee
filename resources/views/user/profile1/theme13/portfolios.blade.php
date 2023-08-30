@extends('user.profile1.theme13.layout') 
@section('tab-title')
{{$keywords["Portfolios"] ?? "Portfolios"}}
@endsection

@section('meta-description', !empty($userSeo) ? $userSeo->portfolios_meta_description : '')
@section('meta-keywords', !empty($userSeo) ? $userSeo->portfolios_meta_keywords : '')

@section('br-title')
{{$keywords["Portfolio"] ?? "Portfolio"}}
@endsection
@section('br-link')
{{$keywords["Portfolio"] ?? "Portfolio"}}
@endsection

@section('content')

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
						<h4><a href="{{ route('front.user.portfolio.detail', [getParam(), $portfolio->slug, $portfolio->id]) }}">{{ strlen($portfolio->title) > 25 ? mb_substr($portfolio->title, 0, 25, 'UTF-8') . '...' : $portfolio->title }}</a>
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

@endsection
