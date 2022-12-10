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
            'tournamenttype' => 'required',
            'init_date' => 'date',
            'end_date' => 'date',

        ]);

        if ($validation->fails()) {
            return response()->json([
                'errors' => $validation->errors(),
                'message' => __('auth.wrong_format'),
            ], 400);
        }

        $url="";
        if($request->has('fileurl')){
            $url = $request->fileurl;
         }


        $tournament = Tournament::create([
            "name" => $request->name,
            "tournament_type_id" => $request->tournamenttype,
            "init_date" => $request->initdate,
            "end_date" => $request->enddate,
            "file_url" => $url
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
