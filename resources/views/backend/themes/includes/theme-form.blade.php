{!! Form::model($theme, ['route' => [$route, $theme], 'method' => $method, 'files' => true]) !!}
    {!! Form::token(); !!}

    {!! Form::label('title', 'Title'); !!}
    {!! Form::text('title',null, ['class' => 'form-control', 'placeholder' => 'Theme Title']); !!}

    {!! Form::label('first_name', 'First Name'); !!}
    {!! Form::text('first_name',null, ['class' => 'form-control', 'placeholder' => 'First Name']); !!}

    {!! Form::label('last_name', 'Last Name'); !!}
    {!! Form::text('last_name',null, ['class' => 'form-control', 'placeholder' => 'Last Name']); !!}

    {!! Form::label('description', 'Description'); !!}
    {!! Form::text('description',null, ['class' => 'form-control', 'placeholder' => 'Description']); !!}

    {!! Form::label('page_content', 'Page Content'); !!}
    {!! Form::text('page_content',null, ['class' => 'form-control', 'placeholder' => 'Page Content']); !!}

    {!! Form::label('email', 'Contact Email'); !!}
    {!! Form::email('email',null, ['class' => 'form-control', 'placeholder' => 'Contact Email']); !!}

    {!! Form::label('is_active', 'Active'); !!}
    {!! Form::checkbox('is_active',true, $theme->is_active, ['class' => 'form-control', 'placeholder' => 'Active']); !!}

    {!! Form::label('media-label',"Upload Media"); !!}
    {!! Form::file('media[]', ['class' => 'form-control-file', 'multiple' => true]); !!}

    {!! Form::label('resume-label',"Upload Resume"); !!}
    {!! Form::file('resume', ['class' => 'form-control-file', 'multiple' => false]); !!}

    {!! Form::label('media-label',"Upload Background Image"); !!}
    {!! Form::file('background_image', ['class' => 'form-control-file', 'multiple' => false]); !!}

    {!! Form::label('media-label',"Upload About Image"); !!}
    {!! Form::file('about_image', ['class' => 'form-control-file', 'multiple' => false]); !!}

    <button class="btn btn-sm btn-success m-5" type="submit">{{$actionText}}</button>
{!! Form::close() !!}


