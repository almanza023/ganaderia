
                                        <div wire:ignore.self id="modalAnimales" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title align-self-center mt-0" id="myModalLabel">BUSQUEDA</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body">                                                    
                                                    <h4>CONSULTAR ANIMALES</h4>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="Buscar" wire:model="buscar">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                           <div class="table-responsive">
                                                            <table class="table table-hover">   
                                                                <thead>
                                                                    <tr>
                                                                        <th>CODIGO</th>
                                                                        <th>NOMBRE</th>
                                                                        <th>HIERRO</th>
                                                                        <th>PESO</th>                                                                       
                                                                        <th></th>
                                                                    </tr>
                                                                    <tbody>
                                                                        @forelse ($animales as $item)
                                                                        @php
                                                                         $valor=$item->id.'-'.$item->nombre; @endphp
                                                                           <tr>
                                                                               <td>{{ $item->codigo }}</td>
                                                                               <td>{{ $item->nombre }}</td>
                                                                               <td>{{ $item->hierro }}</td>
                                                                               <td>{{ $item->peso }}</td>                                                                              
                                                                               <td>
                                                                                   <button type="button" class="btn btn-success" wire:click.prevent="seleccionar({{ $loop->iteration-1 }})">Seleccionar</button>
                                                                               </td>
                                                                            
                                                                        </tr> 
                                                                        @empty
                                                                            <th colspan="5"><center>NO EXISTEN DATOS</center></th>
                                                                        @endforelse
                                                                    </tbody>
                                                                </thead>
                                                            </table>
                                                           </div>
                                                        </div>
                                                    </div>  
                                                                                           
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cerrar</button>
                                                    
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->