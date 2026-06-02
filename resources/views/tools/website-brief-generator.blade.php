@extends('public.layouts.app')

@section('title', 'Website Brief Generator — i2Medier')

@push('page_css')
    @vite('resources/css/public/pages/tools.css')
@endpush

@section('content')
    @component('tools.partials.tool-page', ['tool' => $tool, 'relatedTools' => $relatedTools])
        <livewire:tools.website-brief-generator />
    @endcomponent
@endsection
