@extends('frontend.layouts.app')

@section('title', __($project->title))

@push('before-styles')

@endpush

@section('content')
    <h1>{{$project->title}}</h1>
    @foreach($project->getMedia('images') as $image)
        <img src="//{{$image->getUrl()}}" title="{{$image->name}}" alt="{{$image->name}}" class="img-fluid" width="500px">
    @endforeach
@endsection

@push('after-scripts')

@endpush
