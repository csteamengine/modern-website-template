{!! Form::model($theme, ['route' => [$route, $theme], 'method' => $method, 'files' => true]) !!}
    {!! Form::token(); !!}

    <div class="row mb-2">
        <div class="col col-3">
            {!! Form::label('is_maintenance_mode', 'Maintenance Mode'); !!}
            {!!Form::checkbox('is_maintenance_mode', true, $theme->is_maintenance_mode, [
                            'data-id'=>$theme->id,
                            'data-size'=>"large",
                            'class' => 'status-input',
                            'data-toggle'=>'toggle',
                            'data-onstyle' => 'success',
                            ])!!}
        </div>
        <div class="col col-3">
            {!! Form::label('contact_active', 'Contact Submission'); !!}
            {!!Form::checkbox('contact_active', true, $theme->contact_active, [
                            'data-id'=>$theme->id,
                            'data-size'=>"large",
                            'class' => 'status-input',
                            'data-toggle'=>'toggle',
                            'data-onstyle' => 'success',
                            ])!!}
        </div>
        <div class="col col-3">
            {!! Form::label('resume_active', 'Resume Download'); !!}
            {!!Form::checkbox('resume_active', true, $theme->resume_active, [
                            'data-id'=>$theme->id,
                            'data-size'=>"large",
                            'class' => 'status-input',
                            'data-toggle'=>'toggle',
                            'data-onstyle' => 'success',
                            ])!!}
        </div>
        <div class="col col-3">
            {!! Form::label('background_video_active', 'Background Video'); !!}
            {!!Form::checkbox('background_video_active', true, $theme->background_video_active, [
                            'data-id'=>$theme->id,
                            'data-size'=>"large",
                            'class' => 'status-input',
                            'data-toggle'=>'toggle',
                            'data-onstyle' => 'success',
                            ])!!}
        </div>
    </div>

    <div class="row mb-2">
        <div class="col col-12 col-sm-2">
            <div class="form-group">
                {!! Form::label('is_active', 'Active', ['class' => 'form-control-label']); !!}
                <div class="form-control-label checkbox">
                    {!! Form::checkbox('is_active', true, $theme->is_active, [
                            'data-id'=>$theme->id,
                            'data-size'=>"large",
                            'class' => 'status-input',
                            'data-toggle'=>'toggle',
                            'data-onstyle' => 'success',
                            ]) !!}
                </div>
            </div>
        </div>
        <div class="col col-12 col-sm-10">
            {!! Form::label('title', 'Title'); !!}
            {!! Form::text('title',null, ['class' => 'form-control', 'placeholder' => 'Theme Title']); !!}
        </div>
    </div>

    <div class="row mb-2">
        <div class="col col-12 col-sm-4">
            {!! Form::label('first_name', 'First Name'); !!}
            {!! Form::text('first_name',null, ['class' => 'form-control', 'placeholder' => 'First Name']); !!}
        </div>
        <div class="col col-12 col-sm-4">
            {!! Form::label('last_name', 'Last Name'); !!}
            {!! Form::text('last_name',null, ['class' => 'form-control', 'placeholder' => 'Last Name']); !!}
        </div>
        <div class="col col-12 col-sm-4">
            {!! Form::label('email', 'Contact Email'); !!}
            {!! Form::email('email',null, ['class' => 'form-control', 'placeholder' => 'Contact Email']); !!}
        </div>
    </div>

    <div class="row mb-2">
        <div class="col">
            {!! Form::label('description', 'Description'); !!}
            {!! Form::text('description',null, ['class' => 'form-control', 'placeholder' => 'Description']); !!}
        </div>
    </div>

    <div class="row mb-2">
        <div class="col">
            {!! Form::label('page_content', 'Page Content'); !!}
            {!! Form::text('page_content',null, ['class' => 'form-control', 'placeholder' => 'Page Content']); !!}
        </div>
    </div>
    <div class="row mb-2">
        <div class="col col-6 col-sm-3">
            {!! Form::label('media-label',"Upload Media"); !!}
            <div class="custom-file">
                {!! Form::label('media-label',"Upload Media", ['class' => 'custom-file-label']); !!}
                {!! Form::file('media[]', ['class' => 'form-control-file', 'multiple' => true]); !!}
            </div>
        </div>
        <div class="col col-6 col-sm-3">
            {!! Form::label('resume-label',"Upload Resume"); !!}
            <div class="custom-file">
                {!! Form::label('resume-label',"Upload Resume", ['class' => 'custom-file-label']); !!}
                {!! Form::file('resume', ['class' => 'form-control-file', 'multiple' => false]); !!}
            </div>
        </div>
        <div class="col col-6 col-sm-3">
            {!! Form::label('background-image-label',"Upload Background Image"); !!}
            <div class="custom-file">
                {!! Form::label('background-image-label',"Upload Image", ['class' => 'custom-file-label']); !!}
                {!! Form::file('background_image', ['class' => 'form-control-file', 'multiple' => false]); !!}
            </div>
        </div>
        <div class="col">
            {!! Form::label('about-image-label',"Upload Image"); !!}
            <div class="custom-file">
                {!! Form::label('about-image-',"Upload About Image", ['class' => 'custom-file-label']); !!}
                {!! Form::file('about_image', ['class' => 'form-control-file', 'multiple' => false]); !!}
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col col-4">
            {!! Form::label('primary_color', 'Primary Color'); !!}
            {!! Form::color('primary_color',null, ['class' => 'form-control', 'placeholder' => 'Contact Email']); !!}
        </div>
        <div class="col col-4">
            {!! Form::label('secondary_color', 'Secondary Color'); !!}
            {!! Form::color('secondary_color',null, ['class' => 'form-control', 'placeholder' => 'Contact Email']); !!}
        </div>
        <div class="col col-4">
            {!! Form::label('background_color', 'Background Color'); !!}
            {!! Form::color('background_color',null, ['class' => 'form-control', 'placeholder' => 'Contact Email']); !!}
        </div>
    </div>
    <div class="row mb-4 mt-4">
        <div class="col text-center">
            {!! Form::submit($actionText, ['class' => 'btn btn-success']); !!}
        </div>
    </div>
{!! Form::close() !!}


