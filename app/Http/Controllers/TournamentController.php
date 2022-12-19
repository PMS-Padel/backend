<?php

namespace App\Http\Controllers;
use App\Models\Tournament;
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
            'init_date' => 'date',
            'end_date' => 'date',
            'location' => 'string',
            'price' => 'numeric',
            'maxplayers' => 'integer',
            'tournamenttype' => 'required',
            //'fileurl' => '',
        ]);

        if ($validation->fails()) {
            return response()->json([
                'errors' => $validation->errors(),
                'message' => __('auth.wrong_format'),
            ], 400);
        }

        $tournament = Tournament::create([
            "name" => $request->name,
            "tournament_type_id" => $request->tournamenttype,
            "init_date" => $request->initdate,
            "end_date" => $request->enddate,
            "file_url" => $request->fileurl,
            "description" => $request->description,
            "location" => $request->location,
            "price" => $request->price,
            "max_players" => $request->maxplayers,
        ]);

        //$user->sendEmailVerificationNotification();
        
        return response()->json([
            'message' => 'Torneio criado com sucesso',
        ], 200);
    }

    public function get_tournament(Request $request)
    {
        $tournament_id="";
        if($request->has('id')){
            $tournament_id = $request->id;
        }
        
        if ($tournament_id=="")
        {
            return Tournament::query()->get();
        }
        else
        {
            return Tournament::query()->where('id', $tournament_id)->get();
            //return $tournament_id;
        }
        
    }


    
}
