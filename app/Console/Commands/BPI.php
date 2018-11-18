<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class BPI extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bitcoin:price';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gets bitcoin price index from Coinbase API';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $start_date = date("Y-m-d",strtotime("-1 month"));
        $end_date   = date("Y-m-d");

        $json_url   = "https://api.coindesk.com/v1/bpi/historical/close.json";
        $json_data  = file_get_contents($json_url);
        $json_feed  = json_decode($json_data);
        $data       = $json_feed->bpi;

        foreach ($data as $key => $value)
        {
            \App\BitcoinPriceIndex::create([
                'date'  => $key,
                'value' => $value
            ]);
        }
    }
}
