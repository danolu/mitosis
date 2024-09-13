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

class UserInvest extends Component
{
    public $title = 'Invest Plans';

    public $plan, $interest, $interest_percentage, $ending_date; 

    #[Validate('required|numeric')] 
    public $capital;

    public function mount(Plan $plan)
    {
        $this->plan = $plan;
        $this->ending_date = Carbon::now();
        $this->ending_date->add($plan->duration, $plan->period);
        $this->interest_percentage = $plan->interest;
    }
    
    public function render()
    {   
        $this->interest = intval($this->capital) * intval($this->interest_percentage) / 100;
        return view('livewire.user.invest')->title($this->title);
    } 

    public function invest()
    {  
        $user = Auth::guard('user')->user();
        $capital = $this->capital;
        $plan = $this->plan;

        if ($user->balance<$capital) {
            return $this->addError('capital', 'Insufficient funds. Kindly fund your account and try again.');
        }
        if ($capital<$plan->min_capital) {
            return $this->addError('capital', 'Minimum plan investment capital exceeds investment capital.');
        }
        if ($capital>$plan->max_capital) {
            return $this->addError('capital', 'Investment capital exceeds maximum plan investment capital.');
        }
        $this->validate(); 

        $settings = Site::firstOrFail();
        $currency = Currency::first();
        $start_date = Carbon::now();
        $end_date = Carbon::now();
        $end_date->add($plan->duration, $plan->period);

        $sav['user_id'] = $user->id;
        $sav['plan_id'] = $plan->id;
        $sav['capital'] = $capital;
        $sav['interest'] = ($plan->interest*$capital)/100;
        $sav['start_date'] = $start_date;
        $sav['end_date'] = $end_date;
        $sav['ref'] = str::random(16);
        Investment::create($sav);

        $user->balance = $user->balance - $capital;
        $user->save();

        $audit['user_id'] = $user->id;
        $audit['activity'] = 'Invested ' .$currency->symbol.$capital. ' (' .$plan->name. ' plan)';
        Activity::create($audit);

        $data['subject'] = 'Investment Confirmation';
        $data['content'] = 'Hello '.$user->first_name.',<br>Your investment of'.$currency->symbol.$capital.' ('.$plan->name.' plan) has started and will run for '.$plan->duration.' '.$plan->period.'. Thank you for investing with us.';
        Mail::to($user->email)->send(new SendMail($data));

        $ref = Referral::where('referee_id', $user->id)->where('status', 0)->first();    
        if ($settings->referral==1 && $ref && $plan->ref_percent>0){
            $ref_earning = ($capital*$plan->ref_percent)/100;
            $investment_id = Investment::where('user_id', $user->id)->latest()->first()->value('id');
            $refE['user_id']= $ref->user_id;
            $refE['referee_id'] = $ref->referee_id;
            $refE['investment_id'] = $investment_id;
            $refE['amount'] = $ref_earning;
            $refE['ref'] = str::random(16);
            ReferralEarning::create($refE);
            $user_update = User::where('id', $ref->referrer_id)->first();
            $user_update->ref_bonus = $user_update->ref_bonus + $ref_earning;
            $user_update->balance = $user_update->balance + $ref_earning;
            $user_update->save();
            $ref->status = 1;
            $ref->save();
            $audit['user_id'] = $ref->user_id;
            $audit['activity'] = 'Received '.$currency->symbol.$ref_earning.' referral bonus for '.$user->first_name.' '.$user->last_name;
            Activity::create($audit);
        }
        $this->reset('capital');
        return $this->notify('success', 'Investment Successful');
    }
}
