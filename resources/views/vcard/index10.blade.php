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
    .admin-box-six:after {
        background: url({{!empty($vcard->cover_image) ? asset('assets/front/img/user/vcard/' . $vcard->cover_image) : asset('assets/front/img/user/vcard/vcard_cover.jpg')}});
    }
</style>
@endsection

@section('content')
    <!--====== Start Page Wrapper ======-->
    <div class="page-wrapper">
        <div class="container">
            <!--====== Page Area Start ======-->
            <div class="page-area page-area-six">
                <!--====== Start Admin Box  ======-->
                <div class="admin-box-six">
                    <div class="admin-info-box text-center">
                        <div class="user-thumb">
                            <img class="lazy" data-src="{{!empty($vcard->profile_image) ? asset('assets/front/img/user/vcard/' . $vcard->profile_image) : asset('assets/front/img/user/blank_propic.png')}}" alt="user thumb">
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

                            @if (!empty($vcard->phone) && (is_array($prefs) && in_array('Add to Contact', $prefs)))
                            <a href="{{route('front.user.vcardImport', [getParam(), $vcard->id])}}" class="user-btn"><i class="fas fa-plus"></i>{{$keywords["Add_to_Contact"] ?? "Add to Contact"}}</a>
                            @endif

                            <div class="user-social">
                                <ul>
                                    @if (!empty($vcard->phone) && (is_array($prefs) && in_array('Call', $prefs)))
                                    <li><a href="tel:{{$vcard->country_code}}{{$vcard->phone}}"><i class="fas fa-phone"></i></a></li>
                                    @endif
                                    @if (!empty($vcard->phone) && (is_array($prefs) && in_array('Whatsapp', $prefs)))
                                    <li><a href="https://wa.me/{{$vcard->country_code}}{{$vcard->phone}}?text=Hello"><i class="fab fa-whatsapp"></i></a></li>
                                    @endif
                                    @if (!empty($vcard->email) && (is_array($prefs) && in_array('Mail', $prefs)))
                                    <li><a href="mailto:{{$vcard->email}}"><i class="fas fa-envelope"></i></a></li>
                                    @endif
                                     @foreach ($infos as $info)
                                    @if ($info['link'] == 1)
                                        <li><a href="{{$info['value']}}"><i class="{{$info['icon']}}"></i></a></li>
                                        @endif
                                    @endforeach
                                    @if (is_array($prefs) && in_array('Share vCard', $prefs))
                                    <li><a href="#" data-toggle="modal" data-target="#socialMediaModal" class="share-btn"><i class="fas fa-share-alt"></i></a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div><!--====== End Admin Box  ======-->

                @if (is_array($prefs) && in_array('Information', $prefs))
                <!--====== Start Contact-information  ======-->
                <div class="contact-info-six">
                    @if (!empty($vcard->address))
                    <div class="info-box d-flex">
                        <div class="icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="text">
                            <h3>{{$keywords["Address"] ?? "Address"}}</h3>
                            <p>{{$vcard->address}}</p>
                        </div>
                    </div>
                    @endif
                    @if (!empty($vcard->website_url))
                    <div class="info-box d-flex">
                        <div class="icon">
                            <i class="fas fa-link"></i>
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