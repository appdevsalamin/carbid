  
@php
    $app_local              = get_default_language_code();
    $default                = App\Constants\LanguageConst::NOT_REMOVABLE;
    $slug                   = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::BANNER_SECTION);

    $howItWorksConst = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::HOW_IT_WORK_SECTION);
    $howItWorks = App\Models\Admin\SiteSections::getData($howItWorksConst)->first();

    $whyChooseConst = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::WHY_CHOOSE_SECTION);
    $whyChoose = App\Models\Admin\SiteSections::getData($whyChooseConst)->first();
@endphp

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start How it works
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<section class="how-it-works-section ptb-80">
    <div class="container custom-container">
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12">
                <div class="section-header">
                    <div class="ui-title-logo">{{ $basic_settings->site_title }}</div>
                    <h2 class="section-title">{{ $howItWorks->value->language->$app_local->heading ?? $howItWorks->value->language->$default->heading }}</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mb-30-none">
         @php $count = 1; @endphp
          @foreach ($howItWorks->value->items as $item)
             @if(isset($item->status) && $item->status == 1)
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-30">
                <div class="how-it-works-item">
                  
                    <span class="number">{{ str_pad($count, 2, '0', STR_PAD_LEFT) }}</span>
                    @php $count++; @endphp
                    <div class="how-it-works-content">
                        <h4 class="title">  {{ $item->language->$app_local->title ?? $item->language->$default->title }}</h4>
                        <p>  {{ $item->language->$app_local->description ?? $item->language->$default->description }}.</p>
                    </div>
                </div>
            </div>
             @endif
           @endforeach
        </div>
    </div>
</section>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End How it works
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->




