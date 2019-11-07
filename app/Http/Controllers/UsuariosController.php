<?php

namespace App\Http\Controllers;

use App\Modelos\Herramientas;
use Illuminate\Http\Request;
use App\Modelos\usuarios;
use App\franquicias;

class UsuariosController extends Controller
{
    protected $usuarios;

    public function __construct()
    {
        $this->usuarios = new usuarios();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sistema.usuarios.lista')
            ->with('usuarios', $this->usuarios->listarUsuarios());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('sistema.usuarios.crear')
            ->with('franquicias', Herramientas::collectionToArray(franquicias::all()))
            ->with('tipo', $this->usuarios->obterTiposUsuarios());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $this->usuarios->agregarUsuario($request->all());
        return redirect()->route('usuarios.show', $id);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('sistema.usuarios.ver')
            ->with('usuario', $this->usuarios->buscarUsuarioId($id))
            ->with('franquicias', Herramientas::collectionToArray(franquicias::all()))
            ->with('tipo', $this->usuarios->obterTiposUsuarios());
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
        if ($this->usuarios->actualizarUsuario($request->all(), $id)) {
            return redirect()->back()->withErrors("Actualizado exitosamente");
        } else {
            return redirect()->back()->withErrors("No se pudo actualizar");
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
        if ($this->usuarios->eliminarUsuarios($id)) {
            return redirect()->route('usuarios.index')->withErrors("Eliminado exitosamente");
        } else {
            return redirect()->back()->withErrors("No se pudo eliminar");
        }
    }
}
