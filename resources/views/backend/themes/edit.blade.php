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
    <x-backend.card>
        <x-slot name="header">
            @lang('Theme Info')
        </x-slot>

        <x-slot name="body">
            @include('backend.themes.includes.theme-form', ['theme' => $theme, 'action' => 'update', 'actionText' => 'Update Theme', 'method' => 'PUT', 'route' => 'admin.themes.update'])
            <hr>
            @include('backend.themes.includes.media', ['theme' => $theme])
            <input type="hidden" name="order-route" id="orderRoute" value="{{route('admin.themes.reorder-media', $theme)}}">
            <input type="hidden" name="csrf-value" id="csrfValue" value="{{csrf_token()}}">
        </x-slot>
    </x-backend.card>

@endsection

@push('after-scripts')
    <script src="{{mix('js/backend/includes/media.js')}}"></script>
@endpush
