
@php 
    $app_local              = get_default_language_code();
    $default                = App\Constants\LanguageConst::NOT_REMOVABLE;
    $slug                   = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::BANNER_SECTION);
    $banner                 = App\Models\Admin\SiteSections::getData($slug)->first();
@endphp
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Banner 
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<section class="booking-section ptb-80  bg_img" data-background="{{ get_image($banner->value->image ?? '' ,'site-section') }}">
    
    <div class="banner-element-one" data-aos="fade-right" data-aos-duration="3000">
        <img src="{{ get_image($banner->value->image1 ?? '' ,'site-section') }}" alt="banner1">
    </div>
    <div class="banner-element-two" data-aos="fade-left" data-aos-duration="3000">
        <img src="{{ get_image($banner->value->image2 ?? '' ,'site-section') }}" alt="banner2">
    </div>

    <div class="banner-content" data-aos="fade-right" data-aos-offset="500" data-aos-easing="ease-in-sine">
        <span class="sub-title">{{ $banner->value->language->$app_local->sub_heading ?? $banner->value->language->$default->sub_heading }}</span>
        <h1 class="title">{{ $banner->value->language->$app_local->heading ?? $banner->value->language->$default->heading }}</h1>
        <div class="banner-btn">
            <a href="https://appdevs.net/" class="custom-btn">{{ $banner->value->language->$app_local->button_name ?? $banner->value->language->$default->button_name }}</a>
        </div>
    </div>
</section>

<script>
// only for banner smooth
document.addEventListener('DOMContentLoaded', function() {
  AOS.init({ once: true });
});
</script>