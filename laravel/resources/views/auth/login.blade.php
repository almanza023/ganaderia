
<!DOCTYPE html>
<html>
    <head>
        @include('theme.estilos')
        <title>INICIO DE SESIÓN</title>
    </head>
    <body class="bg-white">
        <!-- Log In page -->
        <div class="row">
            <div class="col-lg-4 p-0 h-100vh d-flex justify-content-center">
               
            </div>
            <div class="col-lg-4 pr-0">
                <div class="card mb-0 shadow-none">
                    <div class="card-body">
    
                        <h3 class="text-center m-0">
                           <center>
                            <a href="{{ route('login') }}" class="logo logo-admin">
                                <img src="{{ asset('theme/assets/images/logo-sm.png') }}" height="150" width="150" alt="logo" class="my-3">
                            </a>
                           </center>
                        </h3>
    
                        <div class="px-3">
                            <h4 class="text-muted font-18 mb-2 text-center">BIENVENIDO</h4>
                            <p class="text-muted text-center">INICIO DE SESION</p>    
                            <form class="form-horizontal my-4" action="{{ route('login') }}" method="POST">
                                @csrf
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                                <div class="form-group">
                                    <label for="username">Usuario</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="far fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="usuario" placeholder="Usuario">
                                    </div>                                    
                                </div>
    
                                <div class="form-group">
                                    <label for="userpassword">Contraseña</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2"><i class="fa fa-key"></i></span>
                                        </div>
                                        <input class="form-control" type="password"  name="password" placeholder="Contraseña">

                                    </div>                                
                                </div>
    
                               
    
                                <div class="form-group mb-0 row">
                                    <div class="col-12 mt-2">
                                        <button class="btn btn-success btn-block waves-effect waves-light" type="submit">Ingresar <i class="fas fa-sign-in-alt ml-1"></i></button>
                                    </div>
                                </div>                            
                            </form>
                        </div>                      
                       
                    </div>
                </div>
            </div>
            <div class="col-lg-4 p-0 h-100vh d-flex justify-content-center">
               
            </div>
           
        </div>
        <!-- End Log In page -->
    </body>
    @include('theme.scripts')
</html>



