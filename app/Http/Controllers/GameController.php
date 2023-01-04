<?php

namespace App\Http\Controllers;

use App\Models\Games;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function create_game(Request $request) {
        
        $validation = Validator::make($request->all(), [
            'Campo_id' => 'required',
            'start_at' => 'date',
            'day' => 'date',
            'team_id1' => 'nullable',
            'team_id2' => 'nullable',
            'team1_points' => 'nullable',
            'team2_points' => 'nullable',
            'winner_id'=> 'nullable',
            'team1_name' => 'nullable',
            'team2_name' => 'nullable'
        ]);

        if ($validation->fails()) {
            return response()->json([
                'errors' => $validation->errors(),
                'message' => __('auth.wrong_format'),
            ], 400);
        }

        $game = Games::create([
            "Campo_id" => $request->Campo_id,
            "start_at" => $request->start_at,
            "day" => $request->day,
            "team_id1" => $request->team_id1,
            "team_id2" => $request->team_id2,
            "team1_points" => $request->team1_points,
            "team2_points" => $request->team2_points,
            "winner_id" => $request->winner_id,
            "team1_name" => $request->team1_name,
            "team2_name" => $request->team2_name,
        ]);
        
        return response()->json([
            'message' => 'Jogo criado com sucesso',
        ], 200);
    }
    public function update_game(Request $request)
    {

        $game = Games::findOrFail($request->id);


        if (isset($request->Campo_id)){$game->Campo_id= $request->Campo_id;}
        if (isset($request->start_at)){$game->start_at= $request->start_at;}
        if(isset($request->day)){$game->day=$request->day;}
        if (isset($request->team_id1)){$game->team_id1= $request->team_id1;}
        if (isset($request->team_id2 )){$game->team_id2= $request->team_id2;}
        if (isset($request->team1_points )){$game->team1Points= $request->team1_points;}
        if (isset($request->team2_points )){$game->team2Points= $request->team2_points;}
        if (isset($request->winner_id )){$game->team2Points= $request->winner_id;}
        if(isset($request->team1_name)){$game->team1_name=$request->team1_name;}
        if(isset($request->team2_name)){$game->team2_name=$request->team2_name;}

        $game->save();
        return response()->json([
            'message' => 'Jogo actualizado com sucesso',
        ], 200);
    }

}
