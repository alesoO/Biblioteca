<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Dompdf\Dompdf;
use Dompdf\Options;

class ReportController extends Controller
{
    public function generateReportBooks()
    {
        $data = Book::all();
        $pdf = $this->generateTablePDF($data);

        return $pdf->stream('table.pdf');
    }

    private function generateTablePDF($data)
    {
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);
        $html = view('pdf.table', compact('data'))->render();

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');

        $dompdf->render();

        return $dompdf;
    }
}
