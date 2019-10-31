<?php


namespace App\Modelos;

use App\clientes as clientesBD;

class clientes
{

    public function crearCliente($data)
    {
        $cliente = clientesBD::create([
            'cedula' => $data['cedula'],
            'nombre' => $data['nombre'],
            'ciudad' => $data['ciudad']
        ]);
        return $cliente->idcliente;
    }

    public function buscarClienteCedula($cedula)
    {
        return Herramientas::collectionToArray(clientesBD::where('cedula', $cedula)->get());
    }
}
