@extends('frontend.layouts.app')

@section('title', __('Blogs'))

@push('before-styles')

@endpush

@section('content')
    <p>
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#blogSearch" aria-expanded="false" aria-controls="blogSearch">
            Search
        </button>
    </p>
    <div class="collapse" id="blogSearch">
        <div class="card card-body">
            @include('frontend.blogs.includes.blogs-table', ['blogs' => $blogs])
        </div>
    </div>
    <div class="row">
        @foreach($blogs as $blog)

            <div class="col card col-6">
                <div class="card-body m-auto">
                    <h1>
                        <a href="{{route('frontend.blogs.show', $blog)}}">{{$blog->title}}</a>
                    </h1>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@push('after-scripts')
    <script src="{{mix('js/frontend/blogs/blogs.js')}}"></script>
@endpush
