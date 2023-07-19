<!-- needs product_id, attribute_id -->
<form action="{{route('panel.products.attributes.attachment', ['product'=>$product_id, 
    'attribute'=>$attribute_id])}}" method='POST'>
    <button class='btn btn-sm btn-primary'>Attach</button>
</form>