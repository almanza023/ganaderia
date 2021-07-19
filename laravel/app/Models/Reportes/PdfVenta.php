<?php

namespace App\Models\Reportes;

use App\Models\AnimalVenta;
use Illuminate\Database\Eloquent\Model;

class PdfVenta extends Model
{

    public static function reporte($pdf, $data, $titulo){
        Auxiliar::headerPdf($pdf, $titulo);
        $pdf->Ln();
        $pdf->SetFont('Arial', '', 10);
        $pdf->SetFont('Arial', 'B', 9);
            
            $pdf->Cell(85, 6, utf8_decode('ANIMAL'), 1, 0, 'J', 1);
            $pdf->Cell(35, 6, 'PESO', 1, 0, 'C', 1);
            $pdf->Cell(35, 6, 'VALOR ', 1, 0, 'C', 1);
            $pdf->Cell(35, 6, 'SUBTOTAL  ', 1, 1, 'C', 1);
            $pdf->SetFont('Arial', '', 9);
            $total=0;
            $totalkg=0;
            $pdf->Ln();
            foreach ($data as $item) {
                $pdf->SetFont('Arial', 'B', 9);
                $pdf->Cell(120, 6, utf8_decode($item->codigo), 1, 0, 'J', 1);
                $pdf->Cell(70, 6, utf8_decode($item->fecha), 1, 1, 'J', 1);
                $detalles=AnimalVenta::detalles($item->id);
                if(count($detalles)>0){
                    foreach ($detalles as $detalle) {
                        $pdf->SetFont('Arial', '', 9);
                        $pdf->Cell(85, 6, utf8_decode($detalle->animal->nombre), 1, 0, 'J', 0);
                        $pdf->Cell(35, 6, utf8_decode($detalle->peso), 1, 0, 'J', 0);
                        $pdf->Cell(35, 6, '$ '.number_format($detalle->valorkg, 0), 1, 0, 'J', 0);
                        $pdf->Cell(35, 6, '$ '.number_format($detalle->valor,0), 1, 1, 'J', 0);
                    }
                }else{
                    $pdf->Cell(190, 6,'VENTA ANULADA', 1, 1, 'C', 0);     
                }
                $total+=$item->total;                
                $pdf->SetFont('Arial', 'B', 9);
                $pdf->Cell(190, 6, '$ '.number_format($item->total, 0), 1, 1, 'C', 1); 
                $pdf->Ln();               
            }
            $pdf->Ln();
            $pdf->SetX(130);           
            $pdf->SetFont('Arial', 'B', 9);
            $pdf->Cell(35, 6, 'TOTAL', 1, 0, 'C', 1);
            $pdf->Cell(35, 6, '$ '.number_format($total, 0), 1, 1, 'C', 0);

        $pdf->Output();
        exit;

       }

       public static function individual($pdf, $data, $titulo){
        Auxiliar::headerPdf($pdf, $titulo);
        $pdf->Ln();
        $pdf->SetFont('Arial', '', 9);

        $pdf->Cell(90, 6, utf8_decode('CLIENTE: '), 1, 0, 'J', 1);
        $pdf->Cell(100, 6, utf8_decode($data->comprador), 1, 1, 'J', 0);
        $pdf->Cell(40, 6, utf8_decode('CODIGO: '), 1, 0, 'J', 1);
        $pdf->Cell(50, 6, utf8_decode($data->codigo), 1, 0, 'J', 0);
        $pdf->Cell(50, 6, utf8_decode('FECHA VENTA : '), 1, 0, 'J', 1);
        $pdf->Cell(50, 6, utf8_decode($data->fecha), 1, 1, 'J', 0);
        $pdf->SetFont('Arial', 'B', 9);          
        $pdf->Ln();

            $pdf->Cell(90, 6, utf8_decode('ANIMAL'), 1, 0, 'J', 1);
            $pdf->Cell(30, 6, 'PESO KG', 1, 0, 'C', 1);
            $pdf->Cell(35, 6, 'VALOR ', 1, 0, 'C', 1);
            $pdf->Cell(35, 6, 'SUBTOTAL  ', 1, 1, 'C', 1);
            $pdf->SetFont('Arial', '', 9);          
                $detalles=AnimalVenta::detalles($data->id);
                if(count($detalles)>0){
                    foreach ($detalles as $detalle) {
                        $pdf->SetFont('Arial', '', 9);
                        $pdf->Cell(90, 6, utf8_decode($detalle->animal->nombre), 1, 0, 'J', 0);
                        $pdf->Cell(30, 6, utf8_decode($detalle->peso), 1, 0, 'J', 0);
                        $pdf->Cell(35, 6, '$ '.number_format($detalle->valorkg, 0), 1, 0, 'J', 0);
                        $pdf->Cell(35, 6, '$ '.number_format($detalle->valor,0), 1, 1, 'J', 0);
                    }
                }                         
            
            $pdf->Ln();
            $pdf->SetX(130);           
            $pdf->SetFont('Arial', 'B', 9);
            $pdf->Cell(35, 6, 'TOTAL', 1, 0, 'C', 1);
            $pdf->Cell(35, 6, '$ '.number_format($data->total, 0), 1, 1, 'C', 0);

        $pdf->Output();
        exit;

       }

       public static function utilidades($pdf, $data, $titulo){
        $pdf->AddPage('L');
        $pdf->SetFillColor(232, 232, 232);
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(275, 6, utf8_decode('GANADERIA LA MAREA'), 0, 1, 'C');  
        $path=public_path().'/logo-sm.png';      
        $pdf->Image($path, 8, 6, 30);
        //$pdf->Image($path2, 180, 8, 20);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Ln(20);
        $pdf->Cell(275, 6, utf8_decode($titulo), 1, 1, 'C', 1);
        $pdf->Ln();
        
        $pdf->SetFont('Arial', 'B', 9);

            $pdf->Cell(44, 6, utf8_decode('ANIMAL'), 1, 0, 'J', 1);
            $pdf->Cell(25, 6, 'FECHA COM  ', 1, 0, 'C', 1);
            $pdf->Cell(25, 6, 'PESO COMPRA', 1, 0, 'C', 1);
            $pdf->Cell(25, 6, 'VALOR COMP', 1, 0, 'C', 1);
            $pdf->Cell(28, 6, 'SUBTOTAL COMP', 1, 0, 'C', 1);
            $pdf->Cell(25, 6, 'FECHA VENTA', 1, 0, 'C', 1);
            $pdf->Cell(25, 6, 'PESO VENTA', 1, 0, 'C', 1);
            $pdf->Cell(25, 6, 'VALOR VENTA', 1, 0, 'C', 1);
            $pdf->Cell(28, 6, 'SUBTOTAL VENTA', 1, 0, 'C', 1);
            $pdf->Cell(25, 6, 'UTILIDAD  ', 1, 1, 'C', 1);
           

            $pdf->SetFont('Arial', '', 9);
            $total=0;
            $compras=0;
            $ventas=0;
            $kgcompras=0;
            $kgventas=0;
          

            foreach ($data as $item) {
                $kgcompras+=$item->peso;
                $kgventas+=$item->pesoventa;
                $compras+=$item->total;
                $ventas+=$item->valor;
                $utilidad=$item->valor-$item->total;
                $total+=$utilidad;
                
                $pdf->Cell(44, 6, utf8_decode($item->nombre), 1, 0, 'J', 0);               
                $pdf->Cell(25, 6, utf8_decode($item->fechaCompra), 1, 0, 'J', 0);
                $pdf->Cell(25, 6, utf8_decode($item->peso), 1, 0, 'C', 0);
                $pdf->Cell(25, 6, '$ '.number_format($item->valorcompra, 0), 1, 0, 'C', 0);
                $pdf->Cell(28, 6, '$ '.number_format($item->total, 0), 1, 0, 'C', 0);
                $pdf->Cell(25, 6, utf8_decode($item->fecha), 1, 0, 'J', 0);
                $pdf->Cell(25, 6, utf8_decode($item->pesoventa), 1, 0, 'C', 0);
                $pdf->Cell(25, 6, '$ '.number_format($item->valorkg, 0), 1, 0, 'C', 0);
                $pdf->Cell(28, 6, '$ '.number_format($item->valor, 0), 1, 0, 'C', 0);
                $pdf->Cell(25, 6, '$ '.number_format($utilidad,0), 1, 1, 'C', 0);
            }
            $pdf->Ln();
            $pdf->SetFont('Arial', 'B', 9);
            $pdf->Cell(69, 6, 'TOTAL', 1, 0, 'J', 1);                          
            $pdf->Cell(25, 6, number_format($kgcompras, 0), 1, 0, 'C', 1);
            $pdf->Cell(25, 6, '', 1, 0, 'C', 0);
            $pdf->Cell(28, 6, '$ '.number_format($compras, 0), 1, 0, 'C', 1);
            $pdf->Cell(25, 6, '', 1, 0, 'J', 0);
            $pdf->Cell(25, 6, number_format($kgventas, 0), 1, 0, 'C', 1);
            $pdf->Cell(25, 6, ' ', 1, 0, 'C', 0);
            $pdf->Cell(28, 6, '$ '.number_format($ventas, 0), 1, 0, 'C', 1);
            $pdf->Cell(25, 6, '$ '.number_format($total, 0), 1, 1, 'C', 1);

        $pdf->Output();
        exit;

       }

       

    }
