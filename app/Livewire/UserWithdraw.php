<?php

namespace App\Livewire;
use Livewire\Attributes\Validate;
use Auth;
use Str;
use Mail;
use App\Models\Payout;
use App\Models\Activity;
use App\Models\Currency;
Use App\Mail\SendMail;

use Livewire\Component;

class UserWithdraw extends Component
{
    public $title = 'Withdraw';

    #[Validate('required|numeric')] 
    public $amount;

    #[Validate('required|string')] 
    public $method;

    public function render()
    {
        return view('livewire.user.withdraw');
    }

    public function withdrawSubmit()
    {
        $user = Auth::guard('user')->user();
        $amount = $this->amount;
        if ($user->balance<$amount) {
            return $this->addError('amount', 'Your balance is insufficient for this request.');
        }
        $this->validate();

        $currency = Currency::first();
        if($user->balance>=$amount){
            $sav['user_id'] = $user->id;
            $sav['amount'] = $amount;
            $sav['status'] = 0;
            $sav['ref'] = Str::random(16);
            Payout::create($sav);

            $audit['user_id'] = $user->id;
            $audit['activity'] = 'Requested payout of '.$currency->symbol.$amount;
            Activity::create($audit);

            $user->balance = $user->balance-$amount;
            $user->save();

            $data['subject'] = 'Withdrawal Request';
            $data['content'] = 'Hello '.$user->first_name.',<br>We are currently reviewing your withdrawal request of '.$amount.$currency->name.'.<br>Thank you for choosing us.';
            Mail::to($user->email)->send(new SendMail($data));

            $this->reset('amount', 'method');
            return $this->notify('success', 'Withdrawal Successful'); 
        }
    }  
}
