<?php

namespace App\Http\Controllers;

use App\currency;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $client = new \GuzzleHttp\Client();
//        $res = $client->get('http://free.currencyconverterapi.com/api/v3/currencies');
//        $output = json_decode($res->getBody());
//        $arr= [];
//        foreach($output->results as $result) {
//            $arr['currencyName'] = $result->currencyName;
//            $arr['currencySymbol'] = isset($result->currencySymbol) ? $result->currencySymbol : $result->currencyName;
//            $arr['id'] = $result->id;
//            currency::insert($arr);
//        }
        $output = currency::all();
        return view('home')->with('output',$output);
    }

    public function convert(){
        $output = currency::all();
        return view('convert')->with('output',$output);
    }
}
