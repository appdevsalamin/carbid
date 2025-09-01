<table class="custom-table user-search-table">
    <thead>
        <tr>
            <th></th>
            <th>{{ __("Username") }}</th>
            <th>{{ __("Email") }}</th>
            <th>{{ __("Phone") }}</th>
            <th>{{ __("Status") }}</th>
            <th>{{ __("Action") }}</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($drivers ?? [] as $key => $item)
            <tr>
                <td>
                    <ul class="user-list">
                        <li><img src="{{ $item->userImage }}" alt="user"></li>
                    </ul>
                </td>
                <td><span>{{ $item->username }}</span></td>
                <td>{{ $item->email ?? 'N/A' }}</td>
                <td>{{ $item->full_mobile ?? 'N/A' }}</td>
                <td>
                    @if (Route::currentRouteName() == "admin.drivers.kyc.unverified")
                        <span class="{{ $item->kycStringStatus->class }}">{{ $item->kycStringStatus->value }}</span>
                    @else
                        <span class="{{ $item->stringStatus->class }}">{{ $item->stringStatus->value }}</span>
                    @endif
                </td>
                <td>
                    @if (Route::currentRouteName() == "admin.drivers.kyc.unverified")
                        @include('admin.components.link.info-default',[
                            'href'          => setRoute('admin.drivers.kyc.details', $item->username),
                            'permission'    => "admin.drivers.kyc.details",
                        ])
                    @else
                        @include('admin.components.link.info-default',[
                            'href'          => setRoute('admin.drivers.details', $item->username),
                            'permission'    => "admin.drivers.details",
                        ])
                    @endif
                </td>
            </tr>
        @empty
            @include('admin.components.alerts.empty',['colspan' => 7])
        @endforelse
    </tbody>
</table>
