<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Book;

class ReportController extends Controller
{
    public function generateBooksPDF()
    {
        $books = Book::all(); // Obtém os dados dos autores do banco de dados
    
        $pdf = PDF::loadView('pdf.books_report', compact('books'));
    
        return $pdf->stream('BooksPDF.pdf');
    }
}

