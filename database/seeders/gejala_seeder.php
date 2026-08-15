<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class gejala_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $gejala=[
            ['kode_gejala' => 'G1',  'nama_gejala' => 'Anak tidak bisa minum atau menyusu'],
            ['kode_gejala' => 'G2',  'nama_gejala' => 'Anak memuntahkan makanan yang dimakan'],
            ['kode_gejala' => 'G3',  'nama_gejala' => 'Anak menderita kejang'],
            ['kode_gejala' => 'G4',  'nama_gejala' => 'Anak tampak letargis atau tidak sadar'],
            ['kode_gejala' => 'G5',  'nama_gejala' => 'Napas Normal'],
            ['kode_gejala' => 'G6',  'nama_gejala' => 'Napas cepat'],
            ['kode_gejala' => 'G7',  'nama_gejala' => 'Tarikan dinding dada ke dalam'],
            ['kode_gejala' => 'G8',  'nama_gejala' => 'Stridor'],
            ['kode_gejala' => 'G9',  'nama_gejala' => 'Berak cair atau lembek'],
            ['kode_gejala' => 'G10', 'nama_gejala' => 'Mata cekung'],
            ['kode_gejala' => 'G11', 'nama_gejala' => 'Cubitan kulit perut kembali lambat'],
            ['kode_gejala' => 'G12', 'nama_gejala' => 'Gelisah, rewel/mudah marah'],
            ['kode_gejala' => 'G13', 'nama_gejala' => 'Haus, minum dengan lahap'],
            ['kode_gejala' => 'G14', 'nama_gejala' => 'Cubitan kulit perut sangat lambat'],
            ['kode_gejala' => 'G15', 'nama_gejala' => 'Anak tampak letargis atau tidak sadar'],
            ['kode_gejala' => 'G16', 'nama_gejala' => 'Tidak bisa minum atau malas minum'],
            ['kode_gejala' => 'G17', 'nama_gejala' => 'Diare 14 hari atau lebih'],
            ['kode_gejala' => 'G18', 'nama_gejala' => 'Ada darah dalam tinja'],
            ['kode_gejala' => 'G19', 'nama_gejala' => 'Suhu badan melebihi 37.5° C'],
            ['kode_gejala' => 'G20', 'nama_gejala' => 'Kaku kuduk (anak tidak bisa menunduk hingga dagu mencapai dada)'],
            ['kode_gejala' => 'G21', 'nama_gejala' => 'Ruam kemerahan di kulit'],
            ['kode_gejala' => 'G22', 'nama_gejala' => 'Batuk pilek atau mata merah'],
            ['kode_gejala' => 'G23', 'nama_gejala' => 'Luka di mulut yang dalam atau luas'],
            ['kode_gejala' => 'G24', 'nama_gejala' => 'Kekeruhan pada kornea mata'],
            ['kode_gejala' => 'G25', 'nama_gejala' => 'Luka di mulut'],
            ['kode_gejala' => 'G26', 'nama_gejala' => 'Mata bernanah'],
            ['kode_gejala' => 'G27', 'nama_gejala' => 'Demam 2 - 7 hari'],
            ['kode_gejala' => 'G28', 'nama_gejala' => 'Demam mendadak tinggi dan terus menerus'],
            ['kode_gejala' => 'G29', 'nama_gejala' => 'Nyeri di ulu hati'],
            ['kode_gejala' => 'G30', 'nama_gejala' => 'Bintik bintik merah'],
            ['kode_gejala' => 'G31', 'nama_gejala' => 'Muntah bercampur darah / seperti kopi'],
            ['kode_gejala' => 'G32', 'nama_gejala' => 'Tinja berwarna hitam'],
            ['kode_gejala' => 'G33', 'nama_gejala' => 'Perdarahan dihidung dan gusi'],
            ['kode_gejala' => 'G34', 'nama_gejala' => 'Syok dan gelisah'],
            ['kode_gejala' => 'G35', 'nama_gejala' => 'Infeksi'],
            ['kode_gejala' => 'G36', 'nama_gejala' => 'Pilek']
        ];

        DB::table('gejala')->insert($gejala);
    }
}
