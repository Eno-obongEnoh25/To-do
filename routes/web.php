<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListController;
use App\Http\Controllers\SignupController;

Route::get('welcome', function(){
    return view('welcome');
})->name('welcome');


Route::get('list', [ListController::class, 'show'])->name('list');
Route::post('list', [ListController::class, 'created'])->name('list');
Route::delete('list/{newlist}', [ListController::class, 'destroy'])->name('list.destroy');

Route::get('update/{newlist}', [ListController::class, 'edit'])->name('update');
Route::post('update/{newlist}', [Listcontroller::class, 'update'])->name('update');

Route::get('Usersignup', [SignupController::class, 'show'])->name('Usersignup');
Route::post('Usersignup', [SignupController::class, 'create'])->name('Usersignup');

Route::get('Userlogin', [SignupController::class, 'enter'])->name('Userlogin');
Route::post('Userlogin', [SignupController::class, 'login'])->name('Userlogin');

Route::post('logout', [SignupController::class, 'logout'])->name('logout');


