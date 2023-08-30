@extends('vcard.layout')

@if ($vcard->direction == 2)
    @section('rtl', 'dir=rtl')
@endif

@if ($vcard->direction == 2)
@section('rtl-css')
<link rel="stylesheet" href="{{asset('assets/front/css/profile/vcard/template5-10/rtl-style.css')}}">
@endsection
@endif

@section('base-color')
<link rel="stylesheet" href="{{asset('assets/front/css/profile/vcard/template5-10/vcard-base-color.php').'?color='.$vcard->base_color}}">
@endsection

@section('og-image', asset('assets/front/img/user/vcard/' . $vcard->cover_image))
@section('og-title')
    {{$vcard->name}} ({{$vcard->occupation}})
@endsection
@section('og-description')
    {{$vcard->introduction}}
@endsection
@section('styles')
<style>
    .admin-box-four:before {
        background: url({{!empty($vcard->cover_image) ? asset('assets/front/img/user/vcard/' . $vcard->cover_image) : asset('assets/front/img/user/vcard/vcard_cover.jpg')}});
    }
</style>
@endsection

@section('content')
    <!--====== Start Page Wrapper ======-->
    <div class="page-wrapper">
        <div class="container">
            <!--====== Page Area Start ======-->
            <div class="page-area page-area-four">
                <!--====== Start Admin-box  ======-->
                <div class="admin-box-four">
                    <div class="admin-info-box text-center">
                        <div class="user-thumb">
                            <img class="lazy" data-src="{{!empty($vcard->profile_image) ? asset('assets/front/img/user/vcard/' . $vcard->profile_image) : asset('assets/front/img/user/blank_propic.png')}}" alt="user thumb">
                            @if (is_array($prefs) && in_array('Share vCard', $prefs))
                            <a href="#" style="background: #{{$vcard->share_vcard_button_color}}" data-toggle="modal" data-target="#socialMediaModal" class="share-btn"><i class="fas fa-share-alt"></i></a>
                            @endif
                        </div>
                        <div class="user-info">
                            <div class="user-title">
                                <h3>{{$vcard->name}}</h3>
                                @if (!empty($vcard->occupation))
                                <p class="position">
                                    {{$vcard->occupation}}
                                    @if (!empty($vcard->company))
                                    ({{$vcard->company}})
                                    @endif
                                </p>
                                @endif
                            </div>
                            <p>{{$vcard->introduction}}</p>
                        </div>
                        @if (!empty($vcard->phone) && (is_array($prefs) && in_array('Add to Contact', $prefs)))
                        <a style="background: #{{$vcard->add_to_contact_button_color}}" href="{{route('front.user.vcardImport', [getParam(), $vcard->id])}}" class="user-btn"><i class="fas fa-plus"></i>{{$keywords["Add_to_Contact"] ?? "Add to Contact"}}</a>
                        @endif
                    </div>
                </div><!--====== End Admin-box  ======-->
                <!--====== Start User Social  ======-->
                <div class="user-social user-social-two text-center">
                    <ul>
                        @if (!empty($vcard->phone) && (is_array($prefs) && in_array('Call', $prefs)))
                        <li><a style="background: #{{$vcard->call_button_color}}42;color: #{{$vcard->call_button_color}}" href="tel:{{$vcard->country_code}}{{$vcard->phone}}"><i class="fas fa-phone"></i></a></li>
                        @endif
                        @if (!empty($vcard->phone) && (is_array($prefs) && in_array('Whatsapp', $prefs)))
                        <li><a style="background: #{{$vcard->whatsapp_button_color}}42;color: #{{$vcard->whatsapp_button_color}};" href="https://wa.me/{{$vcard->country_code}}{{$vcard->phone}}?text=Hello"><i class="fab fa-whatsapp"></i></a></li>
                        @endif
                        @if (!empty($vcard->email) && (is_array($prefs) && in_array('Mail', $prefs)))
                        <li><a style="background: #{{$vcard->mail_button_color}}42;color: #{{$vcard->mail_button_color}}" href="mailto:{{$vcard->email}}"><i class="fas fa-envelope"></i></a></li>
                        @endif
                         @foreach ($infos as $info)
                        @if ($info['link'] == 1)
                            <li><a style="background: #{{$info['color']}}" href="{{$info['value']}}"><i class="{{$info['icon']}}"></i></a></li>
                            @endif
                        @endforeach
                    </ul>
                </div><!--====== End User Social  ======-->

                @if (is_array($prefs) && in_array('Information', $prefs))
                <!--====== Start Contact-information  ======-->
                <div class="contact-info-four">
                    @if (!empty($vcard->address))
                    <div class="info-box d-flex" style="background-color: #{{$vcard->address_icon_color}}1A">
                        <div class="icon">
                            <i class="fas fa-map-marker-alt" style="color: #{{$vcard->address_icon_color}}"></i>
                        </div>
                        <div class="text">
                            <h3>{{$keywords["Address"] ?? "Address"}}</h3>
                            <p>{{$vcard->address}}</p>
                        </div>
                    </div>
                    @endif
                    @if (!empty($vcard->website_url))
                    <div class="info-box d-flex" style="background-color: #{{$vcard->website_url_icon_color}}1A">
                        <div class="icon" >
                            <i class="fas fa-link" style="color: #{{$vcard->website_url_icon_color}}"></i>
                        </div>
                        <div class="text">
                            <h3>{{$keywords["Website_URL"] ?? "Website URL"}}</h3>
                            <p><a href="{{$vcard->website_url}}">{{$vcard->website_url}}</a></p>
                        </div>
                    </div>
                    @endif
                    
                </div><!--====== End Contact-information  ======-->
                @endif
            </div><!--====== Page Area End ======-->
        </div>
    </div><!--====== End Page Wrapper ======-->
@endsection