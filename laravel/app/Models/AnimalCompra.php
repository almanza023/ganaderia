<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AnimalCompra extends Model
{
    
    protected $table = 'animales_compras';
    
    protected $fillable = ['animal_id', 'fechaCompra', 'valor', 'peso',
     'total', 'vendedor', 'ubicacion', 'tipo',   'estado'];

    public static function search($fecha1, $fecha2)
     {
         return empty($fecha1) && empty($fecha2)  ? static::query()
             : static::query()->whereBetween('fechaCompra', [$fecha2, $fecha1]);
    }
    
    public function animal()
    {
        return $this->belongsTo('App\Models\Animal', 'animal_id');
    }

    public static function totalPagos(){
        $total = DB::table('animales_compras')            
            ->where('estado', 1)            
            ->sum('valor');           
        return $total;
    }

    public static function consultarFechas($fecha1, $fecha2, $tipo){
        if($tipo==1){
            return AnimalCompra::orderBy('fechaCompra', 'asc')->get();
        }else{
            return AnimalCompra::where('fechaCompra','>=', $fecha1)
        ->where('fechaCompra','<=', $fecha2)->orderBy('fechaCompra', 'asc')->get();
        }
    }
    
   
}
