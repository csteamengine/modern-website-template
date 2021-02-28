@extends('backend.layouts.app')

@section('title', __('labels.backend.blogs.management') . ' | ' . __('labels.backend.blogs.create'))

@push('before-styles')
@endpush

@push('before-scripts')
    {{--    <script src="/js/vendor.js"></script>--}}
@endpush


@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('blog Info')
        </x-slot>

        <x-slot name="body">
            @include('backend.blogs.includes.blog-form', ['blog' => new App\Models\blog, 'action' => 'create', 'actionText' => 'Create blog', 'method' => 'POST', 'route' => 'admin.blogs.store'])
        </x-slot>
    </x-backend.card>
@endsection

@push('after-scripts')
    <script src="{{mix('js/backend/includes/forms.js')}}"></script>
@endpush
