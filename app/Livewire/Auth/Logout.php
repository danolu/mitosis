<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Auth, Session;

class Logout extends Component
{
    public function logout()
    {
        Auth::guard('user')->logout();
        Session::invalidate();
        Session::regenerateToken();
        return redirect()->route('login');
    }

    public function render()
    {
        return view('components.user.auth.logout');
    }
}
