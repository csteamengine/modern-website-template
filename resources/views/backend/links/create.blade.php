@extends('backend.layouts.app')

@section('title', __('labels.backend.links.management') . ' | ' . __('labels.backend.links.create'))

{{--@push('after-styles')--}}
{{--    {!! style('/css/backend/link.css') !!}--}}
{{--    {!! style('/css/backend/summernote.css') !!}--}}
{{--@endpush--}}

@push('before-scripts')
    {{--    <script src="/js/vendor.js"></script>--}}
@endpush


@section('content')
    @include('backend.links.includes.link-form', ['link' => new App\Models\link, 'action' => 'create', 'actionText' => 'Create link', 'method' => 'POST', 'route' => 'admin.links.store'])
@endsection


@push('after-scripts')
    <script src="{{mix('js/backend/links/link.js')}}"></script>
@endpush
