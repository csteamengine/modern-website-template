@extends('backend.layouts.app')

@section('title', __('labels.backend.links.management') . ' | ' . __('labels.backend.links.create'))

{{--@push('after-styles')--}}
{{--    {!! style('/css/backend/link.css') !!}--}}
{{--    {!! style('/css/backend/summernote.css') !!}--}}
{{--@endpush--}}

@push('before-scripts')
    {{--    <script src="/js/vendor.js"></script>--}}
@endpush


@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('link Info')
        </x-slot>

        <x-slot name="body">
            @include('backend.links.includes.link-form', ['link' => $link, 'action' => 'update', 'actionText' => 'Update link', 'method' => 'PUT', 'route' => 'admin.links.update'])
            <input type="hidden" name="csrf-value" id="csrfValue" value="{{csrf_token()}}">
        </x-slot>
    </x-backend.card>

@endsection

@push('after-scripts')
    <script src="{{mix('js/backend/links/link.js')}}"></script>
@endpush
