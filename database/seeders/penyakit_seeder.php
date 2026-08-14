<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class penyakit_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $penyakit = [
            ['kode_penyakit' => 'P1',  'nama_penyakit' => 'Tanda Bahaya Umum'],
            ['kode_penyakit' => 'P2',  'nama_penyakit' => 'Batuk'],
            ['kode_penyakit' => 'P3',  'nama_penyakit' => 'Pneumonia'],
            ['kode_penyakit' => 'P4',  'nama_penyakit' => 'Pneumonia Berat'],
            ['kode_penyakit' => 'P5',  'nama_penyakit' => 'Diare'],
            ['kode_penyakit' => 'P6',  'nama_penyakit' => 'Diare Dehidrasi Ringan'],
            ['kode_penyakit' => 'P7',  'nama_penyakit' => 'Diare Dehidrasi Berat'],
            ['kode_penyakit' => 'P8',  'nama_penyakit' => 'Diare Persisten'],
            ['kode_penyakit' => 'P9',  'nama_penyakit' => 'Diare Persisten Berat'],
            ['kode_penyakit' => 'P10', 'nama_penyakit' => 'Disentri'],
            ['kode_penyakit' => 'P11', 'nama_penyakit' => 'Demam'],
            ['kode_penyakit' => 'P12', 'nama_penyakit' => 'Demam dengan Tanda Bahaya Umum'],
            ['kode_penyakit' => 'P13', 'nama_penyakit' => 'Campak'],
            ['kode_penyakit' => 'P14', 'nama_penyakit' => 'Campak dengan komplikasi berat'],
            ['kode_penyakit' => 'P15', 'nama_penyakit' => 'Campak dengan komplikasi'],
            ['kode_penyakit' => 'P16', 'nama_penyakit' => 'Demam Mungkin DBD'],
            ['kode_penyakit' => 'P17', 'nama_penyakit' => 'DBD'],
            ['kode_penyakit' => 'P18', 'nama_penyakit' => 'Demam bukan DBD'],
        ];

        DB::table('penyakit')->insert($penyakit);
    }
}
