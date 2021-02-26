@push('before-styles')
@endpush
<table id="themesTable" class="display reorder-table table table-striped table-bordered" style="width:100%">
    <thead>
    <tr>
        <th>Order</th>
        <th>ID</th>
        <th>Status</th>
        <th>Title</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($themes as $theme)
        <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$theme->id}}</td>
            <td>
                {!! Form::model($theme, ['route' => ['admin.themes.activate', $theme], 'method' => 'POST', 'files' => false, 'class' => 'form-horizontal']) !!}
                <label class="c-switch c-switch-success">
                    {!! Form::checkbox('is_active', true, $theme->is_active, [
                        'data-id'=>$theme->id,
                        'class' => 'status-input c-switch-input',
                        'data-toggle'=>'toggle',
                        'data-onstyle' => 'success',
                        ]) !!}
                    <span class="c-switch-slider"></span>
                </label>
                {{Form::close()}}
            </td>
            <td>{{$theme->title}}</td>
            <td>
                @include('backend.themes.includes.actions', $model = $theme)
            </td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <th>Order</th>
        <th>ID</th>
        <th>Status</th>
        <th>Title</th>
        <th>Actions</th>
    </tr>
    </tfoot>
</table>

@push('after-scripts')
    <script src="{{ mix('js/backend/themes/themes.js') }}"></script>
    <script src="{{ mix('js/backend/includes/reorder.js') }}"></script>

@endpush
