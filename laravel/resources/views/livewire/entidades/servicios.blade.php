<div>

    @include('livewire.servicios.create')
    @include('livewire.servicios.bloquear')
    @if (session()->has('message'))
    <script>
        mensaje("{{ session('message') }}");
    </script>
    @endif
    @include('livewire.servicios.tabla')

</div>
