<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['verified', 'auth', 'blocked', 'admin']);
        // \DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        // \DB::statement('TRUNCATE table banks');
        // \DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        // $banks = $this->getBanks();
        // foreach($banks as $d)
        // {
        //     $data = array(
        //         'name'      =>  $d['name'],
        //         'slug'      =>  $d['slug'],
        //         'code'      =>  $d['code'],
        //         'active'    =>  $d['active'],
        //         'bank_id'   =>  $d['id']
        //     );
        //     \App\Bank::create($data);
        // }
    }

    public function getBanks()
    {
        $resp = [];
        $mode = env('MODE');
        $key = env('PAYSTACK_TEST_PRIVATE_KEY');
        if($mode == 2) {
            $key = env('PAYSTACK_LIVE_PRIVATE_KEY');
        }
        $url = 'https://api.paystack.co/bank';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt(
            $ch, CURLOPT_HTTPHEADER, ['Authorization: Bearer ' . $key]
        );
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $request = curl_exec($ch);

        if(curl_errno($ch)) {
            Log::info('cURL error no: ');
            Log::info(curl_errno($ch));
            Log::info('cURL error occured while trying to get list of banks.');
            Log::error(curl_error($ch));
        } else {
            if ($request) {
                $result = json_decode($request, true);
                if($result && $result['status']) {
                    $resp = $result['data'];
                    Log::info('done getting banks list...');
                } else {
                    Log::info('Unable to get banks list.');
                }
            } else {
                Log::info('cURL error occured!');
            }
        }
        curl_close($ch);

        return $resp;
    }

    public function resolveAccountNumber($account_no, $bank_code)
    {
        $resp = [];
        $mode = env('MODE');
        $key = env('PAYSTACK_TEST_PRIVATE_KEY');
        if($mode == 2) {
            $key = env('PAYSTACK_LIVE_PRIVATE_KEY');
        }
        $url = 'https://api.paystack.co/bank/resolve?account_number=' . $account_no . '&bank_code=' . $bank_code;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt(
            $ch, CURLOPT_HTTPHEADER, ['Authorization: Bearer ' . $key]
        );
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $request = curl_exec($ch);

        if(curl_errno($ch)) {
            Log::info('cURL error no: ');
            Log::info(curl_errno($ch));
            Log::info('cURL error occured while trying to resolve account number.');
            Log::error(curl_error($ch));
        } else {
            if ($request) {
                $result = json_decode($request, true);
                Log::info('direct result:');
                Log::info($result);
                if($result && $result['status']) {
                    $resp = $result['data'];
                    Log::info('done resolving account');
                } else {
                    Log::info('Unable to resolve.');
                    $resp = $result['message'];
                }
            } else {
                Log::info('cURL error occured!');
            }
        }
        curl_close($ch);

        return $resp;
    }

    public function bankCards(Request $request)
    {
        return view('bank-cards');
    }

    public function addCard(Request $request)
    {
        // $banks = $this->getBanks();
        $banks = \App\Bank::all();
        return view('bank-add-cards', compact('banks'));
    }

    public function storeCard(Request $request)
    {
        $data = array(
            'account_no'    => $request->account_no,
            'bank'          => $request->bank
        );

        $verify = $this->resolveAccountNumber($data['account_no'], $data['bank']);

        if($verify && is_array($verify))
        {
            $verified = 0;
            $account_name = $verify['account_name'];
            $break_down_name = explode(" ", $account_name);
            if(count($break_down_name) >= 3)
            {
                Log::info('verified at length = 3');
                if(strtolower($break_down_name[1]) == strtolower(\Auth::user()->fname) && strtolower($break_down_name[2]) == strtolower(\Auth::user()->lname))
                {
                    $verified = 1;
                }
                else if(strtolower($break_down_name[2]) == strtolower(\Auth::user()->fname) && strtolower($break_down_name[1]) == strtolower(\Auth::user()->lname))
                {
                    $verified = 1;
                }
            }
            else if(count($break_down_name) == 2)
            {
                Log::info('verified at length = 2');
                if(strtolower($break_down_name[0]) == strtolower(\Auth::user()->fname) && strtolower($break_down_name[1]) == strtolower(\Auth::user()->lname))
                {
                    $verified = 1;
                }
                else if(strtolower($break_down_name[1]) == strtolower(\Auth::user()->fname) && strtolower($break_down_name[0]) == strtolower(\Auth::user()->lname))
                {
                    $verified = 1;
                }
            }

            if($verified)
            {
                $bank = \App\Bank::where('code', $data['bank'])->first();

                if(!$bank)
                {
                    \Session::flash('error', 'Your selected bank was not found!');
                    return redirect()->back();
                }
                // check if there's already a card
                if(\Auth::user()->cash_account)
                {
                    \Auth::user()->cash_account()->update([
                        'user_id'       => \Auth::id(),
                        'account_no'    => $data['account_no'],
                        'bank_name'     => $bank->name,
                        'bank_code'     => $data['bank']
                    ]);
                    \Session::flash('success', 'Bank account successfully updated.');
                }
                else
                {
                    \App\CashAccount::create([
                        'user_id'       => \Auth::id(),
                        'account_no'    => $data['account_no'],
                        'bank_name'     => $bank->name,
                        'bank_code'     => $data['bank']
                    ]);
                    \Session::flash('success', 'Bank account successfully added.');
                }
                return redirect()->route('bank.cards');
            }
            else
            {
                \Session::flash('error', 'Unable to verify account details. This might be because the name on the card does not match your profile name. If this persists with a valid card, kindly reach out to us on <a class="alert-link" href="mailto:'.env('APP_MAIL').'">'.env('APP_MAIL').'</a>');
                return redirect()->back();
            }
        }
        else
        {
            \Session::flash('error', $verify);
            return redirect()->back();
        }
    }
}
