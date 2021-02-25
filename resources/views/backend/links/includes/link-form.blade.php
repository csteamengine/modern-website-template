{!! Form::model($link, ['route' => [$route, $link], 'method' => $method, 'files' => true]) !!}
    {!! Form::token(); !!}

    <div class="row mb-2">
        <div class="col col-12 col-sm-2">
            <div class="form-group">
                {!! Form::label('is_active', 'Active', ['class' => 'form-control-label']); !!}
                <div class="form-control-label">
                    {!! Form::checkbox('is_active', true, $link->is_active, [
                        'data-id'=>$link->id,
                        'class' => 'status-input form-control',
                        'data-toggle'=>'toggle',
                        'data-onstyle' => 'success',
                        ]) !!}
                </div>
            </div>
        </div>
        <div class="col col-12 col-sm-10">
            {!! Form::label('title', 'Title'); !!}
            {!! Form::text('title',null, ['class' => 'form-control', 'placeholder' => 'Link Title']); !!}
        </div>
    </div>
    {!! Form::label('url', 'External URL'); !!}
    {!! Form::url('url',null, ['class' => 'form-control', 'placeholder' => 'External URL']); !!}

    {!! Form::label('description', 'Description'); !!}
    {!! Form::text('description',null, ['class' => 'form-control', 'placeholder' => 'Description']); !!}

    {!! Form::label('start_date', 'Start Date'); !!}
    {!! Form::dateTime('start_date',null, ['class' => 'form-control', 'placeholder' => 'Start Date']); !!}

    {!! Form::label('end_date', 'End Date'); !!}
    {!! Form::dateTime('end_date',null, ['class' => 'form-control', 'placeholder' => 'End Date']); !!}

    @if(isset($image))
        <img src="{{$image->getUrl()}}" class="img-thumbnail">
    @endif

    {!! Form::label('image',"Upload Thumbnail"); !!}
    {!! Form::file('image', ['class' => 'form-control-file', 'multiple' => false]); !!}

    <button class="btn btn-sm btn-success m-5" type="submit">{{$actionText}}</button>
{!! Form::close() !!}


