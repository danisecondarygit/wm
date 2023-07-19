<!-- needs product_id, attribute_id -->
<form method='POST' action="{{route('panel.products.attributes.detachment', ['product'=>$product_id, 'attribute'=>$attribute_id])}}">
    @method('DELETE')
    <button class='btn btn-sm btn-danger'>Detach</button>
</form>