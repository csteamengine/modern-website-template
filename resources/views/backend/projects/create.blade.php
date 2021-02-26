@extends('backend.layouts.app')

@section('title', __('labels.backend.projects.management') . ' | ' . __('labels.backend.projects.create'))

@push('before-styles')
@endpush

@push('before-scripts')
    {{--    <script src="/js/vendor.js"></script>--}}
@endpush


@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Project Info')
        </x-slot>

        <x-slot name="body">
            @include('backend.projects.includes.project-form', ['project' => new App\Models\Project, 'action' => 'create', 'actionText' => 'Create Project', 'method' => 'POST', 'route' => 'admin.projects.store'])
        </x-slot>
    </x-backend.card>
@endsection

@push('after-scripts')
    <script src="{{mix('js/backend/includes/forms.js')}}"></script>
@endpush
