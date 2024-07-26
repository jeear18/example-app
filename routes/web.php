<?php

use App\Http\Controllers\NameController;
use Illuminate\Support\Facades\Route;


Route::resource('names', NameController::class)
->only(['create','index', 'store','edit', 'update', 'destroy']);

Route::put('ups',[NameController::class,'update'])->name('update');