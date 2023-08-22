<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{

    public function index()
    {
        $authors = Author::paginate(15);
        return view('/table_author', ['authors' => $authors]);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), ['name' => ['required'],]);

        if ($validator->fails()) {
            return redirect('/')->with('error', 'Dados do post invalidos!');
        }
        $fieldValues = ([
            'name' => $request->input('name')
        ]);

        $fieldValues['name'] = strip_tags($fieldValues['name']);

        try {
            Author::create($fieldValues);
        } catch (\Exception $e) {
            $errormsg = $e->getMessage();
            return redirect('/')->with('error', $errormsg);
        }
        return redirect('/table_author')->with('sucess');
    }

    public function update(Author $author, Request $request)
    {
        $validator = Validator::make($request->all(), ['name' => ['required'],]);

        if ($validator->fails()) {
            return redirect('/')->with('error', 'Dados do post invalidos!');
        }
        $fieldValues = ([
            'name' => $request->input('name')
        ]);

        $fieldValues['name'] = strip_tags($fieldValues['name']);

        try {
            $author->update($fieldValues);
        } catch (\Exception $e) {
            $errormsg = $e->getMessage();
            return redirect('/')->with('error', $errormsg);
        }
        return redirect('/table_author');
    }
    
    public function destroy(Author $author)
    {
        try {
            $author->delete();
        } catch (\Exception $e) {
            $errormsg = $e->getMessage();
            return redirect('/')->with('error', $errormsg);
        }
        return redirect('/table_author')->with('info', 'Autor deletado com sucesso !');
    }
}
