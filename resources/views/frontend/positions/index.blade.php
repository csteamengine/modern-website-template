@extends('frontend.layouts.app')

@section('title', __('Career'))

@push('before-styles')

@endpush

@section('content')
    <div class="row">
        @foreach($positions as $position)
            <div class="col card col-3">
                <div class="card-body m-auto">
                    <h1>
                        <a href="{{route('frontend.positions.show', $position)}}">{{$position->title}}</a>
                    </h1>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@push('after-scripts')

@endpush
