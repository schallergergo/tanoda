<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\Api\AuthController;

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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);


Route::get('competition/show/{competition}',[CompetitionController::class, 'show'])->name('competition.show');
Route::get('competition/index',[CompetitionController::class, 'index'])->name('competition.index');
Route::post('competition/store',[CompetitionController::class, 'store'])->name('competition.store');
Route::patch('competition/update/{competition}',[CompetitionController::class, 'update'])->name('competition.update');
Route::get('competition/delete/{competition}',[CompetitionController::class, 'destroy'])->name('competition.delete');