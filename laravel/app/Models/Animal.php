<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    //

    protected $table = 'animales';
    
    protected $fillable = ['nombre', 'codigo', 'sexo', 'etapa',
     'fechaNacimiento', 'peso', 'observaciones',   'estado'];

    public static function search($search)
     {
         return empty($search) ? static::query()
             : static::query()->where('id', 'like', '%'.$search.'%')
                 ->orWhere('nombre', 'like', '%'.$search.'%');
    }

    public static function getActive(){
        return Animal::where('estado',1)->get();
    }

    public static function getCodigo(){
        return 'CA'.(Animal::latest('id')->first()->id+1);
    }

    public static function buscar($codigo){
        return Animal::where('nombre', $codigo)->orWhere('hierro', $codigo)->first();
    }

    public static function consultar($search)
     {
         return Animal::where('id', 'like', '%'.$search.'%')                
                 ->orWhere('nombre', 'like', '%'.$search.'%')                 
                 ->where('estado', 1)
                 ->get();
     }

    
    public function compra()
    {
        return $this->belongsTo('App\Models\AnimalCompra', 'id', 'animal_id');
    }

    public static function filtro($term){
        return Animal::where('nombre', 'LIKE' , '%'.$term.'%')->where('estado', 1)->get();
    }
    


}
