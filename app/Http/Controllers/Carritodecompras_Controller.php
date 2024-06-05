<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Models\carritodecompras;

use Illuminate\Support\Facades\Auth;
use App\Models\User as UserModel;

class Carritodecompras_Controller extends Controller
{
    
    
    public function create(Request $request)
    {
        $request->validate([
            'ID_Producto' => 'required|string',
            'Cantidad' => 'required',
            'Nombre' => 'required|string',
            
        ]);
        
        $carrito = new carritodecompras($request->all());
        $id  = Auth::user()->ID_Usuario;
        $carrito-> ID_Usuario = $id;
        $carrito-> estado_carrito = 'Procesado';
        $carrito->save();

        return redirect("/administrador/carrito/registro")->with('success', 'Producto registrado correctamente');
    }

    public function destroy($ID_Carrito)
    {
        $carrito = carritodecompras::find($ID_Carrito);

        if ($carrito) {
            $carrito->delete();
            return redirect('/administrador/carrito/registro')->with('success', 'Carrito eliminado correctamente');
        } else {
            return redirect('/administrador/carrito/registro')->with('error', 'Carrito no encontrado');
        }
    }
}
