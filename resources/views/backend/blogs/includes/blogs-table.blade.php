@push('before-styles')
@endpush
<table id="blogsTable" class="display reorder-table table table-striped table-bordered" style="width:100%">
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
    @foreach($blogs as $blog)
        <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$blog->id}}</td>
            <td>
                <label class="c-switch c-switch-success">
                    {!! Form::checkbox('is_active', true, $blog->is_active, [
                        'data-id'=>$blog->id,
                        'class' => 'status-input c-switch-input',
                        'data-toggle'=>'toggle',
                        'data-onstyle' => 'success',
                        'data-route' => route('admin.blogs.activate', $blog)
                        ]) !!}
                    <span class="c-switch-slider"></span>
                </label>
            </td>
            <td>{{$blog->title}}</td>
            <td>{{$blog->started_at}} - {{$blog->finished_at}}</td>
            <td>
                @include('backend.blogs.includes.actions', $model = $blog)
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
    <script src="{{ mix('js/backend/blogs/blogs.js') }}"></script>
    <script src="{{ mix('js/backend/includes/reorder.js') }}"></script>
    <script src="{{ mix('js/backend/includes/switch.js') }}"></script>
@endpush
