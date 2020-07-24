<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class User extends Model 
{
    protected $table = 'users';

    protected $fillable = [
        'nameId'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
