<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\JudgeController;


use App\Http\Controllers\UserController;
use App\Http\Controllers\LocalizationController;

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


Route::get('locale/{locale}', [LocalizationController::class, 'setLocale']);



Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);
Route::post('/auth/logout', [AuthController::class, 'logoutUser']);


Route::get('competition/{competition}/show',[CompetitionController::class, 'show'])->name('competition.show');
Route::get('competition/index',[CompetitionController::class, 'index'])->name('competition.index');
Route::post('competition/store',[CompetitionController::class, 'store'])->name('competition.store');
Route::patch('competition/{competition}/update',[CompetitionController::class, 'update'])->name('competition.update');
Route::get('competition/{competition}/delete',[CompetitionController::class, 'destroy'])->name('competition.delete');

Route::get('competition/{competition}/judge/{judge}/add',[CompetitionController::class, 'addJudge'])->name('competition.addjudge');
Route::get('competition/{competition}/judge/{judge}/remove',[CompetitionController::class, 'removeJudge'])->name('competition.removejudge');



Route::post('competition/{competition}/coverimage/',[CompetitionController::class, 'coverImageUpload'])->name('competition.coverimage');
Route::post('competition/{competition}/standtemplate/',[CompetitionController::class, 'standTemplateUpload'])->name('competition.standtemplate');



Route::get('judge/{judge}/show/',[JudgeController::class, 'show'])->name('judge.show');
Route::get('judge/index',[JudgeController::class, 'index'])->name('judge.index');
Route::post('judge/store',[JudgeController::class, 'store'])->name('judge.store');
Route::post('judge/{judge}/update',[JudgeController::class, 'update'])->name('judge.update');
Route::get('judge/{judge}/delete',[JudgeController::class, 'destroy'])->name('judge.delete');


Route::get('assessment/{portolio}/show',[AssessmentController::class, 'store'])->name('assessment.store');
