@extends('layouts.dashboard')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="view-header">
                <div class="col-md-6 pull-right text-right">
                    <a href="{{ url('/recipe-nutritional-element') }}" title="Back">
                        <button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                        </button>
                    </a>
                </div>

                <div class="header-icon">
                    <i class="pe page-header-icon pe-7s-science"></i>
                </div>
                <div class="header-title">
                    <h3 class="m-b-xs">Recipe Nutritional Element</h3>
                    <small>Create New recipeNutritionalElement</small>
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

                        {!! Form::open(['url' => '/recipe-nutritional-element', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('recipe-nutritional-element.form')

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
@endsection
