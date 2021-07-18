<div style="position:relative">
    <input wire:model.debounce.500ms="inputsearchsupplier" class="form-control relative" type="text" placeholder="Buscar..."/>
    </div>
    <div style="position:absolute; z-index:100">
     @if(strlen($inputsearchsupplier)>=2)
       @if(count($searchsuppliers)>0)
        <ul class="list-group">
          @foreach($searchsuppliers as $searchsupplier)
          <li class="list-group-item list-group-item-action"><span wire:click="selectsupplier({{$searchsupplier}} )">{{$searchsupplier->nombre}} </span></li>
          @endforeach
        </ul>
       @else
        <li class="list-group-item">No se encuentran resultados...</li>
       @endif
     @endif
    </div>
   
