<!-- needs name, title -->
<div class="form-group">
    <label for="" class='form-label'>{{$title}}</label>
    <textarea name="{{$name}}" class='form-control'></textarea>
    @if($errors->has($name))
    @include('partials.form-error', ['msg'=>$errors->first($name)])
    @endif
</div>