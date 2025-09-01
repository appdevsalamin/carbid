@extends('layouts.master')

@push('css')
    
@endpush

@section('content')
    <section class="account-section ptb-80">
        <div class="account-area">
            <div class="account-header text-center">
                <a class="" href="{{ setroute('frontend.index') }}"><img src="{{ asset('public/frontend/images/login/car.webp') }}" alt="logo"></a>
            </div>
           
                <div class="account-form-area">
                    <h3 class="title">{{ __("KYC Verification") }}</h3>
                    <p>{{ __("Please submit your KYC information with valid data.") }}</p>
                    <form action="{{ setRoute('user.authorize.kyc.submit') }}" class="account-form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row ml-b-20">

                            @include('user.components.generate-kyc-fields',['fields' => $kyc_fields])

                            <div class="col-lg-12 form-group">
                                <div class="forgot-item">
                                    <label>{{ __("Back to ") }}<a href="{{ setRoute('user.dashboard') }}" class="text--base">{{ __("Dashboard") }}</a></label>
                                </div>
                            </div>
                            <div class="col-lg-12 form-group text-center">
                                <button type="submit" class="btn--base w-100">{{ __("Submit") }}</button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </section>
@endsection

@push('script')
    
@endpush