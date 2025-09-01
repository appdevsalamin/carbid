@extends('driver.layouts.master')

@push('css')
    
@endpush

@section('breadcrumb')
    @include('driver.components.breadcrumb',['breadcrumbs' => [
        [
            'name'  => __("Dashboard"),
            'url'   => setRoute("driver.dashboard"),
        ]
    ], 'active' => __("My Booking")])
@endsection

@section('content')
<div class="row">
    <div class="main-wrapper">
        <div class="main-body-wrapper">
                <div class="dashboard-list-area">
                    <div class="dashboard-header-wrapper">
                        <h4 class="title">My Booking</h4>
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
                            <div class="dashboard-list-item sent">
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
                            <div class="dashboard-list-item sent">
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
                            <div class="dashboard-list-item sent">
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
        </div>
</div>
@endsection

@push('script')
    <script>

    </script>
@endpush