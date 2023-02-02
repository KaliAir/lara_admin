<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLoginController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//public route
Route::controller(InquiryController::class)->group(function(){
    Route::post('/inquiry', 'inquiry');
});

Route::controller(AdminLoginController::class)->group(function(){
    Route::post('/login', 'login');
    // Route::post('/register', 'register');
});

//private route

Route::controller(AdminController::class)->middleware(['auth:sanctum'])->group(function(){
    Route::get('/index', 'index');
    Route::delete('/logout/{id}', 'logout');
    Route::get('/edit/{id}', 'edit');
    Route::put('/update/{id}', 'update');
    Route::post('/search', 'search');
    Route::delete('/delete/{id}','delete');
    Route::delete('/forceDelete/{id}', 'forceDelete');
    Route::get('/showdelete','showDeletes');
    Route::post('/restore/{id}', 'restore');
});
