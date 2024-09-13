<?php

namespace App\Livewire;

use Livewire\Component;
use Auth;
use Mail;
use App\Mail\SendMail;

class UserProfile extends Component
{
    public $title = "Profile";

    public $total_inv, $total_ref;

    public $reason;

    public function mount() 
    {
        $user = Auth::guard('user')->user();               
        $this->total_inv = $user->investments()->count();
        $this->total_ref = $user->referral_earnings()->count();
    }

    public function render()
    {   
        return view('livewire.user.profile')->title($this->title);;
    }

    public function destroy()
    {
        $this->validate([
            'reason' => 'string',
        ]);
        $user_del = Auth::guard('user')->user();
        $user = $user_del;
        $user_del = $user->delete();
        $site = Site::first();
        Auth::logout();
        $data['subject'] = $site->name.' Account Deletion';
        $data['content'] = 'Hello '.$user->first_name.',<br>We are sad to see you leave. If we can serve you better in any way, kindly let us know. If this was a mistake and you would like to restore your account, kindly get in touch with us within two weeks. <br>Thank you and kind regards.';
        Mail::to($user->email)->send(new SendMail($data));
        $data['subject'] = 'User Departure Notice';
        $data['content'] = 'Hello administrator,<br>'.$user->first_name.' '.$user->last_name.' just deleted their account.<br>Reason: '.$this->reason.'<br>Phone: '.$user->phone.'<br>Email: '.$user->email;
        Mail::to($site->support_email)->send(new SendMail($data));    
        session()->forget('fakey');
        return redirect()->route('login')->with('success', 'Account deleted successfully.');
    } 

    public function logoutOtherDevices()
    {
        Auth::guard('user')->logoutOtherDevices($password);  
        return $this->notify('success', 'Successfully logged out of other devices');
    }
}
