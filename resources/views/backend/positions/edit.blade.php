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
    <x-backend.card>
        <x-slot name="header">
            @lang('Position Info')
        </x-slot>

        <x-slot name="body">
            @include('backend.positions.includes.position-form', ['position' => $position, 'action' => 'update', 'actionText' => 'Update Position', 'method' => 'PUT', 'route' => 'admin.positions.update'])
            @include('backend.positions.includes.media', ['position' => $position])
            <input type="hidden" name="order-route" id="orderRoute" value="{{route('admin.positions.reorder-media', $position)}}">
            <input type="hidden" name="csrf-value" id="csrfValue" value="{{csrf_token()}}">
        </x-slot>
    </x-backend.card>

@endsection

@push('after-scripts')
    <script src="{{mix('js/backend/includes/media.js')}}"></script>
@endpush
