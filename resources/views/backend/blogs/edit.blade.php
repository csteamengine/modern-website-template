@extends('backend.layouts.app')

@section('title', __('labels.backend.blogs.management') . ' | ' . __('labels.backend.blogs.create'))

@push('before-scripts')
    {{--    <script src="/js/vendor.js"></script>--}}
@endpush


@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('blog Info')
        </x-slot>

        <x-slot name="body">
            @include('backend.blogs.includes.blog-form', ['blog' => $blog, 'action' => 'update', 'actionText' => 'Update blog', 'method' => 'PUT', 'route' => 'admin.blogs.update'])
            <hr>
            @include('backend.blogs.includes.media', ['blog' => $blog])
            <input type="hidden" name="order-route" id="orderRoute" value="{{route('admin.blogs.reorder-media', $blog)}}">
            <input type="hidden" name="csrf-value" id="csrfValue" value="{{csrf_token()}}">
        </x-slot>
    </x-backend.card>

@endsection

@push('after-scripts')
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script src="{{mix('js/backend/includes/forms.js')}}"></script>
    <script src="{{mix('js/backend/includes/media.js')}}"></script>
@endpush
