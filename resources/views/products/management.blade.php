@extends('layouts.panel')
@section('main')
<div>
    <h4>Products management</h4>
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
                    <th class="text-center">Category</th>
                    <th class="text-center">Description</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Attributes</th>
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
                        @if(!is_null($d->category))
                         {{$d->category->title}}
                        @endif
                    </td>
                    <td class="text-center">
                        {!!$d->description!!}
                    </td>
                    <td class="text-center">
                      {{get_printable_price_in_toman($d->price)}}  
                    </td>
                    <td class="text-center">
                        <a href="{{$d->attributes_management_url}}" class='btn btn-sm btn-info text-white'>
                            <span class="fa fa-eye"></span>
                        </a>
                    </td>
                    <td class="text-center">
                     <div class='mb-1'>
                      @include('partials.model-simple-delete-form', ['data'=>$d,])
                     </div>           
                     <div>
                        <a title="View details" href="{{$d->details_url}}" class='btn btn-sm btn-info text-white'>
                            <span class="fa fa-eye"></span>
                        </a>
                     </div>            
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection