@extends('user.profile1.theme14.layout')

@section('tab-title')
    {{ $keywords['Contact'] ?? 'Contact' }}
@endsection
​
@section('meta-description', !empty($userSeo) ? $userSeo->blogs_meta_description : '')
@section('meta-keywords', !empty($userSeo) ? $userSeo->blogs_meta_keywords : '')
​

@section('br-title')
{{$keywords["CONTACT"] ?? "CONTACT"}}
@endsection
@section('br-link')
{{$keywords["CONTACT"] ?? "CONTACT"}}
@endsection
@section('content')

<!--================Contact Area =================-->
{{-- @if (is_array($userPermissions) && in_array('Contact', $userPermissions))
    <section class="contact_area p_120">
        <div class="margin footer-div" style="text-align: center;line-height:1">
            <h4>{{ $home_text->contact_title ?? __('Get in touch') }} </h4>
            <p class="footer-head">{{ $home_text->contact_subtitle ?? __('Get in touch') }}</p>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <form class="row contact_form" action="{{ route('front.contact.message', [getParam()]) }}"
                        enctype="multipart/form-data" method="post" id="contactForm" novalidate="novalidate">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <input type="text" class="form-control"
                                    placeholder="{{ $keywords['Name'] ?? 'Name' }}" name="fullname">
                                @if ($errors->has('fullname'))
                                    <p class="text-danger mb-0">{{ $errors->first('fullname') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <input class="form-control" type="email"
                                    placeholder="{{ $keywords['Email_Address'] ?? 'Email Address' }}" name="email"
                                    required>
                                @if ($errors->has('email'))
                                    <p class="text-danger mb-0">{{ $errors->first('email') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <input type="text" class="form-control"
                                    placeholder="{{ $keywords['Subject'] ?? 'Subject' }}" name="subject" required>
                                @if ($errors->has('subject'))
                                    <p class="text-danger mb-0">{{ $errors->first('subject') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <textarea class="form-control" placeholder="{{ $keywords['Message'] ?? 'Message' }}" name="message" rows="1"
                                    required></textarea>
                                @if ($errors->has('message'))
                                    <p class="text-danger mb-0">{{ $errors->first('message') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="submit" value="submit" class="btn submit_btn">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endif --}}

@if (is_array($userPermissions) && in_array('Contact', $userPermissions))
<section class="contact_area pt-5" id="contact">
    <div class="contact">
        <div class="contact-box">
            {{-- <div id="section-header">
                <span>contact</span>
                <div class="header-img d-flex justify-content-center">
                    <h2 class="exp-header">Contact</h2>
                    <img src="{{ asset('images/Rectangle-experiance.svg') }}" class="bar-image" alt="">
                </div>
            </div> --}}
            <div class="margin footer-div" style="text-align: center;line-height:1">
                <h4>{{ $home_text->contact_title ?? __('Get in touch') }}
                </h4>
                <p class="footer-head">{{ $home_text->contact_subtitle ?? __('Get in touch') }} </p>
            </div>

            <div class="container">
                <div class="contact-form p-3">
                    <form  action="{{ route('front.contact.message', [getParam()]) }}" enctype="multipart/form-data" method="post" class="contact">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="" placeholder="{{ $keywords['Name'] ?? 'Name' }}" name="fullname">
                                    @if ($errors->has('fullname'))
                                        <p class="text-danger mb-0">{{ $errors->first('fullname') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="email" class="form-control" id="" placeholder="{{ $keywords['Email_Address'] ?? 'Email Address' }}" name="email" required>
                                    @if ($errors->has('email'))
                                        <p class="text-danger mb-0">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="row mb-4">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="" placeholder="{{ $keywords['Subject'] ?? 'Subject' }}" name="subject" required>
                                    @if ($errors->has('subject'))
                                        <p class="text-danger mb-0">{{ $errors->first('subject') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <textarea type="text" class="form-control" placeholder="{{ $keywords['Message'] ?? 'Message' }}" name="message"  rows="10" required></textarea>
                                    @if ($errors->has('message'))
                                        <p class="text-danger mb-0">{{ $errors->first('message') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="mb-4 contact-btn">
                            <input type="button" class="main_btn" value="Send Message">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!--================Contact Area =================-->

@endsection
