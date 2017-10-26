<div class="form-group">
    {!! Form::label('name', 'Name', ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('name', isset($recipevisibility->name) ? $recipevisibility->name : '', ['class' => 'form-control auto-slug','placeholder'=>'Name','id'=>'name','autocomplete'=>'off']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('description', 'Description', ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::textarea('description', isset($recipevisibility->description) ? $recipevisibility->description : '', ['class' => 'form-control auto-slug','placeholder'=>'Description','id'=>'description','autocomplete'=>'off']) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-2 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
