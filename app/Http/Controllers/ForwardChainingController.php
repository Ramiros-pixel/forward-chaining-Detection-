<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\models\Keluhan;
use App\Models\Gejala;
use App\Models\HasilDiagnosa;
use App\services\ForwardChainingServices;

class ForwardChainingController extends Controller
{
    //
    public function index(){
        $keluhans = keluhan::all();
        $gejalas = gejala::all();

        return view('diagnosa.index', compact('keluhans', 'gejalas'));
    }

    public function process(Request $request, ForwardChainingServices $fcService){
        $request->validate([
            'inputs'=>'required|array|min:1',
        ], [
            'inputs.required'=> 'Silahkan pilih minimal satu keluhan atau gejala',
        ]);
        $selectedInputs = $request->input('inputs');
        $result = $fcService->diagnose($selectedInputs);

        // Simpan hasil diagnosa ke database jika user sudah login
        if (Auth::check()) {
            HasilDiagnosa::create([
                'user_id'             => Auth::id(),
                'gejala_dipilih'      => $selectedInputs,
                'penyakit_terdeteksi' => $result['penyakit']->pluck('nama_penyakit')->toArray(),
                'fired_rules'         => $result['fired_rules'],
                'working_memory'      => $result['working_memory'],
            ]);
        }

        return view('diagnosa.result', compact('result'));
    }

    /**
     * Menampilkan riwayat diagnosa milik user yang sedang login.
     */
    public function riwayat(){
        $riwayat = HasilDiagnosa::where('user_id', Auth::id())
                    ->latest()
                    ->paginate(10);

        // Mapping kode ke nama gejala & keluhan
        $gejalas = \App\Models\Gejala::pluck('nama_gejala', 'kode_gejala')->toArray();
        $keluhans = \App\Models\Keluhan::pluck('keluhan', 'kode_keluhan')->toArray();
        $gejalaDict = array_merge($keluhans, $gejalas);

        // Mapping rule ke deskripsinya
        $rules = \Illuminate\Support\Facades\DB::table('rules')->get();
        $ruleDict = [];
        foreach ($rules as $rule) {
            $ruleDict[$rule->kode_rules] = "IF {$rule->if_condition} THEN {$rule->then_penyakit}";
        }

        return view('riwayat.index', compact('riwayat', 'gejalaDict', 'ruleDict'));
    }
}
