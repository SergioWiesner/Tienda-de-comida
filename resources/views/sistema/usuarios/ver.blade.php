@extends('layouts.app')
@section('content')
    <h3>Usuario {{$usuario['nombre']}}</h3>
    <form method="POST" action="{{route('usuarios.update',  $usuario['id'])}}">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre"
                   placeholder="Nombre empleado" value="{{$usuario['nombre']}}">
        </div>
        <div class="form-group">
            <label for="email">Correo</label>
            <input type="email" class="form-control" name="email" id="email"
                   placeholder="Correo" value="{{$usuario['email']}}">
        </div>
        <div class="form-group">
            <label for="cedula">Cedula</label>
            <input type="text" class="form-control" name="cedula" id="cedula"
                   placeholder="Cedula" value="{{$usuario['cedula']}}">
        </div>
        <div class="form-group">
            <label for="telefono">Telefono</label>
            <input type="text" class="form-control" name="telefono" id="telefono"
                   placeholder="Telefono" value="{{$usuario['telefono']}}">
        </div>
        <div class="form-group">
            <label for="salario">Salario</label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">$</div>
                </div>
                <input type="text" class="form-control" id="salario" name="salario" placeholder="100.000"
                       value="{{number_format($usuario['salario'])}}">
            </div>
        </div>
        @if(isset($franquicias))
            <div class="form-group">
                <label for="exampleFormControlSelect1">Franquicia</label>
                <select class="form-control" name="idfranquicia" id="exampleFormControlSelect1" required>
                    @for($a = 0; $a < count($franquicias); $a++)
                        @if($franquicias[$a]['id'] == $usuario['idfranquicia'])
                            <option value="{{$franquicias[$a]['id']}}"
                                    selected>{{$franquicias[$a]['nombrefranquicia']}}</option>
                        @else
                            <option value="{{$franquicias[$a]['id']}}">{{$franquicias[$a]['nombrefranquicia']}}</option>
                        @endif
                    @endfor
                </select>
            </div>
        @endif
        @if(isset($tipo))
            <div class="form-group">
                <label for="exampleFormControlSelect1">Tipo empleado</label>
                <select class="form-control" name="idtipoempleado" id="exampleFormControlSelect1" required>
                    @for($a = 0; $a < count($tipo); $a++)
                        @if($tipo[$a]['id'] == $usuario['idtipoempleado'])
                            <option value="{{$tipo[$a]['id']}}" selected>{{$tipo[$a]['nombre']}}</option>
                        @else
                            <option value="{{$tipo[$a]['id']}}">{{$tipo[$a]['nombre']}}</option>
                        @endif
                    @endfor
                </select>
            </div>
        @endif
        <div class="form-group">
            <label for="fechacompra">Fecha de inicio</label>
            <input type="date" class="form-control" name="fechainicio" id="fechainicio"
                   value="{{$usuario['fechainicio']}}">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Actualizar">
        </div>
        <form id="delete-form" method="POST" action="{{route('usuarios.destroy',  $usuario['id'])}}">
            @csrf
            @method('DELETE')
            <div class="form-group">
                <input type="submit" class="btn btn-danger" value="Eliminar usuario">
            </div>
        </form>
    </form>
@endsection
