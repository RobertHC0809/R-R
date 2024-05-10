<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Models\gestiondeinventario;

use Illuminate\Support\Facades\Auth;
use App\Models\User as UserModel;

class Gestiondeinventarios_Controller extends Controller
{
    public function index($id_inventario)
    {
        $inventario = gestiondeinventario::find($id_inventario);
        return view('show.inventarios', ['inventario' => $inventario]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'ID_Producto' => 'required|string|max:34',
            'Cantidad_Stock' => 'required|string',
            'Ubicacion' => 'required|string',
            'Fecha_Entrada' => 'required|string',
            'Fecha_Salida' => 'required|string',
        ]);

        $inventario = new gestiondeinventario($request->all());
        $inventario->save();

        return redirect("/administrador/inventario/registro")->with('success', 'inventario registrado correctamente');
    }

    public function destroy($id_inventario)
    {
        $inventario = gestiondeinventario::find($id_inventario);

        if ($inventario) {
            $inventario->delete();
            return redirect('/administrador/inventario/registro')->with('success', 'inventario eliminado correctamente');
        } else {
            return redirect('/administrador/inventario/registro')->with('error', 'inventario no encontrado');
        }
    }

    public function show($id_inventario)
    {
        $inventarios = gestiondeinventario::find($id_inventario);
        return view('Electromecanica/RYR_ADMIN/admin_update_inventories', ['inventarios' => $inventarios]);
    }

    public function update(Request $request, $id_inventario) {
        // Validar el request
        $validatedData = $request->validate([
            'ID_Producto' => 'required',
            'Cantidad_Stock' => 'required',
            'Ubicacion' => 'required',
            'Fecha_Entrada' => 'required',
            'Fecha_Salida' => 'required',
        ]);



        $inventarios = gestiondeinventario::find($id_inventario);
        if ($inventarios) {
            $inventarios->ID_Producto = $validatedData['ID_Producto'];
            $inventarios->Cantidad_Stock = $validatedData['Cantidad_Stock'];
            $inventarios->Ubicacion = $validatedData['Ubicacion'];
            $inventarios->Fecha_Entrada = $validatedData['Fecha_Entrada'];
            $inventarios->Fecha_Salida = $validatedData['Fecha_Salida'];

            $inventarios->save();

            return view('Electromecanica/RYR_ADMIN.admin_update_inventories', ['inventarios' => $inventarios]);
        } else {
            return redirect()->back()->with('error', 'inventario no encontrado');
        }
    }


}


