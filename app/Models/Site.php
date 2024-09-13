<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    
    use HasFactory;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'site';

    protected $fillable = [
        'site_title',
        'address',
        'description',
        'phone',
        'alt_phone',
        'email',
        'support_email',
        'name',
    ];


}
