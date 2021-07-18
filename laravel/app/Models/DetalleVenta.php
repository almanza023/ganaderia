<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    //

    protected $table = 'detalles_ventas';
    
    protected $fillable = ['animal_id', 'venta_id', 'valor',
     'valorkg', 'peso', 'edad','estado'];    
    
    
    
}
