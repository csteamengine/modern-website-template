<button type="button"
        class="btn btn-primary btn-sm media-copy-button"
        data-clipboard-text="{{$current->getUrl()}}"
        data-toggle="tooltip"
        data-placement="top"
        title="Copy URL">
    <i class="fas fa-copy"></i>
</button>
<span class="btn btn-danger btn-sm ">
    <i class="fas fa-trash media-delete-button" data-action="{{route($deleteRoute, $current)}}"></i>
</span>
