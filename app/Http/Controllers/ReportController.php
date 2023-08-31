<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Book;
use App\Models\Author;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class ReportController extends Controller
{
    public function index()
    {
        $books = Book::paginate(15);
        $books_select = Book::all()->sortBy('title');

        $authors = Author::all()->sortBy('name');

        $publishers = Publisher::all()->sortBy('name');
        return view('book_report', compact('books', 'authors', 'publishers', 'books_select'));
    }

    public function generateBooksPDF(Request $request)
    {
        $DatesValues = ([]);
        $fieldValues = ([]);

        if ($request->input('title') !== 'all') {
            $fieldValues['title'] = $request->input('title');
        }
        if ($request->input('author_id') !== 'all') {
            $fieldValues['author_id'] = $request->input('author_id');
        }
        if ($request->input('publisher_id') !== 'all') {
            $fieldValues['publisher_id'] = $request->input('publisher_id');
        }
        if (!empty($request->input('pages'))) {
            $maxPage = $request->input('pages');
        }
        if (!empty($request->input('created_at_min'))) {
            $DatesValues['created_at_min'] = $request->input('created_at_min');
        }
        if (!empty($request->input('created_at_max'))) {
            $DatesValues['created_at_max'] = $request->input('created_at_max');
        }
        if (!empty($request->input('updated_at_min'))) {
            $DatesValues['updated_at_min'] = $request->input('updated_at_min');
        }
        if (!empty($request->input('updated_at_max'))) {
            $DatesValues['updated_at_max'] = $request->input('updated_at_max');
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

        if (!empty($maxPage)) {
            $query->where('page', '<=', $maxPage); // Filtra por número de páginas
        }
        if (!empty($DatesValues['created_at_min'])) {
            $query->whereDate('created_at', '>=', $DatesValues['created_at_min']);
        }
        if (!empty($DatesValues['created_at_max'])) {
            $query->whereDate('created_at', '<=', $DatesValues['created_at_max']);
        }
        if (!empty($DatesValues['updated_at_min'])) {
            $query->whereDate('updated_at', '>=', $DatesValues['updated_at_min']);
        }
        if (!empty($DatesValues['updated_at_max'])) {
            $query->whereDate('updated_at', '<=', $DatesValues['updated_at_max']);
        }

        foreach ($fieldValues as $field => $value) {
            if (!empty($value)) {
                $query->where($field, $value);
            }
        }

        if (
            array_key_exists('title', $fieldValues) || array_key_exists('author_id', $fieldValues) || array_key_exists('publisher_id', $fieldValues)
            || !empty($maxPage) ||  array_key_exists('created_at_min', $DatesValues) ||  array_key_exists('created_at_max', $DatesValues)
            || array_key_exists('updated_at_min', $DatesValues) ||  array_key_exists('updated_at_max', $DatesValues)
        ) {
            $filteredData = $query->get();
        } else {
            $filteredData = Book::all();
        }

        $pdf = PDF::loadView('pdf.books_report', compact('filteredData', 'checkValues'));

        return $pdf->stream('BooksPDF.pdf');
    }

    public function generateBookTable(Request $request)
    {
        $title = $request->input('title');
        $authorId = $request->input('author_id');
        $publisherId = $request->input('publisher_id');
        $maxPage = $request->input('pages');

        $DatesValues = ([
            'created_at_min' => $request->input('created_at_min'),
            'created_at_max' => $request->input('created_at_max'),
            'updated_at_min' => $request->input('updated_at_min'),
            'updated_at_max' => $request->input('updated_at_max')
        ]);

        $query = Book::query();

        if ($title !== 'all') {
            $query->where('title', $title);
        }

        if ($authorId !== 'all') {
            $query->where('author_id', $authorId);
        }

        if ($publisherId !== 'all') {
            $query->where('publisher_id', $publisherId);
        }
        if (!empty($maxPage)) {
            $query->where('page', '<=', $maxPage);
        }
        if (!empty($DatesValues['created_at_min'])) {
            $query->whereDate('created_at', '>=', $DatesValues['created_at_min']);
        }
        if (!empty($DatesValues['created_at_max'])) {
            $query->whereDate('created_at', '<=', $DatesValues['created_at_max']);
        }
        if (!empty($DatesValues['updated_at_min'])) {
            $query->whereDate('updated_at', '>=', $DatesValues['updated_at_min']);
        }
        if (!empty($DatesValues['updated_at_max'])) {
            $query->whereDate('updated_at', '<=', $DatesValues['updated_at_max']);
        }

        Paginator::currentPathResolver(function () {
            return url('/book_Report');
        });
        try {
            $results = $query->paginate(20);
        } catch (\Exception $e) {
            $errormsg = $e->getMessage();
        }

        $formattedResults = [];
        foreach ($results as $result) {
            $formattedResults[] = [
                'title' => $result->title,
                'author' => $result->author->name, // Assumindo que há uma relação autor-livro
                'publisher' => $result->publisher->name, // Assumindo que há uma relação editora-livro
                'page_count' => $result->page,
                'created_at' => $result->created_at->format('d/m/Y H:i:s'), // Formatação da data de criação
                'updated_at' => $result->updated_at->format('d/m/Y H:i:s'), // Formatação da data de atualização
            ];
        }
        $pagination = $results->links()->render();

        return response()->json([
            'data' => $formattedResults,
            'pagination' => $pagination,
        ]);
    }

    public function getUpdatedOptionsAuthors(Request $request)
    {
        $bookTitle = $request->input('bookTitle');

        if ($bookTitle === 'all') {
            $authors = Author::all()->sortBy('name');
            $authors->prepend(['id' => 'all', 'name' => 'Todos...']);
        } else {
            $books = Book::where('title', $bookTitle)->get();
            $authorIds = $books->pluck('author_id'); // Obtenha os IDs dos autores dos livros
            $authors = Author::whereIn('id', $authorIds)->get();
            $authors->prepend(['id' => 'all', 'name' => 'Todos...']);
        }

        return response()->json([
            'authorOptions' => $authors,
        ]);
    }

    public function getUpdatedOptionsPublisher(Request $request)
    {
        $bookTitle = $request->input('bookTitle');

        if ($bookTitle === 'all') {
            $publishers = Publisher::all()->sortBy('name');
            $publishers->prepend(['id' => 'all', 'name' => 'Todos...']);
        } else {
            $books = Book::where('title', $bookTitle)->get();
            $publisherIds = $books->pluck('publisher_id'); // Obtenha os IDs dos autores dos livros
            $publishers = Publisher::whereIn('id', $publisherIds)->get();
            $publishers->prepend(['id' => 'all', 'name' => 'Todas...']);
        }

        return response()->json([
            'publisherOptions' => $publishers,
        ]);
    }

    public function getEditorOptionsByAuthorAndTitle(Request $request)
    {
        $title = $request->input('title');
        $authorId = $request->input('authorId');

        $query = Book::where('author_id', $authorId);

        if ($title !== 'all') {
            $query->where('title', $title);
        }

        $publisherIds = $query->pluck('publisher_id')->toArray();
        $publishers = Publisher::whereIn('id', $publisherIds)->get();

        $publishers->prepend(['id' => 'all', 'name' => 'Todas...']);
        return response()->json([
            'publisherOptions' => $publishers,
        ]);
    }
}
