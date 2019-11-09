<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $table = 'devices';
    protected $fillable = ['identifier', 'classroom_code', 'last_ip', 'token', 'active'];
    
    protected $casts = [
        'token' => 'active',
    ];

}
