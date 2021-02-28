@extends('frontend.layouts.app')

@section('title', __('Projects'))

@push('before-styles')

@endpush

@section('content')
    <div class="row mt-5">
        <div class="col col-12 col-sm-6">
            <div class="row">
                <div class="col card">
                    <div class="card-body m-auto">
                        <div class="row">
                            <div class="col m-auto text-center">
                                <h3>Social Links</h3>
                            </div>
                        </div>
                        <div class="row mt-2 justify-content-center">
                            @if(isset($active_theme->twitter_url))
                                <div class="col">
                                    <a href="{{$active_theme->twitter_url}}">
                                        <i class="fab fa-twitter fa-3x"></i>
                                    </a>
                                </div>
                            @endif
                            @if(isset($active_theme->instagram_url))
                                <div class="col">
                                    <a href="{{$active_theme->instagram_url}}">
                                        <i class="fab fa-instagram fa-3x"></i>
                                    </a>
                                </div>
                            @endif
                            @if(isset($active_theme->facebook_url))
                                <div class="col">
                                    <a href="{{$active_theme->facebook_url}}">
                                        <i class="fab fa-facebook fa-3x"></i>
                                    </a>
                                </div>
                            @endif
                            @if(isset($active_theme->youtube_url))
                                <div class="col">
                                    <a href="{{$active_theme->youtube_url}}">
                                        <i class="fab fa-youtube fa-3x"></i>
                                    </a>
                                </div>
                            @endif
                            @if(isset($active_theme->github_url))
                                <div class="col">
                                    <a href="{{$active_theme->github_url}}">
                                        <i class="fab fa-github fa-3x"></i>
                                    </a>
                                </div>
                            @endif
                            @if(isset($active_theme->tiktok_url))
                                <div class="col">
                                    <a href="{{$active_theme->tiktok_url}}">
                                        <i class="fab fa-tiktok fa-3x"></i>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
            <div class="row mt-3">
                <div class="col col-6 pl-0">
                    <div class="card">
                        <div class="card-body">
                            <div class="row m">
                                <div class="col text-center">
                                    <i class="fas fa-phone fa-3x"></i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-center">
                                    <h3>Call Me</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-center">
                                    {{$active_theme->phone}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-6 pr-0">
                    <div class="card">
                        <div class="card-body m-auto">
                            <div class="row">
                                <div class="col m-auto text-center">
                                    <i class="fas fa-envelope fa-3x"></i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col m-auto text-center">
                                    <h3>Email Me</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col m-auto text-center">
                                    {{$active_theme->email}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if($active_theme->contact_active)
            <div class="col col-12 col-sm-6">
                <div class="card">
                    <div class="card-body m-auto">
                        @include('frontend.includes.contact_form')
                    </div>
                </div>
            </div>
        @endif

    </div>
@endsection

@push('after-scripts')

@endpush
