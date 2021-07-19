<?php

namespace App\Http\Livewire\Ventas;

use App\Models\AnimalVenta;
use App\Models\DetalleVenta;
use Livewire\Component;

class DetallesVenta extends Component
{
    public $codigo, $detalles, $venta, $seleccion, $total;
    

    public function render()
    {
        return view('livewire.ventas.detalles-venta');
    }

    private function resetInput(){      
        $this->codigo='';       
        $this->detalles='';
        $this->venta='';
        $this->seleccion='';    
              

    }


    public function consultar(){
        $this->venta=AnimalVenta::buscar($this->codigo);       
        
        if(!empty($this->venta)){
            $this->total=$this->venta->total;      
            $this->detalles=AnimalVenta::detalles($this->venta->id);
        }
    }

    public function eliminar($id){
        $this->seleccion=$id;
        $det=DetalleVenta::find($id);
        if($det->estado==1){
            $det->estado=0;
            $det->animal->estado=1;
            
        }else{
            $this->seleccion=0;
            $det->animal->estado=2;
            $det->estado=1;  
        }      
        $det->animal->save(); 
        $det->save();
        $this->total=DetalleVenta::getTotal($this->venta->id);
        $this->venta->total=$this->total;
        $this->venta->save();
    }

    public function anular(){    
        $this->venta->estado=0;       
        $this->venta->save();
        $obj=DetalleVenta::where('venta_id', $this->venta->id)->get();
        foreach ($obj as $item) {
           $item->animal->estado=1;
           $item->animal->save();
           $item->estado=0;
           $item->save();
        }
        $this->resetInput(); 
        return session()->flash('message', 'VENTA ANULADA EXITOSAMENTE'); 
      
    }
}
