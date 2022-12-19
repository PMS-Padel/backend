<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            'file' => 'file',
        ]);

        if ($validation->fails()) {
            return response()->json([
                'errors' => $validation->errors(),
                'message' => __('auth.wrong_format'),
            ], 400);
        }

        $fileURL = Storage::disk('local')->putFile('tournaments', new File($request->file));

        Tournament::create([
            "name" => $request->name,
            "tournament_type_id" => $request->tournamenttype,
            "init_date" => $request->initdate,
            "end_date" => $request->enddate,
            "file_url" => $fileURL,
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

    public function get_tournaments(Request $request)
    {
        $data = Tournament::all();

        return $data;
    }

    public function get_tournament(Request $request, $id)
    {
        $data =  Tournament::findOrFail($id);

        return $data;
    }
}
