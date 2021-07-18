<?php

namespace App\Http\Livewire\Potreros;

use App\Models\Potrero;
use Livewire\Component;
use Livewire\WithPagination;

class Potreros extends Component
{
    use WithPagination;
    public $nombre, $area, $cercas, $maleza, $observaciones, $estado, $potrero_id, $updateMode=false;
    public $perPage = 10;
    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = true;

    private $model=Potrero::class;

    public function render()    {

        $data=$this->model::search($this->search)
                ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                ->simplePaginate($this->perPage);
        return view('livewire.potreros.potreros', compact('data'));
    }

    public function resetInputFields(){
        $this->nombre='';
        $this->area='';      
        $this->cercas='';      
        $this->observaciones='';      
        $this->maleza='';      
        $this->potrero_id='';
    }

    public function store(){
        $validated = $this->validate([
            'nombre' => 'required',
        ]);

        if($validated){
            $this->model::updateOrCreate(
                ['id' =>  ($this->potrero_id)],
                [
                    'nombre' =>  strtoupper($this->nombre),
                    'area' =>  ($this->area),
                    'cercas' =>  ($this->cercas),
                    'maleza' =>  ($this->maleza),
                    'observaciones' =>  ($this->observaciones),
                ]);
            session()->flash('message', 'DATOS REGISTRADOS EXITOSAMENTE.');
            $this->resetInputFields();
            $this->emit('closeModal');
        }
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $obj = $this->model::find($id);
        $this->potrero_id = $id;
        $this->nombre = $obj->nombre;
        $this->area = $obj->area;       
        $this->cercas = $obj->cercas;       
        $this->maleza = $obj->maleza;       
        $this->observaciones = $obj->observaciones;       
        $this->estado = $obj->estado;
    }

    public function editEstado($id)
    {
        $this->potrero_id = $id;

    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function updateEstado(){
        $obj = $this->model::find($this->potrero_id);
        if($obj->estado==1){
            $obj->estado=0;
            $obj->save();
        }else{
            $obj->estado=1;
            $obj->save();
        }
        session()->flash('message', 'ESTADO ACTUALIZADO EXITOSAMENTE');
        $this->emit('closeModalEstado');


    }
}
