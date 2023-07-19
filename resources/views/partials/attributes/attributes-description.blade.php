<!-- needs attributes -->
@if(!$attributes->isEmpty())
 <div class="d-flex align-items-center justify-content-center">
  @foreach($attributes as $attr)
   @include($attr->attribute_group->display_type_view_name, ['attribute'=>$attr, ])
   @if($loop->iteration < $attributes->count())
    ;&nbsp;
   @endif
  @endforeach  
 </div> 
@endif