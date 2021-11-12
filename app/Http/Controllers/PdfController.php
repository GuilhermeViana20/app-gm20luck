<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use PDF;

class PdfController extends Controller
{
    public function gerarPdf()
    {
        $products = new Products();
        $products = $products->orderBy('nome')->get();
        
        $pdf = PDF::loadView('pdf', compact('products'));

        return $pdf->setPaper('a4', 'landscape')->stream('teste.pdf');
    }
}
