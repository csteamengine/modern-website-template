@extends('frontend.layouts.app')

@section('title', 'Related Blogs')

@push('before-styles')

@endpush

@section('content')
    <h1>{{$tag}}</h1>
    @foreach($blogs as $blog)
        <h2>
            <a href="{{route('frontend.blogs.show', $blog)}}">{{$blog->title}}</a>
        </h2>
    @endforeach
@endsection

@push('after-scripts')

@endpush
