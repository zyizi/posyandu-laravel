<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Balita extends Model
{
    protected $table = 'balita';
    public $timestamps = false;
    protected $fillable = [
        'nama_balita', 'nama_ibu', 'tanggal_lahir', 'jenis_kelamin'
    ];
    public function pengukuran()
    {
        return $this->hasMany('App\Pengukuran', 'nama_balita', 'nama_balita');
    }
}
