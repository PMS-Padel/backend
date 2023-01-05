<?php

namespace App\Http\Controllers;

use App\Models\Campos;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CamposDisponibilidade extends Controller
{
    public function create_availability(Request $request) {
        
        $validation = Validator::make($request->all(), [
            'Campo_id' => 'required',
            'start_at' => 'date'|'required',
            'team_id1' => 'nullable',
            'team_id2' => 'nullable',
            'team1_points' => 'nullable',
            'team2_points' => 'nullable',
            'winner_id'=> 'nullable'
        ]);

        if ($validation->fails()) {
            return response()->json([
                'errors' => $validation->errors(),
                'message' => __('auth.wrong_format'),
            ], 400);
        }

        $campos = Campos::create([
            "Campo_id" => $request->Campo_id,
            "start_at" => $request->start_at,
            "team_id1" => $request->team_id1,
            "team_id2" => $request->team_id2,
            "team1_points" => $request->team1_points,
            "team2_points" => $request->team2_points,
            "winner_id" => $request->winner_id,
        ]);
        
        return response()->json([
            'message' => 'Disponibilidade definida com sucesso',
        ], 200);
    }
    public function update_disponibilidade(Request $request)
    {

        $campos = Campos::findOrFail($request->id);


        if (isset($request->Campo_id)){$campos->Campo_id= $request->Campo_id;}
        if (isset($request->start_at)){$campos->start_at= $request->start_at;}
        if (isset($request->team_id1)){$campos->team_id1= $request->team_id1;}
        if (isset($request->team_id2 )){$campos->team_id2= $request->team_id2;}
        if (isset($request->team1_points )){$campos->team1Points= $request->team1_points;}
        if (isset($request->team2_points )){$campos->team2Points= $request->team2_points;}
        if (isset($request->winner_id )){$campos->team2Points= $request->winner_id;}

        $campos->save();
        return response()->json([
            'message' => 'Disponibilidade actualizada com sucesso',
        ], 200);
    }
    public function mudar_horas (Request $request)
    {

    }

}
