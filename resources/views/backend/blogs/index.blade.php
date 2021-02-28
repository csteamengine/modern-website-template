@extends('backend.layouts.app')

@section('title', __('Blog Management'))

@section('breadcrumb-links')
    @include('backend.blogs.includes.breadcrumb-links')
@endsection

@section('content')

    <x-backend.card>
        <x-slot name="header">
            @lang('Blogs')
        </x-slot>

        <x-slot name="body">
            @include('backend.blogs.includes.blogs-table', ['blogs' => $blogs])
        </x-slot>
    </x-backend.card>
    <input type="hidden" name="order-route" id="orderRoute" value="{{route('admin.blogs.reorder')}}">
    <input type="hidden" name="csrf-value" id="csrfValue" value="{{csrf_token()}}">
@endsection


