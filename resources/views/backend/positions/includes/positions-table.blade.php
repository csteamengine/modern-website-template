@push('before-styles')
    <link href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/rowreorder/1.2.7/css/rowReorder.dataTables.min.css" rel="stylesheet">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

@endpush
<table id="positionsTable" class="display reorder-table" style="width:100%">
    <thead>
    <tr>
        <th>Order</th>
        <th>ID</th>
        <th>Status</th>
        <th>Company</th>
        <th>Title</th>
        <th>Dates</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($positions as $position)
        <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$position->id}}</td>
            <td>
                {{Form::checkbox('is_active', true, $position->is_active, [
                        'data-id'=>$position->id,
                        'class' => 'switch-input',
                        'data-toggle'=>'toggle',
                        'data-onstyle' => 'success',
                        'data-route' => route('admin.positions.activate', $position)])}}
            </td>
            <td>{{$position->company}}</td>
            <td>{{$position->title}}</td>
            <td>{{$position->start_date}} - {{$position->end_date}}</td>
            <td>
                @include('backend.positions.includes.actions', $model = $position)
            </td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <th>Order</th>
        <th>ID</th>
        <th>Status</th>
        <th>Company</th>
        <th>Title</th>
        <th>Dates</th>
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
    <script src="{{ mix('js/backend/positions/positions.js') }}"></script>
    <script src="{{ mix('js/backend/includes/reorder.js') }}"></script>
@endpush
