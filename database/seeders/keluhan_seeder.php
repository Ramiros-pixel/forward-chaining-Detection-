<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class keluhan_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $keluhan = [
            ['kode_keluhan'=>'K1','keluhan'=> 'Batuk'],
            ['kode_keluhan'=>'K2', 'keluhan' => 'Diare'],
            ['kode_keluhan' => 'K3', 'keluhan'=>'Demam']
        ];
        DB::table('keluhan')->insert($keluhan);
    }
}
