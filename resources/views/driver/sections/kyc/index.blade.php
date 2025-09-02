@extends('driver.layouts.master')

@push('css')
    
@endpush

@section('content')
    <div class="table-content">
        <div class="row">
            <div class="header-title">

                @include('driver.components.profile.kyc',compact("kyc_data"))

                @if ($user->kyc_verified != global_const()::VERIFIED && $user->kyc_verified != global_const()::PENDING)
                    <div class="send-add-form row">
                        <div class="col-lg-10 col-md-10 col-12 form-area">
                            <div class="add-money-text pb-3">
                                <span class="kyc-title-text">{{ __("Fill up information and verify your KYC.") }}</span>
                            </div>

                            <form class="row g-4" method="POST" action="{{ setRoute('driver.kyc.submit') }}" enctype="multipart/form-data">
                                @csrf

                                @include('driver.components.generate-kyc-fields',['fields' => $kyc_fields])

                                <div class="col-12">
                                    <button type="submit" class="btn--base w-100 text-center">{{ __("Submit") }}</button>
                                </div>

                            </form>

                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('script')

@endpush