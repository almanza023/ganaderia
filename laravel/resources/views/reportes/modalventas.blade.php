<div wire:ignore.self id="modalVentas" class="modal fade bd-example-modal-form" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" >
                <h5 class="modal-title" id="exampleModalform">DATOS DE VENTA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div>
                <div class="modal-body">
                    <form action="{{ route('reporte-ventas') }}" method="POST" target="_blanck">
                        @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Fecha Inicial</label>
                                <input type="date" name="fechaInicial" class="form-control"  >
                                @error('fechaInicial') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Fecha Final</label>
                                <input type="date" name="fechaFinal" class="form-control" >
                                @error('fechaFinal') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>                    
                </div>
                <div class="modal-footer">
                    <button type="submit" wire:click="consultar" class="btn btn-raised btn-primary ml-2"><i class="mdi mdi-content-save-all">
                    </i> CONSULTAR</button>
                    <button type="button" class="btn btn-raised btn-danger ml-2" data-dismiss="modal"><i class="mdi mdi-close-octagon
                        "></i> CANCELAR</button>
                </div>
            </form>
            </div>

        </div>
    </div>
</div>
