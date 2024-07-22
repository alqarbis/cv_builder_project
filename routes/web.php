<?php

use App\Http\Controllers\backend\backendController;
use App\Http\Controllers\frontend\frontendController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;

use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [frontendController::class, 'index']);
Route::middleware('auth')->group(function () {
    Route::controller(backendController::class)->group(function () {
        Route::get('/user/cv', 'UserCv')->name('usercv');
        Route::get('/user/logout', 'userLogout')->name('user.logout');
        Route::post('/save/info', 'saveInfo')->name('save.info');

        Route::get('/edit/info', 'editInfo')->name('edit.info');
        Route::post('/update/info', 'updateInfo')->name('update.info');


        Route::get('/user/profile', 'Userprofile')->name('user.profile');
        Route::post('/save/profile', 'saveprofile')->name('save.profile');
        Route::get('/edit/profile', 'editprofile')->name('edit.profile');
        Route::post('/update/profile', 'updateprofile')->name('update.profile');


        Route::get('/user/skill', 'Userskill')->name('user.skill');
        Route::post('/save/skill', 'saveskill')->name('save.skill');
        Route::get('/edit/skill', 'editskill')->name('edit.skill');
        Route::post('/update/skill', 'updateskill')->name('update.skill');

        Route::get('/user/edu', 'Useredu')->name('user.edu');
        Route::post('/save/edu', 'saveedu')->name('save.edu');
        Route::get('/edit/edu', 'editedu')->name('edit.edu');
        Route::get('/edit/education/{id}', 'editeducation')->name('edit.education');
        Route::post('/update/edu', 'updateedu')->name('update.edu');
        Route::get('/edit/delete/{id}', 'deleteeducation')->name('delete.education');


        Route::get('/user/lanuage', 'Userlanuage')->name('user.lanuage');
        Route::post('/save/language', 'saveelanguage')->name('save.language');
        Route::get('/edit/language', 'editlanguage')->name('edit.language');
        Route::post('/update/language', 'updatelanguage')->name('update.language');

        Route::get('/user/image', 'Userimage')->name('user.image');
        Route::post('/save/image', 'saveelimage')->name('save.image');
        Route::get('/edit/image', 'editimage')->name('edit.image');
        Route::post('/update/image', 'updateimage')->name('update.image');


        Route::get('/downloadCv', 'downloadCv')->name('downloadCv');
        Route::get('/resume', 'resume')->name('resume');

        Route::get('/sendEmail', 'sendEmail')->name('sendEmail');
    });
});



Route::get('/admin', [backendController::class, 'admin'])->name('admin')->middleware('admin');
Route::post('/save/admin', [backendController::class, 'saveAdmin'])->name('save.admin')->middleware('admin');





























Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});
Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
