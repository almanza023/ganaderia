@extends('theme.main')
@section('titulo')
    INICIO
@endsection

@section('content')
<div class="row">
    <div class="col-sm-6 col-xl-3">
        <div class="card card-content">
            <div class="card-body row justify-content-center">
                <div class="col-5 align-self-center">
                    <img src="{{ asset('theme/assets/images/customer.png') }}" alt="">
                    <h4 class="mt-0 mb-2 font-20">{{ $animales }}</h4>
                    <p class="mb-2 text-muted font-13 text-nowrap">Animales</p>

                </div>

            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card card-content">
            <div class="card-body row justify-content-center">
                <div class="col-5 align-self-center">
                    <img src="{{ asset('theme/assets/images/activos.png') }}" alt="">
                    <h4 class="mt-0 mb-2 font-20">{{ $ventas }}</h4>
                    <p class="mb-2 text-muted font-13 text-nowrap">Ventas</p>

                </div>

            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card card-content">
            <div class="card-body row justify-content-center">
                <div class="col-5 align-self-center">
                    <img src="{{ asset('theme/assets/images/alquiler.png') }}" alt="">

                    <h4 class="mt-0 mb-2 font-20">${{ number_format($totalCompras, 0) }}</h4>
                    <p class="mb-2 text-muted font-13 text-nowrap">Total Ventas</p>

                </div>
            </div>
        </div>
    </div>    

</div>
@endsection
