@php 
    $app_local  = get_default_language_code();
    $default    = App\Constants\LanguageConst::NOT_REMOVABLE;
    $clientSiteConst = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::CLIENT_FEEDBACK_SECTION);
    $customer = App\Models\Admin\SiteSections::getData($clientSiteConst)->first();

@endphp 

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Testimonial
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<section class="testimonial-section bg-overlay-base ptb-120 bg_img" data-background="{{  get_image($customer->value->background_image ?? '' ,'site-section') }}">
    <div class="testimonial-shape"></div>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-xl-7 col-lg-10 col-md-12">
                <div class="testimonial-slider">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                          
                            @foreach($customer->value->items ?? [] as $testimonial)
                              @if(isset($testimonial->status) && $testimonial->status == 1)
                                <div class="swiper-slide">
                                    <div class="swiper-image" data-swiper-parallax-y="35%">
                                        <div class="swiper-image-inner">
                                            <div class="testimonial-item">
                                                
                                                <div class="testimonial-content">
                                                    <p>{{  $testimonial->language->$app_local->comment ?? $testimonial->language->$default->comment }}</p>
                                                    <div class="testimonial-user-wrapper">
                                                        <div class="testimonial-user-content">
                                                            <h5 class="title">{{ $testimonial->name  ?? ""}}</h5>
                                                            <span class="sub-title">{{ $testimonial->designation ?? "" }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Testimonial
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->