@extends('layouts.app')
@section('content')
    <h3>Historial de ventas.</h3>
    <br><br>
    @if(count($ventas) > 0)
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Fecha venta</th>
                <th scope="col">Fecha registro</th>
                <th scope="col">Valor</th>
                <th scope="col">Puntos</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @for($a = 0; $a < count($ventas); $a++)
                <tr>
                    <th scope="row">{{$a+1}}</th>
                    <td>{{$ventas[$a]['fechaventa']}}</td>
                    <td>{{$ventas[$a]['created_at']}}</td>
                    <td>${{number_format($ventas[$a]['valortotal'])}}</td>
                    <td>{{$ventas[$a]['puntos']}}</td>
                    <td><a href="{{route('ventas.show', $ventas[$a]['idventa'])}}"><i
                                class="far fa-eye"></i></a></td>
                </tr>
            @endfor
            </tbody>
        </table>
    @else
        <h1>No hay ventas registradas</h1>
    @endif
@endsection
