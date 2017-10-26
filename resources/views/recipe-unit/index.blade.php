@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="view-header">
                <div class="col-md-2 pull-right text-right">
                    <a href="{{ url('/recipe-unit/create') }}" class="btn btn-accent" title="Add New recipeUnit" data-toggle="title"><i class="fa fa-plus" aria-hidden="true"></i> Add New</a>
                </div>
                <div class="pull-right text-right col-md-6" style="line-height: 14px">
                {!! Form::open(['method' => 'GET', 'url' => '/recipe-unit', 'role' => 'search'])  !!}
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
                    <i class="pe page-header-icon pe-7s-calculator"></i>
                </div>
                <div class="header-title">
                    <h3 class="m-b-xs">Recipe Units</h3>
                    <small>Recipe Units to add with recipes</small>
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
                                <th>Unit</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($recipeunit as $item)
                                <tr>
                                    <td>{{ $item->unit }}</td>
                                    <td>{{ date('Y M d',strtotime($item->created)) }}</td>

                                    <td>
                                        <a href="{{ url('/recipe-unit/' . $item->unit) }}" title="View recipeUnit"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                        <a href="{{ url('/recipe-unit/' . $item->unit . '/edit') }}" title="Edit recipeUnit"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                        {!! Form::open([
                                            'method'=>'DELETE',
                                            'url' => ['/recipe-unit', $item->unit],
                                            'style' => 'display:inline'
                                        ]) !!}
                                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                    'type' => 'submit',
                                                    'class' => 'btn btn-danger btn-xs',
                                                    'title' => 'Delete recipeUnit',
                                                    'onclick'=>'return confirm("Confirm delete?")'
                                            )) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="text-right">
                        {!! $recipeunit->appends(['search' => Request::get('search')])->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
