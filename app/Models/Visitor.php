<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $table = 'visitor_attendances';
    protected $fillable = ['name', 'location', 'phone', 'address', 'keperluan'];
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
