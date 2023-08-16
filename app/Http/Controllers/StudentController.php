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

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'school_year' => ['required'],
            'registration' => ['required']
        ]);

        if ($validator->fails()) {
            return redirect('/')->with('error', 'Dados do post invalidos!');
        } else {
            $fieldValues = $request->validate([
                'name' => ['required'],
                'school_year' => ['required'],
                'registration' => ['required']
            ]);
        }

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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
