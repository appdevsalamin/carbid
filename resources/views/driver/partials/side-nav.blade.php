
<div class="sidebar">
        <div class="sidebar-inner">
            <div class="sidebar-area">
                <div class="sidebar-logo">
                      <a href="{{ setRoute('driver.dashboard') }}" class="sidebar-main-logo">
                        <img src="{{ get_logo($basic_settings) }}" data-white_img="{{ get_logo($basic_settings,'dark') }}"
                        data-dark_img="{{ get_logo($basic_settings) }}" alt="logo">
                    </a>
                    <button class="sidebar-menu-bar">
                        <i class="fas fa-exchange-alt"></i>
                    </button>
                </div>
                <div class="sidebar-menu-wrapper">
                    <ul class="sidebar-menu">
                        <li class="sidebar-menu-item">
                        <a href="{{ setRoute('driver.dashboard') }}">
                            <i class="menu-icon las la-palette"></i>
                            <span class="menu-title">{{ __("Dashboard") }}</span>
                        </a>
                        </li>
                        <li class="sidebar-menu-item">
                           <a href="{{ setRoute('driver.add.money.index') }}">
                                <i class="menu-icon las la-sign"></i>
                                <span class="menu-title">{{__("Add Money")}}</span>
                            </a>
                        </li>
                         <li class="sidebar-menu-item">
                             <a href="{{ setRoute('driver.money.out.index') }}">
                                <i class="menu-icon las la-fill-drip"></i>
                                <span class="menu-title">{{__("Money Out")}}</span>
                            </a>
                        </li>
                          <li class="sidebar-menu-item">
                            <a href="#">
                                <i class="menu-icon las la-id-card"></i>
                                <span class="menu-title">{{__("Service Profile")}}</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                             <a href="{{ setRoute('driver.booking.index') }}">
                                <i class="menu-icon las la-car"></i>
                                <span class="menu-title">{{__("My Booking")}}</span>
                            </a>
                        </li>
                        @if($basic_settings->driver_kyc_verification)
                        <li class="sidebar-menu-item">
                            <a href="{{ setRoute( 'driver.kyc.index') }}">
                                <i class="menu-icon las  la-user-shield"></i>
                                <span class="menu-title">{{__("KYC Verification")}}</span>
                            </a>
                        </li>
                        @endif
                       
                        <li class="sidebar-menu-item">
                            <a href="{{ setRoute( 'driver.security.google.2fa') }}">
                                <i class="menu-icon las la-qrcode"></i>
                                <span class="menu-title">{{__("2FA Security")}}</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a href="#" class="logout-btn">
                                <i class="menu-icon las la-sign-out-alt"></i>
                                <span class="menu-title">{{__("Logout")}}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="sidebar-doc-box bg_img" data-background="{{ asset('public/frontend/images/element/side-bg.webp') }}">
            <div class="sidebar-doc-icon">
                <i class="fas fa-question-circle"></i>
            </div>
            <div class="sidebar-doc-content">
                <h4 class="title">Need Help?</h4>
                <p>Please check our docs</p>
                <div class="sidebar-doc-btn">
                    <a href="{{ setRoute('driver.support.ticket.index') }}" class="btn--base w-100">{{ __("Get Support") }}</a>
                </div>
            </div>
        </div>
        </div>
    </div>

@push('script')
<script> 
   $(".logout-btn").click(function(){
        var actionRoute =  "{{ setRoute('driver.logout') }}";
        var target      = 1;
        var message     = `Are you sure to <strong>Logout</strong>?`;
  
        openAlertModal(actionRoute,target,message,"Logout","POST");
    });
    </script>
@endpush

