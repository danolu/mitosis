<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class Users extends Component
{
    public $title = 'Users';

    public $users;

    public function mount()
    {
        $this->users = User::latest()->get();
    }

    public function render()
    {
        return view('livewire.admin.users')->layout('components.layouts.admin')->title($this->title);
    }
		
    public function destroy($id)
    {
        $this->user_destroyed = false;
        $sav = User::findOrFail($id)->delete();
        if ($sav) {
            $this->dispatch('closeModal', name: 'delete'.$id);
            $this->users = User::latest()->get();
            $this->notify('success', 'User account deleted');
            return $this->dispatch('refreshTable');
        } else {
            $this->dispatch('closeModal', name: 'delete'.$id);
            $this->notify('error', 'Unable to delete user account');
            return $this->dispatch('refreshTable');
        }
    }
}
