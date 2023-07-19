@extends('layouts.panel')
@section('main')
 <div>
    <div class="card">
        <div class="card-header">
           New attribute for {{$attribute_group->title}} 
        </div>
        <div class="card-body">
            <form action="{{route('panel.attribute-save')}}" method='POST'>
                <input type="hidden" name='attribute_group_id' value="{{$attribute_group->getKey()}}">
                <div class="row">
                    <div class="col-md-6 col-12">
                       @include('partials.form-groups.string', ['name'=>'title', 'title'=>'Title']) 
                    </div>
                    <div class="col-md-6 col-12">
                       @include('partials.form-groups.string', ['name'=>'display_text', 'title'=>'Display text']) 
                    </div>
                </div>
                <div class="my-1"></div>
                <div class="row">
                    <div class="col-md-6 col-12">
                    <button class='btn btn-primary'>Create attribute</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
 </div>
@endsection