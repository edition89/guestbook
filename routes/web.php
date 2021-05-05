<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CaptchaValidationController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',  [HomeController::class, 'index']);
Route::post('/edit',  [HomeController::class, 'edit'])->name('edit');
Route::post('/deleted',  [HomeController::class, 'deleted'])->name('deleted');
Route::get('/logout', [HomeController::class, 'logout']);
Route::post('/login', 'Auth\AuthController@gpostLogin')->name('auth.login.get');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/', [HomeController::class, 'capthcaFormValidate'])->name('captcha-validation');
Route::get('reload-captcha', [HomeController::class, 'reloadCaptcha']);