<?php

namespace App\Livewire\Admin\Auth;

use Livewire\Component;
use Auth;
use Session;

class AdminSidebarLogout extends Component
{
    public function render()
    {
        return view('components.admin.auth.sidebar-logout');
    }
    
    public function logout()
    {
        Auth::guard('admin')->logout();
        Session::invalidate();
        Session::regenerateToken();
        return $this->redirectRoute('/admin');
    }
}
