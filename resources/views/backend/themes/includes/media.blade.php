@push('before-styles')
    <link href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/rowreorder/1.2.7/css/rowReorder.dataTables.min.css" rel="stylesheet">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endpush

<table id="mediaTable" class="display" style="width:100%">
    <thead>
    <tr>
        <th>Order</th>
        <th>ID</th>
        <th>Image</th>
        <th>Filename</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($theme->getMedia('images') as $media)
        <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$media->id}}</td>
            <td>
                <img src="{{$media->getUrl()}}"
                     style="width: 50px;"
                     alt="Image"
                     class="media-image"
                     data-placement="right"
                     data-html="true"
                     data-toggle="tooltip"
                     title="<img src='{{$media->getUrl()}}' width='100%' />">
            </td>
            <td>{{$media->name}}</td>
            <td>
                @include('backend.themes.includes.media-actions', $model = $media)
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@push('after-scripts')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@endpush
