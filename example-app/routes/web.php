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
    return view('index');
})->name('/')->middleware('check.role');

// Auth
Route::controller(\App\Http\Controllers\AuthController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::get('/registration', 'registration')->name('registration');
    Route::get('/logout', 'logout')->name('logout');
    Route::post('/validate_registration', 'validate_registration')->name('validate_register');
    Route::post('/validate_login', 'validate_login')->name('validate_login');
    Route::get('/page', 'logout')->name('logout');
});
Route::middleware('check.role')->group(function () {
    Route::get('/admin', function () {
        return view('admin.index');
    });

    // Quản lý Account
    Route::get('/admin/account', [\App\Http\Controllers\UserController::class, 'index'])->name('list_account');
    Route::match(['GET', 'POST'], '/admin/account-add', [\App\Http\Controllers\UserController::class, 'add'])->name('route_account_add');
    Route::match(['GET', 'POST'], '/admin/account-update/{id}', [\App\Http\Controllers\UserController::class, 'update'])->name('route_account_update');
    Route::get('/admin/admin-delete/{id}', [\App\Http\Controllers\UserController::class, 'delete'])->name('route_account_delete');

    // Quản lý Banner
    Route::get('/admin/admin-slider', [\App\Http\Controllers\SliderController::class, 'index'])->name('list_banner');
    Route::match(['GET', 'POST'], '/admin/slider-add', [\App\Http\Controllers\SliderController::class, 'add'])->name('route_slider_add');
    Route::match(['GET', 'POST'], '/admin/slider-update/{id}', [\App\Http\Controllers\SliderController::class, 'update'])->name('route_slider_update');
    Route::get('/admin/slider-delete/{id}', [\App\Http\Controllers\SliderController::class, 'delete'])->name('route_slider_delete');

    // Quản lý CateRoom

    Route::get('admin/admin-cate', [\App\Http\Controllers\CateRoomController::class, 'index'])->name('list_cate');
    Route::match(['GET', 'POST'], '/admin/cate-add', [\App\Http\Controllers\CateRoomController::class, 'add'])->name('route_cate_add');
    Route::match(['GET', 'POST'], '/admin/cate-update/{id}', [\App\Http\Controllers\CateRoomController::class, 'update'])->name('route_cate_update');
    Route::get('admin/cate-delete/{id}', [\App\Http\Controllers\CateRoomController::class, 'delete'])->name('route_cate_delete');

    // Quản lý Room
    Route::get('/admin/admin-room', [\App\Http\Controllers\RoomController::class, 'index'])->name('list_room');
    Route::match(['GET', 'POST'], '/admin/room-add', [\App\Http\Controllers\RoomController::class, 'add'])->name('route_room_add');
    Route::match(['GET', 'POST'], '/admin/room-update/{id}', [\App\Http\Controllers\RoomController::class, 'update'])->name('route_room_update');
    Route::get('/admin/room-delete/{id}', [\App\Http\Controllers\RoomController::class, 'delete'])->name('route_room_delete');
});
// Admin
//Route::get('/admin', function () {
//    return view('admin.index');
//});

// Page
Route::get('/', [\App\Http\Controllers\PageController::class, 'show']);
//Route::get('/', [\App\Http\Controllers\PageController::class, 'show_banner']);

