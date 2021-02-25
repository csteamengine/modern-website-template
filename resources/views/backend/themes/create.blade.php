@extends('backend.layouts.app')

@section('title', __('labels.backend.themes.management') . ' | ' . __('labels.backend.themes.create'))

{{--@push('after-styles')--}}
{{--    {!! style('/css/backend/theme.css') !!}--}}
{{--    {!! style('/css/backend/summernote.css') !!}--}}
{{--@endpush--}}

@push('before-scripts')
    {{--    <script src="/js/vendor.js"></script>--}}
@endpush


@section('content')
    @include('backend.themes.includes.theme-form', ['theme' => new App\Models\Theme, 'action' => 'create', 'actionText' => 'Create Theme', 'method' => 'POST', 'route' => 'admin.themes.store'])
@endsection

{{--@push('after-scripts')--}}
{{--    {!! script(mix('js/backend/themes/theme.js')) !!}--}}
{{--@endpush--}}
