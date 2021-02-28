@extends('frontend.layouts.app')

@section('title', __($blog->title))

@push('before-styles')

@endpush

@section('content')
    <h1>{{$blog->title}}</h1>
    <p>
        {!! $blog->page_content !!}
    </p>
    <h3>Tags</h3>
    @foreach(explode(',',$blog->tags) as $tag)
        <a href="{{route('frontend.blogs.related', trim($tag, ' '))}}">{{trim($tag, ' ')}}</a>
    @endforeach
@endsection

@push('after-scripts')

@endpush
