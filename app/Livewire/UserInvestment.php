<?php

namespace App\Livewire;

use Livewire\Component;

class UserInvestment extends Component
{
    public $title = "Investment";

    public Investment $investment;

    public function render()
    {
        return view('livewire.user.investment')->title($this->title);
    }
}
