<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $fillable = [
        'user_id',
        'plan_id',
        'capital',
        'interest',
        'start_date',
        'end_date',
        'ref',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    public function plan()
    {
        return $this->belongsTo('App\Models\Plan');
    }
}
