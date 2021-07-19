<div>

   
    @if (session()->has('message'))
    <script>
        mensaje("{{ session('message') }}");
    </script>
    @endif
    @include('livewire.animales-compras.tabla')
    @include('livewire.animales-compras.bloquear')

</div>
