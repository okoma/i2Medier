@extends('public.layouts.onboarding')

@section('title', 'Start a Project — i2Medier')

@push('page_css')
    @vite('resources/css/public/pages/onboarding.css')
@endpush

@section('content')
    @include('site.partials.onboarding-form')
@endsection
