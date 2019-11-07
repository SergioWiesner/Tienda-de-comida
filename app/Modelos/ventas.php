<?php


namespace App\Modelos;

use App\ventas as ventasBD;
use App\detallesVentas;
use App\Modelos\clientes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class ventas
{

    public function crearVenta($data)
    {
        if (isset($data['idcliente']) && !is_null($data['idcliente'])) {
            $idcliente = $data['idcliente'];
        } else {
            $cli = new clientes();
            $idcliente = $cli->crearCliente($data['clientes']);
        }

        $hoy = Carbon::now();
        $venta = ventasBD::create([
            'idcliente' => $idcliente,
            'valortotal' => $data['valortotal'],
            'puntos' => self::calculoPuntos($data['valortotal']),
            'utilizados' => false,
            'fechaventa' => $hoy->toDateString(),
            'idempleado' => Auth::user()->id
        ]);
        if (!self::registrarProductosVenta($venta->idventa, $data['producto'])) {
            self::eliminarVenta($venta->idventa);
            return false;
        }

        return $venta->idventa;
    }

    public function registrarProductosVenta($idventa, $productos)
    {

        try {
        for ($a = 0; $a < count($productos['id']); $a++) {
            detallesVentas::create([
                'idventa' => $idventa,
                'idproducto' => $productos['id'][$a],
                'cantidad' => $productos['cantidad'][$a],
                'valor' => ($productos['cantidad'][$a] * $productos['valorunidad'][$a])
            ]);
            productos::descuentoStock($productos['id'][$a], $productos['valorunidad'][$a]);
        }
        return true;
        } catch (\Exception $e) {
            self::eliminarProductosVenta($idventa);
            for ($a = 0; $a < count($productos['id']); $a++) {
                productos::aumentoStock($productos['id'][$a], $productos['valorunidad'][$a]);
            }
        }
        Log::error("Error al registrar producto de la venta " . $idventa . " ERROR :> " . $e->getMessage());
        return false;
    }

    public function eliminarProductosVenta($id)
    {
        return detallesVentas::where('idventa', $id)->delete();
    }

    public function eliminarVenta($id)
    {
        return ventasBD::where('idventa', $id)->delete();
    }

    public function calculoPuntos($valorcompra)
    {
        return (($valorcompra * 10) / 10000);
    }

    public function listarVentas()
    {
        return Herramientas::collectionToArray(ventasBD::all());
    }

    public static function listarVentasInforme()
    {
        return Herramientas::collectionToArray(ventasBD::with('clientes')->with('detallesventas.producto')->with('empleado')->get());
    }

    public function buscarVenta($id)
    {
        $data = Herramientas::collectionToArray(ventasBD::where('idventa', $id)->with('clientes')->with('detallesventas.producto')->with('empleado')->get());
        if (count($data) > 0) {
            return $data[0];
        } else {
            abort(404, 'No se encuentra esta venta');
        }
    }
}
