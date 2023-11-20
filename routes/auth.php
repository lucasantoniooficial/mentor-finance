<?php


use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RequestPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'create'])->name('home');
Route::post('login', [LoginController::class, 'store'])->name('login');
Route::post('logout', [LoginController::class, 'destroy'])->name('logout');
Route::get('request/password', [RequestPasswordController::class, 'create'])->name('password.request');
Route::post('request/password', [RequestPasswordController::class, 'store'])->name('password.request');
Route::get('reset/password/{token}', [ResetPasswordController::class, 'create'])->name('password.reset');
Route::post('reset/password', [ResetPasswordController::class, 'store'])->name('password.reseting');
