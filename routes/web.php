<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RingtoneController;
use App\Http\Controllers\FrontMusicController;
use App\Http\Controllers\ArtistController;
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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('ringtones', RingtoneController::class);
Route::get('/hh', [RingtoneController::class,'']);

    Route::group(array('namespace'=>'Frontend'),function(){
        Route::get('/',[RingtoneController::class,'index']);

    });
Route::get('/',[FrontMusicController::class,'index']);
Route::get('/category/{id}',[FrontMusicController::class,'category'])->name('ringtones.category');
Route::get('/ringtones/{id}/{slug}',[FrontMusicController::class,'show'])->name('ringtones.show');
Route::post('/ringtones/download/{id}',[FrontMusicController::class,'downloadRingtone'])->name('ringtones.download');
Route::resource('artist',ArtistController::class);

