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
        <div class="col col-12 col-sm-6">
            <div class="card">
                <div class="card-body m-auto">
                    <div class="row">
                        {!! Form::open(['route' => 'frontend.contact.send','method' => "POST"]) !!}
                        {!! Form::token(); !!}

                        <div class="col m-auto">
                            <div class="row">
                                <div class="col col-12 col-sm-6">
                                    <div class="form-group">
                                        {!! Form::label('first_name', 'First Name'); !!}
                                        {!! Form::text('first_name',null, ['class' => 'form-control', 'placeholder' => 'First Name', 'required' => 'required']); !!}
                                    </div>
                                </div>
                                <div class="col col-12 col-sm-6">
                                    <div class="form-group">
                                        {!! Form::label('last_name', 'Last Name'); !!}
                                        {!! Form::text('last_name',null, ['class' => 'form-control', 'placeholder' => 'Last Name', 'required' => 'required']); !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        {!! Form::label('email', 'Email'); !!}
                                        {!! Form::text('email',null, ['class' => 'form-control', 'placeholder' => 'Email', 'required' => 'required']); !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        {!! Form::label('message', 'Message'); !!}
                                        {!! Form::textarea('message',null, ['class' => 'form-control', 'placeholder' => 'Message', 'rows' => 5, 'required' => 'required']); !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col col-6 m-auto text-center">
                                    {!! Form::submit("Send", ['class' => 'btn btn-success']); !!}
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-scripts')

@endpush
