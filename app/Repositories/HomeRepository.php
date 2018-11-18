<?php
namespace App\Repositories;

use \App\Interfaces\HomeInterface;

class HomeRepository implements HomeInterface
{
    public function get_btc_history()
    {
        // get historical data
        $start_date = date("Y-m-d",strtotime("-1 month"));
        $end_date   = date("Y-m-d");
        $bpi_price_index = \App\BitcoinPriceIndex::whereBetween('date', [$start_date, $end_date])->get();
        return $bpi_price_index;
    }

    public function get_btc_usd_price()
    {
        // get current price from coinbase
        $current_usd_price = 0;
        $current_price_url = "https://api.coindesk.com/v1/bpi/currentprice.json";
        $json_data  = file_get_contents($current_price_url);
        $json_feed  = json_decode($json_data);
        $current_price = $json_feed->bpi;
        $current_usd_price = $current_price->USD->rate_float;
        return $current_usd_price;
    }

    public function get_dollar_exchange_rate()
    {
        // get dollar exchange rate
        $dollar_price = 0;
        $dollar_url = 'https://openexchangerates.org/api/latest.json?app_id=d2f88285655f4e3ea528c38aaf301566';
        $json_data  = file_get_contents($dollar_url);
        $json_feed  = json_decode($json_data);
        $dollar_price = $json_feed->rates->NGN;
        return $dollar_price;
    }
}