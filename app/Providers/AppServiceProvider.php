<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;
use Schema;
use Carbon\Carbon;
use App\Models\Site;
use App\Models\User;
use App\Models\Review;
use App\Models\Investment;
use App\Models\Currency;
use Mail;
use App\Mail\SendMail;
use View;
use Livewire\Component;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Component::macro('notify', function ($icon, $title) {
            $this->dispatch('notify', [
                'icon' => $icon,
                'title' => $title
            ]);
        });

        Schema::defaultStringLength(191);
        $data['site'] = Site::first();
        $data['reviews'] = Review::all();
        $data['currency'] = $currency = Currency::first();     
        view::share($data);
        View::composer('*', function($view){
            if (Auth::guard('user')->check()){
                $user = Auth::guard('user')->user();
                $view->with('user', $user );
            }    
        });
        $investments = Investment::where('status', 0)->get();
        foreach($investments as $inv){   
            $user = $inv->user;
            if (Carbon::now()>Carbon::parse($inv->end_date)){
                if ($inv->autorewal==0) {
                    $update_bal = $inv->capital+$inv->interest;
                    $user->profits += $update_bal;
                    $user->balance += $update_bal;
                    $user->save();   
                    $inv->status = 1;
                    $inv->save();
                    $dat['subject'] = 'Investment Completed';
                    $dat['content'] = 'Hello '.$user->first_name.',<br>Your '.$inv->plan->name.' investment of ID: '.$inv->ref.' has been completed and your balance has been credited accordingly.<br>Capital: '.$currency->symbol.$inv->capital.'<br>Interest: '.$currency->symbol.$inv->interest.'<br>Start Date: '.$inv->start_date.'<br>End Date: '.$inv->end_date.'<br> Thank you for investing with us.';
                        Mail::to($user->email)->send(new SendMail($dat)); 
                }elseif ($inv->autorewal==1) {
                    date_add($inv->end_date, date_interval_create_from_date_string($inv->plan->duration.' '.$inv->plan->period));
                    $inv->end_date = date_format($inv->end_date, "Y-m-d H:i:s");
                    $inv->interest = ($inv->interest+$inv->capital)*$inv->plan->interest/100;
                    $inv->save();
                    $dat['subject'] = 'Investment Autorenewal';
                    $dat['content'] = 'Hello '.$user->first_name.',<br>Your '.$inv->plan->name.' investment of ID: '.$inv->ref.' has been autorenewed. Your interest will be compounded.<br>Thank you for investing with us.';
                        Mail::to($user->email->send(new SendMail($dat))); 
                }        
            }
        }
    }
}