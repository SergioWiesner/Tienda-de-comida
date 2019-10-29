@extends('layouts.app')
@section('content')
    <form method="POST" action="{{route('usuarios.store')}}">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre"
                   placeholder="Nombre empleado">
        </div>
        <div class="form-group">
            <label for="email">Correo</label>
            <input type="email" class="form-control" name="email" id="email"
                   placeholder="Correo">
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" name="password" id="password"
                   placeholder="Contraseña">
        </div>
        <div class="form-group">
            <label for="cedula">cedula</label>
            <input type="text" class="form-control" name="cedula" id="cedula"
                   placeholder="Cedula">
        </div>
        <div class="form-group">
            <label for="telefono">Telefono</label>
            <input type="text" class="form-control" name="telefono" id="telefono"
                   placeholder="Telefono">
        </div>
        <div class="form-group">
            <label for="salario">Salario</label>
            <input type="text" class="form-control" name="salario" id="salario"
                   placeholder="Salario">
        </div>
        <div class="form-group">
            <label for="salario">Salario</label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">$</div>
                </div>
                <input type="text" class="form-control" id="salario" name="salario" placeholder="100.000">
            </div>
        </div>
        @if(isset($franquicias))
            <div class="form-group">
                <label for="exampleFormControlSelect1">Franquicia</label>
                <select class="form-control" name="idfranquicia" id="exampleFormControlSelect1" required>
                    @for($a = 0; $a < count($franquicias); $a++)
                        <option value="{{$franquicias[$a]['id']}}">{{$franquicias[$a]['nombrefranquicia']}}</option>
                    @endfor
                </select>
            </div>
        @endif
        @if(isset($tipo))
            <div class="form-group">
                <label for="exampleFormControlSelect1">Tipo empleado</label>
                <select class="form-control" name="idtipoempleado" id="exampleFormControlSelect1" required>
                    @for($a = 0; $a < count($tipo); $a++)
                        <option value="{{$tipo[$a]['id']}}">{{$tipo[$a]['nombre']}}</option>
                    @endfor
                </select>
            </div>
        @endif
        <div class="form-group">
            <label for="fechacompra">Fecha de inicio</label>
            <input type="date" class="form-control" name="fechainicio" id="fechainicio">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Agregar">
        </div>
    </form>
@endsection
