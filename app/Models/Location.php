<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'locations';
    protected $fillable = ['name'];
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'location_id', 'location');
    }
}
