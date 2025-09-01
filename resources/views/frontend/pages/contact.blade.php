@extends('frontend.layouts.master')

@push("css")

@endpush

@section('content')

@foreach ($page_section->sections ?? [] as $item)
    
    @if($item->section->key == 'contact-us-section')
        @include('frontend.sections.contact-us')
    @endif
    
@endforeach

@endsection
