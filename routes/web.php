<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\RepresenterController;
use App\Http\Controllers\ProfileRepresenter;
use App\Http\Controllers\CandidatController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource("/dashboard/admin/user", UserController::class);
Route::resource("/dashboard/admin/skill", SkillController::class);
Route::resource("/dashboard/admin/city", CityController::class);
Route::resource("/representer-complete-info", RepresenterController::class);

Route::get('/user/{userId}/profile', [ProfileRepresenter::class, 'show'])->name('user.profile.show');
Route::get('/candidat/fill-representer-info', [CandidatController::class, 'showRepresenterForm'])->name('candidat.fill.representer.info');
Route::post('/candidat/save-representer-info', [CandidatController::class, 'saveRepresenterInfo'])->name('candidat.save.representer.info');
Route::get('/candidat/candidat_profile', [CandidatController::class, 'index'])->name('candidat.profile');


// Route::get('/job-offers', [JobOfferController::class, 'index'])->name('job_offers.index');
// Route::resource("user", UserController::class);
// Route::resource("skill", SkillController::class);
// Route::resource("city", CityController::class);
// Route::put('/user/{user}/update-company', [RepresenterController::class, 'updateRepresenterCompany'])->name('user.update.company');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

?>
