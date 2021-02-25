<x-utils.edit-button :href="route('admin.links.edit', $model)" />
{{--Might use this later for previewing a link--}}
{{--<x-utils.view-button :href="route('frontend.links.show', $model)" />--}}
<x-utils.delete-button :href="route('admin.links.destroy', $model)" />
