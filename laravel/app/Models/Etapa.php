<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etapa extends Model
{
    protected $table = 'etapas';
    protected $fillable = ['nombre',  'estado'];

    public static function search($search)
     {
         return empty($search) ? static::query()
             : static::query()->where('id', 'like', '%'.$search.'%')
                 ->orWhere('nombre', 'like', '%'.$search.'%');
              
     }

     public static  function getActive(){
         return Etapa::where('estado',1)->get();
     }
}
