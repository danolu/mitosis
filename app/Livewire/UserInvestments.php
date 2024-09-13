<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Activity;
use App\Models\Investment;
use Carbon\Carbon;
use Auth;

class UserInvestments extends Component
{
    public $title = 'Investments';

    public $active_invs, $completed_invs;

    public function mount() {
        $user = Auth::guard('user')->user();
        $this->active_invs = $user->investments()->where('status', 0)->latest()->get();
        $this->completed_invs = $user->investments()->where('status', 1)->get();
    }

    public function render()
    {                           
        return view('livewire.user.investments')->title($this->title);
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
            $this->active_invs = $user->investments()->where('status', 0)->latest()->get();
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
            $this->active_invs = $user->investments()->where('status', 0)->latest()->get();
            return $this->notify('success', 'Autorenewal Disabled');
        }
    }
}
