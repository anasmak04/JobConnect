<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Candidat\CandidatController;
use App\Http\Controllers\City\CityController;
use App\Http\Controllers\Recruiter\RecruiterController;
use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\Offers\JobOfferController;
use App\Http\Controllers\Representer\RepresenterController;
use App\Http\Controllers\Skill\SkillController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Public routes
Route::get('/job-offers', [JobOfferController::class, 'index'])->name('job_offers.index');
Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');

// Authentication routes
Auth::routes();

// Route::resource("/dashboard/admin/user", UserController::class);
// Route::resource("/dashboard/admin/skill", SkillController::class);
// Route::resource("/dashboard/admin/city", CityController::class);


// Route::resource("/representer-complete-info", RepresenterController::class);
// Route::get('/candidat/candidat_profile', [CandidatController::class, 'index'])->name('candidat.profile');
// Route::get('/candidat/profile/edit', [CandidatController::class, 'editProfile'])->name('candidat.edit.profile');
// Route::post('/candidat/profile/save', [CandidatController::class, 'saveProfile'])->name('candidat.save.profile');


// Route::resource("/user", UserController::class);
// Route::get('/user/{userId}/profile', [\App\Http\Controllers\Representer\ProfileRepresenter::class, 'show'])->name('user.profile.show');


// Route::get('/candidat/fill-representer-info', [CandidatController::class, 'showRepresenterForm'])->name('candidat.fill.representer.info');
// Route::post('/candidat/save-representer-info', [CandidatController::class, 'saveRepresenterInfo'])->name('candidat.save.representer.info');
// Route::put('/user/{user}/update-company', [RepresenterController::class, 'updateRepresenterCompany'])->name('user.update.company');



// Route::get('/job-offers', [JobOfferController::class, 'index'])->name('job_offers.index');
// Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
// // Route::get('/representers/recruiters', [RepresenterController::class, 'showRecruiters'])->name('representers.recruiters');

// Route::post('/recruiter/store', [RecruiterController::class, 'store'])->name('recruiter.store');
// Route::get('/recruiters', [RecruiterController::class, 'showRecruiters'])->name('recruiters.index');


// Route::get('/job-offers', [JobOfferController::class, 'index'])->name('job_offers.index');
// Route::get('/job-offers/{job_offer}', [JobOfferController::class, 'show'])->name('job_offers.show');
// Route::post('/apply', [JobOfferController::class, 'store'])->name('apply');

// Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
// Route::get('/companies/{company}/job-offers', [CompanyController::class, 'showJobOffers'])->name('companies.job_offers');
// Route::post('/logout', [LogoutController::class , "customLogout"])->name("custom.logout");



Route::middleware(['is_admin'])->group(function () {
    Route::resource("/dashboard/admin/user", UserController::class);
    Route::resource("/dashboard/admin/skill", SkillController::class);
    Route::resource("/dashboard/admin/city", CityController::class);
});


Route::middleware(['is_representer'])->group(function () {
    Route::resource("/representer-complete-info", RepresenterController::class);
    Route::get('/candidat/fill-representer-info', [CandidatController::class, 'showRepresenterForm'])->name('candidat.fill.representer.info');
    Route::post('/candidat/save-representer-info', [CandidatController::class, 'saveRepresenterInfo'])->name('candidat.save.representer.info');
    Route::put('/user/{user}/update-company', [RepresenterController::class, 'updateRepresenterCompany'])->name('user.update.company');

});



Route::middleware(['is_candidate'])->group(function () {
    Route::get('/user/{userId}/profile', [RepresenterController::class, 'show'])->name('user.profile.show');
    Route::get('/candidat/candidat_profile', [CandidatController::class, 'index'])->name('candidat.profile');
    Route::get('/candidat/profile/edit', [CandidatController::class, 'editProfile'])->name('candidat.edit.profile');
    Route::post('/candidat/profile/save', [CandidatController::class, 'saveProfile'])->name('candidat.save.profile');
    Route::get('/job-offers/{job_offer}', [JobOfferController::class, 'show'])->name('job_offers.show');
    Route::post('/apply', [JobOfferController::class, 'store'])->name('apply');
    Route::get('/companies/{company}/job-offers', [CompanyController::class, 'showJobOffers'])->name('companies.job_offers');
});



    Route::post('/logout', [LogoutController::class , "customLogout"])->name("custom.logout");
