<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengukuran extends Model
{
    protected $table = 'pengukuran';
    public $timestamps = false;
    protected $fillable = [
        'nama_bayi', 'nama_ibu', 'tanggal_pengukuran', 'berat', 'tinggi'
    ];
    public function bayi()
    {
        return $this->belongsTo('App\Bayi', 'nama_bayi', 'nama_bayi');
    }
}

