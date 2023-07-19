@extends('layouts.panel')
@section('main')
<div>
    @if(session()->has('success_msg'))
     @include('partials.msg', ['type'=>'success', 'msg'=>session()->get('success_msg')])
    @endif
    <div class="card">
        <div class="card-header">New category</div>
        <div class="card-body">
            <form action="{{route('panel.category-save')}}" method='POST'>
                <div class="row">
                    <div class="col-md-6 col-12">
                        @include('partials.form-groups.string',
                        ['title'=>'title', 'name'=>'title'])
                    </div>
                    <div class="col-md-6 col-12">
                        @include('partials.form-groups.model-select', ['data'=>$categories, 
                        'text_field'=>'identifier_text', 'name'=>'parent_id', 'title'=>'Parent category'])
                    </div>
                </div>
                <div class="my-1"></div>
                <div class="row">
                    <div class="col-md-6 col-12">
                     <button class='btn btn-primary'>Create category</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection