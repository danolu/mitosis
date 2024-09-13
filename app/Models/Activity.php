<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $fillable = [
        'user_id',
        'activity'
    ];
    protected $table = 'activity_log';

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
