
@extends('user.profile1.theme14.layout')

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
<!--================Projects Area =================-->
{{-- <section class="projects_area p_120">
	<div class="container">
		<div class="main_title">
			<h2>{{$home_text->portfolio_title ?? __('Portfolios')}}</h2>
			<p>{{$home_text->portfolio_subtitle ?? __('Portfolios')}}</p>
		</div>
		<div class="projects_fillter">
			<ul class="filter list">
				@foreach($portfolio_categories as $portfolio_category)
				<li class="active" data-filter="*"><a href="#">All Categories</a></li>
				<li data-filter=".brand"><a href="#">Branding</a></li>
				<li data-filter=".work"><a href="#">Creative Work </a></li>
				<li data-filter=".web"><a href="#">Web Design</a></li>
				@endforeach
			</ul>
		</div>
		<div class="projects_inner row">
			<div class="col-lg-4 col-sm-6 brand web">
				<div class="projects_item">
					<img class="img-fluid" src="img/projects/projects-1.jpg" alt="">
					<div class="projects_text">
						<a href="portfolio-details.html"><h4>3D Helmet Design</h4></a>
						<p>Client Project</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-sm-6 brand work">
				<div class="projects_item">
					<img class="img-fluid" src="img/projects/projects-2.jpg" alt="">
					<div class="projects_text">
						<a href="portfolio-details.html"><h4>3D Helmet Design</h4></a>
						<p>Client Project</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-sm-6 work">
				<div class="projects_item">
					<img class="img-fluid" src="img/projects/projects-3.jpg" alt="">
					<div class="projects_text">
						<a href="portfolio-details.html"><h4>3D Helmet Design</h4></a>
						<p>Client Project</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-sm-6 brand web">
				<div class="projects_item">
					<img class="img-fluid" src="img/projects/projects-4.jpg" alt="">
					<div class="projects_text">
						<a href="portfolio-details.html"><h4>3D Helmet Design</h4></a>
						<p>Client Project</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-sm-6 brand work">
				<div class="projects_item">
					<img class="img-fluid" src="img/projects/projects-5.jpg" alt="">
					<div class="projects_text">
						<a href="portfolio-details.html"><h4>3D Helmet Design</h4></a>
						<p>Client Project</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-sm-6 brand work web">
				<div class="projects_item">
					<img class="img-fluid" src="img/projects/projects-6.jpg" alt="">
					<div class="projects_text">
						<a href="portfolio-details.html"><h4>3D Helmet Design</h4></a>
						<p>Client Project</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section> --}}

<section class="projects_area p_120 pb-5">
	<div class="container">
		<div class="main_title">
			<h2>{{$home_text->portfolio_title ?? __('Portfolios')}}</h2>
			<p>{{$home_text->portfolio_subtitle ?? __('Portfolios')}}</p>
		</div>
		<div class="projects_fillter">
			<ul class="filter list">
				<li class="" data-filter="*"><a href="#">All Categories</a></li>
				@foreach ($portfolio_categories as $portfolio_category)
					<li><a href="#"
						data-filter=".cat-{{ $portfolio_category->id }}">{{ $portfolio_category->name }}</a>
					</li>
				@endforeach
			</ul>
		</div>
		<div class="projects_inner row" style="position: relative; height: 369px;">
			@foreach ($portfolios as $portfolio)
			<div class="col-lg-4 col-sm-6" style="position: absolute; left: 0px; top: 0px;">
				<div class="projects_item">
					<img src="{{ asset('assets/front/img/user/portfolios/' . $portfolio->image) }}" alt="Image">
					<div class="projects_text">
						<h4><a
							href="{{ route('front.user.portfolio.detail', [getParam(), $portfolio->slug, $portfolio->id]) }}">{{ strlen($portfolio->title) > 25 ? mb_substr($portfolio->title, 0, 25, 'UTF-8') . '...' : $portfolio->title }}</a>
					</h4>
						{{-- <a href="portfolio-details.html"><h4>3D Helmet Design</h4></a> --}}
						<p>Client Project</p>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>
<!--================End Projects Area =================-->

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
