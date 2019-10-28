@extends('layouts.app')
@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre"
                   placeholder="Nombre producto">
        </div>
        <div class="form-group">
            <label for="precio">Precio</label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">$</div>
                </div>
                <input type="text" class="form-control" id="precio" name="precio" placeholder="100.000">
            </div>
        </div>
        @if(isset($franquicias))
            <div class="form-group">
                <label for="exampleFormControlSelect1">¿Tipo producto?</label>
                <select class="form-control" name="idtipoproducto" id="exampleFormControlSelect1">
                    @for($a = 0; $a < count($franquicias); $a++)
                        <option value="{{$franquicias[$a]['id']}}">{{$franquicias[$a]['nombrefranquicia']}}</option>
                    @endfor
                </select>
            </div>
        @endif

    </form>
@endsection
