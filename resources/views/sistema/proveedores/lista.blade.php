@extends('layouts.app')
@section('content')
    <h3>Lista de proveedores activos.</h3>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl">Crear
        proveedor
    </button>
    <br><br>
    @if(count($proveedores) > 0)
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Creado</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @for($a = 0; $a < count($proveedores); $a++)
                <tr>
                    <th scope="row">{{$a+1}}</th>
                    <td>{{$proveedores[$a]['nombreproveedor']}}</td>
                    <td>{{$proveedores[$a]['created_at']}}</td>
                    <td><a href="{{route('proveedores.show', $proveedores[$a]['id'])}}"><i
                                class="far fa-eye"></i></a></td>
                </tr>
            @endfor
            </tbody>
        </table>
    @else
        <h1>No existen proveedores</h1>
    @endif
@endsection
