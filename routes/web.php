<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\GradeController;
use Illuminate\Support\Facades\Route;

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

Route::controller(GradeController::class)->group(function(){
    Route::get('/', 'home')->name('home');
    Route::get('/nilai', 'nilai')->name('nilai');
    Route::get('/nilai/add', 'add')->name('add');
    Route::post('/nilai/add/process', 'addprocess')->name('addprocess');
    Route::get('/nilai/detail{id}', 'detail')->name('detail');
    Route::get('/nilai/update/{id}', 'update')->name('update');
    Route::put('/nilai/update/{id}/{image}/process', 'updateprocess')->name('updateprocess');
    Route::get('/nilai/delete/{id}', 'delete')->name('delete');
});

