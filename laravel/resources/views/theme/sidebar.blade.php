<div class="left-sidenav">
    <ul class="metismenu left-sidenav-menu" id="side-nav">

        <li class="menu-title">opciones</li>
        <li>
            <a href="{{ route('home') }}">
                <i class="mdi mdi-calendar"></i><span>Inicio</span>
            </a>
        </li>




        <li>
            <a href="{{ route('razas') }}">
                <i class="mdi mdi-calendar"></i><span>Razas</span>
            </a>
        </li>
        <li>
            <a href="{{ route('potreros') }}">
                <i class="mdi mdi-calendar"></i><span>Potreros</span>
            </a>
        </li>
        <li>
            <a href="{{ route('compras') }}">
                <i class="mdi mdi-calendar"></i><span>Compras</span>
            </a>
        </li>
        <li>
            <a href="{{ route('ventas') }}">
                <i class="mdi mdi-calendar"></i><span>Ventas</span>
            </a>
        </li>




        <li>
            <form id="logout-form" action="{{route('logout')}}" method="POST">
                @csrf
                <button type="submit"  class="dropdown-item"  >   <i class="dripicons-exit text-muted mr-2"></i> </i> Cerrar Sesión</a>
            </form>
        </li>













    </ul>
</div>
