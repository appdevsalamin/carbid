<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Header
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

@php 
 $pages = App\Models\Admin\SetupPage::where('status', 1)->get();

@endphp 

<header class="header-section">
    <div class="header">
        <div class="header-bottom-area">
            <div class="container">
                <div class="header-menu-content">
                    <nav class="navbar navbar-expand-lg p-0">
                        <a class="site-logo site-title" href="{{ route('frontend.index') }}"><img src=" {{ get_logo($basic_settings,'dark') }}" alt="site-logo"></a>
                        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="fas fa-bars"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          <ul class="navbar-nav main-menu ms-auto me-auto">
                          @foreach($pages as $page)
                            @php
                                $isHome = $page->slug === 'home';
                                $url = $isHome ? url('/') : url($page->slug);
                                $active = $isHome 
                                    ? (request()->is('/') ? 'active' : '') 
                                   : (request()->is($page->slug) || request()->is($page->slug.'/*') ? 'active' : '');
                         
                            @endphp
                                <li>
                                    <a href="{{ $url }}" class="{{ $active }}">
                                        {{ __($page->title) }}
                                    </a>
                                </li>
                            @endforeach
                              
                            </ul>

                          <div class="header-action">
                            @if(auth('driver_gurd')->check())
                                @if(auth('driver_gurd')->user()->two_factor_status == 0)
                                  <a class="header-account-bar btn--base" href="{{ setRoute('driver.dashboard') }}">
                                        <i class="las la-tachometer-alt"></i> {{ __("Dashboard") }}
                                    </a> &nbsp;&nbsp;&nbsp;&nbsp;
                                @else
                                     <a class="header-account-bar btn--base" href="{{ setRoute('driver.authorize.google.2fa') }}">
                                        <i class="las la-user-shield"></i> {{ __("Dashboard") }}
                                    </a>&nbsp;&nbsp;&nbsp;&nbsp;

                                @endif
                            @else
                            <a class="header-account-bar btn--base {{ request()->routeIs('driver.login') ? 'active' : '' }}" 
                            href="{{ setRoute('driver.login') }}">
                                <i class="las la-clone"></i> {{ __("Driver Login") }}
                            </a>&nbsp;&nbsp;&nbsp;&nbsp;
                            @endauth
                            
                             
                             @if(auth('web')->check())
                                @if(auth('web')->user()->two_factor_status == 0)
                                     <a class="header-account-bar btn--base" href="{{ setRoute('user.dashboard') }}">
                                        <i class="las la-tachometer-alt"></i> {{ __("Dashboard") }}
                                    </a>
                                @else
                                 <a class="header-account-bar btn--base" href="{{ setRoute('user.authorize.google.2fa') }}">
                                        <i class="las la-user-shield"></i> {{ __("Dashboard") }}
                                    </a>
                                @endif
                            @else
                                <a class="header-account-bar btn--base {{ request()->routeIs('user.login') ? 'active' : '' }}" href="{{ route('user.login') }}">
                                    <i class="las la-clone"></i> {{ __("Login Now") }}
                                </a>
                            @endauth
                        </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Header
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
