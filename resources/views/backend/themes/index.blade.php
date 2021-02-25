@extends('backend.layouts.app')

@section('title', __('Theme Management'))

@section('breadcrumb-links')
    @include('backend.themes.includes.breadcrumb-links')
@endsection

@section('content')

    <x-backend.card>
        <x-slot name="header">
            @lang('Themes')
        </x-slot>

        <x-slot name="body">
            @include('backend.themes.includes.themes-table', ['themes' => $themes])
        </x-slot>
    </x-backend.card>
    <input type="hidden" name="csrf-value" id="csrfValue" value="{{csrf_token()}}">
    <input type="hidden" name="order-route" id="orderRoute" value="{{route('admin.themes.reorder')}}">

@endsection


