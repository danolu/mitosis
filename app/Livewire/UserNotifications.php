<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Notification;
use Auth;

class UserNotifications extends Component
{
    public $notifs;

    public function mount()
    {
        $user = Auth::guard('user')->user();
        $this->notifs = Notification::whereBelongsTo($user)->where('status', 0)->latest()->get();
    }

    public function render()
    {
        return view('livewire.user.notifications');
    }

    public function clear()
    {
        $user = Auth::guard('user')->user();
        $notifs = Notification::whereBelongsTo($user)->where('status', 0)->get();
        foreach ($notifs as $notif) {
            $notif->status = 1;
            $notif->save();
        }
        return $this->dispatch('refresh');
    }

    public function link($id)
    {
        $user = Auth::guard('user')->user();
        $notif = Notification::whereBelongsTo($user)->where('id', $id)->firstOrFail();
        $notif->status = 1;
        $notif->save();
        if ($notif->link) {
            return $this->redirect($notif->link, navigate: true);
        }
    }

    public function dismiss($id)
    {
        $user = Auth::guard('user')->user();
        $notif = Notification::whereBelongsTo($user)->where('id', $id)->firstOrFail();
        $notif->status = 1;
        $notif->save();
    }
}
