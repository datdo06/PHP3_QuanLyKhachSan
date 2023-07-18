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
    return view('admin.index');
});
// Account
Route::get('/admin/account', [\App\Http\Controllers\AcountController::class, 'index'])->name('list_account');
Route::match(['GET', 'POST'], '/admin/account-add', [\App\Http\Controllers\AcountController::class, 'add'])->name('route_account_add');
Route::match(['GET', 'POST'], '/admin/account-update/{id}', [\App\Http\Controllers\AcountController::class, 'update'])->name('route_account_update');
