<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengukuran extends Model
{
    protected $table = 'pengukuran';
    public $timestamps = false;
    protected $fillable = [
        'nama_balita', 'nama_ibu', 'tanggal_pengukuran', 'berat', 'tinggi'
    ];
    public function balita()
    {
        return $this->belongsTo('App\Balita', 'nama_balita', 'nama_balita');
    }
}

