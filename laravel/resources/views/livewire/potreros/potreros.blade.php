<div>

    @include('livewire.potreros.create')
    @include('livewire.potreros.bloquear')
    @if (session()->has('message'))
    <script>
        mensaje("{{ session('message') }}");
    </script>
    @endif
    @include('livewire.potreros.tabla')

</div>
