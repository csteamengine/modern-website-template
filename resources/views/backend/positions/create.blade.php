@extends('backend.layouts.app')

@section('title', __('labels.backend.positions.management') . ' | ' . __('labels.backend.positions.create'))

{{--@push('after-styles')--}}
{{--    {!! style('/css/backend/position.css') !!}--}}
{{--    {!! style('/css/backend/summernote.css') !!}--}}
{{--@endpush--}}

@push('before-scripts')
    {{--    <script src="/js/vendor.js"></script>--}}
@endpush


@section('content')
    @include('backend.positions.includes.position-form', ['position' => new App\Models\Position, 'action' => 'create', 'actionText' => 'Create Position', 'method' => 'POST', 'route' => 'admin.positions.store'])
@endsection

{{--@push('after-scripts')--}}
{{--    {!! script(mix('js/backend/includes/media.js')) !!}--}}
{{--@endpush--}}
