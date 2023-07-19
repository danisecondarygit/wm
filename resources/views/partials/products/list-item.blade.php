<!-- needs product -->
<div class="card">
    <div class="card-header">
        <h5>{{$product->title}}</h5>
    </div>
    <div class="card-body">
      <dl>
        <dt>Price</dt>
        <dd>{{get_printable_price_in_toman($product->price)}}</dd>
        <dt>Description</dt>
        <dd>{{$product->description}}</dd>
      </dl>
    </div>
    <div class="card-footer">
        <a href="{{$product->details_url}}" class='text-decoration-none text-capitalize card-link'>
            View details
        </a>
    </div>
</div>