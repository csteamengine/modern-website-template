<table id="sortableDataTable" class="display reorder-table table table-striped table-bordered" style="width:100%">
    <thead>
    <tr>
        <th>Order</th>
        <th>ID</th>
        <th>Status</th>
        <th>Image</th>
        <th>Title</th>
        <th>URL</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($links as $link)
        <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$link->id}}</td>
            <td>
                <label class="c-switch c-switch-success">
                    {!! Form::checkbox('is_active', true, $link->is_active, [
                        'data-id'=>$link->id,
                        'class' => 'status-input c-switch-input',
                        'data-toggle'=>'toggle',
                        'data-onstyle' => 'success',
                        'data-route' => route('admin.links.activate', $link)
                        ]) !!}
                    <span class="c-switch-slider"></span>
                </label>
            </td>
            <td>
                @if($link->image() != null)
                    <img src="{{$link->image()->getUrl(displayThumbnail($link->image()) ? "thumb" : "")}}"
                         style="height: 50px;"
                         alt="Image"
                         class="media-image"
                         data-placement="right"
                         data-html="true"
                         data-toggle="tooltip"
                         title="<img src='{{$link->image()->getUrl(displayThumbnail($link->image()) ? "thumb" : "")}}' width='100%' />">
                @endif
            </td>
            <td>{{$link->title}}</td>
            <td>{{$link->url}}</td>
            <td>
                @include('backend.links.includes.actions', $model = $link)
            </td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <th>Order</th>
        <th>ID</th>
        <th>Status</th>
        <th>Image</th>
        <th>Title</th>
        <th>URL</th>
        <th>Actions</th>
    </tr>
    </tfoot>
</table>
