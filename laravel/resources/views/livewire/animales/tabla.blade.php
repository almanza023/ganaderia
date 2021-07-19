
  <div class="row m-t-30">
    <div class="col-md-12 col-lg-12 col-xl-12">
        <div class="card m-b-30">
            <div class="card-body">
                <h4 class="mt-0 header-title"> ANIMALES</h4><br>
                <br>
                    <div class="w-full flex pb-10">
                        <div class="w-3/6 mx-1">
                            <input wire:model.debounce.300ms="search" type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"placeholder="Buscar">
                        </div>
                        <div class="w-1/6 relative mx-1">
                            <select wire:model="orderBy" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                <option value="id">ID</option>
                                <option value="nombre">NOMBRE</option>
                                <option value="fecha">FECHA</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                        <div class="w-1/6 relative mx-1">
                            <select wire:model="orderAsc" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                <option value="1">Ascendente</option>
                                <option value="0">Descendete</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                        <div class="w-1/6 relative mx-1">
                            <select wire:model="perPage" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                <option>15</option>
                                <option>25</option>
                                <option>50</option>
                                <option>100</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                    </div>
                    <table class="table mb-0" id="datatable2">
                        <thead>
                            <tr>
                                <th>NOMBRE</th>
                                <th>SEXO</th>
                                <th>FECHA NACIMIENTO</th>
                                <th>ETAPA</th>
                                <th>ESTADO</th>                                
                                <th>ACIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $item)
                            <tr>
                                <td>{{ $item->nombre }}</td>
                                <td>{{ $item->sexo }}</td>
                                <td>{{ $item->fechaNacimiento }}</td>
                                <td>{{ $item->etapa }}</td>                          
                                <td>
                                    @if($item->estado==1)
                                    <span class="badge badge-boxed  badge-success">DISPONIBLE</span>
                                    @else
                                    <span class="badge badge-boxed  badge-danger">VENDIDO</span>
                                    @endif
                                </td>
                                @if($item->estado==1)
                                <td>
                                    <button data-toggle="modal" data-target="#modalCreate" wire:click="edit({{ $item->id }})" class="btn btn-outline-info btn-sm"><i class="typcn typcn-edit"></i></button>
                                </td>
                                @endif
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="4"><center>No Existen datos</center></td>
                                </tr>
                            @endforelse
                        </tbody>
                        </tbody>
                    </table>
                    {!! $data->links() !!}

            </div>
        </div>
    </div>
</div>
