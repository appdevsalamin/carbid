
@extends('layouts.master')
@php 
    $app_local  = get_default_language_code();
    $default    = App\Constants\LanguageConst::NOT_REMOVABLE;
    $slug       = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::LOGIN_SECTION);
    $data       = App\Models\Admin\SiteSections::getData($slug)->first();

@endphp 

@push('css')

@endpush

@section('content')
      
<section class="account-section ptb-80" >
        <div class="account-area">
           <div class="account-header text-center">
                 <img src="{{  get_image($data->value->image ?? '' ,'site-section') }}" alt="blog">
            </div>
                
                <div class="account-form-area">
                    <h3 class="title">{{   $data->value->language->$app_local->heading ??  $data->value->language->$default->heading }} </h3>
                    <p>{{ $data->value->language->$app_local->sub_heading ??  $data->value->language->$default->sub_heading }}</p>
                    <form action="{{ setRoute('driver.login.submit') }}" class="account-form" method="POST">
                        @csrf
                        <div class="row ml-b-20">
                            <div class="col-lg-12 form-group">
                                @include('admin.components.form.input',[
                                    'name'          => "credentials",
                                    'placeholder'   => __("Username OR Email Address"),
                                    'required'      => true,
                                ])
                            </div>
                             <div class="col-lg-12 form-group show_hide_password">
                                <input type="password" class="form-control form--control" name="password" placeholder="{{__('Password')}}" required>
                                <a href="javascript:void(0)" class="show-pass"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                            </div>
                            <div class="col-lg-12 form-group">
                                <div class="forgot-item text-end">
                                    <label><a href="{{ setRoute('driver.password.forgot') }}" class="text--base">{{ __("Forgot Password?") }}</a></label>
                                </div>
                            </div>
                            <div class="col-lg-12 form-group text-center">
                                <button type="submit" class="btn--base w-100">{{ __("Login Now") }}</button>
                            </div>
                            <div class="or-area">
                                <span class="or-line"></span>
                                <span class="or-title">{{ __("Or") }}</span>
                                <span class="or-line"></span>
                            </div>
                            <div class="col-lg-12 text-center">
                               <div class="col-lg-12 text-center">
                                    <div class="account-item mt-10">
                                        <label>
                                            {{ __("Don't Have An Account?") }} 
                                                <a href="{{ setRoute('driver.register') }}" class="text--base">{{ __("Register Now") }}</a>
                                        </label>
                                    </div>
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
   
</script>
@endpush