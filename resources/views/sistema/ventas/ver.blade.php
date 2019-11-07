@extends('layouts.app')
@section('content')
    <div class="recibo">
        <div class="row">
            <div class="col-md-12 text-center"><h1>RECIBO DE COMPRA</h1><br><br></div>
            <div class="col-md-4"><h2>UNIMONITO</h2>{{$venta['clientes']['ciudad']}}</div>
            <div class="col-md-4"></div>
            <div class="col-md-4"><h5>Fecha venta: </h5>{{$venta['fechaventa']}}</div>
            <div class="col-md-4"><h5>Atendido por:</h5> {{$venta['empleado']['nombre']}}
                <br> {{$venta['empleado']['email']}}</div>
            <div class="col-md-4"></div>
            <div class="col-md-4"><h5>Datos cliente</h5><br> <strong>Nombre:</strong> {{$venta['clientes']['nombre']}}
                <br>
                <strong>Cedula:</strong> {{$venta['clientes']['cedula']}}</div>
            <div class="col-md-6"></div>
        </div>
        <br>
        @if(count($venta) > 0)
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre producto</th>
                    <th scope="col">Cantidad</th>productos
                    <th scope="col">Subtotal</th>
                </tr>
                </thead>
                <tbody>
                @for($a = 0; $a < count($venta['detallesventas']); $a++)
                    <tr>
                        <th scope="row">{{$a+1}}</th>
                        <td>{{$venta['detallesventas'][$a]['producto']['nombre']}}</td>
                        <td>{{number_format($venta['detallesventas'][$a]['cantidad'])}}</td>
                        <td>${{number_format($venta['detallesventas'][$a]['valor'])}}</td>
                    </tr>
                @endfor
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td><h3>TOTAL A PAGAR</h3></td>
                    <td>${{number_format($venta['valortotal'])}}</td>
                </tr>
                </tbody>
            </table>
        @endif
    </div>
@endsection
