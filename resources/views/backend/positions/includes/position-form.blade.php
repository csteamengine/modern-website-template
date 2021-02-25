{!! Form::model($position, ['route' => [$route, $position], 'method' => $method, 'files' => true]) !!}
    {!! Form::token(); !!}

    <div class="row mb-2">
        <div class="col col-12 col-sm-2">
            <div class="form-group">
                {!! Form::label('is_active', 'Active'); !!}
                <div class="form-control-label">
                    <label class="c-switch c-switch-success c-switch-lg">
                        {!! Form::checkbox('is_active', true, $position->is_active, [
                            'data-id'=>$position->id,
                            'class' => 'status-input c-switch-input mt-2',
                            'data-toggle'=>'toggle',
                            'data-onstyle' => 'success',
                            ]) !!}
                        <span class="c-switch-slider"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="col col-sm-10">
            <div class="form-group">
                {!! Form::label('media-label',"Upload Media"); !!}
                <div class="custom-file">
                    {!! Form::label('media-label',"Upload Media", ['class' => 'custom-file-label']); !!}
                    {!! Form::file('media[]', ['class' => 'custom-file-input', 'multiple' => true]); !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col col-12 col-sm-6">
            <div class="form-group">
                {!! Form::label('title', 'Title'); !!}
                {!! Form::text('title',null, ['class' => 'form-control', 'placeholder' => 'Position Title']); !!}
            </div>
        </div>
        <div class="col col-12 col-sm-6">
            <div class="form-group">
                {!! Form::label('company', 'Company'); !!}
                {!! Form::text('company',null, ['class' => 'form-control', 'placeholder' => 'Company']); !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col col-12 col-sm-6">
            <div class="form-group">
                {!! Form::label('external_url', 'External URL'); !!}
                {!! Form::url('external_url',null, ['class' => 'form-control', 'placeholder' => 'External URL']); !!}
            </div>
        </div>
        <div class="col col-12 col-sm-3">
            <div class="form-group">
                {!! Form::label('start_date', 'Start Date'); !!}
                {!! Form::date('start_date',null, ['class' => 'form-control', 'placeholder' => 'Start Date']); !!}
            </div>
        </div>
        <div class="col col-12 col-sm-3">
            <div class="form-group">
                {!! Form::label('end_date', 'End Date'); !!}
                {!! Form::date('end_date',null, ['class' => 'form-control', 'placeholder' => 'End Date']); !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-group">
                {!! Form::label('short_description', 'Short Description'); !!}
                {!! Form::text('short_description', null, ['class' => 'form-control', 'placeholder' => 'Short Description']); !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-group">
                {!! Form::label('description', 'Description'); !!}
                {!! Form::text('description',null, ['class' => 'form-control', 'placeholder' => 'Description']); !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-group">
                {!! Form::label('page_content', 'Page Content'); !!}
                {!! Form::text('page_content',null, ['class' => 'form-control', 'placeholder' => 'Page Content']); !!}
            </div>
        </div>
    </div>

    <div class="row mb-3 mt-3">
        <div class="col col-6 m-auto text-center">
            {!! Form::submit($actionText, ['class' => 'btn btn-success']); !!}
        </div>
    </div>
{!! Form::close() !!}

