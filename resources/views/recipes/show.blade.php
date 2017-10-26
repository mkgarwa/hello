@extends('layouts.dashboard')

@section('extra-styles')
    <style>
        th{
            width:30%;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="view-header">
                <div class="col-md-6 pull-right text-right">
                    <a href="{{ url('/recipes') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <a href="{{ url('/recipes/' . $recipe->slug . '/edit') }}" title="Edit recipe"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                    {!! Form::open([
                        'method'=>'DELETE',
                        'url' => ['recipes', $recipe->slug],
                        'style' => 'display:inline'
                    ]) !!}
                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-xs',
                                'title' => 'Delete recipe',
                                'onclick'=>'return confirm("Confirm delete?")'
                        ))!!}
                    {!! Form::close() !!}
                </div>

                <div class="header-icon">
                    <i class="pe page-header-icon pe-7s-keypad"></i>
                </div>
                <div class="header-title">
                    <h3 class="m-b-xs">{{ $recipe->title}}</h3>
                    <small></small>
                </div>
            </div>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-responsive">
                            <tr>
                                <th>Title</th><td>{{ $recipe->title }}</td>
                            </tr>
                            <tr>
                                <th>Slug</th><td>{{ $recipe->slug }}</td>
                            </tr><tr>
                                <th>Description</th><td>{{ $recipe->description }}</td>
                            </tr></tr><tr>
                                <th>Ingredients</th><td><?php echo nl2br($recipe->ingredients) ?></td>
                            </tr><tr>
                                <th>Instructions</th><td><?php echo nl2br($recipe->instructions);?></td>
                            </tr><tr>
                                <th>Preparation Time<small>(minutes)</small></th><td>{{ $recipe->preparation_time }}</td>
                            </tr><tr>
                                <th>Cooking Time<small>(minutes)</small></th><td>{{ $recipe->cooking_time }}</td>
                            </tr><tr>
                                <th>Serving People</th><td>{{ $recipe->serving_people }}</td>
                            </tr><tr>
                                <th>Comments are allowed?</th><td>{{ $recipe->allow_comments==1?'Yes':'No' }}</td>
                            </tr><tr>
                                <th>Posted By</th><td>{{ $recipe->user_profile->first_name." ".$recipe->user_profile->last_name }}</td>
                            </tr><tr>
                                <th>Featured Image</th><td>
                                    @if($recipe->featured_image)
                                        <img src="{{config('custom.recipeImageDir').$recipe->user_profile->id.'/'.$recipe->featured_image}}" alt="{{$recipe->title}}" width="50%" />
                                    @endif
                                </td>
                            </tr><tr>
                                <th>Video</th><td>
                                    @if(isset($recipe->video_url) && !empty($recipe->video_url))
                                        <iframe width="100%" height="240" src="{{\App\Models\VideoDomain::where(['id'=>$recipe->video_domain_id])->first()->embed}}{{$recipe->video_url}}" frameborder="0" allowfullscreen></iframe>
                                    @endif
                                </td>
                            </tr><tr>
                                <th>Visibility</th><td>{{ $recipe->recipe_visibility->name }}</td>
                            </tr><tr>
                                <th>Is Approved</th><td>{{ $recipe->is_approved==1?'Yes':'No' }}</td>
                            </tr><tr>
                                <th>Posted on</th><td>{{ date('Y M d',strtotime($recipe->created)) }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
