<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::paginate(15);

        return view('/table_student', ['students' => $students]);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'school_year' => ['required'],
            'registration' => ['required']
        ]);

        if ($validator->fails()) {
            return redirect('/')->with('error', 'Dados do post invalidos!');
        } 
        $fieldValues = ([
            'name' => $request->input('name'),
            'school_year' => $request->input('school_year'),
            'registration' => $request->input('registration')
        ]);

        $fieldValues['name'] = strip_tags($fieldValues['name']);
        $fieldValues['school_year'] = strip_tags($fieldValues['school_year']);
        $fieldValues['registration'] = strip_tags($fieldValues['registration']);

        try {
            Student::create($fieldValues);
        } catch (\Exception $e) {
            $errormsg = $e->getMessage();
            return redirect('/')->with('error', $errormsg);
        }
        return redirect('/table_student')->with('sucess');
    }

    public function update(Request $request, Student $student)
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'school_year' => ['required'],
            'registration' => ['required']
        ]);

        if ($validator->fails()) {
            return redirect('/')->with('error', 'Dados do post invalidos!');
        }
        $fieldValues = ([
            'name' => $request->input('name'),
            'school_year' => $request->input('school_year'),
            'registration' => $request->input('registration')
        ]);

        $fieldValues['name'] = strip_tags($fieldValues['name']);
        $fieldValues['school_year'] = strip_tags($fieldValues['school_year']);
        $fieldValues['registration'] = strip_tags($fieldValues['registration']);

        try {
            $student->update($fieldValues);
        } catch (\Exception $e) {
            $errormsg = $e->getMessage();
            return redirect('/')->with('error', $errormsg);
        }
        return redirect('/table_student');
    }

    public function destroy(Student $student)
    {
        try {
            $student->delete();
        } catch (\Exception $e) {
            $errormsg = $e->getMessage();
            return redirect('/')->with('error', $errormsg);
        }
        return redirect('/table_student')->with('info', 'Autor deletado com sucesso !');
    }
}
