<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Admin;
use App\Models\User;
use App\Models\Investment;
use App\Models\ReferralEarning;
use Livewire\Attributes\Validate; 
use Auth;
use Hash;


class AdminProfile extends Component
{
    public $title = 'Profile';

    public $admin, $users, $investments, $total_capital, $total_interest, $total_payout, $total_ref;

    #[Validate('required|string')] 
    public $username;

    #[Validate('required|email')] 
    public $email;

    #[Validate('required|string')] 
    public $old_password; 

    #[Validate('required|confirmed|string|min:8')] 
    public $password;

    #[Validate('required|string|min:8')] 
    public $password_confirmation;

    public function mount() 
    {
        $this->users = User::count();
        $this->investments = Investment::count();
        $this->total_capital = Investment::sum('capital');
        $this->total_interest = Investment::sum('interest');
        $this->total_ref = ReferralEarning::sum('amount');
        $this->admin = $admin = Auth::guard('admin')->user();
        $this->username = $admin->username;
        $this->email = $admin->email;
    }

    public function render()
    {
        return view('livewire.admin.profile')->layout('components.layouts.admin')->title($this->title);
    }

    public function update()
    {
        $this->validate();
        $admin = Auth::guard('admin')->user();
        if (!Hash::check($this->old_password, $admin->password)) {
            return $this->addError('old_password', 'The provided password does not match our records.');
        }

        if ($this->admin === $admin->admin && $this->email === $admin->email && Hash::check($this->password, $admin->password)) {
            return $this->addError('password', 'New password cannot be the same as current password.');
        }
        $this->validate();
        
        $admin->password = Hash::make($this->password);

        $admin->username = $this->username;
        $admin->email = $this->email;
        $sav = $admin->save();
        if ($sav) {
            Auth::guard('admin')->attempt(['username' => $this->username, 'password' => $this->password]);
            return $this->notify('success', 'Login details updated successfully');
        } else {
            return $this->notify('error', 'Unable to update login details');
        }
    }
}
