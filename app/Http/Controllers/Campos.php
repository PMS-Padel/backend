<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class Campos extends Controller
{
    public function CamposDisponibilidade (Request $request)
    $validation = Validator::make($request->all(), [
        'Campo_id' => 'required',
        'Hora_id' => 'required',
        'Dia_id' => 'required',
    ]);

    if ($validation->fails()) {
        return response()->json([
            'errors' => $validation->errors(),
            'message' => __('auth.wrong_format'),
        ], 400);
    }

    $restricao = Restricao::create([
        "Campo_id" => $request->Campo_ID,
        "Hora_id" => $request->Hora_ID,
        "Dia_id" => $request -> Dia_ID,
        "Disponibilidade" = 'Ocupado';
    ]);

    return response()->json([
        'message' => 'Disponibilidade alterada com sucesso.',
    ], 200);
}
