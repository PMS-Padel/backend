<?php

namespace App\Http\Controllers;

use App\Models\Games;
use App\Models\Tournament;
use App\Models\Team;
use App\Models\User;
use App\Models\Court;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TournamentController extends Controller
{
    //
    public function create_tournament(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'string',
            'init_date' => 'date' | 'required',
            'end_date' => 'date' | 'required',
            'location' => 'required',
            'price' => 'numeric',
            'maxplayers' => 'integer',
            'tournamenttype' => 'required',
            //'user_id' => 'required',
            'insurance' => 'string',
            'fileurl' => 'required',
        ]);

        if ($validation->fails()) {
            return response()->json([
                'errors' => $validation->errors(),
                'message' => __('auth.wrong_format'),
            ], 400);
        }

        Tournament::create([
            "name" => $request->name,
            "tournament_type_id" => $request->tournamenttype,
            "init_date" => $request->initdate,
            "end_date" => $request->enddate,
            "file_url" => $request->fileurl,
            "description" => $request->description,
            "location" => $request->location,
            "price" => $request->price,
            "max_players" => $request->maxplayers,
            "seguro" => $request->insurance,
            "user_id" => $request->userid,
        ]);

        //$user->sendEmailVerificationNotification();

        return response()->json([
            'message' => 'Torneio criado com sucesso',
        ], 200);
    }

    public function get_tournament($id)
    {
        $tournament = Tournament::findOrFail($id);
        $tournament->admin = User::where('id', $tournament->user_id)->firstOrFail();
        return $tournament;
    }
    public function update_tournament(Request $request)
    {
        $tournament = Tournament::findOrFail($request->id);

        if (isset($request->name)) {
            $tournament->name = $request->name;
        }
        if (isset($request->description)) {
            $tournament->description = $request->description;
        }
        if (isset($request->init_date)) {
            $tournament->init_date = $request->init_date;
        }
        if (isset($request->end_date)) {
            $tournament->end_date = $request->end_date;
        }
        if (isset($request->price)) {
            $tournament->price = $request->price;
        }
        if (isset($request->location)) {
            $tournament->location = $request->location;
        }
        if (isset($request->maxplayers)) {
            $tournament->max_players = $request->maxplayers;
        }
        if (isset($request->tournamenttype)) {
            $tournament->tournament_type_id = $request->tournamenttype;
        }
        if (isset($request->insurance)) {
            $tournament->seguro = $request->insurance;
        }
        if (isset($request->file_url)) {
            $tournament->file_url = $request->file_url;
        }

        $tournament->save();

        return response()->json([
            'message' => 'Torneio modificado',
        ], 200);
    }
    public function get_tournaments(Request $request)
    {
        $data = Tournament::all();
        foreach ($data as $tournament) {
            $tournament->teams = Team::where('tournament_id', $tournament->id)->get();
            foreach ($tournament->teams as $team) {
                $team->player1_id = User::where('id', '=', $team->player1_id)->firstOrFail();
                $team->player2_id = User::where('id', '=', $team->player2_id)->firstOrFail();
            }
        }

        return $data;
    }

    public function update_TournamentImage(Request $request)
    {

        $tournament = Tournament::findOrFail($request->id);

        $tournament->file_url = $request->file('image')->store('images');

        $tournament->save();

        return response()->json([
            'message' => 'Torneio modificado',
        ], 200);
    }

    public function remove_tourney(Request $request)
    {
        $tourney = Tournament::findOrFail($request->id);
        $teams = Team::where('tournament_id', '=', $request->id);

        $teams->delete();
        $tourney->delete();

        return response()->json([
            'message' => 'Torneio removido com sucesso',
        ], 200);
    }

    public function getTournamentGames(Request $request, $id)
    {
        $games = Games::where('tourney_id',  $id)->get();

        $res = array();
        foreach ($games as $key => $game) {
            $team1 = Team::findOrFail($game->team_id1);
            $team1->player1 = User::findOrFail($team1->player1_id);
            $team1->player2 = User::findOrFail($team1->player2_id);
            $game->team1 = $team1;
            $team2 = Team::findOrFail($game->team_id2);
            $team2->player1 = User::findOrFail($team2->player1_id);
            $team2->player2 = User::findOrFail($team2->player2_id);
            $game->team2 = $team2;
            $campo = Court::findOrFail($game->campo_id);
            $game->campo = $campo;
            array_push($res, $game);
        }

        return $res;
    }
}
