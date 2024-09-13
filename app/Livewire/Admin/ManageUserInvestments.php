<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Investment;
use App\Models\User;

class ManageUserInvestments extends Component
{
    public $title, 
            $user, 
            $investments; 
     
    public function mount(User $user){
        $this->user = $user;
        $this->title = $user->first_name.' '.$user->last_name.' Investments';
        $this->deposits = $user->investments()->latest()->get();
    }

    public function render()
    {
        return view('livewire.admin.manage-user-investments')->layout('components.layouts.admin')->title($this->title);
    }

    public function destroy(Investment $investment)
    {
        $sav =  $investment->delete();
        if ($sav) {
            $this->dispatch('closeModal', name: 'delete'.$investment->id);
            $this->investments = Investment::latest()->get();
            $this->notify('success', 'Investment Deleted');
            return $this->dispatch('refreshTable');
        } else {
            return $this->notify('error', 'Unable to delete Investment');
            return $this->dispatch('refreshTable');
        }
    }
}
