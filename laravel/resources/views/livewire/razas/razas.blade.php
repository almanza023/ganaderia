<div>

    @include('livewire.razas.create')
    @include('livewire.razas.bloquear')
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
    @include('livewire.razas.tabla')

</div>
