<?php

namespace App\Http\Livewire\AnimalesCompras;

use App\Models\AnimalCompra;
use Livewire\Component;
use Livewire\WithPagination;

class Compras extends Component
{
    use WithPagination;
    public $perPage = 10;
    public $search = '';
    public $orderBy = 'fechaCompra';
    public $orderAsc = true;
    public $fecha1, $fecha2, $compra_id;
    
    public function render()
    {
        $data=AnimalCompra::search($this->fecha1, $this->fecha2)
                ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                ->simplePaginate($this->perPage);
        return view('livewire.animales-compras.compras', compact('data'));
    }

    public function editEstado($id)
    {
        $this->compra_id = $id;

    }
    

    public function updateEstado(){
        $obj = AnimalCompra::find($this->compra_id);
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
