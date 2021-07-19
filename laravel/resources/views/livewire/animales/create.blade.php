<div wire:ignore.self id="modalCreate" class="modal fade bd-example-modal-form" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" >
                <h5 class="modal-title" id="exampleModalform">DATOS DE ANIMAL</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Nombre</label>
                            <input type="text" wire:model.defer="nombre" class="form-control"  required>
                            @error('nombre') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Sexo</label>
                           <select class="form-control" wire:model.defer="sexo">
                            <option value="">Seleccione</option>
                            <option value="M">MACHO</option>
                            <option value="H">HEMBRA</option>
                            </select>                           
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Fecha Nacimiento</label>
                            <input type="date" wire:model.defer="fecha" class="form-control"  >                           
                        </div>
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
            <div class="modal-footer">
                <button type="button" wire:click="store" class="btn btn-raised btn-primary ml-2"><i class="mdi mdi-content-save-all">
                </i> GUARDAR</button>
                <button type="button" class="btn btn-raised btn-danger ml-2" data-dismiss="modal"><i class="mdi mdi-close-octagon
                    "></i> CANCELAR</button>
            </div>
        </div>
    </div>
</div>
