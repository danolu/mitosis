<?php

namespace App\Livewire\Admin;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Investment;
use App\Models\Deposit;
use App\Models\Payout;
use App\Models\Notification;

use Livewire\Component;

class Dashboard extends Component
{
    public $title = 'Dashboard';
    
    public $total_users, $active_users, $suspended_users, 
            $signups_today, $signups_yesterday, 
            $signups_this_week, $signups_last_week, 
            $signups_this_month, $signups_last_month,
            $daily_increase, $weekly_increase, $monthly_increase, 
            $notifications, 
            $total_deposits, $pending_deposits, 
            $total_payouts, $pending_payouts, 
            $active_investments, $completed_investments, 
            $investments_today, $investments_yesterday, 
            $daily_inv_increase, 
            $investments_this_week, $investments_last_week, 
            $weekly_inv_increase, 
            $investments_this_month, $investments_last_month, 
            $monthly_inv_increase, 
            $upcoming_dues, $total_upcoming_dues;

    public function mount() 
    {
        $this->total_users = User::count();
        $this->active_users = User::where('status', 1)->count();
        $this->suspended_users = User::where('status', 0)->count();

        $this->signups_today = $today = User::where('created_at', '>=', Carbon::today())->count();
        $this->signups_yesterday = $yesterday = User::where('created_at', '>=', Carbon::yesterday())->count();

        if ($today-$yesterday!=0 && $yesterday!=0) {
            $this->daily_increase = ($today-$yesterday)*100/$yesterday;
        }elseif($today-$yesterday!=0 && $yesterday==0){
            $this->daily_increase = $today*100;
        }else {
            $this->daily_increase = 0;
        }

        $this->signups_this_week = $this_week = User::where('created_at', '>=', Carbon::today()->startOfWeek())->count();
        $this->signups_last_week = $last_week = User::whereBetween('created_at', [Carbon::today()->subWeek()->startOfWeek(), Carbon::today()->subWeek()->endOfWeek()])->count();
        if ($this_week-$last_week!=0 && $last_week!=0) {
            $this->weekly_increase = ($this_week-$last_week)*100/$last_week;
        }elseif($this_week-$last_week!=0 && $last_week==0){
            $this->weekly_increase = $today*100;
        }else {
            $this->weekly_increase = 0;
        }

        $this->signups_this_month = $this_month = User::where('created_at', '>=', Carbon::today()->startOfMonth())->count();
        $this->signups_last_month = $last_month = User::whereMonth('created_at', Carbon::today()->subMonth()->format('m'))->count();  
        if ($this_month-$last_month!=0 && $last_month!=0) {
            $this->monthly_increase = ($this_month-$last_month)*100/$last_month;
        }elseif($this_month-$last_month!=0 && $last_month==0){
            $this->monthly_increase = $today*100;
        }else {
            $this->monthly_increase = 0;
        }

        $this->notifications = Notification::latest()->limit(10)->get();
        $this->total_deposits = Deposit::where('status', 1)->count();
        $this->pending_deposits = Deposit::where('status', 0)->count();               
        $this->total_payouts = Payout::where('status', 1)->count();
        $this->pending_payouts = Payout::where('status', 0)->count();                
        $this->active_investments = Investment::where('status', 0)->count();
        $this->completed_investments = Investment::where('status', 0)->count();

        $this->investments_today = $inv_today = Investment::where('created_at', '>=', Carbon::today())->count();
        $this->investments_yesterday = $inv_yesterday = Investment::where('created_at', '>=', Carbon::yesterday())->count();
        if ($inv_today-$inv_yesterday!=0 && $inv_yesterday!=0) {
            $this->daily_inv_increase = ($inv_today-$inv_yesterday)*100/$inv_yesterday;
        }elseif($inv_today-$inv_yesterday!=0 && $inv_yesterday==0){
            $this->daily_inv_increase = $inv_today*100;
        }else {
            $this->daily_inv_increase = 0;
        }
        $this->investments_this_week = $inv_this_week = Investment::where('created_at', '>=', Carbon::today()->startOfWeek())->count();
        $this->investments_last_week = $inv_last_week = Investment::whereBetween('created_at', [Carbon::today()->subWeek()->startOfWeek(), Carbon::today()->subWeek()->endOfWeek()])->count();
        if ($inv_this_week-$inv_last_week!=0 && $inv_last_week!=0) {
            $this->weekly_inv_increase = ($inv_this_week-$inv_last_week)*100/$inv_last_week;
        }elseif($inv_this_week-$inv_last_week!=0 && $inv_last_week==0){
            $this->weekly_inv_increase = $inv_today*100;
        }else {
            $this->weekly_inv_increase = 0;
        }

        $this->investments_this_month = $inv_this_month = Investment::where('created_at', '>=', Carbon::today()->startOfMonth())->count();
        $this->investments_last_month = $inv_last_month = Investment::whereMonth('created_at', Carbon::today()->subMonth()->format('m'))->count();  
        if ($inv_this_month-$inv_last_month!=0 && $inv_last_month!=0) {
            $this->monthly_inv_increase = ($inv_this_month-$inv_last_month)*100/$inv_last_month;
        }elseif($inv_this_month-$inv_last_month!=0 && $inv_last_month==0){
            $this->monthly_inv_increase = $inv_today*100;
        }else {
            $this->monthly_inv_increase = 0;
        }

        $this->upcoming_dues = Investment::where('status', 0)->latest()->limit(10)->get();
        $this->total_upcoming_dues = Investment::where('status', 0)->where('autorenewal', 0)->whereBetween('end_date', [Carbon::today(), Carbon::today()->addWeek()])->get();
    }

    public function render()
    {
        return view('livewire.admin.dashboard')->layout('components.layouts.admin')->title($this->title);
    }  
}
