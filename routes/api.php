<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\AssessmentBlockController;
use App\Http\Controllers\JudgeController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OnlinePeriodController;

use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\TeamMemberController;
use App\Http\Controllers\PortfolioUploadController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LocalizationController;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;


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





Route::post('/register', [RegisteredUserController::class, 'store'])
                ->middleware('guest')
                ->name('register');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
                ->middleware('guest')
                ->name('login');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
                ->middleware('guest')
                ->name('password.email');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
                ->middleware('guest')
                ->name('password.store');

Route::get('/verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['auth', 'signed', 'throttle:6,1'])
                ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware(['auth', 'throttle:6,1'])
                ->name('verification.send');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth')
                ->name('logout');



Route::get('/dashboard', function () {
    return 'Hello World';
})->name("dashboard");

Route::get('/user', function (Request $request) {
    return ["user" =>$request->user()];
});



Route::get('locale/{locale}', [LocalizationController::class, 'setLocale']);



Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);
Route::get('/auth/logout', [AuthController::class, 'logoutUser']);


Route::get('competition/{competition}/show',[CompetitionController::class, 'show'])->name('competition.show');
Route::get('competition/index',[CompetitionController::class, 'index'])->name('competition.index');

//Frissült
Route::get('competition/index/registrationOpen',[CompetitionController::class, "registrationOpen"])->name('competition.registration');
//Frissült
Route::get('competition/index/evaluationOpen',[CompetitionController::class, "evaluationOpen"])->name('competition.evaluation');
Route::post('competition/store',[CompetitionController::class, 'store'])->name('competition.store');
Route::patch('competition/{competition}/update',[CompetitionController::class, 'update'])->name('competition.update');
Route::get('competition/{competition}/delete',[CompetitionController::class, 'destroy'])->name('competition.delete');




Route::get('competition/{competition}/judge/{judge}/add',[CompetitionController::class, 'addJudge'])->name('competition.addjudge');
Route::get('competition/{competition}/judge/{judge}/remove',[CompetitionController::class, 'removeJudge'])->name('competition.removejudge');


Route::get('/competition/{competition}/contact/index',[ContactController::class, 'index'])->name('contact.index');


Route::post('competition/{competition}/upload/coverimage/',[CompetitionController::class, 'coverImageUpload'])->name('competition.coverimage');
Route::post('competition/{competition}/upload/standtemplate/',[CompetitionController::class, 'standTemplateUpload'])->name('competition.standtemplate');



Route::get('judge/{judge}/show/',[JudgeController::class, 'show'])->name('judge.show');
Route::get('judge/index',[JudgeController::class, 'index'])->name('judge.index');
Route::post('judge/store',[JudgeController::class, 'store'])->name('judge.store');
Route::post('judge/{judge}/update',[JudgeController::class, 'update'])->name('judge.update');
Route::get('judge/{judge}/delete',[JudgeController::class, 'destroy'])->name('judge.delete');




Route::post('portfolio/{portfolio}/update',[PortfolioController::class, 'store'])->name('portfolio.update');
Route::get('portfolio/{portfolio}/show',[PortfolioController::class, 'show'])->name('portfolio.show');



Route::post('portfolio/{portfolio}/upload/logo',[PortfolioUploadController::class, 'logoUpload'])->name('portfolio.logo');
Route::post('portfolio/{portfolio}/upload/flier',[PortfolioUploadController::class, 'flierUpload'])->name('portfolio.flier');
Route::post('portfolio/{portfolio}/upload/catalog',[PortfolioUploadController::class, 'catalogUpload'])->name('portfolio.catalog');
Route::post('portfolio/{portfolio}/upload/businesscard',[PortfolioUploadController::class, 'businessCardUpload'])->name('portfolio.businesscard');
Route::post('portfolio/{portfolio}/upload/presentation',[PortfolioUploadController::class, 'presentationUpload'])->name('portfolio.presentation');
Route::post('portfolio/{portfolio}/upload/standimage',[PortfolioUploadController::class, 'standImageUpload'])->name('portfolio.standimage');


Route::get('/team/{team}/show',[TeamController::class, 'show'])->name('team.show');
Route::get('/team/{team}/teammember/index',[TeamMemberController::class, 'index'])->name('teammember.index');
Route::post('/team/{team}/teammember/store',[TeamMemberController::class, 'store'])->name('teammember.store');
Route::get('/teammember/{team_member}/show',[TeamMemberController::class, 'show'])->name('teammember.show');
Route::post('/teammember/{team_member}/update',[TeamMemberController::class, 'update'])->name('teammember.update');
Route::get('/teammember/{team_member}/delete',[TeamMemberController::class, 'destroy'])->name('teammember.delete');



Route::get('/billing/{billing}/show',[BillingController::class, 'show'])->name('billing.show');

Route::post('/billing/{billing}/update',[BillingController::class, 'update'])->name('billing.update');





Route::get('competition/{competition}/team/index',[TeamController::class, 'index'])->name('competition.teamIndex');
Route::post('competition/{competition}/team/store',[TeamController::class, 'store'])->name('competition.teamStore');




Route::get('/contact/{contact}/show',[ContactController::class, 'show'])->name('contact.show');

Route::get('/contact/{contact}/update',[ContactController::class, 'show'])->name('contact.show');


Route::post('/onlineperiod/store',[OnlinePeriodController::class, 'store'])->name('onlineperiod.store');
Route::post('/onlineperiod/{online_period}/delete',[OnlinePeriodController::class, 'destroy'])->name('onlineperiod.delete');


Route::get('/competition/{competition}/assessment/index',[AssessmentController::class, 'index'])->name('assessment.index');
Route::get('/assessment/{assessment}/show',[AssessmentController::class, 'show'])->name('assessment.show');
Route::post('/assessment/{assessment}/update',[AssessmentController::class, 'update'])->name('assessment.update');
Route::get('/assessment/{assessment}/delete',[AssessmentController::class, 'destroy'])->name('assessment.delete');
Route::post('/assessmentblock/{assessment_block}/update',[AssessmentBlockController::class, 'update'])->name('assessmentblock.update');
