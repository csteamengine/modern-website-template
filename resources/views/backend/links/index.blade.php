@extends('backend.layouts.app')

@section('title', __('Link Management'))

@push('before-styles')
@endpush

@section('breadcrumb-links')
    @include('backend.links.includes.breadcrumb-links')
@endsection

@section('content')

    <x-backend.card>
        <x-slot name="header">
            @lang('links')
        </x-slot>

        <x-slot name="body">
            @include('backend.links.includes.links-table', ['links' => $links])
        </x-slot>
    </x-backend.card>
    <input type="hidden" name="order-route" id="orderRoute" value="{{route('admin.links.reorder')}}">
    <input type="hidden" name="csrf-value" id="csrfValue" value="{{csrf_token()}}">
@endsection

@push('after-scripts')
    <script src="{{ mix('js/backend/links/links.js') }}"></script>
    <script src="{{ mix('js/backend/includes/reorder.js') }}"></script>
    <script src="{{ mix('js/backend/includes/switch.js') }}"></script>
@endpush

