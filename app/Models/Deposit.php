<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'receipt',
        'wallet_address',
        'status',
        'method',
        'ref'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }    
}
