<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Hash;
use Str;
use Session;

class ResetPassword extends Component
{

    public $email;
    public $password;
    public $token;

    public $title = 'Reset Password';

    public function mount($token)
    {
        $this->token = $token;
    }

    public function render()
    {
        return view('livewire.auth.reset-password')->layout('components.layouts.site')->title($this->title);
    }

    public function resetPassword() 
    {
        $this->validate([
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $this->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) use ($request) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->save();

            $user->setRememberToken(Str::random(60));

            event(new PasswordReset($user));
        }
    );

    return $status == Password::PASSWORD_RESET
                ? session()->flash('status', __($status)) && $this->redirectRoute('login', navigate: true)
                : $this->addError('email', __($status));
    }
}
