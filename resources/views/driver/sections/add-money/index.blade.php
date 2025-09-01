@extends('driver.layouts.master')
    
@push('css')
    
@endpush

@section('breadcrumb')
    @include('driver.components.breadcrumb',['breadcrumbs' => [
        [
            'name'  => __("Dashboard"),
            'url'   => setRoute("driver.dashboard"),
        ]
    ], 'active' => __("Add Money")])
@endsection

@section('content')
  @section('content')
<div class="row">
    <div class="row mb-20-none">
            <div class="col-xl-7 col-lg-7 mb-20">
                <div class="custom-card mt-10">
                    <div class="card-body">
                                <form class="card-form">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 form-group text-center">
                                            <div class="exchange-area">
                                                <code class="d-block text-center"><span>Exchange Rate</span> 1 USD = 1.00000000 EGP</code>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 form-group">
                                            <label>Payment Gateway<span>*</span></label>
                                            <select class="form--control">
                                                <option value="">Select Gateway</option>
                                                <option value="1">Paypal</option>
                                                <option value="2">Bank</option>
                                                <option value="3">Skrill</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 form-group">
                                            <label>Amount<span>*</span></label>
                                            <div class="input-group">
                                                <input type="text" class="form--control" placeholder="Enter Amount...">
                                                <select class="form--control">
                                                    <option value="">USD</option>
                                                    <option value="1">EGP</option>
                                                    <option value="2">AUD</option>
                                                </select>
                                            </div>
                                            <code class="d-block mt-10 text-end">Available Balance 70 USD</code>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 form-group">
                                            <div class="note-area">
                                                <code class="d-block">Limit : 1.00 - 100000 USD</code>
                                                <code class="d-block">Charge : 2.00 USD + 1%</code>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12">
                                        <button type="submit" class="btn--base w-100">Add Money</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5 mb-20">
                        <div class="custom-card mt-10">
                            <div class="card-body">
                                <div class="preview-list-wrapper">
                                    <div class="preview-list-item">
                                        <div class="preview-list-left">
                                            <div class="preview-list-user-wrapper">
                                                <div class="preview-list-user-icon">
                                                    <i class="las la-receipt"></i>
                                                </div>
                                                <div class="preview-list-user-content">
                                                    <span>Entered Amount</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list-right">
                                            <span class="text--success">40 USD</span>
                                        </div>
                                    </div>
                                    <div class="preview-list-item">
                                        <div class="preview-list-left">
                                            <div class="preview-list-user-wrapper">
                                                <div class="preview-list-user-icon">
                                                    <i class="las la-battery-half"></i>
                                                </div>
                                                <div class="preview-list-user-content">
                                                    <span>Total Fees & Charges</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list-right">
                                            <span class="text--warning">0.2 USD</span>
                                        </div>
                                    </div>
                                    <div class="preview-list-item">
                                        <div class="preview-list-left">
                                            <div class="preview-list-user-wrapper">
                                                <div class="preview-list-user-icon">
                                                    <i class="lab la-get-pocket"></i>
                                                </div>
                                                <div class="preview-list-user-content">
                                                    <span>Will Get</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list-right">
                                            <span class="text--danger">0.57 USD</span>
                                        </div>
                                    </div>
                                    <div class="preview-list-item">
                                        <div class="preview-list-left">
                                            <div class="preview-list-user-wrapper">
                                                <div class="preview-list-user-icon">
                                                    <i class="las la-money-check-alt"></i>
                                                </div>
                                                <div class="preview-list-user-content">
                                                    <span class="last">Total Payable Amount</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list-right">
                                            <span class="text--info last">75 USD</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dashboard-list-area mt-20">
                    <div class="dashboard-header-wrapper">
                        <h4 class="title">Add Money Log</h4>
                        <div class="dashboard-btn-wrapper">
                            <div class="dashboard-btn">
                                <a href="add-money-log.html" class="btn--base">View More</a>
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
                                            <h4 class="title">Add Balance via <span class="text--warning">Paypal</span></h4>
                                            <span class="badge badge--warning">Pending</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="dashboard-list-right">
                                    <h4 class="main-money text--base">78,911.61 BDT</h4>
                                    <h6 class="exchange-money">1,200 AUD</h6>
                                </div>
                            </div>
                            <div class="preview-list-wrapper">
                                <div class="preview-list-item">
                                    <div class="preview-list-left">
                                        <div class="preview-list-user-wrapper">
                                            <div class="preview-list-user-icon">
                                                <i class="las la-exchange-alt"></i>
                                            </div>
                                            <div class="preview-list-user-content">
                                                <span>Exchange Rate</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="preview-list-right">
                                        <span>1 USD = 1.00000000 EGP</span>
                                    </div>
                                </div>
                                <div class="preview-list-item">
                                    <div class="preview-list-left">
                                        <div class="preview-list-user-wrapper">
                                            <div class="preview-list-user-icon">
                                                <i class="las la-wallet"></i>
                                            </div>
                                            <div class="preview-list-user-content">
                                                <span>Amount</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="preview-list-right">
                                        <span class="text--danger">40 USD</span>
                                    </div>
                                </div>
                                <div class="preview-list-item">
                                    <div class="preview-list-left">
                                        <div class="preview-list-user-wrapper">
                                            <div class="preview-list-user-icon">
                                                <i class="las la-battery-half"></i>
                                            </div>
                                            <div class="preview-list-user-content">
                                                <span>Fees & Charge</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="preview-list-right">
                                        <span>0.2 USD</span>
                                    </div>
                                </div>
                                <div class="preview-list-item">
                                    <div class="preview-list-left">
                                        <div class="preview-list-user-wrapper">
                                            <div class="preview-list-user-icon">
                                                <i class="lab la-get-pocket"></i>
                                            </div>
                                            <div class="preview-list-user-content">
                                                <span>Will Get</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="preview-list-right">
                                        <span>0.57 USD</span>
                                    </div>
                                </div>
                                <div class="preview-list-item">
                                    <div class="preview-list-left">
                                        <div class="preview-list-user-wrapper">
                                            <div class="preview-list-user-icon">
                                                <i class="las la-receipt"></i>
                                            </div>
                                            <div class="preview-list-user-content">
                                                <span>Total Amount</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="preview-list-right">
                                        <span class="text--warning">70 USD</span>
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
                                            <h4 class="title">Add Balance via <span class="text--warning">Stripe</span></h4>
                                            <span class="badge badge--warning">Success</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="dashboard-list-right">
                                    <h4 class="main-money text--base">10,120.11 BDT</h4>
                                    <h6 class="exchange-money">8,000 AUD</h6>
                                </div>
                            </div>
                            <div class="preview-list-wrapper">
                                <div class="preview-list-item">
                                    <div class="preview-list-left">
                                        <div class="preview-list-user-wrapper">
                                            <div class="preview-list-user-icon">
                                                <i class="las la-exchange-alt"></i>
                                            </div>
                                            <div class="preview-list-user-content">
                                                <span>Exchange Rate</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="preview-list-right">
                                        <span>1 USD = 1.00000000 EGP</span>
                                    </div>
                                </div>
                                <div class="preview-list-item">
                                    <div class="preview-list-left">
                                        <div class="preview-list-user-wrapper">
                                            <div class="preview-list-user-icon">
                                                <i class="las la-wallet"></i>
                                            </div>
                                            <div class="preview-list-user-content">
                                                <span>Amount</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="preview-list-right">
                                        <span class="text--danger">40 USD</span>
                                    </div>
                                </div>
                                <div class="preview-list-item">
                                    <div class="preview-list-left">
                                        <div class="preview-list-user-wrapper">
                                            <div class="preview-list-user-icon">
                                                <i class="las la-battery-half"></i>
                                            </div>
                                            <div class="preview-list-user-content">
                                                <span>Fees & Charge</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="preview-list-right">
                                        <span>0.2 USD</span>
                                    </div>
                                </div>
                                <div class="preview-list-item">
                                    <div class="preview-list-left">
                                        <div class="preview-list-user-wrapper">
                                            <div class="preview-list-user-icon">
                                                <i class="lab la-get-pocket"></i>
                                            </div>
                                            <div class="preview-list-user-content">
                                                <span>Will Get</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="preview-list-right">
                                        <span>0.57 USD</span>
                                    </div>
                                </div>
                                <div class="preview-list-item">
                                    <div class="preview-list-left">
                                        <div class="preview-list-user-wrapper">
                                            <div class="preview-list-user-icon">
                                                <i class="las la-receipt"></i>
                                            </div>
                                            <div class="preview-list-user-content">
                                                <span>Total Amount</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="preview-list-right">
                                        <span class="text--warning">70 USD</span>
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
                                            <h4 class="title">Add Balance via <span class="text--warning">Bank</span></h4>
                                            <span class="badge badge--success">Success</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="dashboard-list-right">
                                    <h4 class="main-money text--base">10,789.25 BDT</h4>
                                    <h6 class="exchange-money">5,325 AUD</h6>
                                </div>
                            </div>
                            <div class="preview-list-wrapper">
                                <div class="preview-list-item">
                                    <div class="preview-list-left">
                                        <div class="preview-list-user-wrapper">
                                            <div class="preview-list-user-icon">
                                                <i class="las la-exchange-alt"></i>
                                            </div>
                                            <div class="preview-list-user-content">
                                                <span>Exchange Rate</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="preview-list-right">
                                        <span>1 USD = 1.00000000 EGP</span>
                                    </div>
                                </div>
                                <div class="preview-list-item">
                                    <div class="preview-list-left">
                                        <div class="preview-list-user-wrapper">
                                            <div class="preview-list-user-icon">
                                                <i class="las la-wallet"></i>
                                            </div>
                                            <div class="preview-list-user-content">
                                                <span>Amount</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="preview-list-right">
                                        <span class="text--danger">40 USD</span>
                                    </div>
                                </div>
                                <div class="preview-list-item">
                                    <div class="preview-list-left">
                                        <div class="preview-list-user-wrapper">
                                            <div class="preview-list-user-icon">
                                                <i class="las la-battery-half"></i>
                                            </div>
                                            <div class="preview-list-user-content">
                                                <span>Fees & Charge</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="preview-list-right">
                                        <span>0.2 USD</span>
                                    </div>
                                </div>
                                <div class="preview-list-item">
                                    <div class="preview-list-left">
                                        <div class="preview-list-user-wrapper">
                                            <div class="preview-list-user-icon">
                                                <i class="lab la-get-pocket"></i>
                                            </div>
                                            <div class="preview-list-user-content">
                                                <span>Will Get</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="preview-list-right">
                                        <span>0.57 USD</span>
                                    </div>
                                </div>
                                <div class="preview-list-item">
                                    <div class="preview-list-left">
                                        <div class="preview-list-user-wrapper">
                                            <div class="preview-list-user-icon">
                                                <i class="las la-receipt"></i>
                                            </div>
                                            <div class="preview-list-user-content">
                                                <span>Total Amount</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="preview-list-right">
                                        <span class="text--warning">70 USD</span>
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
                    </div>
                </div>
</div>
@endsection




@endsection
@push('script')
    
@endpush