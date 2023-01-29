<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timbangan extends Model
{
    use HasFactory;
    protected $table = 'timbangan';
    public $timestamps = false;
    protected $fillable = ['tinggi'];
}
