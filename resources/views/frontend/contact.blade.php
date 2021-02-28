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
                            <h3>Social Links</h3>
                        </div>
                        <div class="row">
                            <h3>Social Links</h3>
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
                                    Call Me
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-center">
                                    555-555-5555
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
                                    Email Me
                                </div>
                            </div>
                            <div class="row">
                                <div class="col m-auto text-center">
                                    email@email.com
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
                            <div class="row mb-2">
                                <div class="col col-12 col-sm-6">
                                    <div class="form-group">
                                        {!! Form::label('first_name', 'First Name'); !!}
                                        {!! Form::text('first_name',null, ['class' => 'form-control', 'placeholder' => 'First Name']); !!}
                                    </div>
                                </div>
                                <div class="col col-12 col-sm-6">
                                    <div class="form-group">
                                        {!! Form::label('last_name', 'Last Name'); !!}
                                        {!! Form::text('last_name',null, ['class' => 'form-control', 'placeholder' => 'Last Name']); !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-group">
                                        {!! Form::label('email', 'Email'); !!}
                                        {!! Form::text('email',null, ['class' => 'form-control', 'placeholder' => 'Email']); !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-group">
                                        {!! Form::label('description', 'Description'); !!}
                                        {!! Form::textarea('description',null, ['class' => 'form-control', 'placeholder' => 'Description', 'rows' => 5]); !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3 mt-3">
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
