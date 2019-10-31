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
        $client = Herramientas::collectionToArray(clientesBD::where('cedula', $cedula)->get());
        if (count($client) > 0) {
            return $client[0];
        } else {
            return [];
        }
    }
}
