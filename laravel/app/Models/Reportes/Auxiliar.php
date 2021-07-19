<?php

namespace App\Models\Reportes;

use App\Models\CargaAcademica;
use App\models\Convivencia;
use App\models\DireccionGrado;
use App\Models\Entidad;
use App\Models\Grado;
use App\Models\LogroDisciplinario;
use App\Models\Nivelacion;
use App\Models\Prefijo;
use App\Models\Sede;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auxiliar extends Model
{

    public static function headerPdf($pdf, $titulo){
        //$entidad=Entidad::find(1);        
        $pdf->AddPage();
        $pdf->SetFillColor(232, 232, 232);
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(190, 6, utf8_decode('GANADERIA LA MAREA'), 0, 1, 'C');  
        $path=public_path().'/logo-sm.png';      
        $pdf->Image($path, 8, 6, 30);
        //$pdf->Image($path2, 180, 8, 20);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Ln(20);
        $pdf->Cell(190, 6, utf8_decode($titulo), 1, 1, 'C', 1);
     }

}
