@push('before-styles')
    <link href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/rowreorder/1.2.7/css/rowReorder.dataTables.min.css" rel="stylesheet">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

@endpush
<table id="themesTable" class="display reorder-table" style="width:100%">
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
                {{Form::checkbox('is_active', true, $theme->is_active, [
                        'data-id'=>$theme->id,
                        'class' => 'status-input',
                        'data-toggle'=>'toggle',
                        'data-onstyle' => 'success',
                        ])}}
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
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    {{--    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>--}}
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script src="{{ mix('js/backend/themes/themes.js') }}"></script>
    <script src="{{ mix('js/backend/includes/reorder.js') }}"></script>

@endpush
