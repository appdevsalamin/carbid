@extends('frontend.layouts.master')
@push("css")
@endpush

@section('content') 
  

<!-- banner section -->
@include('frontend.sections.banner')

<!-- banner section -->
@include('frontend.sections.booking')

<!-- how it work section -->
@include('frontend.sections.how-its-work')

<!-- statisticsts section -->
@include('frontend.sections.statistics')

<!-- whychoose section -->
@include('frontend.sections.whychoose')

<!-- customer section -->
@include('frontend.sections.testimonial')

<!-- latest news section -->
@include('frontend.sections.web-journal')


@endsection

@push("script")


@endpush