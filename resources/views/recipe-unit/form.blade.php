<div class="form-group">
    {!! Form::label('unit', 'Unit', ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('unit', isset($recipeunit->unit) ? $recipeunit->unit : '', ['class' => 'form-control','placeholder'=>'Unit','id'=>'unit','autocomplete'=>'off']) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-2 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
