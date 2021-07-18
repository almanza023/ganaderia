<?php

namespace App\Http\Livewire\Razas;

use App\Models\Raza;
use Livewire\Component;
use Livewire\WithPagination;

class Razas extends Component
{
    use WithPagination;
    public $nombre, $descripcion, $estado, $raza_id, $updateMode=false;
    public $perPage = 10;
    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = true;

    private $model=Raza::class;

    public function render()    {

        $data=$this->model::search($this->search)
                ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                ->simplePaginate($this->perPage);
        return view('livewire.razas.razas', compact('data'));
    }

    public function resetInputFields(){
        $this->nombre='';
        $this->descripcion='';      
        $this->raza_id='';
    }

    public function store(){
        $validated = $this->validate([
            'nombre' => 'required',
        ]);

        if($validated){
            $this->model::updateOrCreate(
                ['id' =>  ($this->raza_id)],
                [
                    'nombre' =>  strtoupper($this->nombre),
                    'descripcion' =>  ($this->descripcion),
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
        $this->raza_id = $id;
        $this->nombre = $obj->nombre;
        $this->descripcion = $obj->descripcion;       
        $this->estado = $obj->estado;
    }

    public function editEstado($id)
    {
        $this->raza_id = $id;

    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function updateEstado(){
        $obj = $this->model::find($this->raza_id);
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
