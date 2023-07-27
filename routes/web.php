<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\LifebuoyController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\HistoryController;


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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('visitors', VisitorController::class);
    Route::resource('lifebuoys', LifebuoyController::class);
    Route::resource('rents', RentController::class);
    Route::put('/rents/{rent}/return', [RentController::class, 'return_rent'])->name('rents.return');
    Route::post('/getLifebuoyFromRide', [RentController::class, 'getLifebuoyFromRide']);
    Route::get('/histories', [HistoryController::class, 'index'])->name('histories');
});




Route::resource('rents', RentController::class);
Route::put('/rents/{rent}/return', [RentController::class, 'return_rent'])->name('rents.return');
