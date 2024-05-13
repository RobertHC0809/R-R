<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Models\proveedores;

use Illuminate\Support\Facades\Auth;
use App\Models\User as UserModel;

class Proveedores_Controller extends Controller
{
    public function index($id_proveedor)
    {
        $proveedor = proveedores::find($id_proveedor);
        return view('show.proveedor', ['proveedor' => $proveedor]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'Nombre' => 'required|string',
            'Contacto' => 'required|string',
            'Correo_Electronico' => 'required|email',
            'Telefono' => 'required|numeric',
            'Direccion' => 'required|string',
            'Estado' => 'required|string',
        ]);

        $proveedor = new proveedores($request->all());
        $proveedor->save();

        return redirect("/administrador/proveedor/registro")->with('success', 'Proveedor registrado correctamente');
    }

    public function destroy($id_proveedor)
    {
        $proveedor = proveedores::find($id_proveedor);

        if ($proveedor) {
            $proveedor->delete();
            return redirect('/administrador/proveedor/registro')->with('success', 'Proveedor eliminado correctamente');
        } else {
            return redirect('/administrador/proveedor/registro')->with('error', 'Proveedor no encontrado');
        }
    }

    public function show($id_proveedor)
    {
        $proveedores = proveedores::find($id_proveedor);
        return view('Electromecanica/RYR_ADMIN/admin_update_suppliers', ['proveedores' => $proveedores]);
    }

    public function update(Request $request, $id_proveedor) {
        // Validar el request
        $validatedData = $request->validate([
            'Nombre' => 'required',
            'Contacto' => 'required',
            'Correo_Electronico' => 'required',
            'Telefono' => 'required',
            'Direccion' => 'required',
            'Estado' => 'required',
        ]);



        $proveedores = proveedores::find($id_proveedor);
        if ($proveedores) {
            $proveedores->Nombre = $validatedData['Nombre'];
            $proveedores->Contacto = $validatedData['Contacto'];
            $proveedores->Correo_Electronico = $validatedData['Correo_Electronico'];
            $proveedores->Telefono = $validatedData['Telefono'];
            $proveedores->Direccion = $validatedData['Direccion'];
            $proveedores->Estado = $validatedData['Estado'];

            $proveedores->save();

            return view('Electromecanica/RYR_ADMIN.admin_update_suppliers', ['proveedores' => $proveedores]);
        } else {
            return redirect()->back()->with('error', 'Proveedor no encontrado');
        }
    }


}

