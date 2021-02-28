@extends('frontend.layouts.app')

@section('title', __('Projects'))

@push('before-styles')

@endpush

@section('content')
    <div class="row">
        @foreach($projects as $project)
            <div class="col card col-3">
                <div class="card-body m-auto">
                    <h1>
                        <a href="{{route('frontend.projects.show', $project)}}">{{$project->title}}</a>
                    </h1>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@push('after-scripts')

@endpush
