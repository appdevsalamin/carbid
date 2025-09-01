@extends('user.layouts.master')

@push('css')
    
@endpush

@section('breadcrumb')
    @include('user.components.breadcrumb',['breadcrumbs' => [
        [
            'name'  => __("Dashboard"),
            'url'   => setRoute("user.dashboard"),
        ]
    ], 'active' => __("Profile")])
@endsection

@section('content')
    <div class="row mb-20-none">
        <div class="col-xl-6 col-lg-6 mb-20">
            <div class="custom-card mt-10">
                <div class="dashboard-header-wrapper">
                    <h4 class="title">{{ __("Profile Settings") }}</h4>
                   <div class="account-delate">
                    <button class="btn--danger del-account-btn" >{{__("Delete Account")}}</button>
                 </div>
                </div>
                <div class="card-body profile-body-wrapper">
                    <form class="card-form" method="POST" action="{{ setRoute('user.profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="profile-settings-wrapper">
                            <div class="preview-thumb profile-wallpaper">
                                <div class="avatar-preview">
                                    <div class="profilePicPreview bg_img" data-background="{{ asset('public/frontend/images/element/account.png') }}"></div>
                                </div>
                            </div>
                            <div class="profile-thumb-content">
                                <div class="preview-thumb profile-thumb">
                                    <div class="avatar-preview">
                                        <div class="profilePicPreview bg_img" data-background="{{ auth()->user()->userImage }}"></div>
                                    </div>
                                    <div class="avatar-edit">
                                        <input type='file' class="profilePicUpload" name="image" id="profilePicUpload2" accept=".png, .jpg, .jpeg, .webp, .svg" />
                                        <label for="profilePicUpload2"><i class="las la-upload"></i></label>
                                    </div>
                                </div>
                                <div class="profile-content">
                                    <h6 class="username">{{ auth()->user()->username }}</h6>
                                    <ul class="user-info-list mt-md-2">
                                        <li><i class="las la-envelope"></i>{{ auth()->user()->email }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="profile-form-area">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 form-group">
                                    @include('admin.components.form.input',[
                                        'label'         => "First Name<span>*</span>",
                                        'name'          => "firstname",
                                        'placeholder'   => "Enter First Name...",
                                        'value'         => old('firstname',auth()->user()->firstname)
                                    ])
                                </div>
                                <div class="col-xl-6 col-lg-6 form-group">
                                    @include('admin.components.form.input',[
                                        'label'         => "Last Name<span>*</span>",
                                        'name'          => "lastname",
                                        'placeholder'   => "Enter Last Name...",
                                        'value'         => old('lastname',auth()->user()->lastname)
                                    ])
                                </div>
                                <div class="col-xl-6 col-lg-6 form-group">
                                    <label>{{ __("Country") }}<span>*</span></label>
                                    <select name="country" class="form--control select2-auto-tokenize country-select" data-placeholder="Select Country" data-old="{{ old('country',auth()->user()->address->country ?? "") }}"></select>
                                </div>
                                <div class="col-xl-6 col-lg-6 form-group">
                                    <label>{{ __("Phone") }}<span>*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-text phone-code">+{{ auth()->user()->mobile_code }}</div>
                                        <input class="phone-code" type="hidden" name="phone_code" value="{{ auth()->user()->mobile_code }}" />
                                        <input type="text" class="form--control" placeholder="Enter Phone ..." name="phone" value="{{ old('phone',auth()->user()->mobile) }}">
                                    </div>
                                    @error("phone")
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-6 col-lg-6 form-group">
                                    @php
                                        $old_state = old('state',auth()->user()->address->state ?? "");
                                    @endphp
                                    <label>{{ __("State") }}</label>
                                    <select name="state" class="form--control select2-auto-tokenize state-select" data-placeholder="Select State" data-old="{{ $old_state }}">
                                        @if ($old_state)
                                            <option value="{{ $old_state }}" selected>{{ $old_state }}</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="col-xl-6 col-lg-6 form-group">
                                    @php
                                        $old_city = old('city',auth()->user()->address->city ?? "");
                                    @endphp
                                    <label>{{ __("City") }}</label>
                                    <select name="city" class="form--control select2-auto-tokenize city-select" data-placeholder="Select City" data-old="{{ $old_city }}">
                                        @if ($old_city)
                                            <option value="{{ $old_city }}" selected>{{ $old_city }}</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="col-xl-6 col-lg-6 form-group">
                                    @include('admin.components.form.input',[
                                        'label'         => "Zip Code",
                                        'name'          => "zip_code",
                                        'placeholder'   => "Enter Zip...",
                                        'value'         => old('zip_code',auth()->user()->address->zip ?? "")
                                    ])
                                </div>
                                <div class="col-xl-6 col-lg-6 form-group">
                                    @include('admin.components.form.input',[
                                        'label'         => "Address",
                                        'name'          => "address",
                                        'placeholder'   => "Enter Address...",
                                        'value'         => old('address',auth()->user()->address->address ?? "")
                                    ])
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12">
                                <button type="submit" class="btn--base w-100">{{ __("Update") }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-6 mb-20">
            <div class="custom-card mt-10">
                <div class="dashboard-header-wrapper">
                    <h4 class="title">{{ __("Change Password") }}</h4>
                </div>
                <div class="card-body">
                    <form class="card-form" action="{{ setRoute('user.profile.password.update') }}" method="POST">
                        @csrf
                        @method("PUT")
                         <div class="row ml-b-20">
                            <label>{{ __("Current Password") }}<span>*</span></label>
                             <div class="col-lg-12 form-group show_hide_password">
                                <input type="password" class="form--control" name="current_password" placeholder="{{ __('Enter Current Password')}}" required >
                                <a href="javascript:void(0)" class="show-pass"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                            </div>

                            <label>{{ __("New Password") }}<span>*</span></label>
                           <div class="col-lg-12 form-group show_hide_password">
                                <input type="password" class="form--control" name="password" placeholder="{{ __('Enter New Password')}}" required >
                                <a href="javascript:void(0)" class="show-pass"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                            </div>

                              <label>{{ __("Confirm Password") }}<span>*</span></label>
                              <div class="col-xl-12 col-lg-12 form-group show_hide_password">
                                <input type="password" class="form--control" name="password_confirmation" placeholder="{{ __('Enter Confirm Password')}}" required >
                                <a href="javascript:void(0)" class="show-pass"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12">
                            <button type="submit" class="btn--base w-100">{{ __("Change") }}</button>
                        </div>
                    </form>
                </div>
            </div>
            @include('user.components.profile.kyc',compact("kyc_data"))
        </div>
    </div>
@endsection

@push('script')
    <script>
        getAllCountries("{{ setRoute('global.countries') }}");
        $(document).ready(function(){
            $("select[name=country]").change(function(){
                var phoneCode = $("select[name=country] :selected").attr("data-mobile-code");
                placePhoneCode(phoneCode);
            });

            countrySelect(".country-select",$(".country-select").siblings(".select2"));
            stateSelect(".state-select",$(".state-select").siblings(".select2"));
        });
        
    </script>
    <script>
    $(".del-account-btn").click(function(){
        var actionRoute = "{{ setRoute('user.profile.destroy.account') }}";
        var target      = 1;
        var message     = `Are you sure to <strong>Delete</strong> your account? This action cannot be undone.`;

        openAlertModal(actionRoute, target, message, "Delete", "DELETE");
    });
</script>
@endpush