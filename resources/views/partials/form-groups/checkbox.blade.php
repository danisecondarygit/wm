<!-- optional is_inline, value -->
<!-- needs text, name-->
@php
 $is_inline = isset($is_inline) ? $is_inline :false;
 $id = Str::uuid();
 $value = isset($value) ? $value : '';
@endphp
<div class="form-check {{$is_inline ? 'form-check-inline' : null}}">
    <input class="form-check-input" name='{{$name}}' type="checkbox" id="{{$id}}" value="{{$value}}">
    <label class="form-check-label" for="{{$id}}">{{$text}}</label>
</div>