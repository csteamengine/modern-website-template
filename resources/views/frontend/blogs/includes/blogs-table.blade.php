@push('before-styles')
@endpush
<table id="blogsTable" class="display table table-striped table-bordered" style="width:100%">
    <thead>
    <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Tags</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($blogs as $blog)
        <tr>
            <td>{{$blog->title}}</td>
            <td>{{$blog->short_description}}</td>
            <td>{{$blog->tags}}</td>
            <td>
                @include('frontend.blogs.includes.actions', $model = $blog)
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@push('after-scripts')
@endpush
