<!--====== Start Footer ======-->
<footer class="saas-footer ektasi-footer">
    @if ($bs->top_footer_section == 1)
    <div class="footer-widget pt-145 pb-60">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget about-widget">
                        <a href="{{route('front.index')}}" class="d-inline-block"><img src="{{asset('assets/front/img/' . $bs->footer_logo)}}" class="img-fluid" alt=""></a>
                        <p>{{$bs->footer_text}}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget useful-link-widget">
                        <h4 class="widget-title">Our Services</h4>

                        @php
                            $ulinks = App\Models\Ulink::where('language_id',$currentLang->id)->orderby('id','desc')->get();
                        @endphp
                        <ul class="widget-link">
                            <li><a href="https://ezprofile.in/">EZ Profile</a></li>
                            <li><a href="https://ezstore.in/">EZ Store</a></li>
                            <li><a href="https://ezsocial.in/">EZ Social</a></li>
                            <li><a href="#">EZ WordPress</a></li>
                            <li><a href="http://ez-genie.com/">EZ Genie</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget useful-link-widget">
                        <h4 class="widget-title">{{$bs->useful_links_title}}</h4>

                        @php
                            $ulinks = App\Models\Ulink::where('language_id',$currentLang->id)->orderby('id','desc')->get();
                        @endphp
                        <ul class="widget-link">
                            @foreach ($ulinks as $ulink)
                                <li><a href="{{$ulink->url}}">{{$ulink->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget newsletter-widget">
                        <h4 class="widget-title">{{$bs->newsletter_title}}</h4>
                        <p>{{$bs->newsletter_subtitle}}</p>
                        <form id="footerSubscriber" action="{{route('front.subscribe')}}" method="POST" class="subscribeForm">
                            @csrf
                            <div class="form_gorup">
                                <input type="email" class="form_control" placeholder="{{__('Enter Your Email')}}" name="email">
                                <button class="newsletter-btn" type="submit"><i class="fas fa-angle-right"></i></button>
                            </div>
                            <p id="erremail" class="text-danger mb-0 err-email"></p>
                        </form>
                        <ul class="social-link">
                            @foreach ($socials as $social)
                            <li><a href="{{$social->url}}" class="facebook"><i class="{{$social->icon}}"></i></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if ($bs->copyright_section == 1)   
    <div class="copyright-area">
        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="copyright-wrap d-flex ">
                    <div class="copyright-text text-center">
                        @if($bs->copyright_section ==1)
                            {{-- <p class="copyright summernote-content">{!! replaceBaseUrl($bs->copyright_text) !!}</p> --}}
                        @endif
                        © <?php echo date('Y'); ?> EKTASI Technology. All rights reserved.
                    </div>
                    <div class="legal-links">
                        <p class="copyright-right">
                            <a href="http://ez-genie.com/privacy-policy" target="_blank">Privacy Policy</a>
                            <span>|</span>
                        </p>
                        <p class="copyright-right">
                            <a href="http://ez-genie.com/privacy-policy" target="_blank">Terms & Conditions</a>
                            <span>|</span>
                        </p>
                        <p class="copyright-right">
                            <a href="http://ez-genie.com/privacy-policy" target="_blank">Refund Policy</a>
                        </p>
                    </div>
                </div>                
            </div>
        </div>
    </div>
    @endif
</footer><!--====== End Footer ======-->