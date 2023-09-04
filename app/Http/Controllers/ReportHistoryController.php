<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Book;
use App\Models\Author;
use App\Models\History_Book_Student;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Route;

class ReportHistoryController extends Controller
{
    public function index()
    {
        $historys = History_Book_Student::paginate(15);
        
        $students = Student::all()->sortBy('name');

        $books = Book::distinct()->pluck('title')->sort();
    
        return view('history_report', compact('students', 'books', 'historys' ));
    }
    

    public function generateHistorysPDF(Request $request)
    {
        $DatesValues = ([]);
        $fieldValues = ([]);

        if ($request->input('student_id') !== 'all') {
            $fieldValues['student_id'] = $request->input('student_id');
        }
        if ($request->input('title') !== 'all') {
            $fieldValues['title'] = $request->input('title');
        }
        if ($request->input('school_year_id') !== 'all') {
            $fieldValues['school_year_id'] = $request->input('school_year_id');
        }
        if ($request->input('registration_id') !== 'all') {
            $fieldValues['registration_id'] = $request->input('registration_id');
        }
        if (!empty($request->input('created_at_min'))) {
            $DatesValues['created_at_min'] = $request->input('created_at_min');
        }
        if (!empty($request->input('created_at_max'))) {
            $DatesValues['created_at_max'] = $request->input('created_at_max');
        }

        $checkValues = ([
            'student_check' => $request->has('student_check'),
            'title_check' => $request->has('title_check'),
            'school_year_check' => $request->has('school_year_check'),
            'registration_check' => $request->has('registration_check'),
            'created_at_check' => $request->has('created_at_check'),
        ]);

        $query = History_Book_Student::query();

        if (!empty($DatesValues['created_at_min'])) {
            $query->whereDate('created_at', '>=', $DatesValues['created_at_min']);
        }
        if (!empty($DatesValues['created_at_max'])) {
            $query->whereDate('created_at', '<=', $DatesValues['created_at_max']);
        }
        foreach ($fieldValues as $field => $value) {
            if (!empty($value)) {
                $query->where($field, $value);
            }
        }

        if (
            array_key_exists('title', $fieldValues) || array_key_exists('student_id', $fieldValues) || array_key_exists('author_id', $fieldValues)
            || !empty($maxPage) ||  array_key_exists('created_at_min', $DatesValues) ||  array_key_exists('created_at_max', $DatesValues)

        ) {
            $filteredData = $query->get();
        } else {
            $filteredData = History_Book_Student::all();
        }

        $pdf = PDF::loadView('pdf.history_report', compact('filteredData', 'checkValues'));

        return $pdf->stream('HistorysPDF.pdf'); 
    }


    public function generateHistoryTable(Request $request)
    {
        $studentId = $request->input('student_id');
        $title = $request->input('title');
        $schoolYearId = $request->input('school_year_id'); 
        $registrationId = $request->input('registration_id'); 

        $DatesValues = ([
            'created_at_min' => $request->input('created_at_min'),
            'created_at_max' => $request->input('created_at_max'),
        ]);

        $query = History_Book_Student::query();

        if ($studentId !== 'all') {
            $query->where('student_id', $studentId);
        }

        if ($title !== 'all') {
            $query->where('title', $title);
        }

        if ($schoolYearId !== 'all') {
            $query->where('school_year_id', $schoolYearId);
        }

        if ($registrationId !== 'all') {
            $query->where('registration_id', $registrationId);
        }

        if (!empty($DatesValues['created_at_min'])) {
            $query->whereDate('created_at', '>=', $DatesValues['created_at_min']);
        }
        if (!empty($DatesValues['created_at_max'])) {
            $query->whereDate('created_at', '<=', $DatesValues['created_at_max']);
        }

        Paginator::currentPathResolver(function () {
            return url('/history_report');
        });
        try {
            $results = $query->paginate(20);
        } catch (\Exception $e) {
            $errormsg = $e->getMessage();
        }

        $formattedResults = [];
        foreach ($results as $result) {
            $formattedResults[] = [
                'student' => $result->student->name,
                'title' => $result->book->title,
                'school_year' => $result->student->school_year,
                'registration_id' => $result->student->registration,
                'created_at' => $result->created_at->format('d/m/Y H:i:s'),
            ];
        }
        $pagination = $results->links()->render();

        return response()->json([
            'data' => $formattedResults,
            'pagination' => $pagination,
        ]);
    }
}