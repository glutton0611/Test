<?php

use App\Http\Controllers\StockController;
use App\Http\Middleware\CheckRoleMiddleware;
use Illuminate\Support\Facades\Route;


// Redirects to the Stock Resource Controller
Route::get('/', function () {
    return redirect('/home');
});


Auth::routes();

Route::group(['middleware' => ['auth', CheckRoleMiddleware::class]], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin/all', [App\Http\Controllers\Admin\AllStuffController::class, 'index']);
    Route::post('/admin/all/create', [App\Http\Controllers\Admin\AllStuffController::class, 'create']);
    
    Route::get('/admin/edit/{id}', [App\Http\Controllers\Admin\EditStuffController::class, 'index']);
    Route::get('/admin/edit/get_policies/{id}', [App\Http\Controllers\Admin\EditStuffController::class, 'get_policies']);
    Route::delete('/admin/edit/remove_user/{id}', [App\Http\Controllers\Admin\EditStuffController::class, 'remove_user']);
    Route::delete('/admin/edit/remove_policy/{id}', [App\Http\Controllers\Admin\EditStuffController::class, 'remove_policy']);
    Route::put('admin/edit/add_policy/{id}', [App\Http\Controllers\Admin\EditStuffController::class, 'add_policy']);
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);
    Route::get('/dashboard/show/{id}', [App\Http\Controllers\DashboardController::class, 'show']);
});