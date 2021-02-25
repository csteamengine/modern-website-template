@extends('backend.layouts.app')

@section('title', __('labels.backend.themes.management') . ' | ' . __('labels.backend.themes.create'))

@push('before-styles')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endpush

@push('before-scripts')
    {{--    <script src="/js/vendor.js"></script>--}}
@endpush

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Theme Info')
        </x-slot>

        <x-slot name="body">
            @include('backend.themes.includes.theme-form', ['theme' => new App\Models\Theme, 'action' => 'create', 'actionText' => 'Create Theme', 'method' => 'POST', 'route' => 'admin.themes.store'])
        </x-slot>
    </x-backend.card>
@endsection

@push('after-scripts')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@endpush

