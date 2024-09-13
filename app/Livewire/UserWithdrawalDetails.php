<?php

namespace App\Livewire;

use Livewire\Component;
use Auth;
use App\Models\Activity;

class UserWithdrawalDetails extends Component
{
    public $title = 'Withdrawal Details';

    public $wallet_address, $bank_name, $account_number, $routing_number, $swift_code, $paypal, $cheque;

    public function mount() {
        $user = Auth::guard('user')->user();
        $this->wallet_address = $user->wallet_address;
        $this->bank_name = $user->bank_name;
        $this->routing_number = $user->routing_number;
        $this->swift_code = $user->swift_code;
        $this->paypal = $user->paypal;
        $this->account_number = $user->account_number;
    }

    public function render()
    {
        return view('livewire.user.withdrawal-details');
    }

    public function addDetails()
    { 
        $this->validate([
            'wallet_address' => 'nullable|string',
            'bank_name' => 'nullable|string',
            'account_number' => 'nullable|numeric',
            'swift_code' => 'nullable|string',
            'routing_number' => 'nullable|numeric',
            'paypal' => 'nullable|email',
        ]);

        $user = Auth::guard('user')->user();

        $user->wallet_address = $this->wallet_address;
        $user->bank_name = $this->bank_name;
        $user->account_number = $this->account_number;
        $user->swift_code = $this->swift_code;
        $user->routing_number = $this->routing_number;
        $user->paypal = $this->paypal;
        $user->save();

        $audit['user_id'] = $user->id;
        $audit['activity'] = 'Updated withdrawal details';
        Activity::create($audit);
        return $this->notify('success', 'Withdrawal Details Updated');
    }
}
