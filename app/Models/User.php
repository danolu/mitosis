<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory;
    use Notifiable;
    use SoftDeletes;  

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'address',
        'bank_name',
        'bank_account_number',
        'phone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'deleted_on' => 'datetime',
        'last_login' => 'datetime',
    ];

    /**
     * Get deposits associated with the user.
     */
    public function deposits()
    {
        return $this->hasMany('App\Models\Deposit');
    }

    public function activities()
    {
        return $this->hasMany('App\Models\Activity');
    }

    public function investments()
    {
        return $this->hasMany('App\Models\Investment');
    }

    public function notifications()
    {
        return $this->hasMany('App\Models\Notification');
    }

    public function payouts()
    {
        return $this->hasMany('App\Models\Payout');
    }

    public function referrals()
    {
        return $this->hasMany('App\Models\Referral');
    }

    public function referral_earnings()
    {
        return $this->hasMany('App\Models\ReferralEarning');
    }
}
