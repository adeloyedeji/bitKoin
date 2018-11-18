<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Interfaces\HomeInterface;   

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $home;
    public function __construct(HomeInterface $home)
    {
        $this->home = $home;
        $this->middleware(['verified', 'auth', 'blocked', 'admin']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current_usd_price = $this->home->get_btc_usd_price();
        
        $dollar_price = $this->home->get_dollar_exchange_rate();

        // BTC in Naira
        $btc_to_naira = number_format(($current_usd_price * $dollar_price), 2);

        return view('home', compact('current_usd_price', 'btc_to_naira', 'dollar_price'));
    }

    public function get_btc_history(Request $request)
    {
        $data   = array();
        $temp   = $this->home->get_btc_history();
        $dates  = collect($this->home->get_btc_history())->pluck('date');
        $values = collect($this->home->get_btc_history())->pluck('value');
        $dollar_price = $this->home->get_dollar_exchange_rate();
        foreach($temp as $key => $value)
        {
            $data[] = array(strtotime($dates[$key]), $values[$key] * $dollar_price);
        }
        if($request->ajax())
        {
            return response()->json($data);
        }
        return $data;
    }
}
