@extends('frontend.layouts.master')

@push("css")

@endpush
@php 
    $app_local              = get_default_language_code();
    $default                = App\Constants\LanguageConst::NOT_REMOVABLE;
@endphp 

@section('content')
    <section class="statistics-section ptb-120">
 
    <div class="container">
        <div class="row justify-content-center align-items-center mb-30-none">
            <div class="col-xl-10 col-lg-10 mb-30">
                <div class="statistics-wrapper">
                    <div class="mb-60-none">

                   {!! $useful_link->content->language->{$app_local}->content ?? '' !!}

                          
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
  

@endsection
