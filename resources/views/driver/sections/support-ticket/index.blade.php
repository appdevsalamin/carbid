@extends('driver.layouts.master')

@push('css')
    
@endpush

@section('breadcrumb')
    @include('driver.components.breadcrumb',['breadcrumbs' => [
        [
            'name'  => __("Dashboard"),
            'url'   => setRoute("driver.dashboard"),
        ]
    ], 'active' => __("Support Tickets")])
@endsection

@section('content')
    <div class="table-area mt-10">
        <div class="dashboard-header-wrapper">
            <h4 class="title">Support Tickets</h4>
            <div class="dashboard-btn-wrapper">
                <div class="dashboard-btn">
                     <a href="{{ route('driver.support.ticket.create') }}" class="btn--base"><i class="las la-plus me-1"></i>{{ __("Add New") }}</a>
                </div>
            </div>
        </div>
        <div class="table-wrapper">
            <div class="table-responsive">
                <table class="custom-table two">
                    <thead>
                        <tr>
                            <th>{{ __("Ticket ID") }}</th>
                            <th>{{ __("UserName") }}</th>
                            <th>{{ __("Subject") }}</th>
                            <th>{{ __("Description") }}</th>
                            <th>{{ __("Status") }}</th>
                            <th>{{ __("Last Reply") }}</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                      <tbody>
                    @forelse ($support_tickets as $item)
                        <tr>
                            <td>#{{ $item->token }}</td>
                            <td><span class="text--info">{{ $item->driver->username }}</span></td>
                            <td><span class="text--info">{{ $item->subject }}</span></td>
                            <td>{{ Str::limit($item->desc, 100, '...') }}</td>
                            <td>
                                <span class="{{ $item->stringStatus->class }}">{{ $item->stringStatus->value }}</span>
                            </td>
                            <td>{{ $item->created_at->format("Y-m-d H:i A") }}</td>
                            <td>
                                <a href="{{ route('driver.support.ticket.conversation',encrypt($item->id)) }}" class="btn btn--base"><i class="las la-comment"></i></a>
                            </td>
                        </tr>
                    @empty
                          @include('admin.components.alerts.empty',['colspan' =>8])
                    @endforelse
                    
                </tbody>
                </table>
            </div>
        </div>
       {{ get_paginate($support_tickets) }}
    </div>

@endsection

@push('script')

@endpush