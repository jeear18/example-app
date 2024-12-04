<?php

use App\Http\Controllers\CountDataController;
use App\Http\Controllers\NameController;
use Illuminate\Support\Facades\Route;

;
Route::resource('names', NameController::class)
->only(['create','index', 'store','', 'update', 'destroy', 'tables']);

Route::put('ups',[NameController::class,'update'])->name('update');
// Route::post('create',[NameController::class,'store'])->name('create');
Route::get('tables',[NameController::class,'tables'])->name('tables');

Route::get('/names/{id}/edit', [NameController::class, 'edit'])->name('names.edit');
Route::post('/store', [NameController::class, 'store']);
Route::put('/store', [NameController::class, 'store']);
Route::get('/project/dashboard',[NameController::class,'main_layout'])->name('main');
Route::get('/project/tables',[NameController::class,'index'])->name('tables');
Route::get('/user-count', [CountDataController::class, 'getUserCount']);

Route::get('/name-count', [CountDataController::class, 'getNameCount']);
