<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Book_Student;
use App\Models\Student;
use Illuminate\Http\Request;

class BookStudentController extends Controller
{
    public function index (){
        
        $bookStudents = Book_Student::paginate(15);
        $students = Student::all();
        $books = Book::all();
        return view('table_book_student', compact('bookStudents', 'students', 'books'));
    }
}
