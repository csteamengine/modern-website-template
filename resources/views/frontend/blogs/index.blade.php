@extends('frontend.layouts.app')

@section('title', __('Blogs'))

@push('before-styles')

@endpush

@section('content')
    @foreach($blogs as $blog)
        <h1>
            <a href="{{route('frontend.blogs.show', $blog)}}">{{$blog->title}}</a>
        </h1>
    @endforeach
@endsection

@push('after-scripts')

@endpush
