<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User as UserModel;

class Usuario_Controller extends Controller
{
    public function destroy($id_usuario)
    {
        $User= UserModel::find($id_usuario);

        if ($User) {
            $User->delete();
            return redirect('/administrador/usuario/usuario')->with('success', 'usuario eliminado correctamente');
        } else {
            return redirect('/administrador/usuario/registro')->with('error', 'usuario no encontrado');
        }
    }
}
