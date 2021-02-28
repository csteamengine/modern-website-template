@push('before-styles')
@endpush
<table id="projectsTable" class="display reorder-table table table-striped table-bordered" style="width:100%">
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
    <script src="{{ mix('js/backend/projects/projects.js') }}"></script>
    <script src="{{ mix('js/backend/includes/reorder.js') }}"></script>
    <script src="{{ mix('js/backend/includes/switch.js') }}"></script>
@endpush
