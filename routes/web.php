<?php

use App\Http\Controllers\RecordsController;
use App\Http\Controllers\ZoneController;
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
require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/dashboard/zones/add',[ZoneController::class , "create"])->name('add-zone');
    Route::post('/dashboard/zones/add',[ZoneController::class , "doCreate"])->name('add-zone');
    Route::get('/dashboard/zones/{id}',[ZoneController::class , "showZone"])->name('show-zone');
    Route::post('/dashboard/zones/{id}/edit',[ZoneController::class , "doEditZone"])->name('edit-zone');

    Route::get('/dashboard/record/zone/{zone_id}',[RecordsController::class , "showRecords"])->name('show-zone-record');
    Route::get('/dashboard/record/zone/{zone_id}/add/record',[RecordsController::class , "addRecord"])->name('add-zone-record');



});





