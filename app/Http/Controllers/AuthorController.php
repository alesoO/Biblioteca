<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), ['name' => ['required'],]);

        if ($validator->fails()) {
            return redirect('/')->with('error', 'Dados do post invalidos!');
        } else {
            $fieldValues = $request->validate([
                'name' => ['required'],
            ]);
        }

        $fieldValues['name'] = strip_tags($fieldValues['name']);

        try {
            Author::create($fieldValues);
        } catch (\Exception $e) {
            $errormsg = $e->getMessage();
            return redirect('/')->with('error', $errormsg);
        }
        return redirect('/table_author')->with('sucess');
    }
    public function edit(Request $request)
    {
    }
    public function update(Request $request)
    {
    }
    public function destroy(Request $request)
    {
    }
}
