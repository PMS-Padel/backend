<?php

namespace App\Http\Controllers;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;



class TeamsController extends Controller
{
    //
    public function create_team(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'subscription_date' => 'date'|'required',
            'player1id' => 'required',
            'player2id' => 'required',
            'tournament_id' => 'required',
        ]);

        if ($validation->fails()) {
            return response()->json([
                'errors' => $validation->errors(),
                'message' => __('auth.wrong_format'),
            ], 400);
        }

        $team = Team::create([
            "name" => $request->name,
            "subscription_date" => $request->subscriptiondate,
            "player1_id" => $request->player1id,
            "player2_id" => $request->player2id,
            "tournament_id" => $request->tournamentid,
            "payed"=> $request->payed,
        ]);

        //$user->sendEmailVerificationNotification();
        
        return response()->json([
            'message' => 'Equipa criada com sucesso',
        ], 200);
    }
    public function create_teamByCode(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'subscriptiondate' => 'date',
            'player1Code' => 'required',
            'player2Code' => 'required',
            'tournamentid' => 'required',
        ]);

        if ($validation->fails()) {
            return response()->json([
                'errors' => $validation->errors(),
                'message' => __('auth.wrong_format'),
            ], 400);
        }

        $player1= User::where('user_code', '=', $request->player1Code)->firstOrFail();
        $player2= User::where('user_code', '=', $request->player2Code)->firstOrFail();

        //Verificar se parceiro esta numa equipa do mesmo torneio
        $isPlayer2OnAnotherTeam = Team::where([['player1_id', '=', $player2->id],['tournament_id', '=', $request->tournamentid]])->first();
        $isPlayer2OnAnotherTeamid2 = Team::where([['player2_id', '=', $player2->id],['tournament_id', '=', $request->tournamentid]])->first();

        if ($isPlayer2OnAnotherTeam != null || $isPlayer2OnAnotherTeamid2 != null) {
            return response()->json([
                'errors' => $validation->errors(),
                'message' => __('auth.wrong_format'),
            ], 400);
        }

        $team = Team::create([
            "name" => $request->name,
            "subscription_date" => $request->subscriptiondate,
            "player1_id" => $player1->id,
            "player2_id" => $player2->id,
            "tournament_id" => $request->tournamentid,
            "payed"=> $request->payed,
        ]);

        //$user->sendEmailVerificationNotification();
        
        return response()->json([
            'message' => 'Equipa criada com sucesso',
        ], 200);
    }
    public function update_team(Request $request)
    {
        $team = Team::findOrFail($request->id);
        if (isset($request->player2Code))
        {
            $partner = User::where('user_code', '=', $request->player2Code)->firstOrFail();

            //Verificar se parceiro esta numa equipa do mesmo torneio
            $isPlayer2OnAnotherTeam = Team::where([['player1_id', '=', $partner->id],['tournament_id', '=', $request->tournamentid]])->first();
            $isPlayer2OnAnotherTeamid2 = Team::where([['player2_id', '=', $partner->id],['tournament_id', '=', $request->tournamentid]])->first();

            if ($isPlayer2OnAnotherTeam != null || $isPlayer2OnAnotherTeamid2 != null) {
                return response()->json([
                    'message' => 'Parceiro ja esta inscrito noutra equipa no mesmo torneio',
                ], 400);
            }
        }

        if (isset($request->name)){$team->name= $request->name;}
        if (isset($request->subscriptiondate)){$team->subscription_date= $request->subscriptiondate;}
        if (isset($request->player1_id)){$team->player1_id= $request->player1_id;}
        if (isset($partner)){$team->player2_id= $partner->id;}
        if (isset($request->tournamentid)){$team->tournament_id= $request->tournamentid;}
        if (isset($request->payed)){$team->payed= $request->payed;}

        $team->save();
        return response()->json([
            'message' => 'Equipa actualizada com sucesso',
        ], 200);
    }

    public function is_teammate(Request $request)
    {
        $player1 = Team::where('player1_id', '=', $request->playerid)->first();
        $player2 = Team::where('player2_id', '=', $request->playerid)->first();

        if (isset($request->tournamentid))
        {
            $player1 = Team::where([['player1_id', '=', $request->playerid],
            ['tournament_id', '=', $request->tournamentid]])->first();
            $player2 = Team::where([['player2_id', '=', $request->playerid],
            ['tournament_id', '=', $request->tournamentid]])->first();
        }

        $httpMessage = ($player1 == null && $player2 == null) ? 'Não esta numa equipa' : 'Esta numa equipa';
        $httpCode = ($player1 == null && $player2 == null) ? 400 : 200;

        if($httpCode == 200 && isset($request->tournamentid))
        {
            return $player1 ?? $player2;
        }
        else
        {
            return response()->json([
                'message' => $httpMessage,
            ], $httpCode);
        }
    }

    public function get_teams(Request $request)
    {
        $teams = Team::where('tournament_id', $request->tournament_id)->get();
        foreach($teams as $team)
        {
            $team->player1_id = User::where('id', '=', $team->player1_id)->firstOrFail();
            $team->player2_id = User::where('id', '=', $team->player2_id)->firstOrFail(); 
        }
        return $teams;
    }

    public function remove_team(Request $request)
    {
        $team = Team::findOrFail($request->id);
        $team->delete();

        return response()->json([
            'message' => 'Equipa removida com sucesso',
        ], 200);
    }
}
