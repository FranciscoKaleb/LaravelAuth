<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\User\RegularController;
use App\Http\Controllers\User\AdminController;
use App\Http\Controllers\User\UserController;

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

// ---------------------------------------Login/registration-----------------------------------------------------
// [1] register
Route::get('/register', [RegistrationController::class, 'showView'])->name('registration.form');
Route::post('/register',[RegistrationController::class, 'saveToTemp'])->name('registration.post');

Route::get('/confirm',[RegistrationController::class, 'showConfirm'])->name('confirm.form');
Route::post('/confirm',[RegistrationController::class, 'confirmCode'])->name('confirm.post');

Route::post('/check-username', [UserController::class, 'checkUserName']);
Route::post('/check-email', [UserController::class, 'checkEmail']);

// [2] login
Route::get('/login', [LoginController::class, 'showView'])->name('login.form');
Route::post('/login',[LoginController::class, 'loginPost'])->name('login.post');
Route::post('/logout',[LoginController::class, 'logout'])->name('logout');

// [2] Forgot password
Route::get('/forgotpassword', [PasswordController::class, 'showForgotPassword'])->name('forgotpassword.form');
Route::post('/forgotpassword', [PasswordController::class, 'emailCode'])->name('forgotpassword.post');

Route::get('/entertempcode', [PasswordController::class, 'showEnterTempCode'])->name('entertempcode.form');
Route::post('/entertempcode', [PasswordController::class, 'showEnterTempCode'])->name('entertempcode.post');

Route::get('/resetpassword', [PasswordController::class, 'showResetPassword'])->name('resetpassword.form');
Route::post('/resetpassword', [PasswordController::class, 'changePassword'])->name('resetpassword.post');


// ---------------------------------------LoginRegistration-----------------------------------------------------

Route::get('/', [UserController::class, 'index'])->name('dashboard.form')->middleware('auth');
//Route::get('/{user_name}', [UserController::class, 'showUserProfile']);

Route::get('/sample', [SampleController::class, 'passToView']); // put db data inside a view