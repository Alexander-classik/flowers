<?php

use App\Http\Controllers\FlowerController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\SalesmanController;
use App\Http\Controllers\SalesmanHasProvidersController;
use App\Http\Controllers\ProviderHasFlowersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [FlowerController::class, 'index'])->name('/');
Route::get('/add-flower', [FlowerController::class, 'add']);
Route::get('/flower/show/{id}', [FlowerController::class, 'show']);
Route::get('/flower/search', [FlowerController::class, 'search'])->name('search_f');
Route::get('/flower/search_date', [FlowerController::class, 'search_date'])->name('search_date');

Route::post('main', [FlowerController::class, 'store']);

Route::get('/provider', [ProviderController::class, 'index']);
Route::get('/add-provider', [ProviderController::class, 'add']);
Route::get('/provider/search', [ProviderController::class, 'search'])->name('search_p');
Route::get('/provider/show/{id}', [ProviderController::class, 'show']);

Route::post('/provider', [ProviderController::class, 'store']);

Route::get('/salesman', [SalesmanController::class, 'index']);
Route::get('/add-salesman', [SalesmanController::class, 'add']);
Route::get('/salesman/search', [SalesmanController::class, 'search'])->name('search');
Route::get('/salesman/show/{id}', [SalesmanController::class, 'show']);

Route::post('/salesman', [SalesmanController::class, 'store']);

Route::get('/pf', [ProviderHasFlowersController::class, 'index']);
Route::get('/add-pf', [ProviderHasFlowersController::class, 'add']);
Route::get('/pf/show/{id}/del', [ProviderHasFlowersController::class, 'del']);

Route::post('/pf', [ProviderHasFlowersController::class, 'store']);

Route::get('/sp', [SalesmanHasProvidersController::class, 'index']);
Route::get('/add-sp', [SalesmanHasProvidersController::class, 'add']);

Route::post('/sp', [SalesmanHasProvidersController::class, 'store']);
