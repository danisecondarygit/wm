@extends('layouts.panel')
@section('main')
<div class="my-1">
    @if(is_null($product->category))
    <div class="text-danger py-2 text-center">
        To assign attributes to product, The product must belong to a category
    </div>
    @else
    <h4>Attributes of product {{$product->title}}</h4>
    <hr>
    @if(session()->has('success_msg'))
     <div class="my-1">
        @include('partials.msg', ['msg'=>session()->get('success_msg'), 'type'=>'success'])
     </div>
    @endif
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center">
                        Attach/detach
                    </th>
                    <th class="text-center">#</th>
                    <th class="text-center">ID</th>
                    <th class="text-center">Title</th>
                    <th class="text-center">Display text</th>
                    <th class="text-center">Attribute group</th>
                </tr>
            </thead>
            <tbody>
                @foreach($attributes as $d)
                <tr>
                    <td class="text-center">
                        @if($data->pluck('attribute_id')->contains($d->getKey()))
                         @include('partials.product-attributes.simple-detach-form', 
                          ['product_id'=>$product->getKey(), 'attribute_id'=>$d->getKey(), ])
                        @else
                         @include('partials.product-attributes.simple-attach-form', 
                         ['product_id'=>$product->getKey(), 'attribute_id'=>$d->getKey(), ])
                        @endif
                    </td>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-center">{{$d->getKey()}}</td>
                    <td class="text-center">{{$d->title}}</td>
                    <td class="text-center">{{$d->display_text}}</td>
                    <td class="text-center">
                        {{$d->attribute_group->title}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
@endsection