{!! Form::model($theme, ['route' => [$route, $theme], 'method' => $method, 'files' => true]) !!}
    {!! Form::token(); !!}

    <div class="row mb-2">
        <div class="col col-3">
            <div class="form-group">
                {!! Form::label('is_maintenance_mode', 'Maintenance Mode'); !!}
                <div class="form-control-label">
                    <label class="c-switch c-switch-success c-switch-lg">
                        {!! Form::checkbox('is_maintenance_mode', true, $theme->is_maintenance_mode, [
                            'data-id'=>$theme->id,
                            'class' => 'status-input c-switch-input',
                            'data-toggle'=>'toggle',
                            'data-onstyle' => 'success',
                            ]) !!}
                        <span class="c-switch-slider"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="col col-3">
            <div class="form-group">
                {!! Form::label('contact_active', 'Contact Submission'); !!}
                <div class="form-control-label">
                    <label class="c-switch c-switch-success c-switch-lg">
                        {!! Form::checkbox('contact_active', true, $theme->contact_active, [
                            'data-id'=>$theme->id,
                            'class' => 'status-input c-switch-input',
                            'data-toggle'=>'toggle',
                            'data-onstyle' => 'success',
                            ]) !!}
                        <span class="c-switch-slider"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="col col-3">
            <div class="form-group">
                {!! Form::label('resume_active', 'Resume Download'); !!}
                <div class="form-control-label">
                    <label class="c-switch c-switch-success c-switch-lg">
                        {!! Form::checkbox('resume_active', true, $theme->resume_active, [
                            'data-id'=>$theme->id,
                            'class' => 'status-input c-switch-input',
                            'data-toggle'=>'toggle',
                            'data-onstyle' => 'success',
                            ]) !!}
                        <span class="c-switch-slider"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="col col-3">
            <div class="form-group">
                {!! Form::label('background_video_active', 'Background Video'); !!}
                <div class="form-control-label">
                    <label class="c-switch c-switch-success c-switch-lg">
                        {!! Form::checkbox('background_video_active', true, $theme->background_video_active, [
                            'data-id'=>$theme->id,
                            'class' => 'status-input c-switch-input',
                            'data-toggle'=>'toggle',
                            'data-onstyle' => 'success',
                            ]) !!}
                        <span class="c-switch-slider"></span>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col col-12 col-sm-2">
            <div class="form-group">
                {!! Form::label('is_active', 'Active', ['class' => 'form-control-label']); !!}
                <div class="form-control-label">
                    <label class="c-switch c-switch-success c-switch-lg">
                        {!! Form::checkbox('is_active', true, $theme->is_active, [
                            'data-id'=>$theme->id,
                            'class' => 'status-input c-switch-input',
                            'data-toggle'=>'toggle',
                            'data-onstyle' => 'success',
                            ]) !!}
                        <span class="c-switch-slider"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="col col-12 col-sm-10">
            <div class="form-group">
                {!! Form::label('title', 'Title'); !!}
                {!! Form::text('title',null, ['class' => 'form-control', 'placeholder' => 'Theme Title']); !!}
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col col-12 col-sm-4">
            <div class="form-group">
                {!! Form::label('first_name', 'First Name'); !!}
                {!! Form::text('first_name',null, ['class' => 'form-control', 'placeholder' => 'First Name']); !!}
            </div>
        </div>
        <div class="col col-12 col-sm-4">
            <div class="form-group">
                {!! Form::label('last_name', 'Last Name'); !!}
                {!! Form::text('last_name',null, ['class' => 'form-control', 'placeholder' => 'Last Name']); !!}
            </div>
        </div>
        <div class="col col-12 col-sm-4">
            <div class="form-group">
                {!! Form::label('email', 'Contact Email'); !!}
                {!! Form::email('email',null, ['class' => 'form-control', 'placeholder' => 'Contact Email']); !!}
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col">
            <div class="form-group">
                {!! Form::label('description', 'Description'); !!}
                {!! Form::text('description',null, ['class' => 'form-control', 'placeholder' => 'Description']); !!}
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col">
            <div class="form-group">
                {!! Form::label('page_content', 'Page Content'); !!}
                {!! Form::text('page_content',null, ['class' => 'form-control', 'placeholder' => 'Page Content']); !!}
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col col-6 col-sm-3">
            <div class="form-group">
                {!! Form::label('media-label',"Upload Media"); !!}
                <div class="custom-file">
                    {!! Form::label('media-label',"Upload Media", ['class' => 'custom-file-label']); !!}
                    {!! Form::file('media[]', ['class' => 'custom-file-input', 'multiple' => true]); !!}
                </div>
            </div>
        </div>
        <div class="col col-6 col-sm-3">
            <div class="form-group">
                {!! Form::label('resume-label',"Upload Resume"); !!}
                <div class="custom-file">
                    {!! Form::label('resume-label',"Upload Resume", ['class' => 'custom-file-label']); !!}
                    {!! Form::file('resume', ['class' => 'custom-file-input']); !!}
                </div>
            </div>
        </div>
        <div class="col col-6 col-sm-3">
            <div class="form-group">
                {!! Form::label('background-image-label',"Upload Background Image"); !!}
                <div class="custom-file">
                    {!! Form::label('background-image-label',"Upload Image", ['class' => 'custom-file-label']); !!}
                    {!! Form::file('background_image', ['class' => 'custom-file-input']); !!}
                </div>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                {!! Form::label('about-image-label',"Upload Image"); !!}
                <div class="custom-file">
                    {!! Form::label('about-image-label',"Upload About Image", ['class' => 'custom-file-label']); !!}
                    {!! Form::file('about_image', ['class' => 'custom-file-input']); !!}
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col col-4">
            <div class="form-group">
                {!! Form::label('primary_color', 'Primary Color'); !!}
                {!! Form::color('primary_color',null, ['class' => 'form-control', 'placeholder' => 'Contact Email']); !!}
            </div>
        </div>
        <div class="col col-4">
            <div class="form-group">
                {!! Form::label('secondary_color', 'Secondary Color'); !!}
                {!! Form::color('secondary_color',null, ['class' => 'form-control', 'placeholder' => 'Contact Email']); !!}
            </div>
        </div>
        <div class="col col-4">
            <div class="form-group">
                {!! Form::label('background_color', 'Background Color'); !!}
                {!! Form::color('background_color',null, ['class' => 'form-control', 'placeholder' => 'Contact Email']); !!}
            </div>
        </div>
    </div>
    <div class="row mb-4 mt-4">
        <div class="col text-center">
            {!! Form::submit($actionText, ['class' => 'btn btn-success']); !!}
        </div>
    </div>
{!! Form::close() !!}


