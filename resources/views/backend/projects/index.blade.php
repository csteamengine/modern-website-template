@extends('backend.layouts.app')

@section('title', __('Project Management'))

@section('content')

    <x-backend.card>
        <x-slot name="header">
            @lang('Projects')
        </x-slot>

        <x-slot name="body">
            @include('backend.projects.includes.projects-table', ['projects' => $projects])
        </x-slot>
    </x-backend.card>
    <input type="hidden" name="order-route" id="orderRoute" value="{{route('admin.projects.reorder')}}">
    <input type="hidden" name="csrf-value" id="csrfValue" value="{{csrf_token()}}">
@endsection


