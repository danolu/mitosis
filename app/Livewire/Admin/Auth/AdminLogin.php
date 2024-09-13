<?php

namespace App\Livewire\Admin\Auth;

use Livewire\Component;
use App\Models\Admin;
use Livewire\Attributes\Validate;
use Session;
use Auth;

class AdminLogin extends Component
{
    public $title = 'Admin Login';
    
    #[Validate('required|string|max:91')] 
    public $username = '';
 
    #[Validate('required')] 
    public $password = '';

    public function render()
    {
        return view('livewire.admin.auth.login')->layout('components.layouts.auth')->title($this->title);
    }

    public function login()
    {
        $this->validate();

        $fieldType = filter_var($this->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $username_check = Admin::where($fieldType, $this->username)->first();
        if (Auth::guard('admin')->attempt([$fieldType => $this->username, 'password' => $this->password], false)) {
            Session::put('fakey');
            Session::regenerate();
            return $this->redirectIntended('/admin/dashboard');
        } elseif (!$username_check) {
            return $this->addError('username', 'This user does not exist on our system.');
        } else {
            return $this->addError('password', 'Incorrect password!');
        }
    }
}
