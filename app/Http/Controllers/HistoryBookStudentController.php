<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Book;
use App\Models\History_Book_Student;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;

class HistoryBookStudentController extends Controller
{
    public function index()
    {
    $students = Student::all()->sortBy('name');
    $books = Book::all()->sortBy('name');

    return view('table_history_book_student', compact('students', 'books', ));
    }
}