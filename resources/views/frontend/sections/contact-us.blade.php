

@php
    $app_local              = get_default_language_code();
    $default                = App\Constants\LanguageConst::NOT_REMOVABLE;
    $slug                   = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::CONTACT_US_SECTION);
    $contactUs              = App\Models\Admin\SiteSections::getData($slug)->first();
    
@endphp

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Contact widget
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<section class="contact-widget-section ptb-80">
    <div class="container">
        <div class="row justify-content-center mb-30-none">
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-30">
                <div class="contact-widget-item">
                    <div class="contact-widget-icon">
                        <i class="las la-map-marked-alt"></i>
                    </div>
                    <div class="contact-widget-content">
                        <h4 class="title">{{ __("Office Address") }}</h4>
                        <p>{{ $contactUs->value->language->$app_local->address ?? $contactUs->value->language->$default->address }}</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-30">
                <div class="contact-widget-item">
                    <div class="contact-widget-icon">
                        <i class="las la-phone-volume"></i>
                    </div>
                    <div class="contact-widget-content">
                        <h4 class="title">{{ __("Call Us") }}</h4>
                        <p>{{ $contactUs->value->language->$app_local->phone ?? $contactUs->value->language->$default->phone }}</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-30">
                <div class="contact-widget-item">
                    <div class="contact-widget-icon">
                        <i class="las la-envelope-open-text"></i>
                    </div>
                    <div class="contact-widget-content">
                        <h4 class="title">{{ __("Email Us") }}</h4>
                        <p>{{ $contactUs->value->language->$app_local->email ?? $contactUs->value->language->$default->email }}</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-30">
                <div class="contact-widget-item">
                    <div class="contact-widget-icon">
                        <i class="las la-stopwatch"></i>
                    </div>
                    <div class="contact-widget-content">
                        <h4 class="title">{{__("Open Time")}}</h4>
                          {{ $contactUs->value->language->$app_local->schedule ?? $contactUs->value->language->$default->schedule }}
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Contact widget
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Map
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div class="map-wrapper">
    <div class="map-area">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3070.1899657893728!2d90.42380431666383!3d23.779746865573756!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7499f257eab%3A0xe6b4b9eacea70f4a!2sManama+Tower!5e0!3m2!1sen!2sbd!4v1561542597668!5m2!1sen!2sbd" style="border:0" allowfullscreen></iframe>
    </div>
</div>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Map
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Contact
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div class="contact-section ptb-80">
    <div class="container">
        <div class="contact-wrapper">
            <div class="row justify-content-center align-items-center">
                <div class="col-xl-6 col-lg-6 mb-30">
                    <div class="contact-thumb">
                        <img src=" {{ get_image($contactUs->value->image ?? '' ,'site-section') }} " alt="element">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 mb-30">
                    <div class="contact-form-area">
                        <div class="contact-header">
                           
                            <h3 class="title"> {{ $contactUs->value->language->$app_local->heading ?? $contactUs->value->language->$default->heading }}</h3>
                            <p>{{ $contactUs->value->language->$app_local->sub_heading ?? $contactUs->value->language->$default->sub_heading }}</p>
                        </div>
                        <form class="contact-form" action="{{ route('frontend.contact.message.send') }}" method="POST">
                            @csrf
                            <div class="row justify-content-center mb-30-none">
                                <div class="col-xl-6 col-lg-6 col-md-12 form-group">
                                    <label>{{__("Name")}}<span>*</span></label>
                                    <input type="text" name="name" class="form--control" placeholder="{{__('Enter Name')}}...">
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 form-group">
                                    <label>{{__("Email")}}<span>*</span></label>
                                    <input type="email" name="email" class="form--control" placeholder="{{__('Enter Email')}}...">
                                </div>
                                <div class="col-xl-12 col-lg-12 form-group">
                                    <label>{{__("Phone")}}<span>*</span></label>
                                    <input type="text" name="phone" class="form--control" placeholder="{{__('Enter Phone')}}...">
                                </div>
                                <div class="col-xl-12 col-lg-12 form-group">
                                    <label>{{__("Message")}}<span>*</span></label>
                                    <textarea class="form--control" name="message" placeholder="{{__('Write Here')}}..."></textarea>
                                </div>
                                <div class="col-lg-12 form-group">
                                    <button type="submit" class="btn--base mt-10">{{__("Send Message")}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Contact
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->