@extends('layouts.dashboard')

@section('extra-styles')
    <style>
        table tr td:last-child{
            width:200px;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="view-header">
                <div class="col-md-2 pull-right text-right">
                    <a href="{{ url('/recipes/create') }}" class="btn btn-accent" title="Add New recipe" data-toggle="title"><i class="fa fa-plus" aria-hidden="true"></i> Add New</a>
                </div>
                <div class="pull-right text-right col-md-6" style="line-height: 14px">
                {!! Form::open(['method' => 'GET', 'url' => '/recipes', 'role' => 'search'])  !!}
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
                    <i class="pe page-header-icon pe-7s-coffee"></i>
                </div>
                <div class="header-title">
                    <h3 class="m-b-xs">Recipes</h3>
                    <small>Manage all recipes</small>
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
                                <th>
                                    <div class="checkbox checkbox-warning no-margin">
                                        <input type="checkbox" id="selectAll" class="styled">
                                        <label for="selectAll"></label>
                                    </div>
                                </th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>User</th>
                                <th>Approved</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($recipes as $item)
                                <tr>
                                    <td>
                                        <div class="checkbox checkbox-warning no-margin">
                                            <input type="checkbox" id="check{{$item->id}}" name="recipe[{{$item->id}}]" class="styled inner">
                                            <label for="check{{$item->id}}"></label>
                                        </div>
                                    </td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->slug }}</td>
                                    <td>{{ $item->user_profile->first_name." ".$item->user_profile->last_name }}</td>
                                    <td>{{ $item->is_approved === '1' ? 'Yes' : 'No' }}</td>
                                    <td>{{ date('Y M d',strtotime($item->created)) }}</td>
                                    <td>
                                        <a href="{{ url('/recipes/' . $item->slug) }}" title="View recipe"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                        <a href="{{ url('/recipes/' . $item->slug . '/edit') }}" title="Edit recipe"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                        {!! Form::open([
                                            'method'=>'DELETE',
                                            'url' => ['/recipes', $item->slug],
                                            'style' => 'display:inline'
                                        ]) !!}
                                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                    'type' => 'submit',
                                                    'class' => 'btn btn-danger btn-xs',
                                                    'title' => 'Delete recipe',
                                                    'onclick'=>'return confirm("Confirm delete?")'
                                            )) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="text-right">
                        {!! $recipes->appends(['search' => Request::get('search')])->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
