@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="view-header">
                <div class="col-md-6 pull-right text-right">
                    <a href="{{ url('/recipe-categories') }}" title="Back">
                        <button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                        </button>
                    </a>
                    <a href="{{ url('/recipe-categories/' . $recipecategory->slug . '/edit') }}"
                       title="Edit recipeCategory">
                        <button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            Edit
                        </button>
                    </a>
                    {!! Form::open([
                        'method'=>'DELETE',
                        'url' => ['recipe-categories', $recipecategory->slug],
                        'style' => 'display:inline'
                    ]) !!}
                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-xs',
                            'title' => 'Delete recipeCategory',
                            'onclick'=>'return confirm("Confirm delete?")'
                    ))!!}
                    {!! Form::close() !!}
                </div>

                <div class="header-icon">
                    <i class="pe page-header-icon pe-7s-keypad"></i>
                </div>
                <div class="header-title">
                    <h3 class="m-b-xs">Recipe Category {{ $recipecategory->name }}</h3>
                    <small>View recipes category</small>
                </div>
            </div>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-responsive">
                            <tr>
                                <th>Name</th>
                                <td>{{$recipecategory->name}}</td>
                            </tr>
                            <tr>
                                <th>Slug</th>
                                <td>{{$recipecategory->slug}}</td>
                            </tr>
                            <tr>
                                <th>Icon</th>
                                <td><img src="{{config('custom.whiteIconImageDir').$recipecategory->icon}}" alt="{{$recipecategory->icon}}"/></td>
                            </tr>
                            <tr>
                                <th>Created</th>
                                <td>{{date('Y M d', strtotime($recipecategory->created))}}</td>
                            </tr>
                            <tr>
                                <th># Recipes</th>
                                <td>{{$recipecategory->category_recipe->count()}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
