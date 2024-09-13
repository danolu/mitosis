<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\AboutSite;

class SiteTerms extends Component
{
    public $title = 'Terms and Conditions';

    public $terms;

    public function mount()
    {
        $this->terms = AboutSite::firstOrFail()->value('terms');
    }
    
    public function render()
    {
        return view('livewire.admin.site-terms')->layout('components.layouts.admin')->title($this->title);
    }

    public function updateTerms()
    {
        $site = AboutSite::firstOrFail();
        $site->terms = $this->terms;
        $sav = $site->save();
        if ($sav) {
            return $this->notify('success', 'Terms and conditions updated');
        } else {
            return $this->notify('error', 'Unable to update terms and conditions');
        }
    } 
    

}
