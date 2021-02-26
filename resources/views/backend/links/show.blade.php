@extends('backend.layouts.app')

@section('title', __('Link Management'))

@push('after-styles')
@endpush

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="card">
                    <div class="card-header">Link Analytics
                        <div class="card-header-actions">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="c-chart-wrapper">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas id="link-analytics" style="display: block; width: 100%;" width="758"
                                    height="378" class="chartjs-render-monitor"></canvas>
                            <div id="chart-data" data-visits="{{$visits}}" hidden></div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--card-body-->
    </div><!--card-->

    <input type="hidden" name="order-route" id="orderRoute" value="{{route('admin.links.reorder')}}">
    <input type="hidden" name="csrf-value" id="csrfValue" value="{{csrf_token()}}">
@endsection
@push('after-scripts')
    <script src="{{ mix('js/backend/links/show.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>
@endpush
