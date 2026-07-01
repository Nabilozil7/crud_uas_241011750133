<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admin';

    protected $fillable = [
        'nama',
        'username',
        'password',
        'foto',
        'role'                      
        
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];
}