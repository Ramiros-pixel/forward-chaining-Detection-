<?php

namespace App\services;
use App\Models\Penyakit;
use Illuminate\Support\Facades\DB;
class ForwardChainingServices
{
    /**
     * Create a new class instance.
     */
    public function diagnose(array $selectedInputs): array{
        $workingMemory = array_fill_keys($selectedInputs, true);
        $firedRules = [];
        $derivedDiseases = [];
        $rules = DB::table('rules')->get();

        do{
            $hasChanged = false;
            foreach ($rules as $rule){
                $targetResult = $rule->then_penyakit;

                if(isset($workingMemory[$targetResult])){
                    continue;
                }

                if($this->evaluateCondition($rule->if_condition,$workingMemory)){
                    $workingMemory[$targetResult]= true;
                    $firedRules[] = $rule->kode_rules;
                    $derivedDiseases[] = $targetResult;
                    $hasChanged = true;
                }   
            }
        }
        while ($hasChanged);
        $results = Penyakit::whereIn('kode_penyakit', $derivedDiseases)->get();
        return [
            'penyakit'=> $results,
            'fired_rules' =>$firedRules,
            'working_memory' => array_keys($workingMemory)
        ];
    }

    private function evaluateCondition(string $condition, array $workingMemory): bool{
        $orBranches = explode(' OR ', $condition);
        foreach ($orBranches as $branch){
            $andConditions = explode(' AND ', trim($branch));
            $branchValid = true;
            foreach ($andConditions as $item){
                $code = trim($item);
                if(!isset($workingMemory[$code])){
                    $branchValid = false;
                    break;
                }
            }
            if ($branchValid){
                return true;
            }
        }
        return false;
    }
}
