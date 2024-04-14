<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GroupeController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\SpecialiteController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\FormateurController;
use App\Http\Controllers\MatiereController;

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

Route::prefix('groupe')->group(function () {
    Route::get('/all', [GroupeController::class, 'index']);
    Route::get('/show/{id}', [GroupeController::class, 'show']);
    Route::post('/create', [GroupeController::class, 'store']);
    Route::get('/prepare', [GroupeController::class, 'create']);
    Route::get('/edit/{id}', [GroupeController::class, 'edit']);
    Route::put('/update/{id}', [GroupeController::class, 'update']);
    Route::delete('/destroy/{id}', [GroupeController::class, 'destroy']);
});

Route::prefix('specialite')->group(function () {
    Route::get('/all', [SpecialiteController::class, 'index']);
    Route::get('/show/{id}', [SpecialiteController::class, 'show']);
    Route::get('/edit/{id}', [SpecialiteController::class, 'edit']);
    Route::post('/create', [SpecialiteController::class, 'store']);
    Route::put('/update/{id}', [SpecialiteController::class, 'update']);
    Route::delete('/destroy/{id}', [SpecialiteController::class, 'destroy']);
});

Route::prefix('etudiant')->group(function () {
    Route::get('/all', [EtudiantController::class, 'index']);
    Route::get('/show/{id}', [EtudiantController::class, 'show']);
    Route::get('/prepare', [EtudiantController::class, 'create']);
    Route::post('/create', [EtudiantController::class, 'store']);
    Route::get('/edit/{id}', [EtudiantController::class, 'edit']);
    Route::put('/update/{id}', [EtudiantController::class, 'update']);
    Route::delete('/destroy/{id}', [EtudiantController::class, 'destroy']);
});

Route::prefix('matiere')->group(function () {
    Route::get('/all', [MatiereController::class, 'index']);
    Route::get('/show/{id}', [MatiereController::class, 'show']);
    Route::post('/create', [MatiereController::class, 'store']);
    Route::get('/edit/{id}', [MatiereController::class, 'edit']);
    Route::put('/update/{id}', [MatiereController::class, 'update']);
    Route::delete('/destroy/{id}', [MatiereController::class, 'destroy']);
});

Route::prefix('formateur')->group(function () {
    Route::get('/all', [FormateurController::class, 'index']);
    Route::get('/show/{id}', [FormateurController::class, 'show']);
    Route::get('/prepare', [MatiereController::class, 'create']);
    Route::post('/create', [FormateurController::class, 'store']);
    Route::get('/edit/{id}', [FormateurController::class, 'edit']);
    Route::put('/update/{id}', [FormateurController::class, 'update']);
    Route::delete('/destroy/{id}', [FormateurController::class, 'destroy']);
});

Route::get('/GetRole/{idrole}', [AuthController::class, 'GetRole']);

Route::post('/login' , [AuthController::class , 'Login']) ;
Route::post('/register', [AuthController::class, 'Register'])->name('register');
// Route::post('/register' , [AuthController::class , 'Register']) ;





