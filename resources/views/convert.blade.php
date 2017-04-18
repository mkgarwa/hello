@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><a href="{{url('home')}}">Dashboard</a> <a href="{{url('convert')}}"
                                                                                          class="pull-right">convert</a>
                    </div>

                    <div class="panel-body">
                        <table border="0" cellpadding="10" width="100%">
                            <tr>
                                <th><input class="form-control" type="text" id="CURR_FR_VAL" name="amount"
                                           placeholder="amount"/></th>
                                <th><select class="form-control" name="fromCurrency" id="CURR_FR">
                                        @foreach($output as $currency)
                                            <option value="{{$currency->currencyId}}">{{$currency->currencyId}}</option>
                                        @endforeach
                                    </select></th>
                                <th><select class="form-control" name="toCurrency" id="CURR_TO">
                                        @foreach($output as $currency)
                                            <option value="{{$currency->currencyId}}">{{$currency->currencyId}}</option>
                                        @endforeach
                                    </select></th>
                                <th>
                                    <button type="button" class="btn btn-primary" onclick="getCurrencyUsingJQuery()">
                                        Convert
                                    </button>
                                </th>
                            </tr>

                        </table>

                        <h3>Conversion Rate:
                            <small id="CURR_VAL">press Convert Button</small>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    function getCurrencyUsingJQuery() {
        var currVal = $("#CURR_VAL");

        var currFrSelect = $("#CURR_FR");
        var fr = currFrSelect.val();

        var currToSelect = $("#CURR_TO");
        var to = currToSelect.val();

        //alert(fr + " : " + to);

        var currId = fr + "_" + to;

        $.getJSON("http://free.currencyconverterapi.com/api/v3/convert?q=" + currId + "&compact=y&callback=?",
                function (data) {
                    try {
                        var currFrVal = parseFloat(document.getElementById("CURR_FR_VAL").value);
                        currVal.html(numeral(currFrVal * data[currId].val).format("0,0.00[0]"));

                    } catch (e) {
                        alert("Please enter a number in the Amount field.");
                    }

                });

    }
</script>
