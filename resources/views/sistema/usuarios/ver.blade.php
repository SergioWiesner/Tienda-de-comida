@extends('layouts.app')
@section('content')
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Correo</th>
            <th scope="col">Telefono</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @for($a = 0; $a < count($usuarios); $a++)
            <tr>
                <th scope="row">{{$a+1}}</th>
                <td>{{$usuarios[$a]['nombre']}}</td>
                <td>{{$usuarios[$a]['email']}}</td>
                <td>{{$usuarios[$a]['telefono']}}</td>
                <td>{{$usuarios[$a]['telefono']}}</td>
                <td><a href="{{route('usuarios.show', $usuarios[$a]['id'])}}"><i
                            class="far fa-eye"></i></a></td>
            </tr>
        @endfor
        </tbody>
    </table>
@endsection
