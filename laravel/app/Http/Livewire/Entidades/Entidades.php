<?php

namespace App\Http\Livewire\Entidades;

use App\Models\Entidad;
use Livewire\Component;
use Livewire\WithPagination;

class Entidades extends Component
{
    use WithPagination;
    public $nombre, $codigo, $nit, $resolucion, $documentos, $limite,  $fechaActivacion, $fechaCorte, $estado, $entidad_id, $updateMode=false;
    public $perPage = 10;
    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = true;

    private $model=Entidad::class;

    public function render()    {

        $data=$this->model::search($this->search)
                ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                ->simplePaginate($this->perPage);
        return view('livewire.entidades.entidades', compact('data'));
    }

    public function resetInputFields(){
        $this->nombre='';
        $this->codigo='';
        $this->nit='';
        $this->resolucion='';
        $this->documentos='';
        $this->fechaActivacion='';
        $this->fechaCorte='';
        $this->entidad_id='';
    }

    public function store(){
        $validated = $this->validate([
            'nombre' => 'required',
            'nit' => 'required',
            'resolucion' => 'required',
            'documentos' => 'required',
            'fechaActivacion' => 'required|date',
        ]);

        if($validated){
            $this->model::updateOrCreate(
                ['id' =>  ($this->entidad_id)],
                [
                    'nombre' =>  strtoupper($this->nombre),
                    'nit' =>  ($this->nit),
                    'codigo' =>  ($this->codigo),
                    'resolucion' =>  ($this->resolucion),
                    'limite' =>  ($this->limite),
                    'documentos' =>  ($this->documentos),
                    'fechaActivacion' =>  ($this->fechaActivacion),
                    'fechaCorte' =>  ($this->fechaCorte),
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
        $this->entidad_id = $id;
        $this->nombre = $obj->nombre;
        $this->nit = $obj->nit;
        $this->codigo = $obj->codigo;
        $this->resolucion = $obj->resolucion;
        $this->documentos = $obj->documentos;
        $this->fechaActivacion = $obj->fechaActivacion;
        $this->fechaCorte = $obj->fechaCorte;
        $this->estado = $obj->estado;
    }

    public function editEstado($id)
    {
        $this->entidad_id = $id;

    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function updateEstado(){
        $obj = $this->model::find($this->entidad_id);
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
