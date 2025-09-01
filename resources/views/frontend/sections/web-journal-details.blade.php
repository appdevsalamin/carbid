@extends('frontend.layouts.master')

@push("css")

@endpush

@section('content')

@php
    $app_local  = get_default_language_code();
    $default    = App\Constants\LanguageConst::NOT_REMOVABLE;
    $slug       = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::ANNOUNCEMENT_SECTION);
    $data       = App\Models\Admin\SiteSections::getData($slug)->first();

    $announceData = App\Models\Frontend\Announcement::where('status', 1)->get();
@endphp

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Blog
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

<section class="blog-section blog-details-section pb-80">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="blog-item">
                    <div class="blog-thumb">
                        <img src="{{  get_image($announcement->data->image ?? '' ,'site-section') }}" alt="blog">
                    </div>
                    <div class="blog-content">
                        <div class="blog-date">
                            <span class="date">{{ $announcement->created_at->format('M d, Y') }} {{ __("by")}} <span>{{ $basic_settings->site_title }}</span></span>
                        </div>
                        <h3 class="title">{{ $announcement->data->language->$app_local->title ?? $announcement->data->language->$default->title }}</h3>
                        <p>
                             {!! $announcement->data->language->$app_local->description ?? $announce->data->language->$default->description !!}
                        </p>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
