{!! Form::model($project, ['route' => [$route, $project],
                            'method' => $method,
                            'files' => true]) !!}
    {!! Form::token(); !!}

    <div class="row mb-2">
        <div class="col col-12 col-sm-2">
            <div class="form-group">
                {!! Form::label('is_active', 'Active', ['class' => 'form-control-label']); !!}
                <div class="form-control-label">
                    {!! Form::checkbox('is_active', true, $project->is_active, [
                        'data-id'=>$project->id,
                        'class' => 'status-input form-control',
                        'data-toggle'=>'toggle',
                        'data-onstyle' => 'success',
                        ]) !!}
                </div>
            </div>
        </div>
        <div class="col col-12 col-sm-10">
            {!! Form::label('title', 'Title'); !!}
            {!! Form::text('title',null, ['class' => 'form-control', 'placeholder' => 'Project Title']); !!}
        </div>
    </div>

    <div class="row mb-2">
        <div class="col">
            {!! Form::label('short_description', 'Short Description'); !!}
            {!! Form::text('short_description', null, ['class' => 'form-control', 'placeholder' => 'Short Description']); !!}
        </div>
    </div>

    <div class="row mb-2">
        <div class="col">
            {!! Form::label('external_url', 'External URL'); !!}
            {!! Form::url('external_url',null, ['class' => 'form-control', 'placeholder' => 'External URL']); !!}
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
        <div class="col col-6">
            {!! Form::label('started_at', 'Start Date'); !!}
            {!! Form::date('started_at',null, ['class' => 'form-control', 'placeholder' => 'Start Date']); !!}
        </div>
        <div class="col col-6">
            {!! Form::label('finished_at', 'End Date'); !!}
            {!! Form::date('finished_at',null, ['class' => 'form-control', 'placeholder' => 'End Date']); !!}
        </div>
    </div>

    <div class="row mb-2">
        <div class="col">
            {!! Form::label('media-label',"Upload Media"); !!}
            <div class="custom-file">
                {!! Form::label('media-label',"Upload Media", ['class' => 'custom-file-label']); !!}
                {!! Form::file('media[]', ['class' => 'custom-file-input', 'multiple' => true]); !!}
            </div>
        </div>
    </div>

    <div class="row mb-3 mt-3">
        <div class="col col-6 m-auto text-center">
            {!! Form::submit($actionText, ['class' => 'btn btn-success']); !!}
        </div>
    </div>
{!! Form::close() !!}
