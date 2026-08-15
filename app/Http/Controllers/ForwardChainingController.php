<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Keluhan;
use App\Models\Gejala;
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
        return view('diagnosa.result', compact('result'));

    }

}
