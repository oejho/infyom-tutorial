<!-- Code Field -->
<div class="form-group">
    {!! Form::label('code', __('models/continents.fields.code').':') !!}
    <p>{{ $continent->code }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/continents.fields.name').':') !!}
    <p>{{ $continent->name }}</p>
</div>

