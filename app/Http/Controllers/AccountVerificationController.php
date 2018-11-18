<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AccountVerificationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['verified', 'auth', 'blocked', 'admin']);
    }

    public function index(Request $request)
    {
        return view('account-verification');
    }

    public function phoneVerification(Request $request)
    {
        $phone = $request->phone;
        if($phone == \Auth::user()->bvn->phone)
        {
            \Auth::user()->update([
                'phone' => $phone
            ]);
            \Session::flash('success', 'Phone number successfully verified.');
        }
        else
        {
            \Session::flash('error', 'Phone number verification failed. Make sure you enter the Phone Number associated with your BVN');
        }
        return redirect()->back();
    }

    public function bvnVerification(Request $request)
    {
        $bvn = $request->bvn;
        $verification = $this->verify_bvn($bvn);
        if($verification && is_array($verification))
        {
            $bvn_year   = date('Y', strtotime($verification['dob']));
            $bvn_month  = date('m', strtotime($verification['dob']));
            $bvn_day    = date('d', strtotime($verification['dob']));
            $dob = $bvn_year . '-' . $bvn_month . '-' . $bvn_day;
            if(strtolower($verification['first_name']) == strtolower(\Auth::user()->fname) && strtolower($verification['last_name']) == strtolower(\Auth::user()->lname) && $dob == \Auth::user()->date_of_birth)
            {
                $data = array(
                    'user_id'   => \Auth::id(),
                    'bvn'       => $bvn,
                    'phone'     => $verification['mobile'],
                    'date_of_birth' => $dob
                );
                \App\BVN::create($data);
            }
            else
            {
                \Session::flash('error', 'Unable to verify BVN. This might be because the information on the BVN does not match your profile. If this persists, kindly reach out to us on <a class="alert-link" href="mailto:'.env('APP_MAIL').'">'.env('APP_MAIL').'</a>');
                return redirect()->back();
            }
        }
        else
        {
            \Session::flash('error', $verification);
            return redirect()->back();
        }
    }

    public function verify_bvn($bvn)
    {
        $resp = [];
        $mode = env('MODE');
        $key = env('PAYSTACK_TEST_PRIVATE_KEY');
        if($mode == 2) {
            $key = env('PAYSTACK_LIVE_PRIVATE_KEY');
        }
        $url = 'https://api.paystack.co/bank/resolve_bvn/' . $bvn;
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
            Log::info('cURL error occured while trying to resolve bvn.');
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
}
