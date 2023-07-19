@extends('layouts.panel')
@section('main')
<div>
    <div class="card">
        <div class="card-header">
            New product
        </div>
        <div class="card-body">
            <form action="{{route('panel.product-save')}}" method='POST'>
                <div class="row">
                    <div class="col-md-6 col-12">
                        @include('partials.form-groups.string',
                        ['title'=>'Title', 'name'=>'title'])
                    </div>
                    <div class="col-md-6 col-12">
                      @include('partials.form-groups.model-select', [
                        'title'=>'Category', 'name'=>'category_id', 'data'=>$categories, 'text_field'=>'identifier_text'])
                    </div>
                    <div class="col-md-6 col-12">
                      @include('partials.form-groups.string', ['name'=>'price', 'title'=>'Price'])
                    </div>
                    <div class="col-md-12">
                      @include('partials.form-groups.text', ['name'=>'description', 'title'=>'Description'])
                    </div>
                </div>
                <div class="my-1"></div>
                <div class='row'>
                    <div class="col-md-6 col-12">
                        <button class='btn btn-primary'>
                            Create product
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection