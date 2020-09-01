<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendances';
    protected $fillable = ['identifier', 'location', 'type'];
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function internalIdentifier()
    {
        return $this->belongsTo(Identifier::class, 'identifier', 'identifier');
    }
}
