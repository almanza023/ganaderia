<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entidad extends Model
{
    protected $table = 'entidades';
    protected $fillable = ['nombre', 'codigo', 'nit',
    'resolucion', 'documentos','limite', 'fechaActivacion', 'fechaCorte', 'estado'];

    public static function search($search)
     {
         return empty($search) ? static::query()
             : static::query()->where('id', 'like', '%'.$search.'%')
                 ->orWhere('nombre', 'like', '%'.$search.'%')
                 ->orWhere('codigo', 'like', '%'.$search.'%')
                 ->orWhere('nit', 'like', '%'.$search.'%')
                 ->orWhere('resolucion', 'like', '%'.$search.'%');
     }
}
