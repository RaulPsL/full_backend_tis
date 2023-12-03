<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Frente;
use Illuminate\Routing\Controller;
use PDF;

class BoletasController extends Controller
{
    public function generarBoleta()
    {
        $frentes = Frente::with('candidatos')->get();
        $data = ['frentes' => $frentes, 'title' => 'Boleta Elecciones 2023.'];
        
        $pdf = PDF::loadView('boleta', $data);

        $pdfPath = public_path('boleta.pdf');
        $pdf->save($pdfPath);

        return response()->file($pdfPath);
    }
}
