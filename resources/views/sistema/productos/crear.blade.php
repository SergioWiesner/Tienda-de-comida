@extends('layouts.app')
@section('content')
    <h3>Formulario creación de productos</h3>
    <form action="{{route('productos.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre"
                   placeholder="Nombre producto" required>
        </div>
        <div class="form-group">
            <label for="precio">Precio</label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">$</div>
                </div>
                <input type="text" class="form-control" id="precio" name="precio" placeholder="100.000" required>
            </div>
        </div>
        @if(isset($localidad))
            <div class="form-group">
                <label for="exampleFormControlSelect1">¿Tiene localidad?</label>
                <select class="form-control" name="idlocalidad" id="exampleFormControlSelect1" required>
                    @for($b = 0; $b < count($localidad); $b++)
                        <option value="{{$localidad[$b]['id']}}">{{$localidad[$b]['nombrelocalidad']}}</option>
                    @endfor
                </select>
            </div>
        @endif
        @if(isset($tipo))
            <div class="form-group">
                <label for="exampleFormControlSelect1">Tipo producto</label>
                <select class="form-control" name="idtipoproducto" required>
                    @for($d = 0; $d < count($tipo); $d++)
                        <option value="{{$tipo[$d]['id']}}">{{$tipo[$d]['nombre']}}</option>
                    @endfor
                </select>
            </div>
        @endif
        @if(isset($proveedores))
            <div class="form-group">
                <label for="exampleFormControlSelect1">Proveedor</label>
                <select class="form-control" name="idproveedor" required>
                    @for($c = 0; $c < count($proveedores); $c++)
                        <option value="{{$proveedores[$c]['id']}}">{{$proveedores[$c]['nombreproveedor']}}</option>
                    @endfor
                </select>
            </div>
        @endif
        <div class="form-group">
            <label for="fechacompra">Fecha de compra</label>
            <input type="date" class="form-control" name="fechacompra" id="fechacompra" required>
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="text" class="form-control" name="stock" id="stock" placeholder="100000" required>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Agregar">
        </div>
    </form>
@endsection
