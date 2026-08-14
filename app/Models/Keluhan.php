<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluhan extends Model
{
    //
    use Hasfactory;
    protected $fillable = [
        'kode_penyakit',
        'klasifikasi_penyakit'

    ];

    public function rules(){
        return $this-> hasMany(Rule::class);
    }

}
