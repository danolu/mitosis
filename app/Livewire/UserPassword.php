<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate; 
use Hash;
use Auth;
use App\Models\Activity;

class UserPassword extends Component
{
    public $title = 'Change Password';

    #[Validate('required|confirmed|string|min:8')] 
    public $password;

    #[Validate('required|string|min:8')] 
    public $password_confirmation;

    #[Validate('required|string')] 
    public $old_password; 

    public function render()
    {
        return view('livewire.user.password')->title($this->title);
    } 

    public function changePassword()
    { 
        $user = Auth::guard('user')->user();
        if (!Hash::check($this->old_password, $user->password)) {
            return $this->addError('old_password', 'The provided password does not match our records.');
        }
        if (Hash::check($this->password, $user->password)) {
            return $this->addError('password', 'New password cannot be the same as the current password.');
        }
        $this->validate();
        
        $user->password = Hash::make($this->password);
        $sav = $user->save();
        
        $audit['user_id'] = $user->id;
        $audit['activity'] = 'Changed password';
        Activity::create($audit);

        if ($sav) {
            Auth::guard('user')->attempt(['email' => $user->email, 'password' => $this->password]);
            $this->reset('old_password', 'password', 'password_confirmation');
            return $this->notify('success', 'Password Changed');
        } else {
            return $this->notify('error', 'Unable to change password');
        }
    } 
}
