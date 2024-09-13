<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Plan;


class CreatePlan extends Component
{
    public $title = 'Create Plan';

    public $name, $interest, $min_capital, $max_capital, $duration, $period, $ref_percent, $status;

    public function render()
    {
        return view('livewire.admin.create-plan')->layout('components.layouts.admin')->title($this->title);
    }

    public function store()
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
        $sav = Plan::create($validated);
        if ($sav) {
            $this->reset();
            return $this->notify('success', 'Plan created');
        } else {
            return $this->notify('error', 'Plan creation failed');
        }
    }
}
