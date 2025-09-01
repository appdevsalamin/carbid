@php
    $app_local              = get_default_language_code();
    $default                = App\Constants\LanguageConst::NOT_REMOVABLE;
    $statisticsConst = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::STATISTICTS_SECTION);
    $statistics = App\Models\Admin\SiteSections::getData($statisticsConst)->first();
@endphp

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Statistics
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<section class="statistics-section ptb-120 bg_img" data-background=" {{ get_image($statistics->value->background_image ?? '' ,'site-section') }} ">
    <div class="statistics-shape"></div>
    <div class="container">
        <div class="row justify-content-center align-items-center mb-30-none">
            <div class="col-xl-4 col-lg-4 mb-30">
                <div class="statistics-thumb">
                    <img src="{{ get_image($statistics->value->image ?? '' ,'site-section') }} " alt="element">
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 mb-30">
                <div class="statistics-wrapper">
                    <div class="row justify-content-center mb-60-none">
                          @foreach ($statistics->value->items ?? []  as $item)
                             @if(isset($item->status) && $item->status == 1)
                            <div class="col-xl-6 col-lg-6 col-md-6 mb-60">
                                <div class="statistics-item">
                                    <div class="statistics-content">
                                        <div class="odo-area">
                                            <h3 class="odo-title odometer" data-odometer-final="{{ $item->language->$app_local->description ?? $item->language->$default->description }}">{{ $item->language->$app_local->description ?? $item->language->$default->description ?? '' }}</h3>
                                        </div>
                                        <p>{{ $item->language->$app_local->title ?? $item->language->$default->title ?? '' }}</p>
                                    </div>
                                </div>
                            </div>
                            @endif
                         @endforeach
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 mb-30">
                <div class="statistics-thumb">
                    <img src="{{ get_image($statistics->value->image1 ?? '' ,'site-section') }} " alt="element">
                </div>
            </div>
        </div>
    </div>
</section>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Statistics
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
