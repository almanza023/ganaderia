
<!DOCTYPE html>
<html lang="en">
    <head>
        @include('theme.estilos')
        @livewireStyles
    </head>
    <body>
        <!-- Top Bar Start -->
        @include('theme.topbar')
        <!-- Top Bar End -->

        <div class="page-wrapper">
            <!-- Left Sidenav -->
           @include('theme.sidebar')
            <!-- end left-sidenav-->

            <!-- Page Content-->
            <div class="page-content">

                <div class="container-fluid">

                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <h4 class="page-title">@yield('pagina')</h4>
                            </div>
                        </div>
                    </div>
                    @yield('content')
                    <!-- end page title end breadcrumb -->
                </div><!-- container -->
               @include('theme.footer')
            </div>
            <!-- end page content -->
        </div>
        <!-- end page-wrapper -->

        @include('theme.scripts')
        @livewireScripts
        <script type="text/javascript">

            window.livewire.on('closeModal', () => {
                $('#modalCreate').modal('hide');
                window.livewire.emit('resetInputFields');

            });

            window.livewire.on('closeModalEstado', () => {
                $('#modalEstado').modal('hide');

            });

            window.livewire.on('closeBusqueda', () => {
                $('#modalAnimales').modal('hide');

            });


            </script>
            <script type="text/javascript">
             window.livewire.on('modal', () => {
                 $('#exampleModal').modal('hide');
                 $('#detallesModal').modal('hide');
             });

             window.livewire.on('notificacion', () => {
                 $('#notificacionModal').modal('show');
             });
         </script>
         <script>
            function mensaje(valor){
             swal(
                 {
                     title: 'SINSAFE',
                     text: valor,
                     type: 'success',
                     showCancelButton: true,
                     confirmButtonClass: 'btn btn-success',
                     cancelButtonClass: 'btn btn-danger m-l-10'
                 }
             )
            }
            function advertencia(valor){
             swal(
                 {
                     title: 'SINSAFE',
                     text: valor,
                     type: 'warning',
                     showCancelButton: true,
                     confirmButtonClass: 'btn btn-success',
                     cancelButtonClass: 'btn btn-danger m-l-10'
                 }
             )
            }
            function error(valor){
                swal(
                    {
                        title: 'SINSAFE',
                        text: valor,
                        type: 'error',
                        showCancelButton: true,
                        confirmButtonClass: 'btn btn-success',
                        cancelButtonClass: 'btn btn-danger m-l-10'
                    }
                )
               }

         </script>

    </body>
</html>
