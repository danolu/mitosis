<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class Verification extends Component
{
    public $title = 'Verify Email';
    
    public function render()
    {
        return view('livewire.auth.verification')->layout('components.layouts.site')->title($this->title);
    }

    public function resend(Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return session()->flash('resent', 'verification-link-sent') && $this->redirectRoute('verification.notice', navigate: true);
    }
}
