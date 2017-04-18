@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard <a href="{{url('convert')}}" class="pull-right">convert</a> </div>

                <div class="panel-body">
                    <table class="table-bordered" cellspacing="10" cellpadding="10" width="100%">
                        <tr>
                            <th>Currency Name</th>
                            <th>Currency Symbol</th>
                            <th>Currency Id</th>
                        </tr>
                        @foreach($output as $currency)
                            <tr>
                                <td>{{$currency->currencyName}}</td>
                                <td>{{$currency->currencySymbol}}</td>
                                <td>{{$currency->currencyId}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
