<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_rules',
    ];

    // Relasi: Rule merujuk ke 1 Penyakit (THEN)
    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class);
    }

    // Relasi: Rule memiliki banyak Gejala sebagai syarat (IF)
    public function gejalas()
    {
        return $this->belongsToMany(Gejala::class, 'rule_gejala');
    }
}