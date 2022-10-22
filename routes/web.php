<?php

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

Route::get('/', function () {
    
    return view('auth.login');
});
Route::post('user/login', [App\Http\Controllers\AuthController::class,'userLogin']);
Route::get('user/logout', [App\Http\Controllers\AuthController::class,'userLogout']);
Route::get('/dashboard',[App\Http\Controllers\WalletController::class,'dashboard']);
Route::get('/transaction-list',[App\Http\Controllers\WalletController::class,'transactionList']);
Route::post('/transferMoney',[App\Http\Controllers\WalletController::class,'moneyTransfer']);





