<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use App\Models\Activity;
use Illuminate\Http\Request;
use Livewire\Attributes\Validate;
use Carbon\Carbon;
use App\Mail\SendMail;
use Auth;
use Mail;
use Session;

class Login extends Component
{
    public $title = 'Log in';

    #[Validate('required|string|max:91')] 
    public $username = '';
 
    #[Validate('required')] 
    public $password = '';

    public $remember = '';

    public function login(Request $request)
    {  
        $this->validate(); 
        $fieldType = filter_var($this->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $username_check = User::where($fieldType, $this->username)->first();
        if ($username_check && Auth::guard('user')->attempt([$fieldType => $this->username, 'password' => $this->password, 'status' => 1], $this->remember)) {
            $ip_address = $request->ip();
            $user = Auth::guard('user')->user();
            if($ip_address!=$user->ip_address) {
                $data['subject'] = 'Suspicious Login Attempt';
                $data['content'] = 'Hello, '.$user->first_name.'.<br>Your account was just accessed from an unknown IP address: '.$ip_address.'.<br>If this was you, ignore this message, otherwise, kindly reset your password and log out of other devices.';
                Mail::to($user->email)->send(new SendMail($data));
            }
            $user->last_login = Carbon::now();
            $user->ip_address = $ip_address;
            $user->save();
            Session::put('fakey');
            $audit['user_id'] = $user->id;
            $audit['activity'] = 'Logged in';
            Activity::create($audit);
            $request->session()->regenerate();
            return $this->redirectIntended('/dashboard');
        } elseif ($username_check && Auth::guard('user')->attempt([$fieldType => $request->username, 'password' => $request->password, 'status' => 0], $request->remember)) {
            session()->flash('alert', 'Your account has been suspended. Contact us for more details.'); 
            return $this->redirectRoute('login', navigate: true);
        } elseif (!$username_check) {
            return $this->addError('username', 'This user does not exist on our system.');
        } else {
            return $this->addError('password', 'Incorrect password!');
        }
    }
    
    public function render()
    {
        return view('livewire.auth.login')->layout('components.layouts.site')->title($this->title);
    }
}
