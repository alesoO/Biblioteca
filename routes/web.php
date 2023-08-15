<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\AuthorController;
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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Auth::routes();

Route::post('/edit_publisher/{publisher}', [PublisherController::class, 'update'])->name('edit_publisher');
Route::delete('/delete_publisher/{publisher}', [PublisherController::class, 'destroy'])->name('delete_publisher');
Route::get('/table_publisher', [PublisherController::class, 'index']);
Route::post('/register_publisher', [PublisherController::class, 'create']);

Route::get('/register_publisher',function(){
    return view(('register_publisher'));
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/register_author', function(){
    return view(('register_author'));
});






