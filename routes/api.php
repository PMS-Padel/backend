<?php

use App\Http\Controllers\TournamentController;
use App\Http\Controllers\UserController;
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
});

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return 'verified';
})->name('verification.verify');

//**********TORNEIOS********/
Route::post('createtournament', [TournamentController::class, 'create_tournament']);
Route::post('gettournaments', [TournamentController::class, 'get_tournament']);

/***********EQUIPAS**********/
Route::post('createteam', [TeamController::class, 'create_team']);
