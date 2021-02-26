
@push('before-styles')
@endpush

<table id="mediaTable" class="display table table-striped table-bordered" style="width:100%">
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
    @foreach($position->getMedia('images') as $media)
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
                @include('backend.positions.includes.media-actions', $model = $media)
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@push('after-scripts')
@endpush
