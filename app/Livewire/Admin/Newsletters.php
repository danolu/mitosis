<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Mail;
use App\Mail\Newsletter;

class Newsletters extends Component
{
    public $title = 'Send Newsletter';

    public $subject,
            $message;

    public function render()
    {
        return view('livewire.admin.newsletters')->layout('components.layouts.admin')->title($this->title);
    }
    
    public function send()
    {        	
        $this->validate([
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);
        $data['subject'] = $this->subject;
    	$data['content'] = $this->message;
        $users = User::where('status', 1)->get();
        foreach ($users as $user) {
            $data['first_name'] = $user->first_name;
            Mail::to($user->email)->send(new Newsletter($data));
        };  
        $this->reset('subject', 'message');
        return $this->notify('success', 'Newsletter dispatched');
    } 
}
