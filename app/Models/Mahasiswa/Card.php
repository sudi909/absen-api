<?php

namespace App\Models\Mahasiswa;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $table = 'mahasiswa_cards';
    protected $fillable = ['mahasiswa_id', 'card_code'];
    
    public function mahasiswa()
    {
        return $this->belongsTo('\App\Models\Mahasiswa\MahasiswaList', 'mahasiswa_id', 'id');
    }
}
