<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Plan;

class UpdatePlan extends Component
{
    public $title = 'Create Plan';

    public Plan $plan, $name, $interest, $min_capital, $max_capital, $duration, $period, $ref_percent, $status;

    public function render()
    {
        return view('livewire.admin.update-plan')->layout('components.layouts.admin')->title($this->title);
    }

    public function update()
    {
        $validated = $this->validate([
            'name' => 'required|string',
            'interest' => 'required|numeric',
            'min_capital' => 'required|numeric',
            'max_capital' => 'required|numeric',
            'duration' => 'required|numeric',
            'period' => 'required|string',
            'ref_percent' => 'required|numeric',
            'status' => 'required|numeric',
        ]);
        $sav = $this->plan->update($validated);
        if ($sav) {
            return $this->notify('success', 'Plan updated');
        } else {
            return $this->notify('error', 'Plan update failed');
        }
    } 
}
