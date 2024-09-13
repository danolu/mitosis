<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\ReferralEarning;

class Referrals extends Component
{
    public $title = 'Referral Earnings';
    
    public $earnings;

    public function mount()
    {
        $this->earnings = ReferralEarning::latest()->get();
    }

    public function render()
    {
        return view('livewire.admin.referrals')->layout('components.layouts.admin')->title($this->title);
    } 
}
