@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <h1>Crear venta</h1>
                    <hr>
                    <form action="{{route('ventas.store')}}" method="post" onKeypress="if(event.keyCode == 13) event.returnValue = false;">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-12">
                                <h3>Cliente</h3>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <input type="hidden" name="idcliente" id="idlciente">
                                <input type="text" class="form-control" id="clientescedula" name="clientes[cedula]" placeholder="cedula">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="clientesnombre" name="clientes[nombre]"
                                       placeholder="nombre">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="clientesciudad" name="clientes[ciudad]"
                                       placeholder="ciudad">
                            </div>
                        </div>
                        <br><br>
                        <div class="form-row">
                            <div class="col-md-12">
                                <h3>Productos</h3>
                            </div>
                        </div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Proveedor</th>
                                <th scope="col">Precio U</th>
                                <th scope="col">Subtotal</th>
                            </tr>
                            </thead>
                            <tbody id="cuerpoproductos">

                            </tbody>
                            <tr>
                                <th colspan="4"><h3>Total</h3></th>
                                <th><p id="valortotal"></p><input type="hidden" name="valortotal" id="valortotalinput">
                                </th>
                            </tr>
                        </table>
                        <input type="submit" value="Generar venta" class="btn btn-primary btn-block">
                    </form>
                    <br>
                    <div class="row">
                        <div class="col-md-8">
                            <select class="form-control" id="productosid">
                                <option></option>
                                @if(count($productos) > 0)
                                    @for($a = 0; $a < count($productos); $a++)
                                        <option
                                            value="{{$productos[$a]['idproductos']}}">{{$productos[$a]['nombre']}}</option>
                                    @endfor
                                @endif
                            </select>
                        </div>
                        <div class="col-md-4">
                            <button onClick="agregarproducto()" class="btn btn-primary btn-block">Agregar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let lista = []
        let pedido = [];
        let producto = [];
        let calc = function calculo() {
            let sumatoria = 0;
            let position = 0;
            let flag = false;
            let lugar = this.getAttribute('item');
            let precio = this.getAttribute('precio');
            let cantidadl = this.getAttribute('cantmax');
            if (parseInt(this.value) <= cantidadl) {
                let subtotal = precio * this.value;
                document.getElementById('total' + lugar).innerText = '$' + new Intl.NumberFormat("COP-CO").format(subtotal);
                if (pedido.length > 0) {
                    for (let b = 0; b < pedido.length; b++) {
                        if (pedido[b]['id'] == lugar) {
                            flag = true;
                            position = b;
                        }
                    }
                    if (flag == true) {
                        pedido[position]['subtotal'] = subtotal
                    } else {
                        pedido.push({'id': lugar, 'subtotal': subtotal});
                    }
                } else {
                    pedido.push({'id': lugar, 'subtotal': subtotal});
                }
            } else {
                document.getElementById('total' + lugar).innerText = 'Fuera de stock';
            }
            for (let c = 0; c < pedido.length; c++) {
                sumatoria += pedido[c]['subtotal'];
            }
            document.getElementById('valortotal').innerText = "$" + new Intl.NumberFormat("COP-CO").format(sumatoria);
            document.getElementById('valortotalinput').value = sumatoria;

        }

        function agregarproducto() {
            let flag = false;
            let id = document.getElementById("productosid").value;

            if (lista.length > 0) {
                for (let b = 0; b < lista.length; b++) {
                    if (lista[b] == id) {
                        flag = true;
                    }
                }
            }
            if (flag != true) {
                lista.push(id);
                fetch('/api/productosApi/' + id).then(res => res.json())
                    .catch(error => console.error('Error:', error))
                    .then(response => {
                        elChild = document.createElement('tr');
                        elChild.innerHTML = '<th scope="row"> <input type="hidden" name="producto[id][]" value="' + response['idproductos'] + '"><input type="hidden" name="producto[nombre][]" value="' + response['nombre'] + '"><input type="hidden" name="producto[stock][]" value="' + response['stock'] + '"><input type="hidden" name="producto[valorunidad][]" value="' + response['precio'] + '">' + response['nombre'] + '</th><td><input type="text" name="producto[cantidad][]" id="id' + response['idproductos'] + '" item="' + response['idproductos'] + '"  precio="' + response['precio'] + '" cantmax="' + response['stock'] + '" placeholder="' + response['stock'] + '" required></td><td> <h5>NO ESPECIFICADO</h5> </td><td>$' + new Intl.NumberFormat("COP-CO").format(response['precio']) + '</td><td><p id="total' + response['idproductos'] + '"></p></td>'
                        document.getElementById('cuerpoproductos').appendChild(elChild);
                        document.getElementById('id' + response['idproductos']).addEventListener('keyup', calc);
                    });
            }
        }

    </script>
@endsection
