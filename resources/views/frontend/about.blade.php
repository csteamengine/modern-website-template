@extends('frontend.layouts.app')

@section('title', __('Projects'))

@push('before-styles')

@endpush

@section('content')
    <h1>About</h1>
    <p>
        {!! $active_theme->page_content !!}
    </p>
@endsection

@push('after-scripts')

@endpush
