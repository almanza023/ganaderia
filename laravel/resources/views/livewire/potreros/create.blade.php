<div wire:ignore.self id="modalCreate" class="modal fade bd-example-modal-form" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" >
                <h5 class="modal-title" id="exampleModalform">DATOS DE POTRERO</h5>
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
                            <label for="field-1" class="control-label">Aréa</label>
                            <input type="text" wire:model.defer="area" class="form-control"  >                           
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Cercas</label>
                            <input type="text" wire:model.defer="cercas" class="form-control"  >                           
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Maleza</label>
                            <input type="text" wire:model.defer="maleza" class="form-control"  >                        
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Observaciones</label>
                            <textarea wire:model.defer="observaciones" class="form-control"    cols="2" rows="4"></textarea>
                           
                          
                        </div>
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
