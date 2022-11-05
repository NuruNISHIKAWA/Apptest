<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [FormController::class, 'index']);
Route::get('/confirm', [FormController::class, 'confirm']);
Route::post('/confirm', [FormController::class, 'check']);
Route::get('/thanks', [FormController::class, 'thanks']);
Route::post('/thanks', [FormController::class, 'register']);
Route::get('/manegiment', [FormController::class, 'find']);
Route::post('/manegiment', [FormController::class, 'search']);
Route::post('/reset', [FormController::class, 'reset']);

Route::get('/session', [SessionController::class, 'getSes']);
Route::post('/session', [SessionController::class, 'postSes']);

