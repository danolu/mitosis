<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
	protected $fillable = [
        'name',
        'interest',
        'min_capital',
        'max_capital',
        'duration',
        'period',
        'ref_percent',
        'status'
    ];
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */

    public function investments()
    {
        return $this->hasMany('App\Models\Investment');
    }
}
