<?php


namespace App\Modelos;
use App\User;

class usuarios
{

    public function listarUsuarios(){
        return Herramientas::collectionToArray(User::all());
    }

    public function buscarUsuarioId($id){
        return Herramientas::collectionToArray(User::where('id', $id)->get())[0];
    }
}
