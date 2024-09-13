<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\AboutSite;

class SiteAbout extends Component
{
    public $title = 'About';

    public $about;
    
    public function render()
    {
        return view('livewire.admin.site-about')->layout('components.layouts.admin')->title($this->title);
    }

    public function updateAbout()
    {
        $this->validate([
            'about' => 'required|string'
        ]);
        $site = AboutSite::firstOrFail();
        $site->about = $this->about;
        $sav = $site->save();
        if ($sav) {
            return $this->notify('success', 'Update successful');
        } else {
            return $this->notify('error', 'Update failed');
        }
    } 

}
