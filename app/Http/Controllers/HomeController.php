<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Publisher;
use App\Models\Student;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $authorsCount = Author::count();
        $publishersCount = Publisher::count();
        $studentsCount = Student::count();
        $booksCount = Book::count();

        // Passe os contadores para a view
        return View::make('home', compact('authorsCount', 'publishersCount', 'studentsCount', 'booksCount'));
    }
}
