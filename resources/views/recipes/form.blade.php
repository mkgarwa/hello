@section('extra-styles')
    <link rel="stylesheet" href="/vendor/select2/dist/css/select2.min.css"/>
    <style>
        .input-group-btn {
            padding: 0px;
            background: #52555f;
            border-right: 1px solid #666;
        }
        .input-group-btn select, .input-group-btn select:hover{
            color:#fff;
        }
    </style>
@endsection

@if(isset($recipe->id))
    {!! Form::model($recipe, [
                        'method' => 'PATCH',
                        'url' => ['/recipes', $recipe->slug],
                        'files' => true
                    ]) !!}
@else
    {!! Form::open(['url' => '/recipes', 'class' => '', 'files' => true]) !!}
@endif

<div class="col-md-6">
    <div class="panel panel-filled">
        <div class="panel-body">
            <div class="form-group">
                {!! Form::label('title', 'Title') !!}
                {!! Form::text('title', isset($recipe->title) ? $recipe->title : '', ['class' => 'form-control auto-slug','placeholder'=>'Recipe Title','id'=>'title','autocomplete'=>'off']) !!}
            </div>

            <div class="form-group">
                <label for="category_id">
                    Recipe Category(s)
                </label>
                {!! Form::select('recipe_category_id[]', \App\Models\RecipeCategory::orderBy('name')->pluck('name', 'id'), isset($recipe->id) ? $recipe->recipe_category->pluck('category_id')->toArray() :'', ['class' => 'form-control multiple-select', 'multiple'=>'multiple','style'=>'width: 100%','id' =>'category_id']) !!}

            </div>

            <div class="form-group">
                {{Form::label('slug', 'Slug')}}
                <div class="input-group">
                    {!! Form::text('slug', isset($recipe->slug) ? $recipe->slug : '', ['class' => 'form-control get-slug','placeholder'=>'Enter Recipe Name','id'=>'slug','readonly'=>'readonly']) !!}
                    <span class="input-group-addon modify" title="Modify" data-toggle="tooltip">
                            <i class="fa fa-pencil" style="color: #aaa; cursor: pointer"></i>
                        </span>
                </div>
            </div>

            <div class="form-group">
                <label for='description'>Description
                    <small>(optional)</small>
                </label>
                {!! Form::textarea('description', isset($recipe->description) ? $recipe->description : '', ['class' => 'form-control','placeholder'=>'More about recipe','id'=>'description','autocomplete'=>'off','rows'=>'4']) !!}
            </div>

            <div class="form-group">
                <label for="comments">
                    Allow Comments&nbsp;&nbsp;
                </label>
                {!! Form::checkbox('allow_comments', '1', true, ['class' => 'js-switch', 'id'=>'comments']) !!}
            </div>
            <div class="form-group">
                <label for='video_url'>Video Url
                    <small>(Optional Youtube, Vimeo url)</small>
                </label>
                <div class="input-group">
                    <span class="input-group-btn">
                    {!! Form::select('video_domain_id', \App\Models\VideoDomain::pluck('domain', 'id'), isset($recipe->id) ? $recipe->video_domain_id :'', ['class' => 'btn']) !!}
                    </span>
                    {!! Form::text('video_url', isset($recipe->video_url) ? $recipe->video_url : '', ['class' => 'form-control','placeholder'=>'Video Url','id'=>'video_url','autocomplete'=>'off']) !!}
                </div>
            </div>
            @if(isset($recipe->video_url) && !empty($recipe->video_url))
                <div class="form-group">
                    <iframe width="100%" height="240" src="{{\App\Models\VideoDomain::where(['id'=>$recipe->video_domain_id])->first()->embed}}{{$recipe->video_url}}" frameborder="0" allowfullscreen></iframe>
                </div>
            @endif
            <div class="form-group">
                <label for="is_approved">
                    You want to approve it to publish
                </label>
                {!! Form::checkbox('is_approved', '1', true, ['class' => 'js-switch', 'id'=>'is_approved']) !!}
            </div>

            <div class="form-group">
                <label for="footnote">
                    Footnote(optional)
                </label>
                {!! Form::textarea('footnote', isset($recipe->footnote) ? $recipe->footnote : '', ['class' => 'form-control','placeholder'=>'Any Footnote','id'=>'footnote','autocomplete'=>'off','rows'=>'4']) !!}
            </div>

        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="panel panel-filled">
        <div class="panel-body">
            <div class="col-md-6 no-padding">
                <div class="form-group">
                    <label for="preparation_time">
                        Preparation Time
                        <small>(in minutes)</small>
                    </label>
                    {!! Form::number('preparation_time', isset($recipe->preparation_time) ? $recipe->preparation_time : '', ['class' => 'form-control','placeholder'=>'Preparation Time','id'=>'preparation_time','autocomplete'=>'off', 'min' => '1']) !!}
                </div>
            </div>
            <div class="col-md-6 ">
                <div class="form-group">
                    <label for="cooking_time">
                        Cooking Time
                        <small>(in minutes)</small>
                    </label>
                    {!! Form::number('cooking_time', isset($recipe->cooking_time) ? $recipe->cooking_time : '', ['class' => 'form-control','placeholder'=>'Cooking Time','id'=>'cooking_time','autocomplete'=>'off']) !!}
                </div>
            </div>

            <div class="form-group">
                <label for="serving_people">
                    Serving People
                </label>
                {!! Form::selectRange('serving_people', 1, 20, isset($recipe->serving_people) ? $recipe->serving_people : 1, ['class' => 'form-control', 'id'=>'serving_people']) !!}
            </div>

            <div class="form-group">
                <label for="ingredients">
                    Ingredients
                    <small>(One ingredient per line)</small>
                </label>
                {!! Form::textarea('ingredients', isset($recipe->ingredients) ? $recipe->ingredients : '', ['class' => 'form-control','placeholder'=>'one ingredient per line','id'=>'ingredients','autocomplete'=>'off','rows'=>'4']) !!}
            </div>
            <div class="form-group">
                <label for="instructions">
                    Instructions
                    <small>(One instruction per line)</small>
                </label>
                {!! Form::textarea('instructions', isset($recipe->instructions) ? $recipe->instructions : '', ['class' => 'form-control','placeholder'=>'one instruction per line','id'=>'instructions','autocomplete'=>'off','rows'=>'4']) !!}
            </div>
            <div class="form-group">
                <label class="btn btn-default" for="image">
                    {!! Form::file('image[]', ['id'=>'image','style'=>'display:none;','onchange'=>"$('#upload-file-info2').html($(this).val());", "multiple"]) !!}
                    <span id="upload-file-info2">Upload Recipe Image</span>
                </label>
                <ul class="clearfix show-images">
                <?php
                    $images = $recipe->recipe_images->pluck('image','id');
                    if(count($images) > 0){
                        foreach($images as $k => $v){
                        $imgUrl = config('custom.thumbnailRecipeImageDir').$v;
                ?>
                    <li>
                        <img src="<?=$imgUrl?>" width="108" height="84" alt="" >
                        <i class="fa fa-trash delete-img" data-deleteId="<?=$k?>"></i>
                    </li>
                <?php } } ?>
                </ul>
            </div>
            <?php
            $vis = \App\Models\RecipeVisibility::get();
            ?>
            @foreach($vis as $k => $v)
                <div class="form-group radio radio-warning">
                    {!! Form::radio('visibility_id', $v->id, false, ['id' =>'radio'.$v->id]) !!}
                    <label for="radio{{$v->id}}">{{$v->name}}</label>
                </div>
            @endforeach
            <div class="form-group">
                <label for="footnote">
                    Tip(optional)
                </label>
                {!! Form::textarea('tip', isset($recipe->tip) ? $recipe->tip : '', ['class' => 'form-control','placeholder'=>'Any Tip','id'=>'tip','autocomplete'=>'off','rows'=>'4']) !!}
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="col-md-4">
        {!! Form::submit(isset($recipe->id) ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
{!! Form::close() !!}
@section('extra-scripts')
    <script src="/vendor/select2/dist/js/select2.js"></script>
@endsection
@section('extra-js')
    <script>
        $(document).ready(function () {
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

            $('#video_url').on('blur', function(){
                var url = $(this).val();
                $(this).val(getVideoId(url));
            })
            $('form').on('submit',function(){
                $('#video_url').trigger('blur');
                return true;
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
            function getVideoId(url){
                var ID = '';
                url = url.replace(/(>|<)/gi,'').split(/(vi\/|v=|\/v\/|youtu\.be|vimeo\.com\/|\/embed\/)/);

                if(url[2] !== undefined) {
                    ID = url[2].split(/[^0-9a-z_\-]/i);
                    ID = ID[0];
                }
                else {
                    ID = url;
                }
                return ID;
            }

            $(".multiple-select").select2();
            $('.delete-img').on('click', function(e){
                var el = e.currentTarget;
                var imageId = $(el).attr('data-deleteId');
                if(imageId > 0){
                    var ans = confirm('are you sure, you want to delete this image?');
                    if(ans) {
                        $.ajax({
                            url: '/recipe/delete-image/' + imageId,
                            type: 'get',
                            dataType: 'json',
                            contentType: 'application/json; charset=utf-8',
                            success: function (response) {
                                if (response.status && response.status == 'OK') {
                                    $(el).parent('li').remove();
                                    toastr.options = {
                                        "positionClass": "toast-top-right",
                                        "closeButton": true,
                                        "progressBar": true,
                                        "showEasing": "swing",
                                        "timeOut": "1000"
                                    };
                                    toastr.success("<strong>Image successfully deleted.</strong>");
                                } else {
                                    toastr.options = {
                                        "positionClass": "toast-top-right",
                                        "closeButton": true,
                                        "progressBar": true,
                                        "showEasing": "swing",
                                        "timeOut": "1000"
                                    };
                                    toastr.error("<strong>sorry, technical error. please try again.</strong>");
                                }
                            },
                            error: function () {
                                toastr.options = {
                                    "positionClass": "toast-top-right",
                                    "closeButton": true,
                                    "progressBar": true,
                                    "showEasing": "swing",
                                    "timeOut": "1000"
                                };
                                toastr.error("<strong>Please check internet connection and try again.</strong>");
                            }
                        });
                    }
                }
            })
        });
    </script>
@endsection