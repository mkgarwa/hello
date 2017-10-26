<div class="form-group">
    {!! Form::label('name', 'Name', ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('name', isset($recipenutritionalelement->name) ? $recipenutritionalelement->name : '', ['class' => 'form-control auto-slug','placeholder'=>'Name','id'=>'name','autocomplete'=>'off']) !!}
    </div>
</div>

<div class="form-group">
    {{Form::label('slug', 'Slug',['class'=>'col-sm-2 control-label'])}}
    <div class="col-sm-10">
        <div class="input-group">
            {!! Form::text('slug', isset($recipenutritionalelement->slug) ? $recipenutritionalelement->slug : '', ['class' => 'form-control get-slug','placeholder'=>'Enter Name','id'=>'slug','readonly'=>'readonly']) !!}
            <span class="input-group-addon modify" title="Modify" data-toggle="tooltip"><i class="fa fa-pencil" style="color: #aaa; cursor: pointer"></i> </span>
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-2 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
@section('extra-js')
    <script>
        // make slug input writable
        $('.modify').on('click', function () {
            $(this).prev().removeAttr('readonly').focus();
        });

        // make slug input readonly again on lblur
        $('.get-slug').on('blur', function () {
            $(this).attr('readonly', 'readonly');
        });

        // create auto slug on keypress on name input
        $('.auto-slug').on('keyup', function () {
            $('.get-slug').val(slugify($(this).val()));
        });
        function slugify(text) {
            return text.toString().toLowerCase()
                    .replace(/\s+/g, '-')           // Replace spaces with -
                    .replace(/&/g, '-and-')         // Replace & with and
                    .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
                    .replace(/\-\-+/g, '-')         // Replace multiple - with single -
                    .replace(/^-+/, '')             // Trim - from start of text
                    .replace(/-+$/, '');            // Trim - from end of text
        }
    </script>
@endsection
