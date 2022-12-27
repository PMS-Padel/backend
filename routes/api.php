<?php

use App\Http\Controllers\TournamentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TeamsController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

    Route::post('logout', [UserController::class, 'logout']);

    //**********TORNEIOS********/
    Route::post('createtournament', [TournamentController::class, 'create_tournament']);
    Route::post('updatetournament', [TournamentController::class, 'update_tournament']);

    /***********EQUIPAS**********/
    Route::post('createteam', [TeamsController::class, 'create_team']);
    Route::post('updateteam', [TeamsController::class, 'update_team']);
    Route::post('setpayed', [TeamsController::class, 'set_payed']);
});

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return 'verified';
})->name('verification.verify');

Route::get('gettournaments', [TournamentController::class, 'get_tournaments']);
Route::get('gettournament/{id}', [TournamentController::class, 'get_tournament']);
