@extends('user.layouts.master')

@section('breadcrumb')
    @include('user.components.breadcrumb',['breadcrumbs' => [
        [
            'name'  => __("Dashboard"),
            'url'   => setRoute("user.dashboard"),
        ]
    ], 'active' => __("Dashboard")])
@endsection

@section('content')
   <div>
    <div class="dashboard-area">
        <div class="dashboard-item-area">
            <div class="dashboard-header-wrapper">
                <h4 class="title">Dashboard</h4>
            </div>
            <div class="row mb-20-none">
                <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-20">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <span class="sub-title">Total Booking</span>
                            <h3 class="title">578</h3>
                        </div>
                        <div class="dashboard-icon">
                            <i class="las la-car"></i>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-20">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <span class="sub-title">Completed Booking</span>
                            <h3 class="title">243</h3>
                        </div>
                        <div class="dashboard-icon">
                            <i class="las la-car-alt"></i>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-20">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <span class="sub-title">Pending Booking</span>
                            <h3 class="title">132</h3>
                        </div>
                        <div class="dashboard-icon">
                            <i class="las la-spinner"></i>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-20">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <span class="sub-title">Canceled Booking</span>
                            <h3 class="title">49</h3>
                        </div>
                        <div class="dashboard-icon">
                            <i class="las la-car-crash"></i>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-20">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <span class="sub-title">Total Money</span>
                            <h3 class="title">578 USD</h3>
                        </div>
                        <div class="dashboard-icon">
                            <i class="las la-wallet"></i>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-20">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <span class="sub-title">Total Add Money</span>
                            <h3 class="title">243 USD</h3>
                        </div>
                        <div class="dashboard-icon">
                            <i class="las la-golf-ball"></i>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-20">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <span class="sub-title">Total Money Out</span>
                            <h3 class="title">132 USD</h3>
                        </div>
                        <div class="dashboard-icon">
                            <i class="las la-fill-drip"></i>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-20">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <span class="sub-title">Active Tickets</span>
                            <h3 class="title">497</h3>
                        </div>
                        <div class="dashboard-icon">
                            <i class="las la-ticket-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="chart-area mt-30">
        <div class="row mb-20-none">
            <div class="col-xxl-6 col-xl-6 col-lg-6 mb-20">
                <div class="dashboard-header-wrapper">
                    <h4 class="title">Add Money Statistics</h4>
                </div>
                <div class="chart-wrapper">
                    <div class="chart-container">
                        <div id="chart1" class="chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-6 col-xl-6 col-lg-6 mb-20">
                <div class="dashboard-header-wrapper">
                    <h4 class="title">Booking Summery</h4>
                </div>
                <div class="chart-wrapper">
                    <div class="chart-container">
                        <div id="chart2" class="chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dashboard-list-area mt-20">
        <div class="dashboard-header-wrapper">
            <h4 class="title">My Booking</h4>
            <div class="dashboard-btn-wrapper">
                <div class="dashboard-btn">
                    <a href="booking-log.html" class="btn--base">View More</a>
                </div>
            </div>
        </div>
        <div class="dashboard-list-wrapper">
            <div class="dashboard-list-item-wrapper">
                <div class="dashboard-list-item sent">
                    <div class="dashboard-list-left">
                        <div class="dashboard-list-user-wrapper">
                            <div class="dashboard-list-user-icon">
                                <i class="las la-arrow-up"></i>
                            </div>
                            <div class="dashboard-list-user-content">
                                <h4 class="title">Md. Mostafijur Rahman</h4>
                                <span class="sub-title text--danger">Pickup Driver <span class="badge badge--warning ms-2">Pending</span></span>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-list-right">
                        <h4 class="main-money text--base">478 USD</h4>
                    </div>
                </div>
                <div class="preview-list-wrapper">
                    <div class="preview-list-item">
                        <div class="preview-list-left">
                            <div class="preview-list-user-wrapper">
                                <div class="preview-list-user-icon">
                                    <i class="las la-envelope"></i>
                                </div>
                                <div class="preview-list-user-content">
                                    <span>Email</span>
                                </div>
                            </div>
                        </div>
                        <div class="preview-list-right">
                            <span>mosta@gmail.com</span>
                        </div>
                    </div>
                    <div class="preview-list-item">
                        <div class="preview-list-left">
                            <div class="preview-list-user-wrapper">
                                <div class="preview-list-user-icon">
                                    <i class="las la-phone"></i>
                                </div>
                                <div class="preview-list-user-content">
                                    <span>Phone</span>
                                </div>
                            </div>
                        </div>
                        <div class="preview-list-right">
                            <span>0123456789</span>
                        </div>
                    </div>
                    <div class="preview-list-item">
                        <div class="preview-list-left">
                            <div class="preview-list-user-wrapper">
                                <div class="preview-list-user-icon">
                                    <i class="las la-receipt"></i>
                                </div>
                                <div class="preview-list-user-content">
                                    <span>Rate</span>
                                </div>
                            </div>
                        </div>
                        <div class="preview-list-right">
                            <span class="text--info">$50/hr</span>
                        </div>
                    </div>
                    <div class="preview-list-item">
                        <div class="preview-list-left">
                            <div class="preview-list-user-wrapper">
                                <div class="preview-list-user-icon">
                                    <i class="las la-battery-half"></i>
                                </div>
                                <div class="preview-list-user-content">
                                    <span>Fees & Charges</span>
                                </div>
                            </div>
                        </div>
                        <div class="preview-list-right">
                            <span class="text--danger">$10</span>
                        </div>
                    </div>
                    <div class="preview-list-item">
                        <div class="preview-list-left">
                            <div class="preview-list-user-wrapper">
                                <div class="preview-list-user-icon">
                                    <i class="las la-circle-notch"></i>
                                </div>
                                <div class="preview-list-user-content">
                                    <span>Round Trip</span>
                                </div>
                            </div>
                        </div>
                        <div class="preview-list-right">
                            <span>Yes</span>
                        </div>
                    </div>
                    <div class="preview-list-item">
                        <div class="preview-list-left">
                            <div class="preview-list-user-wrapper">
                                <div class="preview-list-user-icon">
                                    <i class="las la-calendar-check"></i>
                                </div>
                                <div class="preview-list-user-content">
                                    <span>Journey Date</span>
                                </div>
                            </div>
                        </div>
                        <div class="preview-list-right">
                            <span>23 Apr, 2023</span>
                        </div>
                    </div>
                    <div class="preview-list-item">
                        <div class="preview-list-left">
                            <div class="preview-list-user-wrapper">
                                <div class="preview-list-user-icon">
                                    <i class="las la-calendar-check"></i>
                                </div>
                                <div class="preview-list-user-content">
                                    <span>Return Date</span>
                                </div>
                            </div>
                        </div>
                        <div class="preview-list-right">
                            <span>15 Aug, 2023</span>
                        </div>
                    </div>
                    <div class="preview-list-item">
                        <div class="preview-list-left">
                            <div class="preview-list-user-wrapper">
                                <div class="preview-list-user-icon">
                                    <i class="las la-smoking"></i>
                                </div>
                                <div class="preview-list-user-content">
                                    <span>Status</span>
                                </div>
                            </div>
                        </div>
                        <div class="preview-list-right">
                            <span class="badge badge--warning">Pending</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dashboard-list-item-wrapper">
                <div class="dashboard-list-item sent active">
                    <div class="dashboard-list-left">
                        <div class="dashboard-list-user-wrapper">
                            <div class="dashboard-list-user-icon">
                                <i class="las la-arrow-up"></i>
                            </div>
                            <div class="dashboard-list-user-content">
                                <h4 class="title">Md. Ruddra Khan</h4>
                                <span class="sub-title text--danger">Pickup Driver <span class="badge badge--warning ms-2">Pending</span></span>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-list-right">
                        <h4 class="main-money text--base">150 USD</h4>
                    </div>
                </div>
                <div class="preview-list-wrapper">
                    <div class="preview-list-item">
                        <div class="preview-list-left">
                            <div class="preview-list-user-wrapper">
                                <div class="preview-list-user-icon">
                                    <i class="las la-envelope"></i>
                                </div>
                                <div class="preview-list-user-content">
                                    <span>Email</span>
                                </div>
                            </div>
                        </div>
                        <div class="preview-list-right">
                            <span>ruddra@gmail.com</span>
                        </div>
                    </div>
                    <div class="preview-list-item">
                        <div class="preview-list-left">
                            <div class="preview-list-user-wrapper">
                                <div class="preview-list-user-icon">
                                    <i class="las la-phone"></i>
                                </div>
                                <div class="preview-list-user-content">
                                    <span>Phone</span>
                                </div>
                            </div>
                        </div>
                        <div class="preview-list-right">
                            <span>0123456789</span>
                        </div>
                    </div>
                    <div class="preview-list-item">
                        <div class="preview-list-left">
                            <div class="preview-list-user-wrapper">
                                <div class="preview-list-user-icon">
                                    <i class="las la-receipt"></i>
                                </div>
                                <div class="preview-list-user-content">
                                    <span>Rate</span>
                                </div>
                            </div>
                        </div>
                        <div class="preview-list-right">
                            <span class="text--info">$50/hr</span>
                        </div>
                    </div>
                    <div class="preview-list-item">
                        <div class="preview-list-left">
                            <div class="preview-list-user-wrapper">
                                <div class="preview-list-user-icon">
                                    <i class="las la-battery-half"></i>
                                </div>
                                <div class="preview-list-user-content">
                                    <span>Fees & Charges</span>
                                </div>
                            </div>
                        </div>
                        <div class="preview-list-right">
                            <span class="text--danger">$10</span>
                        </div>
                    </div>
                    <div class="preview-list-item">
                        <div class="preview-list-left">
                            <div class="preview-list-user-wrapper">
                                <div class="preview-list-user-icon">
                                    <i class="las la-circle-notch"></i>
                                </div>
                                <div class="preview-list-user-content">
                                    <span>Round Trip</span>
                                </div>
                            </div>
                        </div>
                        <div class="preview-list-right">
                            <span>No</span>
                        </div>
                    </div>
                    <div class="preview-list-item">
                        <div class="preview-list-left">
                            <div class="preview-list-user-wrapper">
                                <div class="preview-list-user-icon">
                                    <i class="las la-calendar-check"></i>
                                </div>
                                <div class="preview-list-user-content">
                                    <span>Journey Date</span>
                                </div>
                            </div>
                        </div>
                        <div class="preview-list-right">
                            <span>23 Apr, 2023</span>
                        </div>
                    </div>
                    <div class="preview-list-item">
                        <div class="preview-list-left">
                            <div class="preview-list-user-wrapper">
                                <div class="preview-list-user-icon">
                                    <i class="las la-smoking"></i>
                                </div>
                                <div class="preview-list-user-content">
                                    <span>Status</span>
                                </div>
                            </div>
                        </div>
                        <div class="preview-list-right">
                            <span class="badge badge--warning">Pending</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dashboard-list-item-wrapper">
                <div class="dashboard-list-item receive">
                    <div class="dashboard-list-left">
                        <div class="dashboard-list-user-wrapper">
                            <div class="dashboard-list-user-icon">
                                <i class="las la-arrow-down"></i>
                            </div>
                            <div class="dashboard-list-user-content">
                                <h4 class="title">Md. Azad Hossain</h4>
                                <span class="sub-title text--success">Pickup Driver <span class="badge badge--success ms-2">Completed</span></span>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-list-right">
                        <h4 class="main-money text--base">420 USD</h4>
                    </div>
                </div>
                <div class="preview-list-wrapper">
                    <div class="preview-list-item">
                        <div class="preview-list-left">
                            <div class="preview-list-user-wrapper">
                                <div class="preview-list-user-icon">
                                    <i class="las la-envelope"></i>
                                </div>
                                <div class="preview-list-user-content">
                                    <span>Email</span>
                                </div>
                            </div>
                        </div>
                        <div class="preview-list-right">
                            <span>azad@gmail.com</span>
                        </div>
                    </div>
                    <div class="preview-list-item">
                        <div class="preview-list-left">
                            <div class="preview-list-user-wrapper">
                                <div class="preview-list-user-icon">
                                    <i class="las la-phone"></i>
                                </div>
                                <div class="preview-list-user-content">
                                    <span>Phone</span>
                                </div>
                            </div>
                        </div>
                        <div class="preview-list-right">
                            <span>0123456789</span>
                        </div>
                    </div>
                    <div class="preview-list-item">
                        <div class="preview-list-left">
                            <div class="preview-list-user-wrapper">
                                <div class="preview-list-user-icon">
                                    <i class="las la-receipt"></i>
                                </div>
                                <div class="preview-list-user-content">
                                    <span>Rate</span>
                                </div>
                            </div>
                        </div>
                        <div class="preview-list-right">
                            <span class="text--info">$50/hr</span>
                        </div>
                    </div>
                    <div class="preview-list-item">
                        <div class="preview-list-left">
                            <div class="preview-list-user-wrapper">
                                <div class="preview-list-user-icon">
                                    <i class="las la-battery-half"></i>
                                </div>
                                <div class="preview-list-user-content">
                                    <span>Fees & Charges</span>
                                </div>
                            </div>
                        </div>
                        <div class="preview-list-right">
                            <span class="text--danger">$10</span>
                        </div>
                    </div>
                    <div class="preview-list-item">
                        <div class="preview-list-left">
                            <div class="preview-list-user-wrapper">
                                <div class="preview-list-user-icon">
                                    <i class="las la-circle-notch"></i>
                                </div>
                                <div class="preview-list-user-content">
                                    <span>Round Trip</span>
                                </div>
                            </div>
                        </div>
                        <div class="preview-list-right">
                            <span>Yes</span>
                        </div>
                    </div>
                    <div class="preview-list-item">
                        <div class="preview-list-left">
                            <div class="preview-list-user-wrapper">
                                <div class="preview-list-user-icon">
                                    <i class="las la-calendar-check"></i>
                                </div>
                                <div class="preview-list-user-content">
                                    <span>Journey Date</span>
                                </div>
                            </div>
                        </div>
                        <div class="preview-list-right">
                            <span>23 Apr, 2023</span>
                        </div>
                    </div>
                    <div class="preview-list-item">
                        <div class="preview-list-left">
                            <div class="preview-list-user-wrapper">
                                <div class="preview-list-user-icon">
                                    <i class="las la-calendar-check"></i>
                                </div>
                                <div class="preview-list-user-content">
                                    <span>Return Date</span>
                                </div>
                            </div>
                        </div>
                        <div class="preview-list-right">
                            <span>15 Aug, 2023</span>
                        </div>
                    </div>
                    <div class="preview-list-item">
                        <div class="preview-list-left">
                            <div class="preview-list-user-wrapper">
                                <div class="preview-list-user-icon">
                                    <i class="las la-smoking"></i>
                                </div>
                                <div class="preview-list-user-content">
                                    <span>Status</span>
                                </div>
                            </div>
                        </div>
                        <div class="preview-list-right">
                            <span class="badge badge--success">Completed</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')

@endpush