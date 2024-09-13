<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class ManageUser extends Component
{
    public $title, 
            $user, $balance, $first_name, $last_name,
            $deposits, 
            $payouts, 
            $investments, 
            $active_investments, 
            $highest_capital, 
            $total_investments, 
            $total_invested, 
            $referral_earnings, 
            $ref_earnings, 
            $referees, 
            $referrals;

    public function mount(User $user){
        $this->user = $user;
        $this->balance = $user->balance;
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->title = $user->first_name.' '.$user->last_name;
        $this->deposits = $user->deposits()->latest()->get();
        $this->payouts = $user->payouts()->latest()->get();
        $this->investments = $user->investments()->latest()->get();
        $this->active_investments = $user->investments()->where('status', 0)->count();
        $this->highest_capital = $user->investments()->orderBy('capital', 'desc')->first();
        $this->total_investments = $total_investments = $user->investments()->count();
        $this->total_invested = $user->investments()->sum('capital');
        $this->referral_earnings = $user->referral_earnings()->latest()->get();
        $this->ref_earnings = $user->referral_earnings()->sum('amount');
        $this->referees = $user->referrals()->count();
        $this->referrals = $user->referrals()->latest()->get();
    }

    public function render()
    {
        return view('livewire.admin.manage-user')->layout('components.layouts.admin')->title($this->title);
    } 

    public function update(User $user)
    {
    	$this->validate([
            'first_name' => 'required|string|alpha|max:255',
            'last_name' => 'required|string|alpha|max:255',
            'balance' => 'required',
        ]);
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->balance = $this->balance;       
        $sav = $user->save();
        if ($sav) {
            return $this->notify('success', 'User profile updated');
        } else {
            return $this->notify('error', 'User profile update failed');
        }
    }

    public function updateBalance(User $user)
    {
        $this->validate([
            'balance' => 'required|numeric',
        ]);
        $user->balance = $this->balance;       
        $sav = $user->save();
        if ($sav) {
            $this->dispatch('closeModal', name: 'updateBalance');
            $this->dispatch('feather');
            $this->user = $user;
            return $this->notify('success', 'User balance updated');
        } else {
            $this->dispatch('closeModal', name: 'updateBalance');
            $this->dispatch('feather');
            $this->user = $user;
            return $this->notify('error', 'User balance update failed');
        }
    }

    public function suspend(User $user)
    {
        $user->status = 0;
        $sav = $user->save();
        if ($sav) {
            $this->user = $user;
            $this->dispatch('feather');
            return $this->notify('success', 'User suspended');
        } else {
            $this->dispatch('feather');
            return $this->notify('error', 'Unable to suspend user');
        }
    } 

    public function unsuspend(User $user)
    {
        $user->status = 1;
        $sav = $user->save();
        if ($sav) {
            $this->user = $user;
            $this->dispatch('feather');
            return $this->notify('success', 'User restored');
        } else {
            $this->dispatch('feather');
            return $this->notify('error', 'Unable to restore user');
        }
    }

    public function destroy(User $user)
    {
        $del = $user->delete();
        if ($del) {
            return $this->redirectRoute('users', navigate: true);
        } else {
            return $this->notify('error', 'Unable to delete user');
        }
    }
}
