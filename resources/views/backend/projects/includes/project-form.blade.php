{!! Form::model($project, ['route' => [$route, $project], 'method' => $method, 'files' => true]) !!}
    {!! Form::token(); !!}

    {!! Form::label('title', 'Title'); !!}
    {!! Form::text('title',null, ['class' => 'form-control', 'placeholder' => 'Project Title']); !!}

    {!! Form::label('short_description', 'Short Description'); !!}
    {!! Form::text('short_description', null, ['class' => 'form-control', 'placeholder' => 'Short Description']); !!}

    {!! Form::label('description', 'Description'); !!}
    {!! Form::text('description',null, ['class' => 'form-control', 'placeholder' => 'Description']); !!}

    {!! Form::label('page_content', 'Page Content'); !!}
    {!! Form::text('page_content',null, ['class' => 'form-control', 'placeholder' => 'Page Content']); !!}

    {!! Form::label('external_url', 'External URL'); !!}
    {!! Form::url('external_url',null, ['class' => 'form-control', 'placeholder' => 'External URL']); !!}

    {!! Form::label('is_active', 'Active'); !!}
    {!! Form::checkbox('is_active',true, $project->is_active, ['class' => 'form-control', 'placeholder' => 'Active']); !!}

    {!! Form::label('started_at', 'Start Date'); !!}
    {!! Form::date('started_at',null, ['class' => 'form-control', 'placeholder' => 'Start Date']); !!}

    {!! Form::label('finished_at', 'End Date'); !!}
    {!! Form::date('finished_at',null, ['class' => 'form-control', 'placeholder' => 'End Date']); !!}

    @include('backend.projects.includes.media', ['project' => $project])

    {!! Form::submit($actionText, ['class' => 'form-control']); !!}
{!! Form::close() !!}

<input type="hidden" name="order-route" id="orderRoute" value="{{route('admin.projects.reorder-media', $project)}}">
<input type="hidden" name="csrf-value" id="csrfValue" value="{{csrf_token()}}">
