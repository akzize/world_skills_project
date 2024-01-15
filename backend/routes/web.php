<?php

use App\Http\Controllers\ResponsableController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuhentificationController;
use App\Models\Employe;

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


Route::get('/login', [AuhentificationController::class, 'LoginAction']);
Route::get('/login', [AuhentificationController::class, 'LoginPost']);
Route::group(['as' => 'employe.', 'prefix' => 'employe'], function () {
    Route::controller(ResponsableController::class)->group(function () {
        Route::get('/', 'ListeEmployer')->name('index');
        Route::get('/ajouter', 'NouveauEmploye')->name('ajouter');
        Route::get('/modifier/{employe}', 'ModifierEmploye')->name('modifier');
        Route::get('/suprimer/{employe}', 'SupprimerEmploye')->name('supprimer');
        Route::post('/save', 'SaveEmploye')->name('save');
    });
});
// Route::get('/employe/ajouter', [ResponsableController::class, 'NouveauEmploye']);
// Route::get('/employe/modifier', [ResponsableController::class, 'ModifierEmploye']);
// Route::get('/employe/save', [ResponsableController::class, 'ModifierEmploye']);