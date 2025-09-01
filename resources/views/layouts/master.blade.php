<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    @php
        $current_url = URL::current();
    @endphp
    @if($current_url == setRoute('frontend.index'))
        <title>{{ __($basic_settings->site_name) ?? ''}}  - {{ __($basic_settings->site_title) ?? "" }}</title>
    @else
        <title>{{$basic_settings->site_name ?? ''}} - {{ $page_title ?? '' }}</title>
    @endif
    @include('partials.header-asset')
    @stack('css')
</head>

<body>

    @include('frontend.partials.header')

    @yield('content')


    @include('frontend.partials.footer')

    @include('partials.footer-asset')
    @include('frontend.partials.extensions.tawk-to')
    
    @stack('script')

  
</body>

</html>
