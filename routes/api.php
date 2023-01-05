<?php

use App\Http\Controllers\TournamentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TeamsController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/test-authentication', function () {
        return Auth::user();
    });

    Route::post('update', [UserController::class, 'update']);
    Route::post('logout', [UserController::class, 'logout']);
    Route::get('getByCode/{userCode}', [UserController::class, 'get_user_by_code']);

    //**********TORNEIOS********/
    Route::post('createtournament', [TournamentController::class, 'create_tournament']);
    Route::post('updatetournament', [TournamentController::class, 'update_tournament']);
    Route::post('updateImagetournament', [TournamentController::class, 'update_TournamentImage']);
    Route::post('deleteTourney', [TournamentController::class, 'remove_tourney']);
    /***********EQUIPAS**********/
    Route::post('createteam', [TeamsController::class, 'create_team']);
    Route::post('createteamByCode', [TeamsController::class, 'create_teamByCode']);
    Route::post('updateteam', [TeamsController::class, 'update_team']);
    Route::post('setpayed', [TeamsController::class, 'set_payed']);
    Route::post('isteammate', [TeamsController::class, 'is_teammate']);
    Route::post('deleteTeam', [TeamsController::class, 'remove_team']);
    /***********RESULTADOS**********/
    Route::post('createavailability', [CamposDisponibilidade::class, 'create_availability']);

    /***********GAMES**********/
    Route::post('creategame', [GameController::class, 'create_game']);
    Route::post('updategame', [GameController::class, 'update_game']);
    Route::post('deletegame', [GameController::class, 'delete_game']);
});

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return 'verified';
})->name('verification.verify');

Route::get('gettournaments', [TournamentController::class, 'get_tournaments']);
Route::get('gettournament/{id}', [TournamentController::class, 'get_tournament']);

Route::get('getteams/{tournament_id}', [TeamsController::class, 'get_teams']);
Route::get('get-tournament-games/{id}', [TournamentController::class, 'getTournamentGames']);
