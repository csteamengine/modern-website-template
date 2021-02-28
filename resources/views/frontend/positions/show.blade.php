@extends('frontend.layouts.app')

@section('title', __('Position'))

@push('before-styles')

@endpush

@section('content')
    <h1>
        {{$position->title}}
    </h1>
    <p>
        {!! $position->page_content !!}
    </p>
@endsection

@push('after-scripts')

@endpush
