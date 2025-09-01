@extends('frontend.layouts.master')

@push("css")

@endpush

@section('content')

@foreach ($page_section->sections ?? [] as $item)

  
    @if($item->section->key == 'announcement-section')
        @include('frontend.sections.web-journal')
    @endif
    
@endforeach

@endsection
