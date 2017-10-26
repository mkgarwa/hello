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
                    {!! Form::open([
                        'method'=>'DELETE',
                        'url' => ['recipe-categories', $recipecategory->slug],
                        'style' => 'display:inline',
                        'class' => 'form-horizontal'
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
                    <small>Edit recipes category</small>
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
                    {!! Form::model($recipecategory, [
                        'method' => 'PATCH',
                        'url' => ['/recipe-categories', $recipecategory->slug],
                        'class' => 'form-horizontal',
                        'files' => true
                    ]) !!}

                    @include ('recipe-categories.form', ['submitButtonText' => 'Update'])

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
