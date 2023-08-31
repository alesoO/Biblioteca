<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Book;
use App\Models\History_Book_Student;
use Illuminate\Support\Facades\Validator;
use App\Models\Book_Student;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class HistoryBookStudentController extends Controller
{
    public function index()
    {
        $students = Student::all()->sortBy('name');
        $books    = Book::all()->sortBy('name');
        $history_book_students = History_Book_Student::with('student', 'book')->get();
        return view('table_history_book_student', compact('students', 'books', 'history_book_students'));
    }

    public function create(Request $request, Book_Student $book_student)
    {
        $validator = Validator::make($request->all(), [
            'student_id'    => ['required'],
            'book_id'       => ['required'],
            'loan_date'     => ['required'],
            'delivery_date' => ['required'],
            'return_date'   => ['required']
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }


        $loan_date     = date('d-m-Y', strtotime($request->input('loan_date')));
        $delivery_date = date('d-m-Y', strtotime($request->input('delivery_date')));
        $return_date =   date('d-m-Y', strtotime($request->input('return_date')));

        $fieldValues = [
            'student_id'    => $request->input('student_id'),
            'book_id'       => $request->input('book_id'),
            'loan_date'     => $loan_date,
            'delivery_date' => $delivery_date,
            'return_date'   => $return_date
        ];

        try {
            DB::beginTransaction();
            History_Book_Student::create($fieldValues);
            $BookStudentController = new BookStudentController();
            $BookStudentController->destroy($book_student);
            DB::commit();

            return redirect()->route('table_history_book_student')
                ->with('success', 'Registro criado com sucesso e destruído pelo método destroy.');
        } catch (\Exception $e) {
            $errormsg = $e->getMessage();
            echo $errormsg;
        }
    }
}
