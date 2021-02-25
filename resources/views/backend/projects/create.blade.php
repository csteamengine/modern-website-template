@extends('backend.layouts.app')

@section('title', __('labels.backend.projects.management') . ' | ' . __('labels.backend.projects.create'))

{{--@push('after-styles')--}}
{{--    {!! style('/css/backend/project.css') !!}--}}
{{--    {!! style('/css/backend/summernote.css') !!}--}}
{{--@endpush--}}

@push('before-scripts')
    {{--    <script src="/js/vendor.js"></script>--}}
@endpush


@section('content')
    @include('backend.projects.includes.project-form', ['project' => new App\Models\Project, 'action' => 'create', 'actionText' => 'Create Project', 'method' => 'POST', 'route' => 'admin.projects.store'])
@endsection

{{--@push('after-scripts')--}}
{{--    {!! script(mix('js/backend/includes/media.js')) !!}--}}
{{--@endpush--}}
