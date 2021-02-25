{!! Form::model($link, ['route' => [$route, $link], 'method' => $method, 'files' => true]) !!}
    {!! Form::token(); !!}

    {!! Form::label('title', 'Title'); !!}
    {!! Form::text('title',null, ['class' => 'form-control', 'placeholder' => 'Link Title']); !!}

    {!! Form::label('url', 'External URL'); !!}
    {!! Form::url('url',null, ['class' => 'form-control', 'placeholder' => 'External URL']); !!}

    {!! Form::label('description', 'Description'); !!}
    {!! Form::text('description',null, ['class' => 'form-control', 'placeholder' => 'Description']); !!}

    {!! Form::label('is_active', 'Active'); !!}
    {!! Form::checkbox('is_active',true, $link->is_active, ['class' => 'form-control', 'placeholder' => 'Active']); !!}

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


