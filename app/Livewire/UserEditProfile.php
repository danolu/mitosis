<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Activity;
use Livewire\Attributes\Validate; 
use Livewire\WithFileUploads;
use Image;
use Storage;
use Auth;
use Mail;

class UserEditProfile extends Component
{
    use WithFileUploads;

    #[Validate('required|image|max:1024')] 
    public $avatar;

    public $phone, $name, $email, $username, $street, $city, $state, $zip, $country;

    public function mount()
    {
        $user = Auth::guard('user')->user();
        $this->name = $user->first_name.' '.$user->last_name;
        $this->phone = $user->phone;
        $this->email = $user->email;
        $this->username = $user->username;
        $this->street = $user->street;
        $this->city = $user->city;
        $this->state = $user->state;
        $this->zip = $user->zip;
        $this->country = $user->country;
    }

    public function render()
    {
        return view('livewire.user.edit-profile');
    }

    public function update()
    {
        $this->validate([
            'phone' => 'required',
            'street' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|string',
            'zip' => 'required|string'
        ]);
        
        $user = Auth::guard('user')->user();
        $user->phone = $this->phone;
        $user->street = $this->street;
        $user->city = $this->city;
        $user->state = $this->state;
        $user->country = $this->country;
        $user->save();
        $audit['user_id'] = $user->id;
        $audit['activity'] = 'Updated account details';
        Activity::create($audit); 
        return $this->notify('success', 'Profile Updated');
    }

    public function updateAvatar()
    {
        $this->validate();

        $user = Auth::guard('user')->user();

        $path = $this->avatar->storePublicly(path: 'avatars');
        if ($user->profile_photo != null) {
            Storage::delete($user->profile_photo);
        }
        Image::make(storage_path('app/'.$path))->resize(120, 120)->save(storage_path('app/'.$path));
        $user->profile_photo = $path;
        $user->save();
        $audit['user_id'] = $user->id;
        $audit['activity'] ='Changed profile photo';
        Activity::create($audit);
        $this->reset('avatar');
        return $this->notify('success', 'Avatar Updated');
    }  
}
