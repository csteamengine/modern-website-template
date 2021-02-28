@extends('frontend.layouts.app')

@section('title', __($project->title))

@push('before-styles')

@endpush

@section('content')
    <h1>
        {{$project->title}}
    </h1>
    <p>
        {!! $project->page_content !!}
    </p>
@endsection

@push('after-scripts')

@endpush
