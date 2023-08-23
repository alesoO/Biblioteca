<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;

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
/* Rotas de paginas */

Route::view('/', 'home');
Route::view('/home', 'home');
Route::view('/profile_user', 'profile_user');

/* Rotas dos Autores */
Route::get('table_author', [AuthorController::class, 'index']);
Route::post('register_author', [AuthorController::class, 'create']);
Route::post('update_author/{author}', [AuthorController::class, 'update'])->name('author.update');
Route::delete('delete_author/{author}', [AuthorController::class, 'destroy'])->name('author.destroy');

/* Rotas dos estudantes */
Route::get('/table_student', [StudentController::class, 'index']);
Route::post('/register_student', [StudentController::class, 'create']);
Route::post('/update_student/{student}', [StudentController::class, 'update'])->name('student.update');
Route::delete('/delete_student/{student}', [StudentController::class, 'destroy'])->name('student.destroy');

/* Rotas dos Livros */
Route::get('/table_book', [BookController::class, 'index']);
Route::post('/register_book', [BookController::class, 'create']);
Route::post('/update_book/{book}', [BookController::class, 'update'])->name('book.update');
Route::delete('/delete_book/{book}', [BookController::class, 'destroy'])->name('book.destroy');

/* Rotas das editoras */
Route::get('/table_publisher', [PublisherController::class, 'index']);
Route::post('/register_publisher', [PublisherController::class, 'create'])->name('publisher.create');
Route::post('/update_publisher/{publisher}', [PublisherController::class, 'update'])->name('publisher.update');
Route::delete('/delete_publisher/{publisher}', [PublisherController::class, 'destroy'])->name('publisher.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/* Rotas de Relatorios */
Route::get('/generate_report_book', [ReportController::class, 'generateReportBooks'])->name('report.book');

require __DIR__ . '/auth.php';

Auth::routes();

/* Rotas dos Usuarios */
Route::post('/update', [UserController::class, 'update'])->name('update');

Route::delete('/destroy', [UserController::class, 'destroy'])->name('destroy');

Route::post('/edit', [UserController::class, 'edit'])->name('edit');
