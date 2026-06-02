@extends('public.layouts.app')

@section('title', 'Business Name Generator — i2Medier')

@push('page_css')
    @vite('resources/css/public/pages/tools.css')
@endpush

@section(‘content’)
    @component(‘tools.partials.tool-page’, [‘tool’ => $tool, ‘relatedTools’ => $relatedTools])
        <livewire:tools.business-name-generator />
    @endcomponent
@endsection
