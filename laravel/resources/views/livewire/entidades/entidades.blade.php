<div>

    @include('livewire.entidades.create')
    @include('livewire.entidades.bloquear')
    @if (session()->has('message'))
    <script>
        mensaje("{{ session('message') }}");
    </script>
    @endif
    @include('livewire.entidades.tabla')

</div>
