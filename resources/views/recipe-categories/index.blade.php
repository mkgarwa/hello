@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="view-header">
                <div class="col-md-2 pull-right text-right">
                    <a href="{{ url('/recipe-categories/create') }}" class="btn btn-accent" title="Add New recipeCategory" data-toggle="title"><i class="fa fa-plus" aria-hidden="true"></i> Add New</a>
                </div>
                <div class="pull-right text-right col-md-6" style="line-height: 14px">
                    {!! Form::open(['method' => 'GET', 'url' => '/recipe-categories', 'role' => 'search'])  !!}
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="header-icon">
                    <i class="pe page-header-icon pe-7s-keypad"></i>
                </div>
                <div class="header-title">
                    <h3 class="m-b-xs">{{$recipecategories->total()}} Recipe Categories</h3>
                    <small>Manage recipes categories</small>
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
                        <table class="table table-striped table-responsive table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Icon</th>
                                <th># Recipes</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($recipecategories as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->slug }}</td>
                                    <td>{{Html::image(config('custom.whiteIconImageDir').$item->icon,$item->icon,['width'=>20])}}</td>
                                    <td>
                                        <div class="sparkline8"></div>
                                        {{$item->category_recipe->count()}}
                                    </td>
                                    <td>{{date('d M Y',strtotime($item->created))}}</td>

                                    <td>
                                        <a href="{{ url('/recipe-categories/' . $item->slug) }}"
                                           title="View recipeCategory">
                                            <button class="btn btn-info btn-xs"><i class="fa fa-eye"
                                                                                   aria-hidden="true"></i> View
                                            </button>
                                        </a>
                                        <a href="{{ url('/recipe-categories/' . $item->slug . '/edit') }}"
                                           title="Edit recipeCategory">
                                            <button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o"
                                                                                      aria-hidden="true"></i> Edit
                                            </button>
                                        </a>
                                        {!! Form::open([
                                            'method'=>'DELETE',
                                            'url' => ['/recipe-categories', $item->slug],
                                            'style' => 'display:inline'
                                        ]) !!}
                                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger btn-xs',
                                                'title' => 'Delete recipeCategory',
                                                'onclick'=>'return confirm("Confirm delete?")'
                                        )) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="text-right">
                            {!! $recipecategories->appends(['search' => Request::get('search')])->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection