<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class rules_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rules = [
            ['kode_rules' => 'R1',  'if_condition' => 'G1 OR G2 OR G3 OR G4', 'then_penyakit' => 'P1'],
            ['kode_rules' => 'R2',  'if_condition' => 'K1 AND G5', 'then_penyakit' => 'P2'],
            ['kode_rules' => 'R3',  'if_condition' => 'K1 AND G6', 'then_penyakit' => 'P3'],
            ['kode_rules' => 'R4',  'if_condition' => 'K1 AND P1 OR G7 OR G8', 'then_penyakit' => 'P4'],
            ['kode_rules' => 'R5',  'if_condition' => 'K2 AND G9', 'then_penyakit' => 'P5'],
            ['kode_rules' => 'R6',  'if_condition' => 'P5 AND G10 AND G11 OR G12 OR G13', 'then_penyakit' => 'P6'],
            ['kode_rules' => 'R7',  'if_condition' => 'P5 AND G10 AND G14 OR G15 OR G16', 'then_penyakit' => 'P7'],
            ['kode_rules' => 'R8',  'if_condition' => 'P5 AND G17', 'then_penyakit' => 'P8'],
            ['kode_rules' => 'R9',  'if_condition' => 'P8 AND P6 OR P7', 'then_penyakit' => 'P9'],
            ['kode_rules' => 'R10', 'if_condition' => 'P5 AND G18', 'then_penyakit' => 'P10'],
            ['kode_rules' => 'R11', 'if_condition' => 'K3 AND G19', 'then_penyakit' => 'P11'],
            ['kode_rules' => 'R12', 'if_condition' => 'P1 AND P11 OR G20', 'then_penyakit' => 'P12'],
            ['kode_rules' => 'R13', 'if_condition' => 'P11 AND G21 AND G22 OR G25', 'then_penyakit' => 'P13'],
            ['kode_rules' => 'R14', 'if_condition' => 'P13 AND P1 AND G23 OR G24', 'then_penyakit' => 'P14'],
            ['kode_rules' => 'R15', 'if_condition' => 'P13 AND G25 OR G26', 'then_penyakit' => 'P15'],
            ['kode_rules' => 'R16', 'if_condition' => 'P11 AND G27 AND G28 AND G29 OR G30', 'then_penyakit' => 'P16'],
            ['kode_rules' => 'R17', 'if_condition' => 'P11 AND G27 AND G28 AND G31 OR G32 OR G33 OR G34', 'then_penyakit' => 'P17'],
            ['kode_rules' => 'R18', 'if_condition' => 'P11 AND G35 OR G36', 'then_penyakit' => 'P18'],
        ];

        foreach ($rules as $rule) {
            DB::table('rules')->updateOrInsert(
                ['kode_rules' => $rule['kode_rules']],
                [
                    'if_condition' => $rule['if_condition'],
                    'then_penyakit' => $rule['then_penyakit'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}