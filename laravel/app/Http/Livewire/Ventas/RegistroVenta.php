<?php

namespace App\Http\Livewire\Ventas;

use App\Models\Animal;
use App\Models\AnimalVenta;
use App\Models\DetalleVenta;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class RegistroVenta extends Component
{
    public $i=0, $animales=[], $buscar, $nombreAnimal, $animal_id,
     $pesoCompra, $pesoActual, $total_fac, $valorKg, $subtotal, $valorCompra;

    public $codigoB, $codigo, $comprador, $documento, $fecha;

    public $ids=[];
    public $arrayAnimales=[];   
    public $subtotales=[]; 
    public $pesosCompras=[]; 
    public $pesosVentas=[]; 
    public $valoresCompra=[]; 
    public $valoresVenta=[]; 

    public $inputsearchsupplier = '';
    public $supplier_id;

    public $showData=false;

    public function selectsupplier(Animal $animal)
    {

        $this->supplier_id = $animal->id;
        $this->animal_id = $animal->id;
        $this->nombreAnimal = $animal->nombre;      
        $this->pesoCompra = $animal->peso;      
        $this->valorCompra = $animal->compra->valor;      
        $this->terms = '';
        $this->inputsearchsupplier='';
    }
    
    public function render()
    {
        $date = Carbon::now();        
        $this->fecha=$date;
        if(!empty($this->buscar)){
            $this->animales=Animal::consultar($this->buscar);
        }
        if(!empty($this->pesoActual) && !empty($this->valorKg)){
            $this->subtotal=$this->pesoActual * $this->valorKg;
        }
       if(!empty(AnimalVenta::getCodigo())){
        $this->codigo=AnimalVenta::getCodigo();
       }else{
           $this->codigo='FV1';
       }
       $searchsuppliers = [];
        if(strlen($this->inputsearchsupplier)>=2){
            $searchsuppliers = Animal::filtro($this->inputsearchsupplier);
        }
        return view('livewire.ventas.registro-venta', compact('searchsuppliers', ));
    }

    public function seleccionar($valor){
      
            $obj=$this->animales[$valor];
            $this->nombreAnimal=$obj->nombre;
            $this->animal_id=$obj->id;
            $this->pesoCompra=$obj->peso;
            $this->buscar;
            $this->animales=[];
            $this->emit('closeBusqueda');
    }

    private function resetInput1(){
        $this->nombreAnimal='';
        $this->animales=[];
        $this->animal_id='';
        $this->pesoCompra='';
        $this->subtotal='';
        $this->pesoActual='';       
        $this->valorCompra='';       
        $this->valorKg='';       

    }
    private function resetInput(){
        $this->resetInput1();
        $this->comprador='';
        $this->fecha=[];
        $this->animales=[];
        $this->documento='';
        $this->codigoB='';
        $this->ids='';   
        $this->arrayAnimales='';   
        $this->subtotales=''; 
        $this->pesos=''; 
        $this->valores='';
              

    }

    public function add($i){
        if(empty($this->animal_id) ){
            return session()->flash('error','Codigo No Valido');
        }   
        if(empty($this->valorKg) || empty($this->subtotal) || empty($this->pesoActual) ){
            return session()->flash('error','Campos en Blanco');
        }       
        $i = $i + 1;
        $this->i = $i;       

            array_push($this->ids ,$this->animal_id);
            array_push($this->pesosVentas ,$this->pesoActual);
            array_push($this->pesosCompras ,$this->pesoCompra);
            array_push($this->arrayAnimales ,$this->nombreAnimal);
            array_push($this->subtotales , $this->subtotal);     
            array_push($this->valoresVenta , $this->valorKg);     
            array_push($this->valoresCompra , $this->valorCompra);     

            $this->total_fac=array_sum($this->subtotales);            
            $this->resetInput1();
    }

    public function remove($i)
    {
        unset($this->ids[$i] );
        unset($this->pesosVentas[$i] );
        unset($this->pesosCompras[$i]);
        unset($this->valoresVenta[$i]);       
        unset($this->valoresVenta[$i]);       
        unset($this->valoresCompra[$i]);       
        unset($this->subtotales[$i]);       
        $this->total_fac=array_sum($this->subtotales);

    }

    public function store(){
        $validated = $this->validate([
            'comprador' => 'required',
            'documento' => 'required',
            'fecha' => 'required',

        ]);

        if($validated){
            DB::beginTransaction();
            try {
                if(empty($this->codigoB)){
                    $codigo=$this->codigo;
                }else{
                    $codigo=$this->codigoB;
                }
            $venta=AnimalVenta::updateOrCreate(
                ['codigo' =>  ($codigo)],
                [
                    'comprador' =>  strtoupper($this->comprador),
                    'documento' =>  ($this->documento),
                    'fecha' =>  ($this->fecha),             
                                   
                ]);
                $total=0;
                for ($x = 0; $x <count($this->ids); $x++) {
                    DetalleVenta::updateOrCreate(
                        ['venta_id' =>  ($venta->id),
                        'animal_id'=>$this->ids[$x]],
                        [
                            'animal_id'=> ($this->ids[$x]),
                            'venta_id'=> ($venta->id),
                            'valor'=> ($this->subtotales[$x]),
                            'valorkg'=> ($this->valoresVenta[$x]),
                            'peso'=> ($this->pesosVentas[$x]),                                    
                        ]);
                    $total+=$this->subtotales[$x];
                    Animal::find($this->ids[$x])->update(['estado' => 2]);
                   
                }
                $venta->total=$total;
                $venta->save();
            DB::commit();                 
            $this->resetInput();
            $this->emit('closeModal');
            return session()->flash('message', 'DATOS REGISTRADOS EXITOSAMENTE.');
        
    } catch (\Exception $e) {
        DB::rollback();
        session()->flash('error', $e->getMessage());
    }
        }       
    }
           
        
}
