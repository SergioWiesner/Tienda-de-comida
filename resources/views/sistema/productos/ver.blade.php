@extends('layouts.app')
@section('content')
    <h3>Producto {{$data['nombre']}}</h3>
    <form action="{{route('productos.update',  $data['idproductos'])}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre"
                   placeholder="Nombre producto" value="{{$data['nombre']}}">
        </div>
        <div class="form-group">
            <label for="precio">Precio</label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">$</div>
                </div>
                <input type="text" class="form-control" id="precio" name="precio" value="{{$data['precio']}}"
                       placeholder="100.000">
            </div>
        </div>
        @if(isset($localidad))
            <div class="form-group">
                <label for="exampleFormControlSelect1">¿Tiene localidad?</label>
                <select class="form-control" name="idlocalidad" id="exampleFormControlSelect1">
                    @for($b = 0; $b < count($localidad); $b++)
                        @if($data['idlocalidad'] == $localidad[$b]['id'])
                            <option value="{{$localidad[$b]['id']}}"
                                    selected>{{$localidad[$b]['nombrelocalidad']}}</option>
                        @else
                            <option value="{{$localidad[$b]['id']}}">{{$localidad[$b]['nombrelocalidad']}}</option>
                        @endif
                    @endfor
                </select>
            </div>
        @endif
        @if(isset($tipo))
            <div class="form-group">
                <label for="exampleFormControlSelect1">¿Tipo producto?</label>
                <select class="form-control" name="idtipoproducto" id="exampleFormControlSelect1">
                    @for($a = 0; $a < count($tipo); $a++)
                        @if($data['idtipoproducto'] == $tipo[$a]['id'])
                            <option value="{{$tipo[$a]['id']}}" selected>{{$tipo[$a]['nombre']}}</option>
                        @else
                            <option value="{{$tipo[$a]['id']}}">{{$tipo[$a]['nombre']}}</option>
                        @endif
                    @endfor
                </select>
            </div>
        @endif
        <div class="form-group">
            <label for="fechacompra">Fecha de compra</label>
            <input type="date" class="form-control" name="fechacompra" id="fechacompra"
                   value="{{$data['fechacompra']}}">
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" class="form-control" name="stock" id="stock" placeholder="100000"
                   value="{{$data['stock']}}">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Actualizar">
        </div>
    </form>

    <form id="delete-form" method="POST" action="{{route('productos.destroy',  $data['idproductos'])}}">
        @csrf
        @method('DELETE')
        <div class="form-group">
            <input type="submit" class="btn btn-danger" value="Eliminar producto">
        </div>
    </form>
@endsection
