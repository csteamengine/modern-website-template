@extends('frontend.layouts.app')

@section('title', __('Projects'))

@push('before-styles')

@endpush

@section('content')
    <h1>About</h1>
    @if($active_theme->resume_active && $active_theme->resume() != null)
        <a href="{{$active_theme->resume()->getUrl()}}" target="_blank">Download Resume</a>
    @endif
    <p>
        {!! $active_theme->page_content !!}
    </p>
@endsection

@push('after-scripts')

@endpush
