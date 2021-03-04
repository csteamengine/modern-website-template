@push('before-styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endpush

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
        <div class="col col-12 col-sm-5">
            <div class="form-group">
                {!! Form::label('title', 'Title'); !!}
                {!! Form::text('title',null, ['class' => 'form-control', 'placeholder' => 'Theme Title']); !!}
            </div>
        </div>
        <div class="col col-12 col-sm-5">
            <div class="form-group">
                {!! Form::label('phone', 'Phone Number'); !!}
                {!! Form::text('phone',null, ['class' => 'form-control', 'placeholder' => 'Phone Number']); !!}
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
        <div class="col col-6 col-sm-4">
            <div class="form-group">
                {!! Form::label('github_url', 'Github URL'); !!}
                {!! Form::url('github_url',null, ['class' => 'form-control', 'placeholder' => 'Github URL']); !!}
            </div>
        </div>
        <div class="col col-6 col-sm-4">
            <div class="form-group">
                {!! Form::label('facebook_url', 'Facebook URL'); !!}
                {!! Form::url('facebook_url',null, ['class' => 'form-control', 'placeholder' => 'Facebook URL']); !!}
            </div>
        </div>
        <div class="col col-6 col-sm-4">
            <div class="form-group">
                {!! Form::label('instagram_url', 'Instagram URL'); !!}
                {!! Form::url('instagram_url',null, ['class' => 'form-control', 'placeholder' => 'Instagram URL']); !!}
            </div>
        </div>
        <div class="col col-6 col-sm-4">
            <div class="form-group">
                {!! Form::label('twitter_url', 'Twitter URL'); !!}
                {!! Form::url('twitter_url',null, ['class' => 'form-control', 'placeholder' => 'Twitter URL']); !!}
            </div>
        </div>
        <div class="col col-6 col-sm-4">
            <div class="form-group">
                {!! Form::label('youtube_url', 'YouTube URL'); !!}
                {!! Form::url('youtube_url',null, ['class' => 'form-control', 'placeholder' => 'YouTube URL']); !!}
            </div>
        </div>
        <div class="col col-6 col-sm-4">
            <div class="form-group">
                {!! Form::label('tiktok_url', 'TikTok URL'); !!}
                {!! Form::url('tiktok_url',null, ['class' => 'form-control', 'placeholder' => 'TikTok URL']); !!}
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
                {!! Form::textarea('page_content',null, ['class' => 'form-control', 'placeholder' => 'Page Content', 'rows' => 10]); !!}
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col col-6">
            <div class="form-group">
                {!! Form::label('media-label',"Upload Media"); !!}
                <div class="custom-file">
                    {!! Form::label('media-label',"Upload Media", ['class' => 'custom-file-label']); !!}
                    {!! Form::file('media[]', ['class' => 'custom-file-input', 'multiple' => true]); !!}
                </div>
            </div>
        </div>
        <div class="col col-6">
            <div class="form-group">
                {!! Form::label('favicon-label',"Upload Favicon"); !!}
                <div class="custom-file">
                    {!! Form::label('favicon-label',"Upload Favicon", ['class' => 'custom-file-label']); !!}
                    {!! Form::file('favicon', ['class' => 'custom-file-input']); !!}
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col col-4 m-auto text-center " >
            <div class="form-group">
                {!! Form::label('background_image',"Background Image"); !!}
                {!! Form::file('background_image', ['hidden' => 'hidden', 'id' => 'backgroundInput']); !!}
                <div class="square img-thumbnail" role="button" data-trigger="#backgroundInput">
                    <div class="thumbnail-overlay img-thumbnail">
                        <div class="row h-100 m-auto">
                            <div class="col m-auto">
                                <i class="thumbnail-icon fas fa-edit fa-2x m-auto text-light"></i>
                            </div>
                        </div>
                    </div>
                    <div class="thumbnail img-thumbnail" style="background: url('{{$theme->background_image() != null ? $theme->background_image()->getUrl('thumb') : asset(getPlaceholder())}}') center center; background-size: cover">
                    </div>
                </div>
            </div>
        </div>
        <div class="col col-4 m-auto text-center " >
            <div class="form-group">
                {!! Form::label('about_image_label',"About Image"); !!}
                {!! Form::file('about_image', ['hidden' => 'hidden', 'id' => 'aboutInput']); !!}
                <div class="square img-thumbnail" role="button" data-trigger="#aboutInput">
                    <div class="thumbnail-overlay img-thumbnail">
                        <div class="row h-100 m-auto">
                            <div class="col m-auto">
                                <i class="thumbnail-icon fas fa-edit fa-2x m-auto text-light"></i>
                            </div>
                        </div>
                    </div>
                    <div class="thumbnail img-thumbnail" style="background: url('{{$theme->about_image() != null ? $theme->about_image()->getUrl('thumb') : asset(getPlaceholder())}}') center center; background-size: cover">
                    </div>
                </div>
            </div>
        </div>
        <div class="col col-4 m-auto text-center " >
            <div class="form-group">
                {!! Form::label('resume-label',"Resume"); !!}
                {!! Form::file('resume', ['hidden' => 'hidden', 'id' => 'resumeInput']); !!}
                <div class="square img-thumbnail" role="button" data-trigger="#resumeInput">
                    <div class="thumbnail-overlay img-thumbnail">
                        <div class="row h-100 m-auto">
                            <div class="col m-auto">
                                <i class="thumbnail-icon fas fa-edit fa-2x m-auto text-light"></i>
                            </div>
                        </div>
                    </div>
                    <div class="thumbnail img-thumbnail" style="background: url('{{$theme->resume() != null ? $theme->resume()->getUrl('thumb') : asset(getPlaceholder())}}') center center; background-size: cover">
                    </div>
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

@push('after-scripts')
    <script src="{{mix('js/backend/includes/forms.js')}}"></script>
@endpush
