{!! Form::open(['route' => 'frontend.contact.send','method' => "POST"]) !!}
{!! Form::token(); !!}

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

@if(config('boilerplate.access.captcha.contact'))
    <div class="row">
        <div class="col">
            @captcha
            <input type="hidden" name="captcha_status" value="true" />
        </div><!--col-->
    </div><!--row-->
@endif

<div class="row">
    <div class="col col-6 m-auto text-center">
        {!! Form::submit("Send", ['class' => 'btn btn-success']); !!}
    </div>
</div>
{!! Form::close() !!}

