<table id="sortableDataTable" class="display reorder-table" style="width:100%">
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
                {{Form::checkbox('is_active', true, $link->is_active, [
                        'data-id'=>$link->id,
                        'data-size'=>"large",
                        'class' => 'switch-input',
                        'data-toggle'=>'toggle',
                        'data-onstyle' => 'success',
                        'data-route' => route('admin.links.activate', $link)])}}
            </td>
            <td>
                @if($link->image() != null)
                    <img src="{{$link->image()->getUrl()}}"
                         style="height: 50px;"
                         alt="Image"
                         class="media-image"
                         data-placement="right"
                         data-html="true"
                         data-toggle="tooltip"
                         title="<img src='{{$link->image()->getUrl()}}' width='100%' />">
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
