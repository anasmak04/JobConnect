<?php

use App\Http\Controllers\CandidatController;
<<<<<<< HEAD
use App\Http\Controllers\JobOfferController;
=======
use App\Http\Controllers\City\CityController;
use App\Http\Controllers\Representer\ProfileRepresenter;
>>>>>>> 9ee830d0973f0158ede5b04b85c251f77e90cd9c
use App\Http\Controllers\RepresenterController;
use App\Http\Controllers\Skill\SkillController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::middleware(['auth', 'check.role'])->group(function () {
//
//});


Route::resource("/dashboard/admin/user", UserController::class);
Route::resource("/dashboard/admin/skill", SkillController::class);
Route::resource("/dashboard/admin/city", CityController::class);
Route::resource("/representer-complete-info", RepresenterController::class);


Route::get('/user/{userId}/profile', [ProfileRepresenter::class, 'show'])->name('user.profile.show');
Route::get('/candidat/fill-representer-info', [CandidatController::class, 'showRepresenterForm'])->name('candidat.fill.representer.info');
Route::post('/candidat/save-representer-info', [CandidatController::class, 'saveRepresenterInfo'])->name('candidat.save.representer.info');
Route::get('/job-offers', [JobOfferController::class, 'index'])->name('job_offers.index');
Route::resource("user", UserController::class);
Route::resource("skill", SkillController::class);
Route::resource("city", CityController::class);
Route::put('/user/{user}/update-company', [RepresenterController::class, 'updateRepresenterCompany'])->name('user.update.company');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
