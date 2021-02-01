<?php

use App\Http\Controllers\EntryController;
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

    Route::get('/dashboard/record/zone/{zone_id}',[RecordsController::class , "showRecords"])->name('show-zone-records');
    Route::get('/dashboard/record/zone/{zone_id}/add/record',[RecordsController::class , "addRecord"])->name('add-zone-record');
    Route::post('/dashboard/record/zone/{zone_id}/add/record',[RecordsController::class , "doAddRecord"])->name('add-zone-record');

    Route::get('/dashboard/record/{record_id}/edit',[RecordsController::class , "editRecord"])->name('edit-zone-record');
    Route::post('/dashboard/record/{record_id}/edit',[RecordsController::class , "doEditRecord"])->name('edit-zone-record');

    Route::any('/dashboard/record/{record_id}/delete',[RecordsController::class , "deleteRecord"])->name('delete-zone-record');

    Route::get('/dashboard/record/{record_id}/entries',[EntryController::class , "showEntries"])->name('show-zone-record-entries');
    Route::get('/dashboard/record/{record_id}/entries/add',[EntryController::class , "addEntry"])->name('add-zone-record-entry');
    Route::post('/dashboard/record/{record_id}/entries/add',[EntryController::class , "doAddEntry"])->name('add-zone-record-entry');
    Route::get('/dashboard/record/{record_id}/entries/edit',[EntryController::class , "editEntry"])->name('edit-zone-record-entry');
    Route::post('/dashboard/record/{record_id}/entries/edit',[EntryController::class , "doEditEntry"])->name('edit-zone-record-entry');
    Route::any('/dashboard/record/{record_id}/entries/delete',[EntryController::class , "deleteEntry"])->name('delete-zone-record-entry');





});





