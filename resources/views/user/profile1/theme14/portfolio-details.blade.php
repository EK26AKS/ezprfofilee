@extends('user.profile1.theme14.layout')   
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
				<div class="col-md-8">					
					<div class="left_img">
						<img src="{{ asset('assets/front/img/user/portfolios/' . $portfolio->image) }}" alt="Image">
					</div>
					<h4>{{$portfolio->title}}</h4>
					<p> {!! replaceBaseUrl($portfolio->content) !!}</p>
				</div>
				<div class="col-lg-4">
                    <div class="sidebar-widget-area">
                        <div class="widget categories-widget mb-40">
                            <h4 class="widget-title">{{$keywords["Categories"] ?? "Categories"}}</h4>
                            <ul class="widget-link">
                                <li><a href="{{route('front.user.portfolios', getParam())}}">{{$keywords["All"] ?? "All"}} <span>({{$allCount}})</span></a></li>
                                @foreach ($portfolio_categories as $pc)
                                <li class="@if($pc->id == $portfolio->category_id) active @endif"><a href="{{route('front.user.portfolios', getParam()) . '?category=' . $pc->id}}">{{$pc->name}} <span>({{$pc->portfolios()->count()}})</span></a></li>
                                @endforeach
                            </ul>
                        </div>
    
                        @if ($relatedPortfolios->count() > 0)
                            <div class="widget recent-post-widget mb-40">
                                <h4 class="widget-title">{{$keywords["Related_Portfolios"] ?? "Related Portfolios"}}</h4>
                                <ul class="recent-post-list">
                                    @foreach ($relatedPortfolios->get() as $rp)
                                        <li class="post-thumbnail-content">
                                            <img src="{{asset('assets/front/img/user/portfolios/' . $rp->image)}}" class="img-fluid lazy" alt="">
                                            <div class="post-title-date">
                                                <h6><a href="{{route('front.user.portfolio.detail', [getParam(), $rp->slug, $rp->id])}}">{{strlen($rp->title) > 30 ? mb_substr($rp->title, 0, 30, 'UTF-8') : $rp->title}}</a></h6>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif                        
                    </div>
                </div>			
			</div>			
		</div>
	</div>
</section>
<!--================End Portfolio Details Area =================-->

@endsection