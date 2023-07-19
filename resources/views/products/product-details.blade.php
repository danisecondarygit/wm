@extends('layouts.front')
@section('main')
<div>
    <div class="container py-3">
        <div class="row">
            <div class="col-md-4 col-12">
                <h4>Product information</h4>
                <hr>
                <dl>
                    <dt>Title</dt>
                    <dd>{{$product->title}}</dd>
                    <dt>Price</dt>
                    <dd>{{get_printable_price_in_toman($product->price)}}</dd>
                    @if(!empty($product->description))
                    <dt>Description</dt>
                    <dd>{!!$product->description!!}</dd>
                    @endif
                </dl>
            </div>
            @if(!$similars_or_variations->isEmpty())
            <div class="col-md-8 col-12">
                <h4>
                    @if($product->can_have_similars)
                    Similar products
                    @else
                    Variations
                    @endif
                </h4>
                <hr>
                <div>
                    <table class='table'>
                        <thead>
                            <tr>
                                <th class="text-center">Title</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Attributes</th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($similars_or_variations as $p)
                            <tr>
                                <td class="text-center">{{$p->title}}</td>
                                <td class="text-center">{{get_printable_price_in_toman($p->price)}}</td>
                                <td class="text-center">
                                    @include('partials.attributes.attributes-description', [
                                    'attributes'=>$p->attributes_relation, ])
                                </td>
                                <td class="text-center">
                                    <a href="{{$p->details_url}}" title='View details'
                                        class='btn btn-info btn-sm text-white'>
                                        <span class="fa fa-eye"></span>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection