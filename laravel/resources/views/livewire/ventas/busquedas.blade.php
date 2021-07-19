<div>

   
    @if (session()->has('message'))
    <script>
        mensaje("{{ session('message') }}");
    </script>
    @endif
    @include('livewire.ventas.tabla')

</div>
