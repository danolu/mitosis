<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteBank extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'site_bank';

    protected $fillable = [
    	'account_name',
    	'banker',
        'account_number',
        'swift_code',
        'routing_number',
        'wallet_address'
    ];
}
