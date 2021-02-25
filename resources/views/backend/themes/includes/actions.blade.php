<x-utils.edit-button :href="route('admin.themes.edit', $model)" />
{{--Might use this later for previewing a theme--}}
{{--<x-utils.view-button :href="route('frontend.themes.show', $model)" />--}}
<x-utils.delete-button :href="route('admin.themes.destroy', $model)" />
