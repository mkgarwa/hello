@extends('layouts.dashboard')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="view-header">
                <div class="col-md-6 pull-right text-right">
                    <a href="{{ url('/recipe-unit') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
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
                    <small>Modify recipe unit</small>
                </div>
            </div>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="panel">
                <div class="panel-body">
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <div class="clearfix"></div>
                    @endif
                    {!! Form::model($recipeunit, [
                        'method' => 'PATCH',
                        'url' => ['/recipe-unit', $recipeunit->unit],
                        'class' => 'form-horizontal',
                        'files' => true
                    ]) !!}

                    @include ('recipe-unit.form', ['submitButtonText' => 'Update'])

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
