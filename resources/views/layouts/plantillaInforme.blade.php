<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Informe de ventas</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
<h1 style="text-align: center;">INFORME DE VENTAS {{ config('app.name', 'Unimonito') }}.</h1>
<h5>Informe generado por: {{ Auth::user()->nombre }}</h5>
<h6>Cantidad de ventas: {{count($ventas)}}</h6>
<br>
@if(count($ventas) > 0)
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Fecha</th>
            <th scope="col">Valor</th>
            <th scope="col">Puntos</th>
            <th scope="col">Cliente</th>
            <th scope="col">Empleado</th>
            <th scope="col">Items</th>
        </tr>
        </thead>
        <tbody>
        @for($a = 0; $a < count($ventas); $a++)
            <tr>
                <td><p>{{$ventas[$a]['fechaventa']}}</p></td>
                <td><p>${{number_format($ventas[$a]['valortotal'])}}</p></td>
                <td><p>{{number_format($ventas[$a]['puntos'])}}</p></td>
                <td><p>{{$ventas[$a]['clientes']['nombre']}}</p></td>
                <td><p>{{$ventas[$a]['empleado']['nombre']}}</p></td>
                <td>
                    <ul>
                        @for($b = 0; $b < count($ventas[$a]['detallesventas']); $b++)
                            <li><p>{{$ventas[$a]['detallesventas'][$b]['producto']['nombre']}}
                                    - {{$ventas[$a]['detallesventas'][$b]['cantidad']}}</p></li>
                        @endfor
                    </ul>
                </td>
            </tr>
        @endfor
        </tbody>
    </table>
@else
    <h1>No hay ventas registradas</h1>
@endif
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
