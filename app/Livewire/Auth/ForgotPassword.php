<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Password;

class ForgotPassword extends Component
{
    public $title = 'Forgot Password';

    public $email;
    
    public function render()
    {
        return view('livewire.auth.forgot-password')->layout('components.layouts.site')->title($this->title);
    }

    public function requestLink() {
        $this->validate(['email' => 'required|email']);
        $status = Password::sendResetLink($this->only('email'));
        
        return $status === Password::RESET_LINK_SENT
                ? session()->flash('success', __($status)) && $this->redirectRoute('password.request', navigate: true)
                : $this->addError('email', __($status));
    }
}
