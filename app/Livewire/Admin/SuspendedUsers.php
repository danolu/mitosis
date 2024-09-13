<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class SuspendedUsers extends Component
{
    public $title = 'Suspended Users';

    public $users;

    public function mount()
    {
        $this->users = User::where('status', '0')->get();
    }

    public function render()
    {
        return view('livewire.admin.suspended-users')->layout('components.layouts.admin')->title($this->title);
    }

    public function unsuspend(User $user) 
    {
        $user->status = 1;
        $user->save();
        if ($sav) {
            $this->dispatch('closeModal', name: 'unsuspend'.$id);
            $this->notify('success', 'User Unsuspended');
            return $this->dispatch('refreshTable');
        } else {
            $this->dispatch('closeModal', name: 'unsuspend'.$id);
            $this->notify('error', 'Unable to unsuspend user');
            return $this->dispatch('refreshTable');
        }   
    }
}
