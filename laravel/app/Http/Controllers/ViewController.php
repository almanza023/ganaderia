<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\AnimalCompra;
use App\Models\AnimalVenta;
use App\Models\Arrendamiento;
use App\Models\Cliente;
use App\Models\Inmueble;
use App\Models\Pago;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    

    public function animales()
    {
        return view('animales.index');
    }

    public function razas()
    {
        return view('razas.index');
    }

    public function compras()
    {
        return view('animales-compras.index');
    }
    public function comprasCrear()
    {
        return view('animales-compras.crear');
    }


    public function ventas()
    {
        return view('animales-ventas.index');
    }
    public function consultarVentas()
    {
        return view('animales-ventas.detalles');
    }

    public function busquedas()
    {
        return view('animales-ventas.busquedas');
    }

    public function potreros()
    {
        return view('potreros.index');
    }
    public function inicio()
    {
        $animales=0;
        $ventas=0;
        $totalVentas=0;
        $totalCompras=0;
        $objAnimales=Animal::getActive();
        if(count($objAnimales)>0){
            $animales=count($objAnimales);
        }
        $objVentas=AnimalVenta::getActive();
        if(count($objVentas)>0){
            $ventas=count($objVentas);
        }
        
        $totalCompras=AnimalCompra::totalPagos();
        return view('home', compact('animales', 'ventas', 'totalCompras'));
    }

}
