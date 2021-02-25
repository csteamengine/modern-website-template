@extends('backend.layouts.app')

@section('title', __('labels.backend.links.management') . ' | ' . __('labels.backend.links.create'))

@push('before-styles')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endpush

@push('before-scripts')
    {{--    <script src="/js/vendor.js"></script>--}}
@endpush

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('link Info')
        </x-slot>

        <x-slot name="body">
            @include('backend.links.includes.link-form', ['link' => new App\Models\link, 'action' => 'create', 'actionText' => 'Create link', 'method' => 'POST', 'route' => 'admin.links.store'])
            <input type="hidden" name="csrf-value" id="csrfValue" value="{{csrf_token()}}">
        </x-slot>
    </x-backend.card>
@endsection


@push('after-scripts')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script src="{{mix('js/backend/links/link.js')}}"></script>
@endpush
