<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ReferralEarning;
use Auth;

class UserReferrals extends Component
{
    public $title = 'Referral';
    public $earnings, $count_ref, $ref_earnings;

    public function mount() 
    {
        $user = Auth::guard('user')->user();
        $this->count_ref = $user->referral_earnings()->count();
        $this->ref_earnings = $user->referral_earnings()->sum('amount');
        $this->earnings = ReferralEarning::where('user_id', $user->id)->latest()->get();
    }

    public function render()
    {
        return view('livewire.user.referrals')->title($this->title);
    }
}
