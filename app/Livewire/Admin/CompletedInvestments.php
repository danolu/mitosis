<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Investment;

class CompletedInvestments extends Component
{
    public $investments;

    public $title = 'Completed Investments'; 

    public function mount()
    {
        $investments = Investment::where('status', 1)->latest()->get();
    }

    public function render()
    {
        return view('livewire.admin.completed-investments')->layout('components.layouts.admin')->title($this->title);
    }

    public function destroy(Investment $investment)
    {
        $sav =  $investment->delete();
        if ($sav) {
            $this->dispatch('closeModal', name: 'delete'.$investment->id);
            $this->investments = Investment::where('status', 1)->latest()->get();
            $this->notify('success', 'Investment Deleted');
            return $this->dispatch('refreshTable');
        } else {
            return $this->notify('error', 'Unable to delete Investment');
            return $this->dispatch('refreshTable');
        }
    }
    
    
}
