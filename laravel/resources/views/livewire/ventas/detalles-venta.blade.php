<div>   
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
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <form action="">
                        <div class="input-group">
                            <label for="">Código Venta </label>
                            <input type="search" class="form-control rounded" placeholder="Código Venta" 
                             wire:model.defer="codigo" />
                            <button type="button" class="btn btn-outline-primary" wire:click.prevent="consultar()">Buscar</button>
                          </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="mt-0">DETALLES DE VENTA</h5><br>                   
                   @if (!empty($venta))
                   <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th scope="row">CLIENTE</th>
                                <td>{{ $venta->comprador }}</td>                                   
                            </tr>
                            <tr>
                                <th scope="row">FECHA</th>                                   
                                <td><span class="badge badge-boxed  badge-success">{{ $venta->fecha }}</span></td>
                            </tr>
                            <tr>
                                <th scope="row">ESTADO</th>                                   
                                <td>
                                    @if ($venta->estado==1)
                                    <span class="badge badge-boxed  badge-success">ACTIVA</span>
                                    @else 
                                    <span class="badge badge-boxed  badge-danger">ANULADA</span>
                                    @endif
                                </td>
                            </tr>
                        </thead>
                    </table>
                    <br>
                    @if ($venta->estado==1)
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th> Animal</th>
                                <th>Peso Venta  KG</th>
                                <th>Valor KG Venta</th>
                                <th>Total</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                            <tbody>
                                @foreach ($detalles as $item)
                                @if ($seleccion==$item->id)
                                <tr class="bg-danger">
                                    <th scope="row">1</th>
                                    <td>{{ $item->animal->nombre }}</td>
                                    <td>{{ $item->peso }}</td>
                                    <td>{{ number_format($item->valorkg,0) }}</td>
                                    <td>{{ number_format($item->valor,0) }}</td>                                
                                    <td>
                                        <button type="button" class="btn btn-success btn-sm" wire:click.prevent="eliminar({{ $item->id }})"> Agregar</button></td>
                                </tr> 
                                @else
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->animal->nombre }}</td>
                                    <td>{{ $item->peso }}</td>
                                    <td>{{ number_format($item->valorkg,0) }}</td>
                                    <td>{{ number_format($item->valor,0) }}</td>                              
                                    <td><button type="button" class="btn btn-danger btn-sm" wire:click.prevent="eliminar({{ $item->id }})"> Eliminar</button></td>
                                </tr> 
                                @endif
                                @endforeach
                               @if ($venta->estado==1)
                               <tr>
                                <td scope="row" colspan="5">TOTAL</td>
                                <td>${{ number_format($total, 0) }}</td>
                                 </tr>
                               @endif
                                <tr>
                                    <td scope="row" colspan="4">
                                        <button type="button" class="btn btn-danger btn-sm" wire:click.prevent="anular({{ $venta->id }})"> 
                                    Anular Venta
                                </button>
                                </td>
    
                                    
                                </tr>
                            
                            </tbody>
    
                        </table> 
                    @endif
                </div>        
                   @endif                               
                </div>
            </div>
        </div> <!-- end col -->
 
</div>
