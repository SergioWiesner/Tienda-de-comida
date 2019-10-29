<?php


namespace App\Modelos;

use App\productos as producto;
use App\tipoProducto;


class productos
{

    public static function obtenerTipoProductos()
    {
        return Herramientas::collectionToArray(tipoProducto::all());
    }

    public static function obtenerProveedores()
    {
        return tipoProducto::all()->toArray();
    }

    public function obtenerListaProductos()
    {
        return Herramientas::collectionToArray(producto::all());
    }

    public function agregarProductos($data)
    {
        $stock = $data['stock'];
        if (is_null($data['stock'])) {
            $stock = 1000000000;
        }
        $transaccion = producto::create([
            'nombre' => $data['nombre'],
            'precio' => $data['precio'],
            'fechacompra' => $data['fechacompra'],
            'idlocalidad' => $data['idlocalidad'],
            'idtipoproducto' => $data['idtipoproducto'],
            'stock' => $stock
        ]);
        return $transaccion->id;
    }

    public function buscarProductoId($id)
    {
        try {
            return Herramientas::collectionToArray(producto::where('idproductos', $id)->get())[0];
        } catch (\Exception $e) {
            abort(404);
        }
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
