<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class DeletedUsers extends Component
{
    public $title = 'Deleted Users';
    
    public $users;

    public function render()
    {
        $this->users = User::onlyTrashed()->get();
        return view('livewire.admin.deleted-users')->layout('components.layouts.admin')->title($this->title);
    }

    public function restore(User $user)
    {
        $sav = $user->restore();
        if ($sav) {
            $this->dispatch('closeModal', name: 'restore'.$id);
            $this->notify('success', 'User Restored');
            return $this->dispatch('refreshTable');
        } else {
            $this->dispatch('closeModal', name: 'restore'.$id);
            $this->notify('error', 'User restoration failed');
            return $this->dispatch('refreshTable');
        }
    }
}
