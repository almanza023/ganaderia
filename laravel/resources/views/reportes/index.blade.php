@extends('theme.main')
@section('titulo')
    REPORTES
@endsection

@include('reportes.modalinventario')
@include('reportes.modalventas')
@include('reportes.modalUtilidades')
@section('content')
<div class="row">    
    
    <div class="col-sm-6 col-xl-4">
        <div class="card card-content">
            <div class="card-body row justify-content-center">
                <div class="col-5 align-self-center">
                    <img src="{{ asset('theme/assets/images/inventario.png') }}" alt="">
                    <h4 class="mt-0 mb-2 font-20"></h4>
                    <p class="mb-2 text-muted font-13 text-nowrap">Inventario</p>
                    <button data-toggle="modal" data-animation="bounce"  data-target="#modalInventarios"  class="btn btn-outline-success btn-sm">
                        Inventario</button>

                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-4">
        <div class="card card-content">
            <div class="card-body row justify-content-center">
                <div class="col-5 align-self-center">
                    <img src="{{ asset('theme/assets/images/ventas.png') }}" alt="">
                    <h4 class="mt-0 mb-2 font-20"></h4>
                    <p class="mb-2 text-muted font-13 text-nowrap">Reporte de Ventas</p>
                    <button data-toggle="modal" data-animation="bounce"  data-target="#modalVentas"  class="btn btn-outline-warning btn-sm">
                       Ventas</button>

                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-4">
        <div class="card card-content">
            <div class="card-body row justify-content-center">
                <div class="col-5 align-self-center">
                    <img src="{{ asset('theme/assets/images/utilidad.png') }}" alt="">
                    <h4 class="mt-0 mb-2 font-20"></h4>
                    <p class="mb-2 text-muted font-13 text-nowrap">Utilidades</p>
                    <button data-toggle="modal" data-animation="bounce"  data-target="#modalUtilidades"  class="btn btn-outline-info btn-sm">
                       Utilidades</button>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection
