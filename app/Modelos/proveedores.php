<?php


namespace App\Modelos;

use App\proveedores as proveedoresbd;

class proveedores
{

    public static function listarProveedores()
    {
        return Herramientas::collectionToArray(proveedoresbd::all());
    }

    public function agregarProveedores($data)
    {
        return proveedoresbd::create([
            'nombreproveedor' => $data['nombreproveedor']
        ]);
    }

    public function actualizarProveedor($data, $id)
    {
        return proveedoresbd::where('id', $id)->create([
            'nombreproveedor' => $data['nombreproveedor']
        ]);
    }

    public function eliminarProveedor($id)
    {
        return proveedoresbd::where('id', $id)->delete();
    }

    public function buscarProveedor($id)
    {
        return Herramientas::collectionToArray(proveedoresbd::where('id', $id));
    }

}
