@extends('backend.layouts.app')

@section('title', __('Position Management'))

@section('breadcrumb-links')
    @include('backend.includes.partials.breadcrumb-links', ['route' => route('admin.positions.create')])
@endsection


@section('content')

    <x-backend.card>
        <x-slot name="header">
            @lang('Positions')
        </x-slot>

        <x-slot name="body">
            @include('backend.positions.includes.positions-table', ['positions' => $positions])
        </x-slot>
    </x-backend.card>
    <input type="hidden" name="order-route" id="orderRoute" value="{{route('admin.positions.reorder')}}">
    <input type="hidden" name="csrf-value" id="csrfValue" value="{{csrf_token()}}">
@endsection


