
@php
    $app_local  = get_default_language_code();
    $default    = App\Constants\LanguageConst::NOT_REMOVABLE;
    $slug       = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::FOOTER_SECTION);
    $data       = App\Models\Admin\SiteSections::getData($slug)->first();
    
    $service = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::SERVICES_SECTION);
    $serviceSection = App\Models\Admin\SiteSections::getData($service)->first();;

    $pages = App\Models\Admin\SetupPage::where('status', 1)->get();


    $useful_link = App\Models\Admin\UsefulLink::all();
@endphp   

 
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Call To Action
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<section class="call-to-action-section bg--base ptb-60">
    <div class="container">
        <div class="call-to-action-wrapper">
            <div class="call-to-action-content">
                <h2 class="title">{{ $serviceSection->value->language->$app_local->heading ?? $serviceSection->value->language->$default->heading }}</h2>
                <p>{{$serviceSection->value->language->$app_local->sub_heading ?? $serviceSection->value->language->$default->sub_heading }}</p>
            </div>
            <div class="call-to-action-contact">
                <div class="call-to-action-contact-icon">
                    <i class="las la-phone-volume"></i>
                </div>
                <div class="call-to-action-contact-content">
                    <h5 class="title">{{  $serviceSection->value->language->$app_local->description ?? $serviceSection->value->language->$default->description  }}</h5>
                </div>
            </div>
        </div>
    </div>
</section>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Call To Action
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Footer
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

<footer class="footer-section pt-120 pb-20 bg_img" data-background="{{ get_image($data->value->background_image ?? '' ,'site-section') }}">
    <div class="footer-element" data-aos="fade-right" data-aos-duration="2000">
        <img src="{{ get_image($serviceSection->value->image ?? '' ,'site-section') }}" alt="element">
    </div>
    <div class="footer-shape"></div>
    <div class="container">
        <div class="footer-top-area">
            <div class="footer-widget-wrapper">
                <div class="footer-widget main">
                    <div class="footer-logo">
                        <a class="site-logo site-title" href="{{ setRoute('frontend.index') }}"><img src="{{ get_logo($basic_settings) }}" alt="site-logo"></a>
                    </div>
                    <p>{{ $data->value->contact->language->$app_local->contact_desc ?? $data->value->contact->language->$default->contact_desc }}</p>
                    <form action="{{ setRoute('frontend.subscribe') }}" method="POST" class="subscribe-form">
                        @csrf  
                        <div class="form-group">
                            <label class="subscribe-icon"><i class="fa fa-envelope"></i></label>
                            <input type="email" name="email" class="form--control" placeholder="Your Email Address...">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn--base w-100">{{__("Subscribe")}}</button>
                        </div>
                    </form>
                </div>
                  <div class="footer-widget">
                    <h4 class="widget-title">{{__("About AdRent")}}</h4>
                    <ul class="footer-list">
                         @foreach($pages as $page)
                            @php
                                $isHome = $page->slug === 'home';
                                $url = $isHome ? url('/') : url($page->slug);
                                $active = $isHome 
                                    ? (request()->is('/') ? 'active' : '') 
                                    : (request()->is($page->slug) ? 'active' : '');
                            @endphp
                                <li>
                                    <a href="{{ $url }}" class="{{ $active }}">
                                        {{ __($page->title) }}
                                    </a>
                                </li>
                            @endforeach
                    </ul>
                </div>
                 <div class="footer-widget">
                    <h4 class="widget-title">{{__("Usefull Links")}}</h4>
                    <ul class="footer-list two">
                      
                        @foreach($useful_link ?? [] as $item)
                                @if(isset($item->status) && $item->status != 0)
                                <li> <a href="{{ setRoute('frontend.useful.links', $item->slug) }}">{{ __($item->title->language->$app_local->title ?? '')}}</a></li>
                                @endif
                        @endforeach
                    </ul>
                </div>
                <div class="footer-widget">
                    <h4 class="widget-title">{{__("Get In Touch")}}</h4>
                    <ul class="footer-list">
                        <li><i class="las la-map-marker-alt me-1"></i> {{ $data->value->contact->address ?? ''  }}</li>
                        <li><i class="las la-envelope me-1"></i> {{ $data->value->contact->email ?? '' }}</li>
                        <li><i class="las la-phone me-1"></i> {{__("Phone")}}: <span>{{ $data->value->contact->phone ?? ''}}</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-bottom-area">
            <div class="copyright-area">

                <p>{{__("Copyright")}} © {{ date('Y') }}. <a href="{{ setRoute('frontend.index') }}">{{ $basic_settings->site_title }}</a> – {{ $basic_settings->site_name }} by <a href="https://appdevs.net" target="_blank">{{__("AppDevs")}}</a>.</p>
            </div>
            <div class="social-area">
                <ul class="footer-social">
                    @foreach ($data->value->contact->social_links ?? [] as $item)
                            <li><a href="{{ $item->link ?? '' }}"><i class="{{ $item->icon ?? '' }}"></i></a></li>

                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</footer>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Footer
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

<script>
// only for banner smooth
document.addEventListener('DOMContentLoaded', function() {
  AOS.init({ once: true });
});
</script>