<?php

use App\Http\Controllers\NameController;
use Illuminate\Support\Facades\Route;


Route::resource('names', NameController::class)
->only(['create','index', 'store','edit', 'update', 'destroy', 'tables']);

Route::put('ups',[NameController::class,'update'])->name('update');
Route::get('tables',[NameController::class,'tables'])->name('tables');