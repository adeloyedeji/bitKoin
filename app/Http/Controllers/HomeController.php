<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['verified', 'auth', 'blocked', 'admin']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get current price from coinbase
        $current_price_url = "https://api.coindesk.com/v1/bpi/currentprice.json";
        $json_data  = file_get_contents($current_price_url);
        $json_feed  = json_decode($json_data);
        $current_price = $json_feed->bpi;
        $current_usd_price = $current_price->USD->rate_float;

        // get dollar exchange rate
        $dollar_url = 'https://openexchangerates.org/api/latest.json?app_id=d2f88285655f4e3ea528c38aaf301566';
        $json_data  = file_get_contents($dollar_url);
        $json_feed  = json_decode($json_data);
        $dollar_price = $json_feed->rates->NGN;

        // BTC in Naira
        $btc_to_naira = number_format(($current_usd_price * $dollar_price), 2);

        // get historical data
        $start_date = date("Y-m-d",strtotime("-1 month"));
        $end_date   = date("Y-m-d");
        $bpi_price_index = \App\BitcoinPriceIndex::whereBetween('date', [$start_date, $end_date])->get();
        return view('home', compact('bpi_price_index', 'current_usd_price', 'btc_to_naira'));
    }
}
