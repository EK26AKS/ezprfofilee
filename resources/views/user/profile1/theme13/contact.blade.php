@extends('user.profile1.theme13.layout')   

@section('tab-title')
{{ $keywords['Contact'] ?? 'Contact' }}
@endsection
​
@section('meta-description', !empty($userSeo) ? $userSeo->blogs_meta_description : '')
@section('meta-keywords', !empty($userSeo) ? $userSeo->blogs_meta_keywords : '')
​
@section('br-title')
{{$keywords["Contact Us"] ?? "Contact Us"}}
@endsection
@section('br-link')
{{$keywords["Contact Us"] ?? "Contact Us"}}
@endsection


@section('content')

<!--================Contact Area =================-->
@if (is_array($userPermissions) && in_array('Contact', $userPermissions))
<section class="contact_area p_120">    
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
@endif
<!--================Contact Area =================-->


<!--================Contact Success and Error message Area =================-->
<div id="success" class="modal modal-message fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-close"></i>
                </button>
                <h2>Thank you</h2>
                <p>Your message is successfully sent...</p>
            </div>
        </div>
    </div>
</div>

<!-- Modals error -->

<div id="error" class="modal modal-message fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-close"></i>
                </button>
                <h2>Sorry !</h2>
                <p> Something went wrong </p>
            </div>
        </div>
    </div>
</div>
<!--================End Contact Success and Error message Area =================-->

@endsection
