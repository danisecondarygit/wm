<!-- needs category_id, attribute_group_id -->
<form method='POST' action="{{route('panel.categories.attribute-groups.detachment', 
     ['category'=>$category_id, 'attribute_group'=>$attribute_group_id])}}">
    @method('DELETE')
    <button class='btn btn-sm btn-danger'>Detach</button>
</form>