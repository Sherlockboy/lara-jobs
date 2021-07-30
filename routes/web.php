<?php

use App\Http\Controllers\ListingController;
use Illuminate\Http\Request;
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

Route::name('listings.')->group(function () {
    Route::get('/', [ListingController::class, 'index'])->name('index');
    Route::get('/view/{listing}', [ListingController::class, 'show'])->name('show');
    Route::get('/apply/{listing}', [ListingController::class, 'apply'])->name('apply');
    Route::get('/new', [ListingController::class, 'create'])->name('create');
    Route::post('/new', [ListingController::class, 'store'])->name('store');
});

Route::get('/dashboard', function (Request $request) {
    return view('dashboard', [
        'listings' => $request->user()->listings
    ]);
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
