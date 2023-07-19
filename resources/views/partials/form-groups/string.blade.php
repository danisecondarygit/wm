<!-- needs name, title -->
<div class="form-group">
    <label for="" class='form-label'>{{$title}}</label>
    <input type="text" name="{{$name}}" class="form-control">
    @if($errors->has($name))
    @include('partials.form-error', ['msg'=>$errors->first($name)])
    @endif
</div>