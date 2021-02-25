@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.links.index'))

@push('before-styles')
    {{ style(mix('css/frontend/links/index.css')) }}
@endpush

@section('content')
    <div class="row mt-5">
        <div class="col-12 ml-auto mr-auto text-center mt-5">
            <h1 class="m-auto">Links</h1>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-8 col-sm-6 m-auto text-center p-0">
            <div class="row m-auto">
                <div class="col-4">
                    <a href="{{$active_profile->youtube_url}}" target="_blank">
                        <i class="fab fa-3x fa-youtube sm-icons"></i>
                    </a>
                </div>
                <div class="col-4">
                    <a href="{{$active_profile->instagram_url}}" target="_blank">
                        <i class="fab fa-3x fa-instagram sm-icons"></i>
                    </a>
                </div>
                <div class="col-4">
                    <a href="{{$active_profile->github_url}}" target="_blank">
                        <i class="fab fa-3x fa-github sm-icons"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div id="links" class="content-sections row text-center w-100 p-0 mr-0 ml-0 justify-content-center">
        <div class="col position-relative">
            <div class="row justify-content-center mt-5">
                @foreach($links as $link)
                    @if($link->image())
                        <div class="col mb-5">
                            <div class="link-bg row m-auto">
                                <div class="link-bg-image"
                                     data-image="{{asset('storage/'.$link->image()->small_url)}}"
                                     style="background-color: #{{$link->image()->color}}">
                                </div>
                                <a href="{{route('frontend.links.show', $link)}}" target="_blank">
                                    <div class="link-overlay">
                                        <div class="link-text row m-auto h-100">
                                            <div class="col m-auto">
                                                <h3 class="link-title" v-cloak>{{$link->title}}</h3>
                                                <h5 class="link-description">{{$link->description}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

        </div>
    </div>
@endsection

@push('after-scripts')
    {{script('js/links.js')}}
@endpush
