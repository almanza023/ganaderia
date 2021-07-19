<?php

namespace App\Http\Livewire\Ventas;

use App\Models\AnimalVenta;
use Livewire\Component;
use Livewire\WithPagination;

class Busquedas extends Component
{
    use WithPagination;
    public $perPage = 10;
    public $search = '';
    public $orderBy = 'fecha';
    public $orderAsc = true;
    public $fecha1, $fecha2;
    
    public function render()
    {
        $data=AnimalVenta::search($this->fecha1, $this->fecha2)
                ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                ->simplePaginate($this->perPage);
        return view('livewire.ventas.busquedas', compact('data'));
    }
}
