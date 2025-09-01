@php
    $app_local              = get_default_language_code();
    $default                = App\Constants\LanguageConst::NOT_REMOVABLE;

    $whyChooseConst = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::WHY_CHOOSE_SECTION);
    $whyChoose = App\Models\Admin\SiteSections::getData($whyChooseConst)->first();
@endphp

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Choose us
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<section class="choose-us-section ptb-80">
    <div class="container">
        <div class="row justify-content-center align-items-center mb-30-none">
            <div class="col-xl-6 col-lg-6 mb-30">
                <div class="choose-us-left-content-wrapper">
                    <div class="section-header">
                        <div class="ui-title-logo">{{ $basic_settings->site_title }}</div>
                        <h2 class="section-title">{{$whyChoose->value->language->$app_local->heading ?? $whyChoose->value->language->$default->heading}}</h2>
                    </div>
                    <p>{{$whyChoose->value->language->$app_local->description ?? $whyChoose->value->language->$default->description}}.</p>

                    <div class="bottom-inner-content">
                        <!-- <h3 class="title">Book your Car Easily By Us</h3>
                        <p>If you are one of our business partners, make sure to also check out our Privacy Statement for Business Partners to understand how personal data is further processed as part of the business relationship.</p> -->
                        <div class="call-us-wrapper">
                            <span><i class="las la-phone-volume"></i> {{ __("Call Us For Booking")}}</span>
                            <span class="right">{{$whyChoose->value->language->$app_local->phone ?? $whyChoose->value->language->$default->phone}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 mb-30">
                <div class="choose-us-item-wrapper">
                    <div class="row justify-content-center mb-30-none">
                     @foreach ($whyChoose->value->items as $item)
                         @if(isset($item->status) && $item->status == 1)
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mb-30">
                            <div class="choose-us-item mt-20 active">
                                <div class="choose-us-icon">
                                  <i class="{{ $item->icon }}"></i>
                                </div>
                                <div class="choose-us-content">
                                    <h5 class="title"> {{ $item->language->$app_local->title ?? $item->language->$default->title }}</h5>
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
</section>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Choose us
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->