<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ConsumptionController;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//   return view('welcome');
// });

Route::get('/404', function () {
    return view('404');
})->name('404');

Route::get('/', [HomeController::class, 'index']);
Route::get('/phpinfo', [HomeController::class, 'phpinfo'])->name('about-php');
Route::get('/statistics', [HomeController::class, 'statistics'])->middleware(['roles:U|A'])->name('statistics');

Route::prefix('consumptions')->name('consumptions-')->group(function () {
    Route::get('/', [ConsumptionController::class, 'index'])->middleware(['roles:U|A'])->name('index');
    Route::get('/create', [ConsumptionController::class, 'create'])->middleware(['roles:U|A'])->name('create');
    Route::post('/', [ConsumptionController::class, 'store'])->middleware(['roles:U|A'])->name('store');
});

// Auth::routes();
Auth::routes(['verify' => true]);
