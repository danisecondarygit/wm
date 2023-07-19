@extends('layouts.panel')
@section('main')
<div>
    <div class="card">
        <div class="card-header">
            New attribute group
        </div>
        <div class="card-body">
            <form action="{{route('panel.attribute-group-save')}}" method='POST'>
                <div class="row">
                    <div class="col-md-6 col-12">
                        @include('partials.form-groups.string', ['name'=>'title', 'title'=>'Title'])
                    </div>
                    <div class="col-md-6 col-12">
                        @include('partials.form-groups.string', ['name'=>'display_text', 'title'=>'Display text'])
                    </div>
                    <div class="col-md-6 col-12">
                        @include('partials.form-groups.array-select', [
                        'name'=>'display_type', 'title'=>'How to display attributes?',
                        'data'=>config('attributes.attribute-group-display-types'), 'value_field'=>'value',
                        'text_field'=>'title'])
                    </div>
                    <div class="col-12">
                        @include('partials.form-groups.multi-checkbox', ['name'=>'category_ids[]',
                        'title'=>'Attribute group categories', 'data'=>$categories,
                        'text_field'=>'identifier_text'])
                    </div>
                </div>
                <div class="my-1"></div>
                <div class="row">
                    <div class="col-md-6 col-12">
                        <button class='btn btn-primary'>
                            Create attribute group
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection