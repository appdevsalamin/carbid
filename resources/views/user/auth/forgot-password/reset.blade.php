@extends('layouts.master')

@push('css')
    
@endpush

@section('content')
    <section class="account-section ptb-80">
        <div class="account-area">
            <div class="account-header text-center">
               <img src="{{ asset('public/frontend/images/login/car.webp') }}" alt="logo">
            </div>
                <div class="account-form-area">
                    <h3 class="title">{{ __("Reset Your Forgotten Password") }}</h3>
                    <p>{{ __("Take control of your account by resetting your password. Our password recovery page guides you through the necessary steps to securely reset your password.") }}</p>
                    <form action="{{ setRoute('user.password.reset',$token) }}" class="account-form" method="POST">
                        @csrf
                        <div class="row ml-b-20">
                             <div class="col-lg-12 form-group show_hide_password">
                                <input type="password" class="form--control" name="password" placeholder="{{ __('Enter New Password')}}" required >
                                <a href="javascript:void(0)" class="show-pass"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                            </div>
                           <div class="col-lg-12 form-group show_hide_password">
                                <input type="password" class="form--control" name="password_confirmation" placeholder="{{ __('Enter Confirm Password')}}" required >
                                <a href="javascript:void(0)" class="show-pass"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                            </div>
                            
                            <div class="col-lg-12 form-group text-center">
                                <button type="submit" class="btn--base w-100">{{ __("Reset") }}</button>
                            </div>
                            <div class="col-lg-12 text-center">
                            <div class="account-item">
                                <label>Back To <a href="{{ setRoute('user.login') }}" class="account-control-btn">{{ __("Login") }}</a></label>
                            </div>
                            <div class="col-lg-12 text-center">
                                <div class="terms-item">
                                    <label>{{__("By clicking Login you are agreeing with our")}} <a href="{{ setRoute('frontend.useful.links', 'privacy-policy') }}">{{__("Terms of Service")}}</a></label>
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
    
@endpush