<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Blog
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
@php
    $app_local  = get_default_language_code();
    $default    = App\Constants\LanguageConst::NOT_REMOVABLE;
    $slug       = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::ANNOUNCEMENT_SECTION);
    $data       = App\Models\Admin\SiteSections::getData($slug)->first();

    $announceData = App\Models\Frontend\Announcement::where('status', 1)->get();
@endphp

<section class="blog-section ptb-80">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12">
                <div class="section-header">
                    <div class="ui-title-logo">{{ $basic_settings->site_title }}</div>
                    <h2 class="section-title"> {{  $data->value->language->$app_local->heading ??  $data->value->language->$default->heading}}</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mb-30-none">
            @foreach($announceData as $announce)
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-30">
                <div class="blog-item">
                    <div class="blog-date">
                        <span class="date">{{ $announce->created_at->format('M d, Y') }} {{ __("by")}} <span>{{ $basic_settings->site_title }}</span></span>
                    </div>
                    <div class="blog-thumb">
                        <img src="{{  get_image($announce->data->image ?? '' ,'site-section') }}" alt="blog">
                    </div>
                    <div class="blog-content">
                        <h4 class="title"><a href="{{ route('frontend.web.journal.show', $announce->slug) }}">{{ $announce->data->language->$app_local->title ?? $announce->data->language->$default->title }}</a></h4>
                        <p>
                            {{ \Illuminate\Support\Str::limit(strip_tags($announce->data->language->$app_local->description ?? $announce->data->language->$default->description), 150, '...') }}

                        </p>

                    </div>
                </div>
            </div>
          @endforeach
            
        </div>
    </div>
</section>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Blog
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->