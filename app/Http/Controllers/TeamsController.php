<?php

namespace App\Http\Controllers;
use App\Models\Team;
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
            'player2id' => 'required'
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
            "payed"=> 'false'
        ]);

        //$user->sendEmailVerificationNotification();
        
        return response()->json([
            'message' => 'Equipa criada com sucesso',
        ], 200);
    }
}
