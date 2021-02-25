@push('before-styles')
    <link href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/rowreorder/1.2.7/css/rowReorder.dataTables.min.css" rel="stylesheet">

@endpush
<table id="projectsTable" class="display reorder-table" style="width:100%">
    <thead>
    <tr>
        <th>Order</th>
        <th>ID</th>
        <th>Status</th>
        <th>Title</th>
        <th>Start Date</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($projects as $project)
        <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$project->id}}</td>
            <td>
                <label class="c-switch c-switch-success">
                    {!! Form::checkbox('is_active', true, $project->is_active, [
                        'data-id'=>$project->id,
                        'class' => 'status-input c-switch-input',
                        'data-toggle'=>'toggle',
                        'data-onstyle' => 'success',
                        'data-route' => route('admin.projects.activate', $project)
                        ]) !!}
                    <span class="c-switch-slider"></span>
                </label>
            </td>
            <td>{{$project->title}}</td>
            <td>{{$project->started_at}} - {{$project->finished_at}}</td>
            <td>
                @include('backend.projects.includes.actions', $model = $project)
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
        <th>Start Date</th>
        <th>Actions</th>
    </tr>
    </tfoot>
</table>

@push('after-scripts')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    {{--    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>--}}
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
    <script src="{{ mix('js/backend/projects/projects.js') }}"></script>
    <script src="{{ mix('js/backend/includes/reorder.js') }}"></script>
    <script src="{{ mix('js/backend/includes/switch.js') }}"></script>
@endpush
