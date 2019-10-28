<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\franquicias;
use App\Modelos\Herramientas;
use App\Modelos\usuarios;

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
            ->with('franquicias', Herramientas::collectionToArray(franquicias::all()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
            ->with('usuarios', $this->usuarios->buscarUsuarioId($id));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
