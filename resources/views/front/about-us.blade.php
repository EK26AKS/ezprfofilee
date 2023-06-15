@extends('front.layout')

@section('meta-description', !empty($seo) ? $seo->contact_meta_description : '')
@section('meta-keywords', !empty($seo) ? $seo->contact_meta_keywords : '')

@section('pagename')
- {{__('About Us')}}
@endsection
@section('breadcrumb-title')
{{__('About Us')}}
@endsection
@section('breadcrumb-link')
    {{__('About Us')}}
@endsection

@section('content')

    <!--====== Start contacts-section ======-->
    <section class="contacts-section pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>
                    At EKTASI Technology, we’re proud to offer a range of products and services that are labeled EZ, which stands for “easy”. This reflects our commitment to making our customer’s lives easier by providing technology solutions that are simple to use, cost-effective, and aligned with their business goals. Our focus on customer satisfaction and delivering exceptional value has helped us establish ourselves as a leading provider of technology consulting services in India, and we’re excited to continue growing and evolving alongside our clients.
                    </p>
               
                </div>
            </div>
        </div>
    </section><!--====== End contacts-section ======-->
@endsection
