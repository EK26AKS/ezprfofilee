@extends('user.profile1.theme3.layout')

@section('tab-title')
{{$keywords["Skills"] ?? "Skills"}}
@endsection

@section('meta-description', !empty($userSeo) ? $userSeo->skill_meta_description : '')
@section('meta-keywords', !empty($userSeo) ? $userSeo->skill_meta_keywords : '')

@section('content')
    <!--====== Start Main Wrapper ======-->
    <div class="main-wrapper inner">
        {{-- <section class="about-area">            
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-8" style="top:-100px">
                        <div class="about-content-box">
                            <div class="section-title mb-30">
                                <span class="sub-title">{{$home_text->skills_title ?? __('Skills')}}</span>
                                <h2><span class="light-text">{{$home_text->skills_subtitle ?? __('Technical Skills')}}</span></h2>
                            </div>
                            <p>{!! nl2br($home_text->skills_content ?? "") !!}
                            </p>
                            <div class="counter-wrapper d-flex">
                                @foreach($skills as $skill)
                                    <li class="single-skill">
                                        <h5>{{$skill->title}} <span>{{$skill->percentage}}%</span></h5>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: {{$skill->percentage}}%; background-color: #{{$skill->color}}"></div>
                                        </div>
                                    </li>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @if (!empty($home_text->skills_image))
                <div class="skill-img" style="top:180px; right:0px">
                    <img data-src="{{asset('assets/front/img/user/home_settings/'.$home_text->skills_image)}}" class="lazy" alt="Skills Image">
                </div>
            @endif
                </div>
            </div>
        </section> --}}
        <section class="skill-area pt-140">          
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="skill-img mb-50">
                            @isset($home_text->skills_image)
                                <img data-src="{{asset('assets/front/img/user/home_settings/'.$home_text->skills_image)}}" class="lazy" alt="Image">
                            @endisset
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="skill-content-box mb-20">
                            <div class="section-title mb-50">
                                <span class="sub-title">{{$home_text->skills_title ?? __('Skills')}}</span>
                                <h2 class="mb-20" style="color:#4C3EC7;font-weight: 300">{{$home_text->skills_subtitle ?? __('Technical Skills')}}</h2>
                                <p>{!! nl2br($home_text->skills_content ?? "") !!}</p>
                            </div>
                            <div class="skill-wrapper">
                                @foreach($skills as $skill)
                                    <div class="skill-item text-center mb-30">
                                        <div class="skill-circle">
                                            <div data-donutty data-radius="20" data-thickness="40" data-padding="6" data-round="false" data-bg="rgba(244, 190, 29, 0.22)" data-color="#{{$skill->color}}" data-value="{{$skill->percentage}}"></div>
                                            
                                        </div>
                                        <img data-src="{{asset('assets/front/img/profile1/theme4/objects/shadow.png')}}" class="lazy img-shadow mb-15" alt="shadow">
                                        <h5>{{$skill->title}}<span class="percentage">{{$skill->percentage}}%</span></h5>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- <section class="skills-area pt-130">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="skills-content-box">
                            <div class="section-title mb-20">
                                <span class="sub-title">{{$home_text->skills_title ?? __('Skills')}}</span>
                                <h2>{{$home_text->skills_subtitle ?? __('Technical Skills')}}</h2>
                            </div>
                            <p>{!! nl2br($home_text->skills_content ?? "") !!}</p>
                            <ul class="skill-list">
                                @foreach($skills as $skill)
                                    <li class="single-skill">
                                        <h5>{{$skill->title}} <span>{{$skill->percentage}}%</span></h5>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: {{$skill->percentage}}%; background-color: #{{$skill->color}}"></div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="skills-img-box">
                            @isset($home_text->skills_image)
                                <img data-src="{{asset('assets/front/img/user/home_settings/'.$home_text->skills_image)}}" class="lazy" alt="Image">
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
    </div><!--====== End Main Wrapper ======-->
@endsection