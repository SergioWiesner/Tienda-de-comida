<?php

namespace App\Http\Controllers;

use App\Modelos\Herramientas;
use App\Modelos\proveedores;
use Illuminate\Http\Request;
use App\Modelos\productos;
use App\Http\Requests\productosRequest;
use App\tipoProducto;
use App\localidades;


class productosController extends Controller
{
    protected $productos;

    public function __construct()
    {
        $this->productos = new productos();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sistema.productos.lista')
            ->with('productos', $this->productos->obtenerListaProductos());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('sistema.productos.crear')
            ->with('tipo', productos::obtenerTipoProductos())
            ->with('localidad', Herramientas::collectionToArray(localidades::all()))
            ->with('proveedores', proveedores::listarProveedores());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(productosRequest $request)
    {
        $id = $this->productos->agregarProductos($request->all());
        return redirect()->route('productos.show', $id);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('sistema.productos.ver')
            ->with('data', $this->productos->buscarProductoId($id))
            ->with('tipo', productos::obtenerTipoProductos())
            ->with('localidad', Herramientas::collectionToArray(localidades::all()))
            ->with('proveedores', proveedores::listarProveedores());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($this->productos->actualizarProductos($id, $request->all())) {
            return redirect()->back()->withErrors('Se ha actualizado exitosamente.');
        } else {
            return redirect()->back()->withErrors('No se ha podido actualizar.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->productos->eliminarProducto($id)) {
            return redirect()->route('productos.index')->withErrors("El producto se ha eliminado exitosamente.");
        } else {
            return redirect()->back()->withErrors("No se pudo eliminae el producto.");
        }
    }
}
