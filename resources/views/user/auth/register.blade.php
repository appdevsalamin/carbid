@extends('layouts.master')
@php 
    $app_local  = get_default_language_code();
    $default    = App\Constants\LanguageConst::NOT_REMOVABLE;
    $slug       = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::REGISTRATION_SECTION);
    $data       = App\Models\Admin\SiteSections::getData($slug)->first();
@endphp 

@push('css')
    <style> 
      .account-area{
        width: 929px;
      }
    </style>
@endpush
 
@section('content')

 <section class="account-section ptb-80">
        <div class="account-area">
           <div class="account-thumb">
                <img src="{{  get_image($data->value->image ?? '' ,'site-section') }}" alt="blog">
            </div>
                <div class="account-form-area">
                    <h3 class="title">{{   $data->value->language->$app_local->heading ??  $data->value->language->$default->heading }} </h3>
                    <p>{{ $data->value->language->$app_local->sub_heading ??  $data->value->language->$default->sub_heading }}</p>
                    <form action="{{ setRoute('user.register.submit') }}" class="account-form" method="POST">
                        @csrf
                        <div class="row ml-b-20">
                            <div class="col-lg-6 form-group">
                                @include('admin.components.form.input',[
                                    'name'          => "firstname",
                                    'placeholder'   => __("First Name"),
                                    'value'         => old("firstname"),
                                     'required'      => true,
                                ])
                            </div>
                            <div class="col-lg-6 form-group">
                                @include('admin.components.form.input',[
                                    'name'          => "lastname",
                                    'placeholder'   => __("Last Name"),
                                    'value'         => old("lastname"),
                                     'required'      => true,
                                ])
                            </div>
                           
                            <div class="col-lg-12 form-group">
                                @include('admin.components.form.input',[
                                    'type'          => "email",
                                    'name'          => "email",
                                    'placeholder'   => __("Email"),
                                    'value'         => old("email"),
                                     'required'      => true,
                                ])
                            </div>
                             <div class="col-lg-12 form-group show_hide_password">
                                <input type="password" class="form--control" name="password" placeholder="{{ __('Password')}}" required>
                                <a href="javascript:void(0)" class="show-pass"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                            </div>
                          @if ($basic_settings->agree_policy)
                            <div class="col-lg-12 form-group">
                                <div class="custom-check-group">
                                    <input type="checkbox" id="level-1" name="agree">
                                    <label for="level-1" >{{ __("I have read agreed with the") }} 
                                         <a href="{{ setRoute('frontend.useful.links', 'privacy-policy') }}" class="text--base">
                                                {{ __("Terms Of Use , Privacy Policy & Warning") }}
                                        </a>
                                    </label>
                                </div>
                            </div>
                            @endif
                            <div class="col-lg-12 form-group text-center">
                                <button type="submit" class="btn--base w-100">{{ __("Register Now") }}</button>
                            </div>
                            <div class="col-lg-12 text-center">
                                <div class="account-item mt-10">
                                    <label>{{ __("Already Have An Account?") }} <a href="{{ setRoute('user.login') }}" class="text--base">{{ _("Login Now") }}</a></label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </section>

@endsection

@push('script')
    <script>
        getAllCountries("{{ setRoute('global.countries') }}",$(".country-select"));
        $(document).ready(function(){
            $("select[name=country]").change(function(){
                var phoneCode = $("select[name=country] :selected").attr("data-mobile-code");
                placePhoneCode(phoneCode);
            });

            setTimeout(() => {
                var phoneCodeOnload = $("select[name=country] :selected").attr("data-mobile-code");
                placePhoneCode(phoneCodeOnload);
            }, 400);
        });
    </script>

@endpush