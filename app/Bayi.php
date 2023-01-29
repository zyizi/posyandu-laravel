<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bayi extends Model
{
    protected $table = 'bayi';
    public $timestamps = false;
    protected $fillable = [
        'nama_bayi', 'nama_ibu', 'tanggal_lahir', 'jenis_kelamin'
    ];
    public function pengukuran()
    {
        return $this->hasMany('App\Pengukuran', 'nama_bayi', 'nama_bayi');
    }
}
