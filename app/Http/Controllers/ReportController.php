<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Book;
use App\Models\Author;
use App\Models\Publisher;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function generateBooksPDF(Request $request)
    {

        $fieldValues = ([
            'page' => $request->input('page'),
            /*'created_at_min' => $request->input('created_at_min'),
            'created_at_max' => $request->input('created_at_max'),
            'updated_at_min' => $request->input('updated_at_min'),
            'updated_at_max' => $request->input('updated_at_max') */
        ]);

        if ($request->input('title') !== 'all') {
            $fieldValues['title'] = $request->input('title');
        }
        if ($request->input('author_id') !== 'all') {
            $fieldValues['author_id'] = $request->input('author_id');
        }
        if ($request->input('publisher_id') !== 'all') {
            $fieldValues['publisher_id'] = $request->input('publisher_id');
        }

        $checkValues = ([
            'title_check' => $request->has('title_check'),
            'author_check' => $request->has('author_check'),
            'publisher_check' => $request->has('publisher_check'),
            'page_check' => $request->has('page_check'),
            'created_at_check' => $request->has('created_at_check'),
            'updated_at_check' => $request->has('updated_at_check'),
        ]);

        $query = Book::query();

        foreach ($fieldValues as $field => $value) {
            if (!empty($value)) {
                $query->where($field, $value);
            }
        }

        if (array_key_exists('title', $fieldValues) || array_key_exists('author_id', $fieldValues) || array_key_exists('publisher_id', $fieldValues)) {
            $filteredData = $query->get();
        } else {
            $filteredData = Book::all();
        }

        $pdf = PDF::loadView('pdf.books_report', compact('filteredData', 'checkValues'));

        return $pdf->stream('BooksPDF.pdf');
    }

    public function getUpdatedOptionsBooks(Request $request)
    {
        $bookTitle = $request->input('bookTitle');
        if ($bookTitle === 'all') {
            $authors = Author::all()->sortBy('name');
            $publishers = Publisher::all()->sortBy('name');

            $authors->prepend(['id' => 'all', 'name' => 'Todos...']);
            $publishers->prepend(['id' => 'all', 'name' => 'Todas...']);
        } else {
            $book = Book::where('title', $bookTitle)->first();
            $authors = Author::where('id', $book->author_id)->get();
            $publishers = Publisher::where('id', $book->publisher_id)->get();
        }
        return response()->json([
            'authorOptions' => $authors,
            'publisherOptions' => $publishers,
        ]);
    }
    public function getUpdatedOptionsAuthors(Request $request)
    {
    }
}
