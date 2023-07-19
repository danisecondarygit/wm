<!-- needs category_id, attribute_group_id -->
<form method='POST' action="{{route('panel.categories.attribute-groups.attachment', ['category'=>$category_id, 'attribute_group'=>$attribute_group_id])}}">
    <button class='btn btn-sm btn-primary'>Attach</button>
</form>