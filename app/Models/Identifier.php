<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Identifier extends Model
{
    protected $table = 'internal_identifiers';
    protected $fillable = ['identifier', 'name', 'unit'];
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'identifier', 'identifier');
    }
}
