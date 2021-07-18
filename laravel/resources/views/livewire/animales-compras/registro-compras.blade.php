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
    <div class="row">
        <div class="col-12">
            <form wire:submit.prevent="store">
            <div class="card ">
                <div class="card-body">    
                    <h5 class="mt-0">Datos del Animal</h5>
                    <p class="text-muted font-13 mb-4">Ingrese aqui los datos del animal y la compra</code>.
                    </p>
                   
                    <div class="row">
                        <div class="col-sm-12 col-lg-4">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-4 col-form-label">Nombre</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" required  wire:model="nombre" placeholder="Nombre">
                                </div>
                            </div>                           
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Etapa de Vida</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text"  wire:model.defer="etapa" placeholder="Etapa">
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" wire:model="etapaSel">
                                            <option value=""></option>
                                            @foreach ($etapas as $item)
                                                <option value="{{ $item->nombre }}">{{ $item->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>           
                            
                                                 
                        </div>  
                        <div class="col-sm-12 col-lg-4">
                            
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Sexo</label>
                                <div class="col-sm-8">
                                    <select required wire:model.defer="sexo" class="custom-select">
                                        <option value="">Seleccione</option>
                                        <option value="M">Macho</option>
                                        <option value="H">Hembra</option>                                       
                                    </select>
                                </div>
                            </div>                

                               
                            
                        </div> 
                        <div class="col-sm-12 col-lg-4">
                            <div class="form-group row">
                                <label for="example-month-input" class="col-sm-4 col-form-label">Fecha Nacimiento</label>
                                <div class="col-sm-8">
                                    <input  wire:model.defer="fechanacimiento" class="form-control" type="date" >
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
                    <h5 class="mt-0">Datos de Compra</h5>                   
                    <div class="row">
                        <div class="col-sm-12 col-lg-4">
                            <div class="form-group row">
                                <label for="example-month-input" class="col-sm-4 col-form-label">Fecha Compra</label>
                                <div class="col-sm-8">
                                    <input required wire:model.defer="fechaCompra" class="form-control" type="date" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-4 col-form-label">Total</label>
                                <div class="col-sm-8">
                                    <input required wire:model="total" class="form-control" type="number" value="" placeholder="Total" min="0">
                                </div>
                            </div>
                           
                           
                               
                              
                            
                                                 
                        </div>  
                        <div class="col-sm-12 col-lg-4">
                            
                            
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Valor (Kg)</label>
                                    <div class="col-sm-8">
                                        <input required wire:model="valor" class="form-control" type="number" value=""  >
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Vendedor</label>
                                    <div class="col-sm-8">
                                        <input wire:model.defer="vendedor" class="form-control" type="text" value=""  placeholder="Vendedor">
                                    </div>
                                </div>                               
                            
                        </div> 
                        <div class="col-sm-12 col-lg-4">                            
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-4 col-form-label">Peso Kg</label>
                                <div class="col-sm-8">
                                    <input wire:model="peso" class="form-control" type="text"   placeholder="Peso Kg">
                                </div>
                            </div>                            
                        </div>   
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-primary btn-block" type="submit">GUARDAR</button>
    </form>
    </div>
</div>
