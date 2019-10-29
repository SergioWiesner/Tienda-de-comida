<?php


namespace App\Modelos;

use App\tipoEmpleado;
use App\User;
use Illuminate\Support\Facades\Hash;

class usuarios
{

    public function obterTiposUsuarios()
    {
        return Herramientas::collectionToArray(tipoEmpleado::all());
    }

    public function listarUsuarios()
    {
        return Herramientas::collectionToArray(User::all());
    }

    public function buscarUsuarioId($id)
    {
        return Herramientas::collectionToArray(User::where('id', $id)->get())[0];
    }

    public function agregarUsuario($data)
    {
        $datos = User::create([
            'nombre' => $data['nombre'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'cedula' => $data['cedula'],
            'telefono' => $data['telefono'],
            'salario' => $data['salario'],
            'idfranquicia' => $data['idfranquicia'],
            'idtipoempleado' => $data['idtipoempleado'],
            'fechainicio' => $data['fechainicio']
        ]);
        return $datos->id;
    }

    public function actualizarUsuario($data, $id)
    {
        return User::where('id', $id)->update([
            'nombre' => $data['nombre'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'cedula' => $data['cedula'],
            'telefono' => $data['telefono'],
            'salario' => $data['salario'],
            'idfranquicia' => $data['idfranquicia'],
            'idtipoempleado' => $data['idtipoempleado'],
            'fechainicio' => $data['fechainicio']
        ]);
    }

    public function eliminarUsuarios($id)
    {
        return User::where('id', $id)->delete();
    }
}
