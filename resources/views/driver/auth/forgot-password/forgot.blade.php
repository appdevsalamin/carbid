
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
                    <h3 class="title">{{ __("Password Forgot") }}</h3>
                    <p>{{ __("Enter your account email or username to verify") }}</p>
                    <form action="{{ setRoute('driver.password.forgot.send.code') }}" class="account-form" method="POST">
                        @csrf
                        <div class="row ml-b-20">
                            <div class="col-lg-12 form-group">
                                @include('admin.components.form.input',[
                                    'name'          => "credentials",
                                    'placeholder'   => __("Username OR Email Address"),
                                    'required'      => true,
                                ])
                            </div>
                           
                            <div class="col-lg-12 form-group text-center">
                                <button type="submit" class="btn--base w-100">{{ __("Send Code") }}</button>
                            </div>
                             <div class="account-item text-center">
                                <label>Back To <a href="{{ setRoute('driver.login') }}" class="account-control-btn">{{ __("Login") }}</a></label>
                            </div>
                            <div class="col-lg-12 text-center">
                                <div class="terms-item">
                                    <label>{{__("By clicking Login you are agreeing with our")}} <a href="{{ setRoute('frontend.useful.links', 'privacy-policy') }}">{{__("Terms of Service")}}</a></label>
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