<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluaciones;

class EvaluacionesController extends Controller
{
    public function store(Request $request){
        $calificacion   =   Evaluaciones::create($request->post());
        return response()->json([
                                    'calificacion'=>$calificacion,
                                    'mensaje'=>'Evaluación creada'
                                ]);
    }
}
