<?php

namespace App\Livewire;

use Livewire\Component;
use Auth;

class UserBalance extends Component
{
    public $user_balance;

    public function mount()
    {
        $user = Auth::guard('user')->user();
        $this->user_balance = $user->balance;
    }

    public function render()
    {
        return view('components.user.balance');
    }
}
