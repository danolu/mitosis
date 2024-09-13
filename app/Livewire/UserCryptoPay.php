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
use App\Mail\SendMail;


class UserCryptoPay extends Component
{
    public $title = "Deposit with Crypto";

    public $coins = [
        'Bitcoin' => 'BTC', 
        'Ethereum' => 'ETH',
        'BNB' => 'BNB', 
        'Solana' => 'SOL', 
    ];                        
    
    #[Validate('required|numeric|min:10')] 
    public $amount;

    #[Validate('required|string')] 
    public $coin;


    public function render()
    {
        return view('livewire.user.crypto')->title($this->title);
    }

    public function makePayment() 
    {
        $this->validate();
        return $this->redirectRoute('validate-btc', ['amount' => $this->amount, 'coin' => $this->coin], navigate: true);
    }
}
