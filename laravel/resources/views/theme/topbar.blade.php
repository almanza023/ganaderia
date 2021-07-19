<!-- Top Bar Start -->
<div class="topbar">

    <!-- LOGO -->
    <div class="topbar-left">
        <a href="{{ route('home') }}" class="logo">
            <span>
                    <img src="{{ asset('theme/assets/images/logo-sm.png') }}" alt="logo-large" class="mt-1" width="40px">
                    <h6 style="color: white"><b>GANADERIA LA MAREA</b></h6>
            </span>
        </a>
    </div>

    <!-- Navbar -->
    <nav class="navbar-custom">

        <ul class="list-unstyled topbar-nav float-right mb-0">



            <li class="hidden-sm">
                <a class="nav-link waves-effect waves-light" href="javascript:void(0);" id="btn-fullscreen">
                    <i class="mdi mdi-fullscreen nav-icon"></i>
                </a>
            </li>

            <li class="dropdown">
                <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                    aria-haspopup="false" aria-expanded="false">

                    <span class="ml-1 nav-user-name hidden-sm">
                        @if (!empty(auth()->user()->username))
                            {{ auth()->user()->username }}
                        @endif
                     <i class="mdi mdi-chevron-down"></i> </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href=""><i class="dripicons-user text-muted mr-2"></i> Perfil</a>
                    <div class="dropdown-divider"></div>
                    <form id="logout-form" action="{{route('logout')}}" method="POST">
                        @csrf
                        <button type="submit"  class="dropdown-item"  >   <i class="dripicons-exit text-muted mr-2"></i> </i> Cerrar Sesión</a>
                    </form>

                </div>
            </li>
        </ul>

        <ul class="list-unstyled topbar-nav mb-0">

            <li>
                <button class="button-menu-mobile nav-link waves-effect waves-light">
                    <i class="mdi mdi-menu nav-icon"></i>
                </button>
            </li>


        </ul>

    </nav>
    <!-- end navbar-->
</div>
<!-- Top Bar End -->
