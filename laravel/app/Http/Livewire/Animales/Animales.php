<?php

namespace App\Http\Livewire\Animales;

use App\Models\Animal;
use App\Models\Etapa;
use Livewire\Component;
use Livewire\WithPagination;

class Animales extends Component
{
    use WithPagination;
    public $nombre, $sexo, $fecha, $etapa, $etapaSel, $animal_id, $updateMode=false;
    public $perPage = 10;
    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = true;

    private $model=Animal::class;

    public function render()    {

        $etapas=Etapa::getActive();
        $data=$this->model::search($this->search)
                ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                ->simplePaginate($this->perPage);
        return view('livewire.animales.animales', compact('data', 'etapas'));
    }

    public function resetInputFields(){
        $this->nombre='';
        $this->sexo='';      
        $this->fecha='';      
        $this->etapa='';      
        $this->etapaSel='';      
        $this->animal_id='';      
       
    }

    public function store(){
        $validated = $this->validate([
            'nombre' => 'required',
            'sexo' => 'required',
        ]);

        if($validated){
            if(!empty($this->etapa)){
                Etapa::updateOrCreate(
                    [
                        'nombre'=>strtoupper($this->etapa)
                    ],
                    [
                    'nombre'=>strtoupper($this->etapa)
                    ]
                );
            }

            $this->etapa=$this->etapaSel;
            $this->model::updateOrCreate(
                ['id' =>  ($this->animal_id)],
                [
                    'nombre' =>  strtoupper($this->nombre),
                    'sexo' =>  strtoupper($this->sexo),
                    'fechaNacimiento' =>  ($this->fecha),
                    'etapa' =>  strtoupper($this->etapa),                    
                ]);
            session()->flash('message', 'DATOS ACTUALIZADOS EXITOSAMENTE.');
            $this->resetInputFields();
            $this->emit('closeModal');
        }
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $obj = $this->model::find($id);
        $this->animal_id = $id;
        $this->nombre = $obj->nombre;
        $this->sexo = $obj->sexo;       
        $this->fecha = $obj->fechaNacimiento;       
        $this->etapa = $obj->etapa;               
        $this->etapaSel = $obj->etapa;               
    }

    public function editEstado($id)
    {
        $this->animal_id = $id;

    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

   
}
