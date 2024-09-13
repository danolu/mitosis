<?php

namespace App\Livewire\Auth;

use App\Models\Referral;

use Livewire\Component;
use App\Models\User;
use Livewire\Attributes\Validate;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Hash;
use Auth;
use Illuminate\Auth\Events\Registered;

class ReferralRegister extends Component
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

    public $referee;

    public function render()
    {
        return view('livewire.auth.register')->layout('components.layouts.site')->title($this->title);
    }

    public function mount($username)
    {
        $this->referee = $username;   
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
        $referred = User::where('username', $this->username)->firstOrFail();
        $referee = User::where('username', $this->referee)->firstOrFail();
        $sav['user_id'] = $referred->id;
        $sav['referee_id'] = $referee->id;
        Referral::create($sav);
        if (Auth::guard('user')->attempt(['email' => $this->email, 'password' => $this->password])) {
            event(new Registered($user));
            return redirect()->route('verification.notice');
        }
    }
}
