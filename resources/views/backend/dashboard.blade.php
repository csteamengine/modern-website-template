@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')
    <div class="row">
        <div class="col col-sm-6">
            <x-backend.card>
                <x-slot name="header">
                    @lang('Link Views')
                </x-slot>

                <x-slot name="body">
                    <canvas id="myChart" width="400" height="400" data-data="{{$visits}}" data-labels='["Red", "Blue", "Yellow", "Green", "Purple", "Orange"]'></canvas>
                </x-slot>
            </x-backend.card>
        </div>
        <div class="col col-sm-6">
            <x-backend.card>
                <x-slot name="header">
                    @lang('Blog Views')
                </x-slot>

                <x-slot name="body">
                    <canvas id="myChart" width="400" height="400" data-data="{{$visits}}" data-labels='["Red", "Blue", "Yellow", "Green", "Purple", "Orange"]'></canvas>
                </x-slot>
            </x-backend.card>
        </div>
    </div>
@endsection

@push('after-scripts')
    <script src="{{mix('js/backend/dashboard.js')}}"></script>
@endpush

