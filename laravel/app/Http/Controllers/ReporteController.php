<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AnimalCompra;
use App\Models\AnimalVenta;
use App\Models\Reportes\PdfInventario;
use App\Models\Reportes\PdfVenta;
use Carbon\Carbon;
use Illuminate\Http\Request;



class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        
        return view('reportes.index');
    }



    public function reporteInventario(Request $request)
    {    
       
        $pdf = app('Fpdf');        
        $data=AnimalCompra::consultarFechas($request->fechaInicial, $request->fechaFinal, $request->tipo);            
        if(!empty($data)){
                 $pdf = app('Fpdf');
                 PdfInventario::reporte($pdf, $data, 'INVENTARIO DE ANIMALES' );
                 $pdf->Output();
                 exit;
        }
         

    }

    public function reporteVentas(Request $request)
    {    
        $validated = $request->validate([
            'fechaInicial' => 'required',           
            'fechaFinal' => 'required',           
        ]);
        
        $pdf = app('Fpdf');        
        $data=AnimalVenta::consultarFechas($request->fechaInicial, $request->fechaFinal);            
        if(!empty($data)){
                 $pdf = app('Fpdf');
                 PdfVenta::reporte($pdf, $data, 'REPORTE VENTAS' );
                 $pdf->Output();
                 exit;
        } 

    }
    public function reporteVenta($id)
    {    
                
        $pdf = app('Fpdf');        
        $data=AnimalVenta::find($id);            
        if(!empty($data)){
                 $pdf = app('Fpdf');
                 PdfVenta::individual($pdf, $data, 'REPORTE VENTA' );
                 $pdf->Output();
                 exit;
        } 

    }
    public function reporteUtilidades(Request $request)
    {    
                
        $validated = $request->validate([
            'fechaInicial' => 'required',           
            'fechaFinal' => 'required',           
        ]);
        
        $pdf = app('Fpdf');        
        $data=AnimalVenta::getUtilidades($request->fechaInicial, $request->fechaFinal);            
        if(!empty($data)){
                 $pdf = app('Fpdf');
                 PdfVenta::utilidades($pdf, $data, 'REPORTE DE UTILIDADES' );
                 $pdf->Output();
                 exit;
        } 

    }
    

    


}
