@extends('layouts.dashboard')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="view-header">
                <div class="col-md-6 pull-right text-right">
                    <a href="{{ url('/recipes') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
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
                    <h3 class="m-b-xs">Recipe</h3>
                    <small>Edit {{ $recipe->title }}</small>
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
