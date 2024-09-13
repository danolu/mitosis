<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\ReferralEarning;

class ManageUserReferrals extends Component
{
    public $title, 
            $user,
            $earnings;
            
    public function mount(User $user){
        $this->user = $user;
        $this->title = $user->first_name.' '.$user->last_name.' Referrals';
        $this->earnings = $user->referrals()->latest()->get();
    }

    public function render()
    {
        return view('livewire.admin.manage-user-referrals')->layout('components.layouts.admin')->title($this->title);
    }
}
