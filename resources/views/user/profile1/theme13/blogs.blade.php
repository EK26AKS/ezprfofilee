@extends('user.profile1.theme13.layout')  

@section('tab-title')
{{$keywords["Blogs"] ?? "Blogs"}}
@endsection

@section('meta-description', !empty($userSeo) ? $userSeo->blogs_meta_description : '')
@section('meta-keywords', !empty($userSeo) ? $userSeo->blogs_meta_keywords : '')  

@section('br-title')
{{$keywords["Blogs"] ?? "Blogs"}}
@endsection
@section('br-link')
{{$keywords["Blogs"] ?? "Blogs"}}
@endsection

@section('content')
<!--================Header Menu Area =================-->

<!--================Home Banner Area =================-->
{{-- <section class="home_banner_area blog_banner">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background="" style="background: url({{asset('assets/front/css/profile/theme14/img/banner/banner-2.jpg')}})"></div>
        <div class="container">
            <div class="blog_b_text text-center">
                <h2>Dude You’re Getting <br /> a Telescope</h2>
                <p>There is a moment in the life of any aspiring astronomer that it is time to buy that first</p>
                <a class="white_bg_btn" href="#">View More</a>
            </div>
        </div>
    </div>
</section> --}}
<!--================End Home Banner Area =================-->

<!--================Blog Categorie Area =================-->
<section class="blog_categorie_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="categories_post">
                    <img src="img/blog/cat-post/cat-post-3.jpg" alt="post">
                    <div class="categories_details">
                        <div class="categories_text">
                            <a href="blog-details.html"><h5>Social Life</h5></a>
                            <div class="border_line"></div>
                            <p>Enjoy your social life together</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="categories_post">
                    <img src="img/blog/cat-post/cat-post-2.jpg" alt="post">
                    <div class="categories_details">
                        <div class="categories_text">
                            <a href="blog-details.html"><h5>Politics</h5></a>
                            <div class="border_line"></div>
                            <p>Be a part of politics</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="categories_post">
                    <img src="img/blog/cat-post/cat-post-1.jpg" alt="post">
                    <div class="categories_details">
                        <div class="categories_text">
                            <a href="blog-details.html"><h5>Food</h5></a>
                            <div class="border_line"></div>
                            <p>Let the food be finished</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Categorie Area =================-->

<!--================Blog Area =================-->
<section class="blog_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog_left_sidebar">
                    @foreach($blogs as $blog)
                    <article class="row blog_item">
                        <div class="col-md-3">
                            <div class="blog_info text-right">
                                <div class="post_tag">
                                    <a href="#">Food,</a>
                                    <a class="active" href="#">Technology,</a>
                                    <a href="#">Politics,</a>
                                    <a href="#">Lifestyle</a>
                                </div>
                                <ul class="blog_meta list">
                                    <li><a href="#">{{ $user->username }}<i class="lnr lnr-user"></i></a></li>
                                    <li><a href="#">{{ \Carbon\Carbon::parse($blog->created_at)->format('F j, Y') }}<i class="lnr lnr-calendar-full"></i></a></li>
                                    <li><a href="#">1.2M Views<i class="lnr lnr-eye"></i></a></li>
                                    <li><a href="#">06 Comments<i class="lnr lnr-bubble"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="blog_post">
                                <img class="lazy" src="{{asset('assets/front/img/user/blogs/'.$blog->image)}}" alt="Blog Image">
                                <div class="blog_details">
                                    <a class="post-thumbnail" href="{{route('front.user.blog.detail', [getParam(), $blog->slug, $blog->id])}}"><h2>{{$blog->title}}</h2></a>
                                    {{-- <a href="single-blog.html"><h2>Astronomy Binoculars A Great Alternative</h2></a> --}}
                                    <p>{!! strlen(strip_tags($blog->content)) > 100
                                        ? mb_substr(strip_tags($blog->content), 0, 100, 'utf-8') . '...'
                                        : strip_tags($blog->content) !!}</p>                                    
                                    <a href="{{route('front.user.blog.detail', [getParam(), $blog->slug, $blog->id])}}" class="blog_btn">View More</a>
                                </div>
                            </div>
                        </div>
                    </article>
                    @endforeach                 
                    <nav class="blog-pagination justify-content-center d-flex">
                        <ul class="pagination">
                            <li class="page-item">
                                <a href="#" class="page-link" aria-label="Previous">
                                    <span aria-hidden="true">
                                        <span class="lnr lnr-chevron-left"></span>
                                    </span>
                                </a>
                            </li>
                            <li class="page-item"><a href="#" class="page-link">01</a></li>
                            <li class="page-item active"><a href="#" class="page-link">02</a></li>
                            <li class="page-item"><a href="#" class="page-link">03</a></li>
                            <li class="page-item"><a href="#" class="page-link">04</a></li>
                            <li class="page-item"><a href="#" class="page-link">09</a></li>
                            <li class="page-item">
                                <a href="#" class="page-link" aria-label="Next">
                                    <span aria-hidden="true">
                                        <span class="lnr lnr-chevron-right"></span>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search Posts">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><i class="lnr lnr-magnifier"></i></button>
                            </span>
                        </div><!-- /input-group -->
                        <div class="br"></div>
                    </aside>
                    {{-- <aside class="single_sidebar_widget author_widget">
                        <img class="author_img rounded-circle" src="img/blog/author.png" alt="">
                        <h4>Charlie Barber</h4>
                        <p>Senior blog writer</p>
                        <div class="social_icon">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-github"></i></a>
                            <a href="#"><i class="fa fa-behance"></i></a>
                        </div>
                        <p>Boot camps have its supporters andit sdetractors. Some people do not understand why you should have to spend money on boot camp when you can get. Boot camps have itssuppor ters andits detractors.</p>
                        <div class="br"></div>
                    </aside> --}}                    
                    {{-- <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Popular Posts</h3>
                        <div class="media post_item">
                            <img src="img/blog/popular-post/post1.jpg" alt="post">
                            <div class="media-body">
                                <a href="blog-details.html"><h3>Space The Final Frontier</h3></a>
                                <p>02 Hours ago</p>
                            </div>
                        </div>
                        <div class="media post_item">
                            <img src="img/blog/popular-post/post2.jpg" alt="post">
                            <div class="media-body">
                                <a href="blog-details.html"><h3>The Amazing Hubble</h3></a>
                                <p>02 Hours ago</p>
                            </div>
                        </div>
                        <div class="media post_item">
                            <img src="img/blog/popular-post/post3.jpg" alt="post">
                            <div class="media-body">
                                <a href="blog-details.html"><h3>Astronomy Or Astrology</h3></a>
                                <p>03 Hours ago</p>
                            </div>
                        </div>
                        <div class="media post_item">
                            <img src="img/blog/popular-post/post4.jpg" alt="post">
                            <div class="media-body">
                                <a href="blog-details.html"><h3>Asteroids telescope</h3></a>
                                <p>01 Hours ago</p>
                            </div>
                        </div>
                        <div class="br"></div>
                    </aside> --}}                   
                    {{-- <aside class="single_sidebar_widget ads_widget">
                        <a href="#"><img class="img-fluid" src="img/blog/add.jpg" alt=""></a>
                        <div class="br"></div>
                    </aside> --}}
                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">{{ $keywords['Latest_Blogs'] ?? 'Latest Blogs' }}</h3>   
                        @foreach ($latestBlogs as $lb)                                          
                            <div class="media post_item">
                                <a href="{{ route('front.user.blog.detail', [getParam(), $lb->slug, $lb->id]) }}"> 
                                    <img src="{{ asset('assets/front/img/user/blogs/' . $lb->image) }}" class="img-fluid" width="50"
                                        alt="">
                                </a>
                                {{-- <img src="img/blog/popular-post/post1.jpg" alt="post"> --}}
                                <div class="media-body">
                                    <a href="{{ route('front.user.blog.detail', [getParam(), $lb->slug, $lb->id]) }}">{{ strlen($lb->title) > 30 ? mb_substr($lb->title, 0, 30, 'UTF-8') . '...' : $lb->title }}</a>
                                    <p>{{ \Carbon\Carbon::parse($lb->created_at)->format('F j, Y') }}</p>
                                </div>
                            </div>
                        @endforeach                       
                    </aside>
                    <aside class="single_sidebar_widget popular_post_widget">
                        <h4 class="widget_title">{{ $keywords['Categories'] ?? 'Categories' }}</h4>                     
                        <ul class="list cat-list">
                            <li @if (empty(request()->input('category'))) class="active" @endif>
                                <a class="d-flex justify-content-between"
                                    href="{{ route('front.user.blogs', getParam()) }}">{{ $keywords['All'] ?? 'All' }}
                                    <p>({{ $allCount }})</p></a></li>
                            @foreach ($blog_categories as $bc)
                                <li @if ($bc->id == request()->input('category')) class="active" @endif><a class="d-flex justify-content-between"
                                        href="{{ route('front.user.blogs', getParam()) . '?category=' . $bc->id }}">{{ $bc->name }}
                                        <span>({{ $bc->blogs()->count() }})</span></a></li>
                            @endforeach
                        </ul>
                    </aside>
                    {{-- <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">Post Catgories</h4>
                        <ul class="list cat-list">
                            <li>
                                <a href="#" class="d-flex justify-content-between">
                                    <p>Technology</p>
                                    <p>37</p>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-flex justify-content-between">
                                    <p>Lifestyle</p>
                                    <p>24</p>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-flex justify-content-between">
                                    <p>Fashion</p>
                                    <p>59</p>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-flex justify-content-between">
                                    <p>Art</p>
                                    <p>29</p>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-flex justify-content-between">
                                    <p>Food</p>
                                    <p>15</p>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-flex justify-content-between">
                                    <p>Architecture</p>
                                    <p>09</p>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-flex justify-content-between">
                                    <p>Adventure</p>
                                    <p>44</p>
                                </a>
                            </li>															
                        </ul>
                        <div class="br"></div>
                    </aside> --}}
                    {{-- <aside class="single-sidebar-widget newsletter_widget">
                        <h4 class="widget_title">Newsletter</h4>
                        <p>
                        Here, I focus on a range of items and features that we use in life without
                        giving them a second thought.
                        </p>
                        <div class="form-group d-flex flex-row">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                                </div>
                                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'">
                            </div>
                            <a href="#" class="bbtns">Subcribe</a>
                        </div>	
                        <p class="text-bottom">You can unsubscribe at any time</p>	
                        <div class="br"></div>							
                    </aside> --}}
                    {{-- <aside class="single-sidebar-widget tag_cloud_widget">
                        <h4 class="widget_title">Tag Clouds</h4>
                        <ul class="list">
                            <li><a href="#">Technology</a></li>
                            <li><a href="#">Fashion</a></li>
                            <li><a href="#">Architecture</a></li>
                            <li><a href="#">Fashion</a></li>
                            <li><a href="#">Food</a></li>
                            <li><a href="#">Technology</a></li>
                            <li><a href="#">Lifestyle</a></li>
                            <li><a href="#">Art</a></li>
                            <li><a href="#">Adventure</a></li>
                            <li><a href="#">Food</a></li>
                            <li><a href="#">Lifestyle</a></li>
                            <li><a href="#">Adventure</a></li>
                        </ul>
                    </aside> --}}
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->

@endsection

