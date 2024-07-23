<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\Players\JapanesePlayersController;

/*
| Web Routes
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider and
| all of them will be assigned to the "web" middleware group.
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/countries", [CountriesController::class, "index"]);

Route::get("/japan/players", [JapanesePlayersController::class, "index"])->name('japan.index');
Route::get("/japan/players/create", [JapanesePlayersController::class, "create"])->name('japan.create');
Route::get("/japan/players/store", [JapanesePlayersController::class, "store"])->name('japan.store');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
