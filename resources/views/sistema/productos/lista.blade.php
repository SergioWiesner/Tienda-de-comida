@extends('layouts.app')
@section('content')
    <h3>Lista de productos existentes</h3>
    @if(count($productos) > 0)
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Precio</th>
                <th scope="col">Fecha de compra</th>
                <th scope="col">Stock</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @for($item = 0; $item < count($productos); $item++)
                <tr>
                    <th scope="row">{{$item+1}}</th>
                    <td>{{$productos[$item]['nombre']}}</td>
                    <td>${{number_format($productos[$item]['precio'])}}</td>
                    <td>{{$productos[$item]['fechacompra']}}</td>
                    @if(!is_null($productos[$item]['stock']))
                        <td>{{number_format($productos[$item]['stock'])}}</td>
                    @else
                        <td>Ilimitado</td>
                    @endif
                    <td><a href="{{route('productos.show', $productos[$item]['idproductos'])}}"><i
                                class="far fa-eye"></i></a></td>
                </tr>
            @endfor
            </tbody>
        </table>
    @else
        <h1>NO HAY PRODUCTOS REGISTRADOS</h1>
        <a href="{{route('productos.create')}}" class="btn btn-success "> Registra un producto ya</a>
    @endif
@endsection
