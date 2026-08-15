<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluhan extends Model
{
    //
    protected $table = 'keluhan';
    use Hasfactory;
    protected $fillable = [
        'kode_keluhan',
        'keluhan'

    ];

    public function rules(){
        return $this-> hasMany(Rule::class);
    }

}
