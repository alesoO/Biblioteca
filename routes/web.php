<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookStudentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Models\Student;
use App\Models\Author;
use App\Models\Book;
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

Route::get('/table_author', [AuthorController::class, 'index']);

Route::post('/register_author', [AuthorController::class, 'create']);

Route::post('/edit_author/{author}', [AuthorController::class, 'update'])->name('edit_author');

Route::delete('/delete_author/{author}', [AuthorController::class, 'destroy'])->name('delete_author');



Route::get('/table_student', [StudentController::class, 'index']);

Route::post('/register_student', [StudentController::class, 'create']);

Route::post('/edit_student/{student}', [StudentController::class, 'update'])->name('edit_student');

Route::delete('/delete_student/{student}', [StudentController::class, 'destroy'])->name('delete_student');



Route::get('/table_book', [BookController::class, 'index']);

Route::post('/register_book', [BookController::class, 'create']);

Route::post('/edit_book/{book}', [BookController::class, 'update'])->name('edit_book');

Route::delete('/delete_book/{book}', [BookController::class, 'destroy'])->name('delete_book');


Route::get('/table_book_student', [BookStudentController::class, 'index']);



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Auth::routes();

Route::post('/edit_publisher/{publisher}', [PublisherController::class, 'update'])->name('edit_publisher');

Route::delete('/delete_publisher/{publisher}', [PublisherController::class, 'delete_publisher'])->name('delete_publisher');

Route::get('/table_publisher', [PublisherController::class, 'index']);

Route::post('/register_publisher', [PublisherController::class, 'create']);

Route::get('/home', function () {
    return view('home');
});

Route::get('/profile_user', function () {
    return view('profile_user');
});
Route::post('/update', [UserController::class, 'update'])->name('update');
Route::delete('/destroy', [UserController::class, 'destroy'])->name('destroy');
Route::post('/edit', [UserController::class, 'edit'])->name('edit');




/* ->name('home')->middleware('auth') */

/* Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); */
