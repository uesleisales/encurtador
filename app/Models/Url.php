<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Url extends Model 
{
    protected $table = 'urls';

    protected $fillable = [
        'hits','shortUrl','url','user_id'
    ];

    
    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
