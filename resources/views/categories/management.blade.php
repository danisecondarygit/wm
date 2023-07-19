@extends('layouts.panel')
@section('main')
 <div>
    <h4>Categories management</h4>
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
                <th class="text-center">Attribute groups</th>
                <td class="text-center">Management</td>
             </tr>
            </thead>
            <tbody>
                @foreach($data as $d)
                 <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-center">{{$d->getKey()}}</td>
                    <td class="text-center">{{$d->title}}</td>
                    <td class="text-center">
                     <a href="{{$d->attribute_groups_management_url}}" class='btn btn-sm btn-info text-white'>
                        <span class="fa fa-eye"></span>
                     </a>
                    </td>
                    <td class="text-center">
                     @include('partials.model-simple-delete-form', ['data'=>$d,])   
                    </td>
                 </tr>
                @endforeach
            </tbody>
        </table>
    </div>
 </div>
@endsection