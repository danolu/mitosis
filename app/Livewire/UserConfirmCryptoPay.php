<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate; 
use Auth;
use App\Models\Deposit;
use App\Models\Currency;
use App\Models\Activity;
use App\Models\SiteBank;
use Mail;
use Str;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Http;


class UserConfirmCryptoPay extends Component
{    
    public $title, $amount, $equiv, $qr_code, $coin, $wallet_address;

    public $btc_address = 'btc_abcdefghijklmnopqrstuvwxyz';

    public $eth = 'usdt_abcdefghijklmnopqrstuvwxyz';

    public $sol = 'sol_abcdefghijklmnopqrstuvwxyz';

    public $bnb = 'bnb_abcdefghijklmnopqrstuvwxyz';

                        
    public function mount($coin, $amount)
    {
        $this->amount = $amount;
        $this->coin = $coin;
        if ($coin === 'BTC') {
            $response = Http::get('https://min-api.cryptocompare.com/data/price?fsym=USD&tsyms=BTC');
            $rates = $response->json();
            $this->title = 'Validate Bitcoin Deposit';
            $this->equiv = $rates['BTC'] * $amount;
            $rand = random_int(0, 9);
            $this->qr_code = 'wallet';
            $this->wallet_address = $this->btc;
        } elseif ($coin === 'SOL') {
            $response = Http::get('https://min-api.cryptocompare.com/data/price?fsym=USD&tsyms=SOL');
            $rates = $response->json();
            $this->title = 'Validate Solana Deposit';
            $this->equiv = $rates['SOL'] * $amount;
            $this->qr_code = 'wallet';
            $this->wallet_address = $this->sol;
        } elseif ($coin === 'ETH') {
            $response = Http::get('https://min-api.cryptocompare.com/data/price?fsym=USD&tsyms=ETH');
            $rates = $response->json();
            $this->title = 'Validate Ethereum Deposit';
            $this->equiv = $rates['ETH'] * $amount;
            $this->qr_code = 'wallet';
            $this->wallet_address = $this->eth;
        } elseif ($coin === 'BNB') {
            $response = Http::get('https://min-api.cryptocompare.com/data/price?fsym=USD&tsyms=BNB');
            $rates = $response->json();
            $this->title = 'Validate Ethereum Deposit';
            $this->equiv = $rates['ETH'] * $amount;
            $this->qr_code = 'wallet';
            $this->wallet_address = $this->bnb;
        }
        
    }

    public function render()
    {
        return view('livewire.user.crypto-next')->title($this->title);
    }

    public function makePayment() 
    {
        $amount = $this->amount;
        $user = Auth::guard('user')->user();
        $currency = Currency::first();
        $sav['user_id'] = $user->id;
        $sav['amount'] = $amount;
        $sav['method'] = 'crypto';
        $sav['wallet_address'] = $this->wallet_address;
        $sav['status'] = 0;
        $sav['ref']= str::random(16);
        Deposit::create($sav);
        $audit['user_id'] = $user->id;
        $audit['activity'] = 'Lodged deposit of '.$currency->symbol.$amount;
        Activity::create($audit);
        $data['subject'] = 'Deposit Under Review';
        $data['content'] = 'We are currently reviewing your deposit of '.$currency->symbol.$amount.'. Once confirmed, your balance will be credited.<br>Thank you for choosing us.';
        Mail::to($user->email)->send(new SendMail($data));       
        $this->reset('amount', 'receipt');      
        return $this->notify('success', 'Deposit Successful');
    }
}
