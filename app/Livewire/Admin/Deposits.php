<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Deposit;
use App\Models\User;
use App\Models\Currency;
use App\Models\Activity;
use Mail;
use App\Mail\SendMail;

class Deposits extends Component
{
    public $deposits;
    
    public $title = 'Deposits';

    public function mount()
    {
        $this->deposits = Deposit::latest()->get();
    }

    public function render()
    {
        return view('livewire.admin.deposits')->layout('components.layouts.admin')->title($this->title);
    }
    
    public function approve(Deposit $deposit)
    {
        $user = User::find($deposit->user_id);
        $currency = Currency::first();
        $deposit->status = 1;
        $user->balance += $deposit->amount;
        $user->save();
        $sav = $deposit->save();
        $data['subject'] = 'Deposit Approved';
        $data['content'] = 'Hello '.$user->first_name.',<br>Your deposit of '.$currency->symbol.$deposit->amount.' has been approved.<br>Thanks for choosing us.';
        Mail::to($user->email)->send(new SendMail($data));    
        $audit['user_id'] = $user->id;
        $audit['activity'] = 'Deposit of '.$currency->symbol.$deposit->amount.' approved';
        Activity::create($audit);  
        if ($sav) {
            $this->dispatch('closeModal', name: 'approve'.$deposit->id);
            $this->deposits = Deposit::latest()->get();
            $this->notify('success', 'Deposit approved');
            return $this->dispatch('refreshTable');
        } else {
            $this->dispatch('closeModal', name: 'approve'.$deposit->id);
            $this->notify('error', 'Deposit approval failed');
            return $this->dispatch('refreshTable');
        }
    }      
    
    public function decline(Deposit $deposit)
    {
        $user = User::find($deposit->user_id);
        $currency = Currency::first();
        $deposit->status = 2;
        $sav = $deposit->save();
        $data['subject'] = 'Deposit Declined';
        $data['content'] = 'Hello '.$user->first_name.',<br>Your deposit of '.$currency->symbol.$deposit->amount.'. has been declined.<br>Kindly verify the transaction and try again. Thanks for choosing us.';
        Mail::to($user->email)->send(new SendMail($data));
        $audit['user_id'] = $user->id;
        $audit['activity'] = 'Deposit of '.$currency->symbol.$deposit->amount.' declined';
        Activity::create($audit); 
        if ($sav) {
            $this->dispatch('closeModal', name: 'decline'.$deposit->id);
            $this->deposits = Deposit::latest()->get();
            $this->notify('success', 'Deposit declined');
            return $this->dispatch('refreshTable');
        } else {
            $this->dispatch('closeModal', name: 'decline'.$deposit->id);
            $this->notify('error', 'Unable to decline deposit');
            return $this->dispatch('refreshTable');
        }
    }  

    public function destroy(Deposit $deposit)
    {
        if($deposit->status===0){
            $this->dispatch('closeModal', name: 'delete'.$deposit->id);
            $this->notify('error', 'You cannot delete a pending deposit');
            return $this->dispatch('refreshTable');
        } else {
            $sav =  $deposit->delete();
            if ($sav) {
                $this->dispatch('closeModal', name: 'delete'.$deposit->id);
                $this->deposits = Deposit::latest()->get();
                $this->notify('success', 'Deposit deleted');
                return $this->dispatch('refreshTable');
            } else {
                $this->dispatch('closeModal', name: 'delete'.$deposit->id);
                $this->notify('error', 'Unable to delete deposit');
                return $this->dispatch('refreshTable');
            }
        }
    }

}
