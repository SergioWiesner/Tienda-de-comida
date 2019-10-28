<?php


namespace App\Modelos;

use App\Modelos\Herramientas;
use App\productos as producto;
use App\tipoProducto;
use App\localidades;

class productos
{

    public static function obtenerTipoProductos()
    {
        return tipoProducto::all()->toArray();
    }

    public function obtenerListaProductos()
    {
        return Herramientas::collectionToArray(producto::all());
    }

    public function agregarProductos($data)
    {
        $transaccion = producto::create([
            'nombre' => $data['nombre'],
            'precio' => $data['precio'],
            'fechacompra' => $data['fechacompra'],
            'idlocalidad' => $data['idlocalidad'],
            'idtipoproducto' => $data['idtipoproducto'],
            'stock' => $data['stock']
        ]);
        return $transaccion->id;
    }

    public function buscarProductoId($id)
    {
        return Herramientas::collectionToArray(producto::where('idproductos', $id)->get())[0];
    }

    public function actualizarProductos($id, $data)
    {
        return producto::where('idproductos', $id)->update([
            'nombre' => $data['nombre'],
            'precio' => $data['precio'],
            'fechacompra' => $data['fechacompra'],
            'idlocalidad' => $data['idlocalidad'],
            'idtipoproducto' => $data['idtipoproducto'],
            'stock' => $data['stock']
        ]);
    }

    public function eliminarProducto($id)
    {
        return producto::where('idproductos', $id)->delete();
    }

}
