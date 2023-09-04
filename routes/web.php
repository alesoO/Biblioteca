<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\BookStudentController;
use App\Http\Controllers\HistoryBookStudentController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);

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

/* Rotas de Relatorios */
Route::get('/book_Report', [ReportController::class, 'index']);
Route::post('/generate_Book_PDF', [ReportController::class, 'generateBooksPDF']);
Route::get('/generate_Book_Table', [ReportController::class, 'generateBookTable']);

Route::post('/get_Author_Options_By_Book', [ReportController::class, 'getAuthorOptionsByBook']);
Route::post('/get_Publisher_Options_By_Book', [ReportController::class, 'getPublisherOptionsByBook']);

Route::post('/get_Publisher_Options_By_Author_And_Title', [ReportController::class, 'getPublisherOptionsByAuthorAndTitle']);
Route::post('/get_Book_Options_By_Author', [ReportController::class, 'getBookOptionsByAuthor']);

Route::post('/get_Author_Options_By_Publisher_And_Title', [ReportController::class, 'getAuthorOptionsByPublisherAndTitle']);
Route::post('/get_Book_Options_By_Publisher', [ReportController::class, 'getBookOptionsByPublisher']);


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

require __DIR__ . '/auth.php';

Auth::routes();

/* Rotas dos Usuarios */
Route::post('/update', [UserController::class, 'update'])->name('update');

Route::delete('/destroy', [UserController::class, 'destroy'])->name('destroy');

Route::post('/edit', [UserController::class, 'edit'])->name('edit');


Route::post('/register_book', [BookRegistrationController::class])->name('register_book');

Route::get('/table_book_student', [BookStudentController::class, 'index']);
Route::post('/register_book_student', [BookStudentController::class, 'create']);
Route::delete('/delete_book_student/{book_student}', [BookStudentController::class, 'destroy'])->name('delete_book_student');

Route::post('/edit_book_student/{book_student}', [BookStudentController::class, 'update'])->name('edit_book_student');


Route::get('/table_history_book_student', [HistoryBookStudentController::class, 'index'])->name('table_history_book_student');
Route::post('/register_history_book_student/{book_student}', [HistoryBookStudentController::class, 'create'])->name('register_history_book_student');



/* ->name('home')->middleware('auth') */

/* Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); */
