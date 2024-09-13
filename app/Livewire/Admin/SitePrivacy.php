<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\AboutSite;

class SitePrivacy extends Component
{
    public $title = 'Privacy Policy';

    public $policy;

    public function mount() 
    {
        $this->policy = AboutSite::first()->value('privacy_policy');
    }

    public function render()
    {
        return view('livewire.admin.site-privacy')->layout('components.layouts.admin')->title($this->title);
    }
    
    public function updatePrivacy(Request $request)
    {
        $data = AboutSite::firstOrFail();
        $data->privacy_policy = $request->policy;
        $sav = $data->save();
        if ($sav) {
            return $this->notify('success', 'Privacy policy updated');
        } else {
            return $this->notify('error', 'Unable to update privacy policy');
        }
    }
    
}
