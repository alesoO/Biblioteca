<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Book;
use App\Models\Book_Student;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;

class BookStudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        $books = Book::all();
        $book_students = Book_Student::with('student', 'book')->paginate(15);
        return view('table_book_student', compact('students', 'books', 'book_students'));
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'student_id'    => ['required'],
            'book_id'       => ['required'],
            'loan_date'     => ['required|date']
        ]);

        if ($validator->fails()) {
            return redirect('/')->with('error', 'Dados do post inválidos!');
        }

        $fieldValues = [
            'student_id'    => $request->input('student_id'),
            'book_id'       => $request->input('book_id'),
            'loan_date'     => Carbon::createFromFormat('Y-m-d', $request->input('date_loan'))
        ];

        try {
            Book_Student::create($fieldValues);
        } catch (\Exception $e) {
            $errormsg = $e->getMessage();
        }
        return redirect('table_book_student')->with('sucess');
    }
}
