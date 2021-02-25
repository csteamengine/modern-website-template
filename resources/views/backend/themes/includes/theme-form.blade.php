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
    {!! Form::checkbox('is_active', true, $theme->is_active, [
                    'data-id'=>$theme->id,
                    'class' => 'status-input',
                    'data-toggle'=>'toggle',
                    'data-onstyle' => 'success',
                    ]) !!}

    {!! Form::label('media-label',"Upload Media"); !!}
    {!! Form::file('media[]', ['class' => 'form-control-file', 'multiple' => true]); !!}

    {!! Form::label('resume-label',"Upload Resume"); !!}
    {!! Form::file('resume', ['class' => 'form-control-file', 'multiple' => false]); !!}

    {!! Form::label('media-label',"Upload Background Image"); !!}
    {!! Form::file('background_image', ['class' => 'form-control-file', 'multiple' => false]); !!}

    {!! Form::label('media-label',"Upload About Image"); !!}
    {!! Form::file('about_image', ['class' => 'form-control-file', 'multiple' => false]); !!}

    {!! Form::label('primary_color', 'Primary Color'); !!}
    {!! Form::color('primary_color',null, ['class' => 'form-control', 'placeholder' => 'Contact Email']); !!}

    {!! Form::label('secondary_color', 'Secondary Color'); !!}
    {!! Form::color('secondary_color',null, ['class' => 'form-control', 'placeholder' => 'Contact Email']); !!}

    {!! Form::label('background_color', 'Background Color'); !!}
    {!! Form::color('background_color',null, ['class' => 'form-control', 'placeholder' => 'Contact Email']); !!}


    {!! Form::label('is_maintenance_mode', 'Maintenance Mode'); !!}
    {!!Form::checkbox('is_maintenance_mode', true, $theme->is_maintenance_mode, [
                    'data-id'=>$theme->id,
                    'class' => 'status-input',
                    'data-toggle'=>'toggle',
                    'data-onstyle' => 'success',
                    ])!!}

    {!! Form::label('contact_active', 'Contact Submission'); !!}
    {!!Form::checkbox('contact_active', true, $theme->contact_active, [
                            'data-id'=>$theme->id,
                            'class' => 'status-input',
                            'data-toggle'=>'toggle',
                            'data-onstyle' => 'success',
                            ])!!}

    {!! Form::label('resume_active', 'Resume Download'); !!}
    {!!Form::checkbox('resume_active', true, $theme->resume_active, [
                            'data-id'=>$theme->id,
                            'class' => 'status-input',
                            'data-toggle'=>'toggle',
                            'data-onstyle' => 'success',
                            ])!!}

    {!! Form::label('background_video_active', 'Background Video'); !!}
    {!!Form::checkbox('background_video_active', true, $theme->background_video_active, [
                            'data-id'=>$theme->id,
                            'class' => 'status-input',
                            'data-toggle'=>'toggle',
                            'data-onstyle' => 'success',
                            ])!!}

    <button class="btn btn-sm btn-success m-5" type="submit">{{$actionText}}</button>
{!! Form::close() !!}


