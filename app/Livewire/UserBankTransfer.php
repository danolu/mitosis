<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate; 
use Livewire\WithFileUploads;
use Auth, Mail;
use App\Models\Deposit;
use App\Models\Currency;
use App\Models\Activity;
use App\Models\SiteBank;
use App\Mail\SendMail;
use Str;

class UserBankTransfer extends Component
{
    public $title = 'Deposit with Bank Transfer';
    public $site_bank;

    #[Validate('required|numeric|min:10000')] 
    public $amount;

    use WithFileUploads;

    #[Validate('required|image|max:1024')] 
    public $receipt;

    public function mount() 
    {
        $this->site_bank = SiteBank::first();
    }

    public function render()
    { 
        return view('livewire.user.bank-transfer')->title($this->title);
    }

    public function makeDeposit()
    {
        $this->validate();
        $amount = $this->amount;
        $user = Auth::guard('user')->user();
        $currency = Currency::first();
        $path = $this->receipt->store(path: 'receipts');
        $sav['user_id'] = $user->id;
        $sav['amount'] = $amount;
        $sav['receipt'] = $path;
        $sav['method'] = 'bank';
        $sav['status'] = 0;
        $sav['ref']= str::random(16);
        Deposit::create($sav);
        $audit['user_id'] = $user->id;
        $audit['activity'] = 'Lodged deposit of '.$currency->symbol.$amount;
        Activity::create($audit);
        $data['subject'] = 'Deposit Under Review';
        $data['content'] = 'We are currently reviewing your deposit of '.$currency->symbol.$amount.'. Once confirmed, your balance will be credited.<br>Thank you for choosing us.';
        // Mail::to($user->email)->send(new SendMail($data));       
        $this->reset('amount', 'receipt');      
        return $this->notify('success', 'Deposit Successful');
    }
}
