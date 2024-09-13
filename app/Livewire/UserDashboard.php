<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Plan;
use App\Models\Investment;
use App\Models\Activity;
use App\Models\Referral;
use App\Models\Currency;
use App\Models\ReferralEarning;
use App\Models\User;
use Carbon\Carbon;
use Auth;
use Mail;
use App\Mail\SendMail;
use Livewire\Attributes\Validate; 


class UserDashboard extends Component
{
    public $title = 'Dashboard';
    
    public $inv, $now, $start_date, $end_date, $progress, $count_inv, $hottest, $earnings, $activities;

    public function mount()
    {
        $user = Auth::guard('user')->user();
        $this->inv = $user->investments()->where('status', 0)->first();
        if ($this->inv) {
            $this->now = Carbon::now();
            $this->start_date = Carbon::parse($this->inv->start_date);
            $this->end_date = Carbon::parse($this->inv->end_date);
            $moved_hours = $this->now->diffInHours(Carbon::parse($this->start_date));
            $total_hours = $this->end_date->diffInHours($this->start_date);
            $this->progress = floor(100*$moved_hours/$total_hours);
        }
        $this->count_inv = $user->investments()->where('status', 1)->count();
        $this->hottest = Plan::where('status', 1)->first();
        $this->earnings = $user->investments()->where('status', 1)->sum('interest');
        $this->activities = $user->activities()->latest()->limit(3)->get();     
    }

    public function render()
    {    
        return view('livewire.user.dashboard')->title($this->title);
    }

    public function autoRenew(Investment $investment)
    {
        if(Auth::guard('user')->id() === $investment->user_id)
        {
            $user = Auth::guard('user')->user();
            $investment->autorenewal = 1;
            $investment->save();
            $audit['user_id'] = $user->id;
            $audit['activity'] = 'Enabled autorenewal for investment '.$investment->ref;
            Activity::create($audit);
            $this->inv = $user->investments()->where('status', 0)->first();
            return $this->notify('success', 'Autorenewal enabled.');
        }
    } 

    public function cancelRenewal(Investment $investment)
    {
        if(Auth::guard('user')->id() === $investment->user_id) 
        {
            $user = Auth::guard('user')->user();
            $investment->autorenewal = 0;
            $investment->save();
            $audit['user_id'] = $user->id;
            $audit['activity'] = 'Cancelled autorenewal for investment '.$investment->ref;
            Activity::create($audit);
            $this->inv = $user->investments()->where('status', 0)->first();
            return $this->notify('success', 'Autorenewal Disabled');
        }
    }
}
