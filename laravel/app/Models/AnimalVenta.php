<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnimalVenta extends Model
{
    //

    protected $table = 'animales_ventas';
    
    protected $fillable = ['fecha', 'codigo', 'comprador', 'documento',
     'ubicacion', 'telefono', 'tipo',   'estado'];    
    
    public function detalles()
    {
        return $this->belongsToMany('App\Models\DetalleVenta', 'venta_id');
    }

    public static function getActive(){
        return AnimalVenta::where('estado',1)->get();
    }

    public static function getCodigo(){
        $obj=AnimalVenta::latest('id')->first();
        if(!empty($obj)){
            return 'FV'.($obj->id+1);
        }
        return '';
        
    }
    
}
