<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\PlayersController;
use App\Http\Controllers\JapanesePlayersController;
use App\Http\Controllers\ClubTeamsController;
use App\Http\Controllers\PostController;

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

// 国
Route::get('/', [CountriesController::class, 'index'])->name('country.index');
Route::get('/countries', [CountriesController::class, 'index'])->name('country.index');
Route::get('/countries/{country_id}/players', [CountriesController::class, 'show'])->name('country.show');
// 国名を検索
Route::post("/countries", [CountriesController::class, "search"])->name('country.search');
// 選手一覧内を検索
Route::post("/countries/{country_id}/players", [CountriesController::class, "searchPlayers"])->name('country.players.search');
Route::get("/countries/{country_id}/players/create", [PlayersController::class, "create"])->name('players.create');

// クラブチーム
Route::get('/clubteams', [ClubTeamsController::class, 'index'])->name('clubteam.index');
Route::post("/clubteams", [ClubTeamsController::class, "search"])->name('clubteam.search');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Pusher
Route::get("/posts", [PostController::class, 'index'])->name('post.index');
Route::post("/posts/store", [PostController::class, 'store'])->name('post.store');
Route::post("/posts/destroy/{id}", [PostController::class, 'destroy'])->name('post.destroy');

require __DIR__ . '/auth.php';
