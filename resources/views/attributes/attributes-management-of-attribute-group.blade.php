@extends('layouts.panel')
@section('main')
<div>
    <div class='d-flex pe-2'>
        <h4 class='me-auto'>Attributes management of {{$attribute_group->title}}</h4>
        <a href="{{$attribute_group->new_attribute_url}}" class='text-white btn btn-info'>
            New attribute
        </a>
    </div>
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
                    <th class="text-center">#</th>
                    <th class="text-center">ID</th>
                    <th class="text-center">Title</th>
                    <th class="text-center">Display text</th>
                    <th class="text-center">Attribute group</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $d)
                <tr>
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
</div>
@endsection