<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::paginate(15);
        
        $authors = Author::all();
        $publishers = Publisher::all();
        return view('table_book', compact('books', 'authors', 'publishers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required'],
            'page' => ['required'],
            'author_id' => ['required'],
            'publisher_id' => ['required']
        ]);

        if ($validator->fails()) {
            return redirect('/')->with('error', 'Dados do post invalidos!');
        }

        $fieldValues = ([
            'title' => $request->input('title'),
            'page' => $request->input('page'),
            'author_id' => $request->input('author_id'),
            'publisher_id' => $request->input('publisher_id')
        ]);


        $fieldValues['title'] = strip_tags($fieldValues['title']);
        $fieldValues['page'] = strip_tags($fieldValues['page']);

        try {
            Book::create($fieldValues);
        } catch (\Exception $e) {
            $errormsg = $e->getMessage();
            return redirect('/')->with('error', $errormsg);
        }
        return redirect('/table_book')->with('sucess');
    }

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
    public function update(Request $request, Book $book)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required'],
            'page' => ['required'],
            'author_id' => ['required'],
            'publisher_id' => ['required']
        ]);

        if ($validator->fails()) {
            return redirect('/')->with('error', 'Dados do post invalidos!');
        }

        $fieldValues = ([
            'title' => $request->input('title'),
            'page' => $request->input('page'),
            'author_id' => $request->input('author_id'),
            'publisher_id' => $request->input('publisher_id')
        ]);


        $fieldValues['title'] = strip_tags($fieldValues['title']);
        $fieldValues['page'] = strip_tags($fieldValues['page']);

        try {
            $book->update($fieldValues);
        } catch (\Exception $e) {
            $errormsg = $e->getMessage();
            return redirect('/')->with('error', $errormsg);
        }
        return redirect('/table_book');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        try {
            $book->delete();
        } catch (\Exception $e) {
            $errormsg = $e->getMessage();
            return redirect('/')->with('error', $errormsg);
        }
        return redirect('/table_book')->with('info', 'Autor deletado com sucesso !');
    }
}
