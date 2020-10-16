<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use PDF;

class PDFcontroller extends Controller
{
    
	public function pdf (){

		$pdf = PDF::loadView('prueba');
		return $pdf->inline('prubea.pdf');
	}

	public function pdfArticulos(){
		$articulo = Articulo::all();
		$articulo = \App::make('dompdf.wrapper');
		$articulo->loadView('PDFarticulos', compact('articulo'));
		
			
			
		return $articulo->download('PDFarticulos.pdf');

	}
}
