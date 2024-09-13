<?php

namespace App\Livewire;

use Livewire\Component;
use Auth;
use App\Models\Payout;
use Livewire\WithPagination;

class UserWithdrawal extends Component
{
    public $title = 'Withdrawal';

    public $total;

    public function mount()
    {
        
    }

    use WithPagination;

    public function render()
    {    
        $user = Auth::guard('user')->user();
        $withdrawals = Payout::where('user_id', $user->id);
        $this->total = Payout::where('user_id', $user->id)->sum('amount');
        return view('livewire.user.withdrawal', [
            'withdrawals' => $withdrawals->paginate(10),
        ])->title($this->title);
    }   

}
