@extends('layouts.dashboard')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="view-header">
                <div class="col-md-6 pull-right text-right">
                    <a href="{{ url('/recipes') }}" title="Back">
                        <button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                        </button>
                    </a>
                </div>

                <div class="header-icon">
                    <i class="pe page-header-icon pe-7s-coffee"></i>
                </div>
                <div class="header-title">
                    <h3 class="m-b-xs">Recipe</h3>
                    <small>Create New recipe</small>
                </div>
            </div>
            <hr>
        </div>
    </div>

    <div class="row">
        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <div class="clearfix"></div>
        @endif
        @include ('recipes.form')
    </div>
@endsection
