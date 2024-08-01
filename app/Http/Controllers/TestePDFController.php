<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;

class TestePDFController extends Controller
{
    public function download()
    {
        $data = [
            'title' => 'Teste PDF',
            'date' => date('d/m/Y')
        ];

        $pdf = Pdf::loadView('pdf', compact('data'));
        return $pdf->download('invoice.pdf');
    }
}
