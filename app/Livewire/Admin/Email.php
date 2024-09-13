<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Locked;
use Mail;
use App\Mail\SendMail;
use App\Models\User;
use Livewire\Attributes\Validate; 

class Email extends Component
{
    #[Validate('required|string')] 
    public $subject;

    #[Validate('required|string')] 
    public $message; 

    #[Locked]
    public $email; 
    
    public $user, $name;

    public $title = 'Send Email';

    public function mount(User $user)
    {
        $this->name = $user->first_name;
        $this->email = $user->email;
    }

    public function render()
    {
        return view('livewire.admin.email')->layout('components.layouts.admin')->title($this->title);
    }
    
    public function send()
    {        	
        $this->validate();
    	$data['name'] = $this->name;
        $data['subject'] = $this->subject;
    	$data['content'] = $this->message;
        $sav = Mail::to($this->email)->send(new SendMail($data));
        if ($sav) {
            $this->reset('subject', 'message');
            return $this->notify('success', 'Email Sent');
        } else {
            return $this->dispatch('error', 'Unable to send email');
        }
    }
    
}
