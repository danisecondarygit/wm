<!-- needs data, title, name, text_field -->
<div class="form-group">
    <label for="" class='form-label'>{{$title}}</label>
    <div>
        @foreach($data as $d)
        @include('partials.form-groups.checkbox', ['name'=>$name, 'value'=>$d->getKey(),
        'text'=>$d->$text_field, 'is_inline'=>1, ])
        @endforeach
    </div>
</div>