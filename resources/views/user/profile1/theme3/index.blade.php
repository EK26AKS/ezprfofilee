@extends('user.profile1.theme3.layout')

@section('tab-title')
{{$keywords["Home"] ?? "Home"}}
@endsection

@section('meta-description', !empty($userSeo) ? $userSeo->home_meta_description : '')
@section('meta-keywords', !empty($userSeo) ? $userSeo->home_meta_keywords : '')

@section('content')
<div class="main-wrapper">
    {{-- <section class="hero-area">
        <div class="hero-img d-lg-block " style="top:120px; right:0px">
            @if(isset($home_text->hero_image))
            <img data-src="{{asset('assets/front/img/user/home_settings/'.$home_text->hero_image)}}" class="lazy" alt="">
            @endif
        </div>       
        <div class="container">
            <div class="row align-items-center hero-wrapper">
                <div class="col-xl-6 col-lg-8">
                    <div class="hero-content">
                        <span class="span">{{$keywords["Hi_I'm,"] ?? "Hi I'm,"}}</span>
                        <h1><span class="h-b">{{$home_text->first_name ?? $user->first_name}}</span><span class="h-l">{{$home_text->last_name ?? $user->last_name}}</span></h1>
                        
                        @php
                        $designations = explode(",",$home_text->designation ?? "");
                        @endphp
                        @if (!empty($designations))
                        <h3>{{$keywords["I am"] ?? "I am"}} <span id="typed"></span></h3>
                        <div class="type-string">
                            @foreach($designations as $designation)
                            <p>{{$designation}}</p>
                            @endforeach
                        </div>
                        @endif
                        @if(is_array($userPermissions) && in_array('Contact',$userPermissions))
                        <a href="{{route('front.user.contact', getParam())}}" class="main-btn">{{$keywords["Hire_me"] ?? 'Hire me'}}</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <section class="hero-section hero-section-two">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-5 col-md-6">
                    <div class="hero-text">
                        <span class="tagline">{{$keywords["Hi_I'm,"] ?? "Hi I'm,"}}</span>
                        <h1 class="hero-title">{{$home_text->first_name ?? $user->first_name}} {{$home_text->last_name ?? $user->last_name}}</h1>
                        <div><p id="typed" class="d-inline-block"></p></div>
                        <div class="type-string">
                            @php
                            $designations = explode(",",$home_text->designation ?? "");
                            @endphp
                            @foreach($designations as $designation)
                            <p>{{$designation}}</p>
                            @endforeach
                        </div>
                        @if(isset($social_medias))
                        <ul class="social-links">
                            @foreach($social_medias as $social_media)
                            <li>
                                <a href="{{$social_media->url}}" target="_blank"><i class="{{$social_media->icon}}"></i></a>
                            </li>
                            @endforeach
                        </ul>
                        @endif

                        @if(is_array($userPermissions) && in_array('Contact',$userPermissions))
                        <a href="#contact" class="template-btn">{{$keywords["Hire_me"] ?? 'Hire me'}}</a>
                        @endif
                    </div>
                </div>
                <div class="col-lg-7 col-md-6 col-sm-9">
                    <div class="hero-img text-center">
                        @if(isset($home_text->hero_image))
                        <img data-src="{{asset('assets/front/img/user/home_settings/'.$home_text->hero_image)}}" class="animate-float-bob-y lazy" alt="">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection