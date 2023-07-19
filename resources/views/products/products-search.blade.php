@extends('layouts.front')
@section('main')
<div>
    <h4>Products</h4>
    <hr>
    @if(!$data->isEmpty())
    <div class="container">
        <div class="row">
            @foreach($data as $d)
            <div class="col-md-4 col-12 mb-1">
                @include('partials.products.list-item', ['product'=>$d, ])
            </div>
            @endforeach
        </div>
    </div>
    @else
    <div>
        No product was found
    </div>
    @endif
</div>
@endsection