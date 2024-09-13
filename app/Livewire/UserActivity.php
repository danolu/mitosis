<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Activity;
use Auth;
use Livewire\WithPagination;

class UserActivity extends Component
{
    public $title = 'Activity Log';

    use WithPagination;

    public function render()
    {
        $user_id = Auth::guard('user')->user()->id;
        $activities = Activity::where('user_id', $user_id);
        return view('livewire.user.activity', [
            'activities' => $activities->paginate(10),
        ])->title($this->title);
    }

}
