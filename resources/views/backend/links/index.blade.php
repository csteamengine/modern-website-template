@extends('backend.layouts.app')

@section('title', __('link Management'))

@push('before-styles')
    <link href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/rowreorder/1.2.7/css/rowReorder.dataTables.min.css" rel="stylesheet">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
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
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script src="{{ mix('js/backend/links/links.js') }}"></script>
    <script src="{{ mix('js/backend/includes/reorder.js') }}"></script>
@endpush

