<?php

namespace App\Models\Reportes;

use Illuminate\Database\Eloquent\Model;

class PdfInventario extends Model
{
    public static function reporte($pdf, $data, $titulo){
        Auxiliar::headerPdf($pdf, $titulo);
        $pdf->Ln();
        $pdf->SetFont('Arial', '', 10);
        $pdf->SetFont('Arial', 'B', 9);

            $pdf->Cell(65, 6, utf8_decode('ANIMAL'), 1, 0, 'J', 1);
            $pdf->Cell(20, 6, 'SEXO  ', 1, 0, 'C', 1);
            $pdf->Cell(35, 6, 'FECHA COMPRA ', 1, 0, 'C', 1);
            $pdf->Cell(20, 6, 'PESO KG  ', 1, 0, 'C', 1);
            $pdf->Cell(25, 6, 'VALOR KG  ', 1, 0, 'C', 1);
            $pdf->Cell(25, 6, 'PRECIO', 1, 1, 'C', 1);

            $pdf->SetFont('Arial', '', 9);
            $total=0;
            $totalkg=0;

            foreach ($data as $item) {
                $total+=$item->total;
                $totalkg+=$item->peso;
                $pdf->Cell(65, 6, utf8_decode($item->animal->nombre), 1, 0, 'J', 0);
                $pdf->Cell(20, 6, utf8_decode($item->animal->sexo), 1, 0, 'J', 0);
                $pdf->Cell(35, 6, utf8_decode($item->fechaCompra), 1, 0, 'J', 0);
                $pdf->Cell(20, 6, utf8_decode($item->peso), 1, 0, 'C', 0);
                $pdf->Cell(25, 6, '$ '.number_format($item->valor, 0), 1, 0, 'C', 0);
                $pdf->Cell(25, 6, '$ '.number_format($item->total, 0), 1, 1, 'C', 0);
            }
            $pdf->Ln();
            $pdf->Cell(85, 6, '', 0, 0, 'J', 0);   
            $pdf->SetFont('Arial', 'B', 9);         
            $pdf->Cell(35, 6, utf8_decode('PESO TOTAL'), 1, 0, 'J', 1);
            $pdf->Cell(20, 6, number_format($totalkg), 1, 0, 'C', 0);
            $pdf->SetFont('Arial', 'B', 9);
            $pdf->Cell(25, 6, 'TOTAL', 1, 0, 'C', 1);
            $pdf->Cell(25, 6, '$ '.number_format($total, 0), 1, 1, 'C', 0);

        $pdf->Output();
        exit;

       }
}
