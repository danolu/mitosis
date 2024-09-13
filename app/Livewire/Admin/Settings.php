<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Site;
use App\Models\SiteBank;
use App\Models\Admin;
use App\Models\Payout;
use App\Models\User;
use App\Models\Investment;
use App\Models\ReferralEarning;
use Hash;
use Auth;
use Illuminate\Http\Request;

class Settings extends Component
{
    public $title = 'Settings';
    public $email, $name, $support_email, $phone, $alt_phone, $address, $description, $site_title;

    public function mount()
    {
        $site = Site::firstOrFail();
        $this->name = $site->name;
        $this->email = $site->email;
        $this->support_email = $site->support_email;
        $this->phone = $site->phone;
        $this->alt_phone = $site->alt_phone;
        $this->address = $site->address;
        $this->description = $site->description;
        $this->site_title = $site->site_title;
    }

    public function render()
    {
        return view('livewire.admin.settings')->layout('components.layouts.admin')->title($this->title);
    }    
    
    public function update()
    {
        $data = Site::firstOrFail();
        $validated = $this->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'support_email' => 'required|email',
            'phone' => 'required|string',
            'alt_phone' => 'required|string',
            'address' => 'required|string',
            'site_title' => 'required|string',
            'description' => 'required|string',
        ]);
        $sav = $data->update($validated);
        if ($sav) {
            return $this->notify('success', 'Settings updated');
        } else {
            return $this->notify('error', 'Unable to update settings');
        }
    }
}
