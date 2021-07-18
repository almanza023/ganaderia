<div>
    @include('livewire.ventas.manimales')
    @if (session()->has('message'))
    <script>
        mensaje("{{ session('message') }}");
    </script>
    @endif
    @if (session()->has('error'))
    <script>
        error("{{ session('error') }}");
    </script>
    @endif
    <div class="row">
        <div class="col-12">
            <form wire:submit.prevent="store">
            <div class="card ">
                <div class="card-body">    
                    <h5 class="mt-0">Datos de Venta</h5>
                    <p class="text-muted font-13 mb-4">Ingrese aqui los datos del animal y la compra</code>.
                    </p>
                    <div class="row">
                        <div class="col-sm-12 col-lg-8">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Código</label>
                                <div class="col-sm-6">
                                    <input  class="form-control" type="text"  wire:keydown.enter="edit" wire:model.defer="codigoB"  placeholder="">
                                </div>
                                <div class="col-sm-4">
                                    <input  class="form-control" readonly wire:model.defer="codigo"  placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-4">                            
                            <button type="button" wire:click.prevent="edit" class="btn btn-primary btn-bloc">Buscar</button>
                           
                        </div>       
                        
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-lg-4">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-4 col-form-label">Cliente</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" required  wire:model="comprador" placeholder="Nombre">
                                </div>
                            </div>                    

                              

                             
                                                 
                        </div>  
                        <div class="col-sm-12 col-lg-4">                             

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Documento</label>
                                    <div class="col-sm-8">
                                        <input required wire:model.defer="documento" class="form-control" type="number" value="" placeholder="Documento" min="0">
                                    </div>
                                </div>                            
                        </div> 
                        <div class="col-sm-12 col-lg-4">
                            <div class="form-group row">
                                <label for="example-month-input" class="col-sm-4 col-form-label">Fecha Venta</label>
                                <div class="col-sm-8">
                                    <input required wire:model.defer="fecha" class="form-control" type="date" >
                                </div>
                            </div>

                            
                            
                            
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card ">
                <div class="card-body">    
                    <h5 class="mt-0">Selección de Animales</h5>                   
                    <div class="row">
                        <div class="col-sm-12 col-lg-4">
                            @include('livewire.ventas.select')   
                            <div class="form-group row">
                                <label for="example-month-input" class="col-sm-3 col-form-label">Animal</label>
                                <div class="col-sm-9">
                                    <input  wire:model.defer="nombreAnimal" class="form-control" type="text" >
                                  
                                </div>                              
                            </div>   
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-4 col-form-label">Peso Compra</label>
                                <div class="col-sm-8">
                                    <input readonly wire:model.defer="pesoCompra" class="form-control" type="number" value="" placeholder="Peso Compra" min="0">
                                </div>
                            </div>        
                                          
                           
                           
                               
                              
                            
                                                 
                        </div>  
                        <div class="col-sm-12 col-lg-4">
                                                       
                               
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Valor KG</label>
                                    <div class="col-sm-8">
                                        <input  wire:model="valorKg" class="form-control" type="number" value="" placeholder="Valor" min="0">
                                    </div>
                                </div>     
                                
                                
                                
                               
                            
                        </div> 
                        <div class="col-sm-12 col-lg-4">                            
                            
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-4 col-form-label">Peso Actual</label>
                                <div class="col-sm-8">
                                    <input  wire:model="pesoActual" class="form-control" type="number" value="" placeholder="Peso Actual" min="0">
                                </div>
                            </div> 
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-4 col-form-label">Subtotal ($)</label>
                                <div class="col-sm-8">
                                    <input  wire:model="subtotal" class="form-control" type="number" value="" placeholder="Subtotal" min="0">
                                </div>
                            </div>                              
                            
                        </div>  
                        <button type="button"  wire:click.prevent="add({{$i}})" class="btn btn-success btn-block" type="submit">AGREGAR</button> 
                    </div>
                </div>
            </div>
        </div>
      
    </div>
    <div class="row">
        
        <div class="col-sm-12 col-lg-12">
            <div class="card ">
                <div class="card-body">
            <center >
            <table  class="table table-responsive">
                <thead>
                    <tr>
                        <th>ANIMAL</th>                                         
                        <th>PESO</th>                   
                        <th>VALOR KG($)</th>                   
                        <th>SUBTOTAL ($)</th>                   
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                  @if(!empty($ids))
                  @foreach ($ids as $key => $value)
                  <tr>    
                      <td>{{ $arrayAnimales[$key] }}</td>
                      <td>${{ number_format($pesos[$key]) }}</td>                    
                      <td>${{ number_format($valores[$key]) }}</td>                    
                      <td>${{ number_format($subtotales[$key]) }}</td>                    
                      <td><button type="button" class="btn btn-danger btn-sm" wire:click.prevent="remove({{$key}})">
                      -</button>                    
                  </tr>
                  @endforeach
                  @endif
                </tbody>
      
                <tfoot>
                   <!--<th>Total</th>
                   <th><h4 id="total">$ 0.00</h4>  </th>-->               
      
                    <tr>
                      <th colspan="5"><div id="numeroLetra"></div></th>
                        <th ><p align="right">TOTAL A PAGAR:</p></th>
                        <input type="hidden" name="total_venta" id="total_venta">
                        <th><p align="right"><span align="right" id="total_pagar_html">$ {{ $total_fac }}</span> <input type="hidden" name="total_pagar" id="total_pagar"></p></th>
                    </tr>
      
                </tfoot>
               
      
                </table>
            </center>
         </div>
        </div>
        </div>      
      
       
    </div>
      
       

           
    <button class="btn btn-primary btn-block" type="submit">GUARDAR</button>
    </form>

</div>
