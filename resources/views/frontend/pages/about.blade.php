@extends('frontend.layouts.master')

@push("css")

@endpush

@section('content')

@foreach ($page_section->sections ?? [] as $item)

    @if($item->section->key == 'about-us-section')
        @include('frontend.sections.about-us')
    @elseif($item->section->key == 'statistics-section')
        @include('frontend.sections.statistics')
    @endif
    
@endforeach

@endsection
