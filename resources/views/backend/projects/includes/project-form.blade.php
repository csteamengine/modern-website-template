@push('before-styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endpush


{!! Form::model($project, ['route' => [$route, $project],
                            'method' => $method,
                            'files' => true]) !!}
    {!! Form::token(); !!}

    <div class="row mb-2">
        <div class="col col-12 col-sm-2">
            <div class="form-group">
                {!! Form::label('is_active', 'Active', ['class' => 'form-control-label']); !!}
                <div class="form-control-label">
                    <label class="c-switch c-switch-success c-switch-lg">
                        {!! Form::checkbox('is_active', true, $project->is_active, [
                            'data-id'=>$project->id,
                            'data-size'=>"large",
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
                {!! Form::text('title',null, ['class' => 'form-control', 'placeholder' => 'Project Title']); !!}
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col">
            <div class="form-group">
                {!! Form::label('short_description', 'Short Description'); !!}
                {!! Form::text('short_description', null, ['class' => 'form-control', 'placeholder' => 'Short Description']); !!}
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col">
            <div class="form-group">
                {!! Form::label('external_url', 'External URL'); !!}
                {!! Form::url('external_url',null, ['class' => 'form-control', 'placeholder' => 'External URL']); !!}
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

    <div class="row mb-2">
        <div class="col">
            <div class="form-group">
                {!! Form::label('page_content', 'Page Content'); !!}
                {!! Form::textarea('page_content',null, ['class' => 'form-control', 'id' => 'page_content', 'placeholder' => 'Page Content', 'rows' => 10]); !!}
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col col-6">
            <div class="form-group">
                {!! Form::label('started_at', 'Start Date'); !!}
                {!! Form::date('started_at',null, ['class' => 'form-control', 'placeholder' => 'Start Date']); !!}
            </div>
        </div>
        <div class="col col-6">
            <div class="form-group">
                {!! Form::label('finished_at', 'End Date'); !!}
                {!! Form::date('finished_at',null, ['class' => 'form-control', 'placeholder' => 'End Date']); !!}
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col">
            <div class="form-group">
                {!! Form::label('media-label',"Upload Media"); !!}
                <div class="custom-file">
                    {!! Form::label('media-label',"Upload Media", ['class' => 'custom-file-label']); !!}
                    {!! Form::file('media[]', ['class' => 'custom-file-input', 'multiple' => true]); !!}
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-3 mt-3">
        <div class="col col-6 m-auto text-center">
            {!! Form::submit($actionText, ['class' => 'btn btn-success']); !!}
        </div>
    </div>
{!! Form::close() !!}

@push('after-scripts')
    <script src="{{mix('js/backend/includes/forms.js')}}"></script>
@endpush
