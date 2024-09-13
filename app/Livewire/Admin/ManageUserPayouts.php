<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Payout;
use App\Models\Currency;
use App\Models\User;
use App\Models\Activity;
use Illuminate\Http\Request;
use Mail;
use App\Mail\SendMail;

class ManageUserPayouts extends Component
{
    public $title, 
            $user,
            $payouts;
            
    public function mount(User $user){
        $this->user = $user;
        $this->title = $user->first_name.' '.$user->last_name.' Payouts';
        $this->deposits = $user->payouts()->latest()->get();
    }

    public function render()
    {
        return view('livewire.admin.manage-user-payouts')->layout('components.layouts.admin')->title($this->title);
    }

    public function approve(Payout $payout)
    {
        $user = User::find($payout->user_id);
        $currency = Currency::first();
        $payout->status = 1;
        $sav = $payout->save();
        $data['subject'] = 'Withdrawal Approved';
        $data['content'] = 'Hello '.$user->first_name.',<br>Your withdrawal request of '.$currency->symbol.$payout->amount.' has been approved<br>Thank you for choosing us.';
            Mail::to($user->email)->send(new SendMail($data));
        $audit['user_id'] = $user->id;
        $audit['activity']='Withdrawal of ' .$currency->symbol.$payout->amount. ' approved';
        Activity::create($audit); 
        if ($sav) {
            $this->dispatch('closeModal', name: 'delete'.$id);
            $this->payouts = Payout::latest()->get();
            $this->notify('success', 'Payout approved');
            return $this->dispatch('refreshTable');
        } else {
            $this->dispatch('closeModal', name: 'delete'.$id);
            $this->notify('error', 'Payout approval failed');
            return $this->dispatch('refreshTable');
        }
    }  

    public function decline(Payout $payout)
    {
        $user = User::find($payout->user_id);
        $currency = Currency::first();
        $payout->status = 2;
        $sav = $payout->save();
        $user->balance = $user->balance+$payout->amount;
        $user->save();
        $data['subject'] = 'Withdrawal Declined';
        $data['content'] = 'Hello '.$user->first_name.',<br>Your withdrawal request of '.$currency->symbol.$payout->amount.' has been declined<br>Kindly contact support if this development is unexpected.';
            Mail::to($user->email)->send(new SendMail($data));
        $audit['user_id'] = $user->id;
        $audit['activity']='Withdrawal of ' .$currency->symbol.$payout->amount. ' declined';
        Activity::create($audit);  
        if ($sav) {
            $this->dispatch('closeModal', name: 'delete'.$id);
            $this->payouts = Payout::latest()->get();
            $this->notify('success', 'Payout declined');
            return $this->dispatch('refreshTable');
        } else {
            $this->dispatch('closeModal', name: 'delete'.$id);
            $this->notify('error', 'Unable to decline payout');
            return $this->dispatch('refreshTable');
        }
    }

    public function destroy(Payout $payout)
    {
        $data = Payout::findOrFail($id);
        if($data->status===0){
            $this->dispatch('closeModal', name: 'delete'.$id);
            $this->payouts = Payout::latest()->get();
            $this->notify('error', 'You cannot delete a pending payout');
            return $this->dispatch('refreshTable');
        } else {
            $sav =  $data->delete();
            if ($sav) {
                $this->dispatch('closeModal', name: 'delete'.$id);
                $this->payouts = Payout::latest()->get();
                $this->notify('success', 'Payout deleted');
                return $this->dispatch('refreshTable');
            } else {
                $this->dispatch('closeModal', name: 'delete'.$id);
                $this->notify('error', 'Unable to delete payout');
                return $this->dispatch('refreshTable');
            }
        }
    }
}
