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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'showItem'])->name('home');
Route::get('/home/create', [App\Http\Controllers\HomeController::class, 'showCreateItem'])->name('item.form');
Route::post('/home', [App\Http\Controllers\HomeController::class, 'createItem'])->name('home');
Route::get('/home/{id_item}/edit', [App\Http\Controllers\HomeController::class, 'editItem'])->name('item.form');
Route::patch('/home/{id_item}', [App\Http\Controllers\HomeController::class, 'updateItem'])->name('home');
Route::delete('/home/{id_item}', [App\Http\Controllers\HomeController::class, 'deleteItem'])->name('home');

Route::get('/location', [App\Http\Controllers\LocationController::class, 'showLocation'])->name('location');
Route::get('/location/create', [App\Http\Controllers\LocationController::class, 'showCreateLocation'])->name('location.form');
Route::post('/location', [App\Http\Controllers\LocationController::class, 'createLocation'])->name('location');
Route::get('/location/{id_location}/edit', [App\Http\Controllers\LocationController::class, 'editLocation'])->name('location.form');
Route::patch('/location/{id_location}', [App\Http\Controllers\LocationController::class, 'updateLocation'])->name('location');
Route::delete('/location/{id_location}', [App\Http\Controllers\LocationController::class, 'deleteLocation'])->name('location');

Route::get('/box', [App\Http\Controllers\BoxController::class, 'showBox'])->name('box');
Route::get('/box/create', [App\Http\Controllers\BoxController::class, 'showCreateBox'])->name('box.form');
Route::post('/box', [App\Http\Controllers\BoxController::class, 'createBox'])->name('box');
Route::get('/box/{id_box}/edit', [App\Http\Controllers\BoxController::class, 'editBox'])->name('box.form');
Route::patch('/box/{id_box}', [App\Http\Controllers\BoxController::class, 'updateBox'])->name('box');
Route::delete('/box/{id_box}', [App\Http\Controllers\BoxController::class, 'deleteBox'])->name('box');

Route::get('/shelf', [App\Http\Controllers\ShelfController::class, 'showShelf'])->name('shelf');
Route::get('/shelf/create', [App\Http\Controllers\ShelfController::class, 'showCreateShelf'])->name('shelf.form');
Route::post('/shelf', [App\Http\Controllers\ShelfController::class, 'createShelf'])->name('shelf');
Route::get('/shelf/{id_shelf}/edit', [App\Http\Controllers\ShelfController::class, 'editShelf'])->name('shelf.form');
Route::patch('/shelf/{id_shelf}', [App\Http\Controllers\ShelfController::class, 'updateShelf'])->name('shelf');
Route::delete('/shelf/{id_shelf}', [App\Http\Controllers\ShelfController::class, 'deleteShelf'])->name('shelf');

Route::get('/project', [App\Http\Controllers\ProjectController::class, 'showProject'])->name('project');
Route::get('/project/create', [App\Http\Controllers\ProjectController::class, 'showCreateProject'])->name('project.form');
Route::post('/project', [App\Http\Controllers\ProjectController::class, 'createProject'])->name('project');
Route::get('/project/{id_project}/edit', [App\Http\Controllers\ProjectController::class, 'editProject'])->name('project.form');
Route::patch('/project/{id_project}', [App\Http\Controllers\ProjectController::class, 'updateProject'])->name('project');
Route::delete('/project/{id_project}', [App\Http\Controllers\ProjectController::class, 'deleteProject'])->name('project');
