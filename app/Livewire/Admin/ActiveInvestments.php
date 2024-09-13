<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Investment;

class ActiveInvestments extends Component
{
    public $investments;

    public $title = 'Active Investments';

    public function mount()
    {
        $this->investments = Investment::where('status', 0)->latest()->get();
    }

    public function render()
    {
        return view('livewire.admin.active-investments')->layout('components.layouts.admin')->title($this->title);
    }    

    public function destroy(Investment $investment)
    {
        $sav =  $investment->delete();
        if ($sav) {
            $this->dispatch('closeModal', name: 'delete'.$investment->id);
            $this->investments = Investment::where('status', 0)->latest()->get();
            $this->notify('success', 'Investment Deleted');
            return $this->dispatch('refreshTable');
        } else {
            return $this->notify('error', 'Unable to delete Investment');
            return $this->dispatch('refreshTable');
        }
    }
}
