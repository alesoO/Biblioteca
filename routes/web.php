<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Models\Publisher;

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
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/table_author', function(){
    return view(('table_author'));
});

Route::get('/table_publisher', function(){
    return view(('table_publisher'));
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Auth::routes();

Route::get('/home', function () {
    return view('home');
});

Route::get('/register_author', function(){
    return view(('register_author'));
});

Route::get('/', [PublisherController::class, 'index']);
Route::post('/store', [PublisherController::class, 'store'])->name('store');
Route::get('/fetchAllPublisher', [PublisherController::class, 'fetchAllPublisher'])->name('fetchAllPublisher');
Route::delete('/delete', [PublisherController::class, 'delete'])->name('delete');
Route::get('/edit', [PublisherController::class, 'edit'])->name('edit');
Route::post('/update', [PublisherController::class, 'update'])->name('update');
/* ->name('home')->middleware('auth') */;

/* Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); */
