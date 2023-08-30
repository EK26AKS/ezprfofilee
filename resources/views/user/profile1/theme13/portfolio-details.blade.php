@extends('user.profile1.theme13.layout')   
@section('tab-title')
    {{ $keywords['Portfolio_Details'] ?? 'Portfolio Details' }}
@endsection

@section('og-meta')
    <meta property="og:image" content="{{ asset('assets/front/img/user/portfolios/' . $portfolio->image) }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1024">
    <meta property="og:image:height" content="1024">
@endsection

@section('meta-description', $portfolio->meta_description)
@section('meta-keywords', $portfolio->meta_keywords)

@section('br-title')
    {{ $keywords['Portfolio_Details'] ?? 'Portfolio Details' }}
@endsection
@section('br-link')
    {{ $keywords['Portfolio_Details'] ?? 'Portfolio Details' }}
@endsection

@section('content')

<!--================Portfolio Details Area =================-->
<section class="portfolio_details_area p_120">
	<div class="container">
		<div class="portfolio_details_inner">
			<div class="row">
				<div class="col-md-6">
					<div class="left_img">
						<img src="{{ asset('assets/front/img/user/portfolios/' . $portfolio->image) }}" alt="Image">
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="portfolio_right_text">
						<h4>{{$portfolio->title}}</h4>
						{{-- <ul class="list">
							<li><span>Rating</span>: <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></li>
							<li><span>Client</span>:  colorlib</li>
							<li><span>Website</span>:  colorlib.com</li>
							<li><span>Completed</span>:  17 Aug 2018</li>
						</ul> --}}
					</div>
				</div>
			</div>
            {!! replaceBaseUrl($portfolio->content) !!}
		</div>
	</div>
</section>
<!--================End Portfolio Details Area =================-->

@endsection