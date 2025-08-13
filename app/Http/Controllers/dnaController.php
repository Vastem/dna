<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Service\Mutation;
use App\Models\DnaLog;

class dnaController extends Controller
{
    protected $mutation;

    public function __construct(Mutation $mutation)
    {
        $this->mutation = $mutation;
    }

    public function mutation_stats(){
        /* return response()->json([
            "count_mutations" => 10,
            "count_no_mutation" => 100,
            "ratio" => 0.1,
        ],200); */

        $logs = DnaLog::all();
        if ($logs->isEmpty()) {
            return response()->json([
                "message" => "No hay registros de mutaciones",
                "count_mutations" => 0,
                "count_no_mutation" => 0,
                "ratio" => 0,
            ], 404);
        }

        $count_mutations = $logs->where('has_mutation', true)->count();
        $count_no_mutation = $logs->where('has_mutation', false)->count();
        $ratio = $count_mutations / ($count_mutations + $count_no_mutation) ?: 0;

        return response()->json([
            "count_mutations" => $count_mutations,
            "count_no_mutation" => $count_no_mutation,
            "ratio" => $ratio,
        ], 200);
    }

    public function mutation_list(){

        $logs = DnaLog::orderBy('created_at', 'desc')->take(10)->get();
        if ($logs->isEmpty()) {
            return response()->json([
                "message" => "No hay registros de mutaciones",
                "dna_logs" => [],
            ], 404);
        }

        return response()->json($logs, 200);
    }

    public function isMutation(Request $req){
        $val = Validator::make($req->all(), [
            'dna' => 'required'
        ]);

        if($val->fails()){
            return response()->json([
                'message' => $val->errors()
            ],400);
        }

        $size = count($req->dna);

    foreach ($req->dna as $cadena) {
        if (strlen($cadena) !== $size) {
            return response()->json([
                "message" => 'El ADN debe ser cuadrado',
                "success" => false
            ], 400);
        }
    }

        $dnaString = implode("\n", $req->dna);

        if ($this->mutation->hasMutation($req->dna)) {
           $log = DnaLog::create([
                'dna_sequence' => $dnaString,
                'has_mutation' => true
            ]);

            if (!$log) {
                return response()->json([
                    "message" => 'Error al guardar el log',
                    "success" => false
                ], 500);
            }

            return response()->json([
                "message" => 'Mutacion detectada',
                "success" => true,
                "dna_log" => $log,
            ],200);
        }

        $log = DnaLog::create([
            'dna_sequence' => $dnaString,
            'has_mutation' => false
        ]);

        if (!$log) {
            return response()->json([
                "message" => 'Error al guardar el log',
                "success" => false
            ], 500);
        }

        return response()->json([
            "message" => 'No se detectaron mutaciones',
            "success" => true,
            "dna_log" => $log,
        ],403);
    }
}
