<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferralEarning extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'referral_earnings';

    protected $fillable = [
        'user_id',
        'referee_id',
        'investment_id',
        'amount',
        'ref',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function investment()
    {
        return $this->belongsTo('App\Models\Investment');
    }
}
