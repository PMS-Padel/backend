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
            'init_date' => 'date'|'required',
            'end_date' => 'date'|'required',
            'location' => 'string'|'required',
            'price' => 'numeric',
            'maxplayers' => 'integer',
            'tournamenttype' => 'required',
            //'user_id' => 'required',
            'fileurl' => 'required',
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
            $tournament->maxplayers = $request->maxplayers;
        }
        if (isset($request->tournamenttype)) {
            $tournament->tournamenttype = $request->tournamenttype;
        }


        $tournament->save();

        return response()->json([
            'message' => 'Torneio modificado',
        ], 200);
    }
    public function get_tournaments(Request $request)
    {
        $data =  Tournament::all();
        return $data;
    }
}
