@extends('frontend.layouts.app')

@section('title', __('Projects'))

@push('before-styles')

@endpush

@section('content')
    @foreach($projects as $project)
        <h1>
            <a href="{{route('frontend.projects.show', $project)}}">{{$project->title}}</a>
        </h1>
    @endforeach
@endsection

@push('after-scripts')

@endpush
