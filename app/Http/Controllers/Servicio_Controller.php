<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Models\servicio;
use Illuminate\Support\Facades\Auth;
use App\Models\User as UserModel;

class Servicio_Controller extends Controller
{
    public function index($id_servicio)
    {
        $servicio = servicio::find($id_servicio);
        return view('show.servicio', ['servicio' => $servicio]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'Nombre' => 'required|string',
            'Descripcion' => 'required|string',
            'Precio' => 'required|string',
        ]);

        $servicio = new servicio($request->all());
        $servicio->save();

        return redirect("/administrador/servicio/registro")->with('success', 'Servicio registrado correctamente');
    }

    public function destroy($id_servicio)
    {
        $servicio = servicio::find($id_servicio);

        if ($servicio) {
            $servicio->delete();
            return redirect('/administrador/servicio/registro')->with('success', 'Servicio eliminado correctamente');
        } else {
            return redirect('/administrador/servicio/registro')->with('error', 'Servicio no encontrado');
        }
    }

    public function show($id_servicio)
    {
        $servicios = servicio::find($id_servicio);
        return view('Electromecanica/RYR_ADMIN/admin_update_servicios', ['servicios' => $servicios]);
    }

    public function update(Request $request, $id_proveedor) {
        // Validar el request
        $validatedData = $request->validate([
            'Nombre' => 'required',
            'Descripcion' => 'required',
            'Precio' => 'required',
        ]);



        $servicio = servicio::find($id_proveedor);
        if ($servicio) {
            $servicio->Nombre = $validatedData['Nombre'];
            $servicio->Descripcion = $validatedData['Descripcion'];
            $servicio->Precio = $validatedData['Precio'];

            $servicio->save();

            return view('Electromecanica/RYR_ADMIN.admin_update_servicios', ['servicio' => $servicio]);
        } else {
            return redirect()->back()->with('error', 'servicios no encontrado');
        }
    }


}

