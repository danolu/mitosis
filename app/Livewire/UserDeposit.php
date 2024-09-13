<?php

namespace App\Livewire;
use Auth;
use App\Models\Deposit;

use Livewire\Component;

class UserDeposit extends Component
{
    public $title = 'Fund Account';

    public $deposits;

    public function mount()
    {
        $user = Auth::guard('user')->user();
        $this->deposits = Deposit::where('user_id', $user->id)->latest()->get();
    }

    public function render()
    {
        return view('livewire.user.deposit')->title($this->title);;
    }
}
