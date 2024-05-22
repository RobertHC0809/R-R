<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Models\Pedido;

use Illuminate\Support\Facades\Auth;
use App\Models\User as UserModel;

class Pedido_Controller extends Controller
{
    public function index($id_pedido)
    {
        $pedido = pedido::find($id_pedido);
        return view('show.pedido', ['pedido' => $pedido]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'id_users' => 'required|string',
            'producto' => 'required|string',
            'cantidad' => 'required|string',
            'fecha_pedido' => 'required|string',
            'estado' => 'required|string',

        ]);

        $pedido = new pedido($request->all());
        $pedido->save();

        return redirect("/administrador/pedido/registro")->with('success', 'pedido registrado correctamente');
    }

    public function destroy($id_pedido)
    {
        $pedido = pedido::find($id_pedido);

        if ($pedido) {
            $pedido->delete();
            return redirect('/administrador/pedido/registro')->with('success', 'pedido eliminado correctamente');
        } else {
            return redirect('/administrador/pedido/registro')->with('error', 'pedido no encontrado');
        }
    }


    public function update(Request $request, $id_pedido) {
        // Validar el request
        $validatedData = $request->validate([
            'id_users' => 'required',
            'producto' => 'required',
            'cantidad' => 'required',
            'fecha_pedido' => 'required',
            'estado' => 'required',
        ]);

        $pedidos = pedido::find($id_pedido);
        if ($pedidos) {
            $pedidos->id_users = $validatedData['id_users'];
            $pedidos->producto = $validatedData['producto'];
            $pedidos->cantidad = $validatedData['cantidad'];
            $pedidos->fecha_pedido = $validatedData['fecha_pedido'];
            $pedidos->estado = $validatedData['estado'];

            $pedidos->save();

            return view('Electromecanica/RYR_ADMIN.admin_update_pedido', ['pedidos' => $pedidos]);
        } else {
            return redirect()->back()->with('error', 'pedido no encontrado');
        }
    }

    public function show($id_pedido)
    {
        $id = Auth::user()->id_users;
        $pedidos = pedido::find($id_pedido);
        return view('Electromecanica/RYR_ADMIN/admin_update_pedido', ['pedidos' => $pedidos]);
    }

}

