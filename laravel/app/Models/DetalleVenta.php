<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    //

    protected $table = 'detalles_ventas';
    
    protected $fillable = ['animal_id', 'venta_id', 'valor',
     'valorkg', 'peso', 'edad','estado'];    
    
     public function animal()
     {
         return $this->belongsTo('App\Models\Animal', 'animal_id', 'id');
     }

     public static function getTotal($id){
         $suma=DetalleVenta::where('venta_id', $id)->where('estado',1)->sum('valor');
         if($suma>0){
             return $suma;
         }else{
             return 0;
         }

     }
    
}
