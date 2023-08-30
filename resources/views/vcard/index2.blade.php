@extends('vcard.layout')

@if ($vcard->direction == 2)
    @section('rtl', 'dir=rtl')
@endif

@if ($vcard->direction == 2)
@section('rtl-css')
<link rel="stylesheet" href="{{asset('assets/front/css/profile/vcard/template1234/vcard-rtl.css')}}">
@endsection
@endif

@section('base-color')
<link rel="stylesheet" href="{{asset('assets/front/css/profile/vcard/template1234/vcard-base-color.php').'?color='.$vcard->base_color}}">
@endsection

@section('og-image', asset('assets/front/img/user/vcard/' . $vcard->cover_image))
@section('og-title')
    {{$vcard->name}} ({{$vcard->occupation}})
@endsection
@section('og-description')
    {{$vcard->introduction}}
@endsection

@section('body', 'dark-body')

@section('content')
        <!--====== Start Page Wrapper ======-->
        <div class="page-wrapper">
            <div class="container p-0">
                <div class="page-content page-content-four">
                    <div class="page-banner bg_cover" style="background-image: url({{!empty($vcard->cover_image) ? asset('assets/front/img/user/vcard/' . $vcard->cover_image) : asset('assets/front/img/user/vcard/vcard_cover.jpg')}});"></div>
                    <div class="admin-wrapper">
                        <div class="admin-card text-center">
                            <div class="thumb">
                                <img src="{{!empty($vcard->profile_image) ? asset('assets/front/img/user/vcard/' . $vcard->profile_image) : asset('assets/front/img/user/blank_propic.png')}}" alt="Thumb">
                            </div>
                            <div class="content">
                                <div class="admin-title">
                                    <h5>{{$vcard->name}}</h5>
                                    @if (!empty($vcard->occupation))
                                    <span class="position">
                                        {{$vcard->occupation}}
                                        @if (!empty($vcard->company))
                                        ({{$vcard->company}})
                                        @endif
                                    </span>
                                    @endif
                                </div>
                                <p>{{$vcard->introduction}}</p>
                                <div class="actions">
                                    @if (!empty($vcard->phone) && (is_array($prefs) && in_array('Call', $prefs)))
                                    <div class="action-btn">
                                        <a class="call" href="tel:{{$vcard->country_code}}{{$vcard->phone}}" style="background: #{{$vcard->call_button_color}}"><i class="fas fa-mobile-alt"></i></a>
                                        <br>
                                        <span>{{$keywords["Call"] ?? "Call"}}</span>
                                    </div>
                                    @endif
                                    @if (!empty($vcard->phone) && (is_array($prefs) && in_array('Whatsapp', $prefs)))
                                    <div class="action-btn">
                                        <a href="https://wa.me/{{$vcard->country_code}}{{$vcard->phone}}?text=Hello" class="whatsapp" style="background: #{{$vcard->whatsapp_button_color}}"><i class="fab fa-whatsapp"></i></a>
                                        <br>
                                        <span>{{$keywords["Whatsapp"] ?? "Whatsapp"}}</span>
                                    </div>
                                    @endif
                                    @if (!empty($vcard->email) && (is_array($prefs) && in_array('Mail', $prefs)))
                                    <div class="action-btn">
                                        <a class="mail" href="mailto:{{$vcard->email}}" style="background: #{{$vcard->mail_button_color}}"><i class="far fa-envelope"></i></a>
                                        <br>
                                        <span>{{$keywords["Mail"] ?? "Mail"}}</span>
                                    </div>
                                    @endif
                                    @foreach ($infos as $info)
                                    @if ($info['link'] == 1)
                                    <div class="action-btn">
                                        <a class="icon icon-1" href="{{$info['value']}}" style="background: #{{$info['color']}}"><i class="{{$info['icon']}}"></i></a>
                                        <br>
                                        <span>{{$info['label']}}</span>
                                    </div>
                                    @endif
                                @endforeach
                                </div>
                                <div class="more-btns text-center mt-3">
                                    @if (!empty($vcard->phone) && (is_array($prefs) && in_array('Add to Contact', $prefs)))
                                    <a href="{{route('front.user.vcardImport', [getParam(), $vcard->id])}}" class="add-contact" style="background: #{{$vcard->add_to_contact_button_color}}"><i class="fas fa-plus"></i> {{$keywords["Add_to_Contact"] ?? "Add to Contact"}}</a>
                                    @endif
                                    @if (is_array($prefs) && in_array('Share vCard', $prefs))
                                    <a href="#" data-toggle="modal" data-target="#socialMediaModal" class="share" style="background: #{{$vcard->share_vcard_button_color}}"><i class="fas fa-share-square"></i> {{$keywords["Share_vCard"] ?? "Share vCard"}}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>


                    @if (is_array($prefs) && in_array('Information', $prefs))
                    <div class="page-info-widget">
                        @if (!empty($vcard->address))
                        <div class="info-widget d-flex align-items-center">
                            <a href="https://www.google.com/maps?q={{$vcard->address}}" class="icon icon-1" style="background: #{{$vcard->address_icon_color}}1a;">
                                <i class="fas fa-map-marker-alt" style="color: #{{$vcard->address_icon_color}};"></i>
                            </a>
                            <div class="content">
                                <span class="title">{{$keywords["Address"] ?? "Address"}}</span>
                                <h5><a href="https://www.google.com/maps?q={{$vcard->address}}">{{$vcard->address}}</a></h5>
                            </div>
                        </div>
                        @endif
                        @if (!empty($vcard->website_url))
                        <div class="info-widget d-flex align-items-center">
                            <a class="icon icon-1" href="{{$vcard->website_url}}" target="_blank" style="background: #{{$vcard->website_url_icon_color}}1a;">
                                <i class="fas fa-link" style="color: #{{$vcard->website_url_icon_color}};"></i>
                            </a>
                            <div class="content">
                                <span class="title">{{$keywords["Website_URL"] ?? "Website_URL"}}</span>
                                <h5><a href="{{$vcard->website_url}}" target="_blank">{{$vcard->website_url}}</a></h5>
                            </div>
                        </div>
                        @endif
                        
                    </div>
                    @endif
                </div>
            </div>
        </div><!--====== End Page Wrapper ======-->
@endsection
