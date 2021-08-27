<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendances';
    protected $fillable = ['identifier', 'location_id', 'type', 'is_vaccine'];
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function internalIdentifier()
    {
        return $this->belongsTo(Identifier::class, 'identifier', 'identifier');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id', 'id');
    }
}
