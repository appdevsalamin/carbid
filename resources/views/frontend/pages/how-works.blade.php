@extends('frontend.layouts.master')

@push("css")

@endpush

@section('content')

@foreach ($page_section->sections ?? [] as $item)

    @if ( $item->section->key == 'banner-section')
        @include('frontend.sections.banner')
    @elseif($item->section->key == 'how-it-work')
        @include('frontend.sections.how-its-work')
    @elseif($item->section->key == 'whychoose')
        @include('frontend.sections.whychoose')
    @elseif($item->section->key == 'security-section')
        @include('frontend.sections.security')
    @elseif($item->section->key == 'statistic-section')
        @include('frontend.sections.statistics')
    @elseif($item->section->key == 'about-section')
        @include('frontend.sections.about-us')
    @endif
    
@endforeach

@endsection
