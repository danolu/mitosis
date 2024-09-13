<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate; 
use App\Models\Plan;
use App\Models\Investment;
use App\Models\Activity;
use App\Models\Referral;
use App\Models\Currency;
use App\Models\Site;
use App\Models\ReferralEarning;
use Auth;
use Str;
use Mail;
use App\Mail\SendMail;
use Carbon\Carbon;

class UserInvestmentPlans extends Component
{
    public $title = 'Investment Plans';

    public $plans;

    public $interest_percentage; 

    public $interest_capital = 0;

    public $interest_interest;

    public function mount()
    {
        $plan = Plan::where('status', 1)->first();
        $this->interest_percentage = $plan->interest;
    }

    
    public function render()
    {   $this->interest_interest = intval($this->interest_capital) * intval($this->interest_percentage) / 100;
        $this->plans = Plan::where('status', 1)->orderBy('interest', 'asc')->get();
        return view('livewire.user.investment-plans')->title($this->title);
    }
}
