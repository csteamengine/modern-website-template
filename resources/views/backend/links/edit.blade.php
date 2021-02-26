@extends('backend.layouts.app')

@section('title', "Edit Link")

@push('before-scripts')
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
