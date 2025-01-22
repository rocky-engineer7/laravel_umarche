<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComponentTestController;
use App\Http\Controllers\LifeCycleTestController;

Route::get('/', function () {
    return view('user.welcome');
});

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth:users'])->name('user.dashboard');

Route::get('/component-test1', [ComponentTestController::class, 'showComponent1']);
Route::get('/component-test2', [ComponentTestController::class, 'showComponent2']);
Route::get('/servicecontainertest', [LifeCycleTestController::class, 'showServiceContainerTest']);
Route::get('/serviceprovidertest', [LifeCycleTestController::class, 'showServiceProviderTest']);

// ユーザー用のルーティング
Route::prefix('users')
->as('user.')
->group(__DIR__.'/auth.php');

// オーナー用のルーティング
Route::prefix('owner')
->as('owner.')
->group(__DIR__.'/owner.php');

// 管理者用のルーティング
Route::prefix('admin')
->as('admin.')
->group(__DIR__.'/admin.php');

require __DIR__.'/auth.php';
