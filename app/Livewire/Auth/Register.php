<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use Livewire\Attributes\Validate;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Hash;
use Auth;
use Illuminate\Auth\Events\Registered;

class Register extends Component
{

    #[Validate('required|string|alpha|max:191')] 
    public $first_name;
 
    #[Validate('required|string|alpha|max:191')] 
    public $last_name;

    #[Validate(['required', 'min:5', 'unique:users', 'regex:/^[a-zA-Z0-9]+/', 'not_regex:/(?:register|admin|username|login|joinus|administrator|logout|signin)/i'])] 
    public $username;

    #[Validate('bail|required|email|unique:users|max:191')] 
    public $email;

    #[Validate('required|string|max:20')] 
    public $phone;

    #[Validate('required|string|max:150')] 
    public $street;

    #[Validate('required|string|max:150')] 
    public $city;

    #[Validate('required|string|max:150')] 
    public $state;

    #[Validate('required|string|max:150')] 
    public $country;

    #[Validate('required|string|max:150')] 
    public $zip;

    #[Validate('required|confirmed|string|min:8')] 
    public $password;

    #[Validate('required|string|min:8')] 
    public $password_confirmation;

    #[Validate('required')] 
    public $terms;

    public $title = 'Register';

    public function render()
    {
        return view('livewire.auth.register')->layout('components.layouts.site')->title($this->title);
    }

    public function register(Request $request)
    {   
        $this->validate();   
        $user = new User();
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->email = $this->email;
        $user->username = $this->username;
        $user->phone = $this->phone;
        $user->street = $this->street;
        $user->city = $this->city;
        $user->state = $this->state;
        $user->country = $this->country;
        $user->zip = $this->zip;
        $user->ip_address = $request->ip();
        $user->last_login = Carbon::now(); 
        $user->password = Hash::make($this->password);
        $user->save();
        if (Auth::guard('user')->attempt(['email' => $this->email, 'password' => $this->password])) {
            event(new Registered($user));
            return redirect()->route('verification.notice');
        }
    }  

}
