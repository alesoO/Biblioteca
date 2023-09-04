<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate(15);
        $books_select = Book::all()->sortBy('title');

        $authors = Author::all()->sortBy('name');

        $publishers = Publisher::all()->sortBy('name');
        return view('table_book', compact('books', 'authors', 'publishers', 'books_select'));
    }

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
