@extends('layouts.panel')
@section('main')
<div>
    <h4>Attribute groups of {{$category->title}}</h4>
    <hr>
    @if(session()->has('success_msg'))
    <div class="my-1">
        @include('partials.msg', ['type'=>'success', 'msg'=>session()->get('success_msg')])
    </div>
    @endif
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center">Attach/detach</th>
                    <th class="text-center">#</th>
                    <th class="text-center">ID</th>
                    <th class="text-center">Title</th>
                    <th class="text-center">Display text</th>
                </tr>
            </thead>
            <tbody>
                @foreach($attribute_groups as $d)
                <tr>
                    <td class="text-center">
                      @if($data->pluck('attribute_group_id')->contains($d->getKey()))
                       @include('partials.category-attribute-groups.simple-detach-form', 
                        ['category_id'=>$category->getKey(), 'attribute_group_id'=>$d->getKey()])
                      @else
                       @include('partials.category-attribute-groups.simple-attach-form', [
                        'category_id'=>$category->getKey(), 'attribute_group_id'=>$d->getKey()])
                      @endif
                    </td>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-center">{{$d->getKey()}}</td>
                    <td class="text-center">{{$d->title}}</td>
                    <td class="text-center">{{$d->display_text}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection