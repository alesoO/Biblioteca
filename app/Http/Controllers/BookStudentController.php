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
        $students = Student::all()->sortBy('name');
        $books = Book::all()->sortBy('name');
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

    public function update(Request $request, Book_Student $book_student)
    {
        $validator = Validator::make($request->all(), [
            'student_id'    => ['required'],
            'book_id'       => ['required'],
            'loan_date'     => ['required|date']
        ]);


        if ($validator->fails()) {
            return redirect('/')->with('error', 'Dados do post invalidos!');
        }

        $fieldValues = [
            'student_id'    => $request->input('student_id'),
            'book_id'       => $request->input('book_id'),
            'loan_date'     => Carbon::createFromFormat('Y-m-d', $request->input('date_loan'))
        ];


        try {
            $book_student->update($fieldValues);
        } catch (\Exception $e) {
            $errormsg = $e->getMessage();
            return redirect('/')->with('error', $errormsg);
        }
        return redirect('/table_book_student');
    }

    public function destroy(Book_Student $book_student)
    {
        try {
            $book_student->delete();
        } catch (\Exception $e) {
            $errormsg = $e->getMessage();
            return redirect('/')->with('error', $errormsg);
        }
        return redirect('/table_book_student')->with('info', 'Autor deletado com sucesso !');
    }
}
