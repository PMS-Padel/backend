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
            "payed"=> 'false'
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

        $team = Team::create([
            "name" => $request->name,
            "subscription_date" => $request->subscriptiondate,
            "player1_id" => $player1->id,
            "player2_id" => $player2->id,
            "tournament_id" => $request->tournamentid,
            "payed"=> 'false'
        ]);

        //$user->sendEmailVerificationNotification();
        
        return response()->json([
            'message' => 'Equipa criada com sucesso',
        ], 200);
    }
    public function update_team(Request $request)
    {

        $team = Team::findOrFail($request->id);


        if (isset($request->name)){$team->name= $request->name;}
        if (isset($request->subscription_date)){$team->subscription_date= $request->subscription_date;}
        if (isset($request->player1_id)){$team->player1_id= $request->player1_id;}
        if (isset($request->player2_id )){$team->player2_id= $request->player2_id;}
        if (isset($request->tournament_id )){$team->player2_id= $request->tournament_id;}
        if (isset($request->payed)){$team->payed= $request->payed;}

        $team->save();
        return response()->json([
            'message' => 'Equipa actualizada com sucesso',
        ], 200);
    }
}
