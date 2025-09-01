
@php
    $app_local  = get_default_language_code();
    $default    = App\Constants\LanguageConst::NOT_REMOVABLE;
    $slug       = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::ABOUT_US_SECTION);
    $data       = App\Models\Admin\SiteSections::getData($slug)->first();

    $statisticsConst = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::STATISTICTS_SECTION);
    $statistics = App\Models\Admin\SiteSections::getData($statisticsConst)->first();

@endphp

<section class="about-section ptb-80">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10"> 
                <div class="about-content-wrapper">
                    <div class="ui-title-logo">{{ $basic_settings->site_title }}</div>
                    <h2 class="title">{{ $data->value->language->$app_local->heading ?? $data->value->language->$default->heading }}</h2>
                    <p>{{ $data->value->language->$app_local->sub_heading ?? $data->value->language->$default->sub_heading }}</p>
                    <div class="about-post-meta">
                        <span class="left"><a href="" class="about-btn">{{ $data->value->language->$app_local->description ?? $data->value->language->$default->description }}</a></span>
                        <span class="right"><i class="las la-phone-volume"></i> {{__("Call Us Today")}} <a href="{{ $data->value->language->$app_local->phone ?? $data->value->language->$default->phone }}">{{ $data->value->language->$app_local->phone ?? $data->value->language->$default->phone }}</a></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="about-item-wrapper">
            <div class="row justify-content-center mb-30-none">
                @foreach ($data->value->items ?? [] as $item)
                   @if(isset($item->status) && $item->status == 1)
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                        <div class="about-item">
                            <div class="about-icon">
                                <i class="{{ $item->icon }}"></i>
                            </div>
                            <div class="about-content">
                                <h5 class="title">
                                    {{ $item->language->$app_local->title ?? $item->language->$default->title }}
                                </h5>
                                <p>
                                    {{ $item->language->$app_local->description ?? $item->language->$default->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
        
        </div>
    </div>
</section>

