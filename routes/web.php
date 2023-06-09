<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');


Route::get('/user-profile', [App\Http\Controllers\UserController::class, 'profile'])->name('user-profile');
Route::resource('/user', App\Http\Controllers\UserController::class);

Route::post('projects/{id}/restore', [App\Http\Controllers\ProjectController::class, 'restore'])->name('projects.restore');
Route::post('projects/{id}/forceDelete', [App\Http\Controllers\ProjectController::class, 'forceDelete'])->name('projects.force.delete');
Route::get('/projects', [App\Http\Controllers\ProjectController::class, 'projects'])->name('projects');
Route::resource('/project', ProjectController::class);


Route::resource('/client', ClientController::class);

Route::resource('/task', TaskController::class);