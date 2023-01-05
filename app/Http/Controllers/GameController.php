<?php

namespace App\Http\Controllers;

use App\Models\Games;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function create_game(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'tourney_id' => 'required',
            'campo_id' => 'nullable',
            'day' => 'string',
            'hour' => 'string',
            'team_id1' => 'nullable',
            'team_id2' => 'nullable',
            'team1_points' => 'nullable',
            'team2_points' => 'nullable',
            'winner_id' => 'nullable',
        ]);

        if ($validation->fails()) {
            return response()->json([
                'errors' => $validation->errors(),
                'message' => __('auth.wrong_format'),
            ], 400);
        }

        Games::create([
            "tourney_id" => $request->tourney_id,
            'campo_id' => $request->campo_id,
            "start_at" => $request->day . " " . $request->hour . ":00",
            "team_id1" => $request->team_id1,
            "team_id2" => $request->team_id2,
            "team1_points" => $request->team1_points,
            "team2_points" => $request->team2_points,
            "winner_id" => $request->winner_id,

        ]);

        return response()->json([
            'message' => 'Jogo criado com sucesso',
        ], 200);
    }
    public function update_game(Request $request)
    {

        $game = Games::findOrFail($request->id);


        if (isset($request->tourney_id)) {
            $game->tourney_id = $request->tourney_id;
        }
        if (isset($request->campo_id)) {
            $game->campo_id = $request->campo_id;
        }
        if (isset($request->start_at)) {
            $game->start_at = $request->start_at;
        }
        if (isset($request->team_id1)) {
            $game->team_id1 = $request->team_id1;
        }
        if (isset($request->team_id2)) {
            $game->team_id2 = $request->team_id2;
        }
        if (isset($request->team1_points)) {
            $game->team1_points = $request->team1_points;
        }
        if (isset($request->team2_points)) {
            $game->team2_points = $request->team2_points;
        }
        if (isset($request->winner_id)) {
            $game->winner_id = $request->winner_id;
        }


        $game->save();
        return response()->json([
            'message' => 'Jogo actualizado com sucesso',
        ], 200);
    }
}
