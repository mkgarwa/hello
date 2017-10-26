@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="view-header">
                <div class="col-md-6 pull-right text-right">
                    <a href="{{ url('/recipe-unit') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <a href="{{ url('/recipe-unit/' . $recipeunit->unit . '/edit') }}" title="Edit recipeUnit"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                    {!! Form::open([
                        'method'=>'DELETE',
                        'url' => ['recipe-unit', $recipeunit->unit],
                        'style' => 'display:inline'
                    ]) !!}
                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-xs',
                                'title' => 'Delete recipeUnit',
                                'onclick'=>'return confirm("Confirm delete?")'
                        ))!!}
                    {!! Form::close() !!}
                </div>

                <div class="header-icon">
                    <i class="pe page-header-icon pe-7s-calculator"></i>
                </div>
                <div class="header-title">
                    <h3 class="m-b-xs">Recipe Unit {{ $recipeunit->unit }}</h3>
                    <small>View recipe unit</small>
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
                                <th>ID</th><td>{{ $recipeunit->unit }}</td>
                            </tr>
                            <tr>
                                <th>Created</th><td>{{ date('Y M d',strtotime($recipeunit->unit)) }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
