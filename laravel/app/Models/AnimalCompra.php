<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AnimalCompra extends Model
{
    
    protected $table = 'animales_compras';
    
    protected $fillable = ['animal_id', 'fechaCompra', 'valor', 'peso',
     'total', 'vendedor', 'ubicacion', 'tipo',   'estado'];

    
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
    
   
}
