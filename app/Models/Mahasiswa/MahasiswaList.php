<?php

namespace App\Models\Mahasiswa;

use Illuminate\Database\Eloquent\Model;

class MahasiswaList extends Model
{
    protected $table = 'mahasiswa_lists';
    protected $fillable = ['nim', 'name', 'prodi_name', 'uni'];
    
    public function cards()
    {
        return $this->hasMany('\App\Models\Mahasiswa\Card', 'mahasiswa_id', 'id');
    }
}
