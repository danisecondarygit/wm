<!-- needs data, value_field, text_field, name, title -->
<div class="form-group">
    <label for="" class="form-label">{{$title}}</label>
    <select name="{{$name}}" class='form-control'>
        <option value="">Select one</option>
        @foreach($data as $d)
        @php
        $text = $d[$text_field];
        $value = $d[$value_field];
        @endphp
        <option value="{{$value}}">{{$text}}</option>
        @endforeach
    </select>
    @if($errors->has($name))
    <div class="my-1">
        @include('partials.form-error', ['msg'=>$errors->first($name)])
    </div>
    @endif
</div>