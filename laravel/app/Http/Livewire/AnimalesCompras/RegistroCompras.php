<?php

namespace App\Http\Livewire\AnimalesCompras;

use App\Models\Animal;
use App\Models\AnimalCompra;
use App\Models\Etapa;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class RegistroCompras extends Component
{
    public $animal_id,  $nombre, $sexo,   $fechanacimiento, $etapa, $etapaSel;
    public $fechaCompra, $valor, $peso,  $total, $vendedor, $ubicacion, $tipoCompra;

    private $model=Animal::class;
    public function render()   {
       
        if(!empty($this->peso) && !empty($this->valor)){
            $this->total=$this->peso * $this->valor;
        }
       $etapas=Etapa::getActive();
        return view('livewire.animales-compras.registro-compras', compact('etapas'));
    }

    public function resetInputFields(){
        $this->animal_id='';
         
        $this->nombre='';      
        $this->sexo='';     
         
        $this->fechanacimiento='';
        $this->etapa='';
        $this->padre='';       
        $this->peso='';        
        $this->observaciones='';
        $this->fechaCompra='';
        $this->valor='';
        $this->vendedor='';        
        $this->total='';
    }
 
    public function store(){
        $validated = $this->validate([
            'nombre' => 'required',
            'sexo' => 'required',           
        ]);

        if($validated){
            DB::beginTransaction();
            try {    
                if(!empty($this->etapa)){
                    Etapa::updateOrCreate(
                        [
                            'nombre'=>strtoupper($this->etapa)
                        ],
                        [
                        'nombre'=>strtoupper($this->etapa)
                        ]
                    );
                }else{
                    $this->etapa=$this->etapaSel;
                }
            $animal=$this->model::create(               
                [
                    'nombre' =>  strtoupper($this->nombre),                    
                    'sexo' =>  ($this->sexo),
                    'fechaNacimiento' =>  ($this->fechanacimiento),                   
                    'etapa' =>  strtoupper($this->etapa),
                    'peso' =>  ($this->peso),                  
                    
                ]);

                

                AnimalCompra::updateOrCreate(
                    ['animal_id' =>  ($animal->id)],
                    [
                        'animal_id'=> ($animal->id),
                        'fechaCompra'=> ($this->fechaCompra),
                        'valor'=> ($this->valor),
                        'peso'=> ($this->peso),
                        'total'=> ($this->total),
                        'vendedor'=> strtoupper($this->vendedor),
                        'ubicacion'=> strtoupper($this->ubicacion),                        
                        'tipo'=> ($this->tipoCompra),                        
                    ]);
            DB::commit();                 
            $this->resetInputFields();
            $this->emit('closeModal');
            return session()->flash('message', 'DATOS REGISTRADOS EXITOSAMENTE.');
        
    } catch (\Exception $e) {
        DB::rollback();
        session()->flash('error', $e->getMessage());
    }
        }       
    }
    
}
