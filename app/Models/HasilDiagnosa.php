<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilDiagnosa extends Model
{
    use HasFactory;

    protected $table = 'hasil_diagnosa';

    protected $fillable = [
        'user_id',
        'gejala_dipilih',
        'penyakit_terdeteksi',
        'fired_rules',
        'working_memory',
    ];

    protected $casts = [
        'gejala_dipilih'      => 'array',
        'penyakit_terdeteksi' => 'array',
        'fired_rules'         => 'array',
        'working_memory'      => 'array',
    ];

    /**
     * Relasi ke user pemilik diagnosa.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
