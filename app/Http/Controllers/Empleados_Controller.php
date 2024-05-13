<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Models\empleados;

use Illuminate\Support\Facades\Auth;
use App\Models\User as UserModel;

class Empleados_Controller extends Controller
{
    public function index($id_empleado)
    {
        $empleado = empleados::find($id_empleado);
        return view('show.empleado', ['empleado' => $empleado]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'Nombre' => 'required|string',
            'Apellido' => 'required|string',
            'Cargo' => 'required|string',
            'Fecha_Inicio' => 'required|date',
            'Salario' => 'required|numeric',
            'Email' => 'required|email',
            'Telefono' => 'required|string',
            'Direccion' => 'required|string',
        ]);

        $empleado = new empleados($request->all());
        $empleado->save();

        return redirect("/administrador/empleado/registro")->with('success', 'Empleado registrado correctamente');
    }

    public function destroy($id_empleado)
    {
        $empleado = empleados::find($id_empleado);

        if ($empleado) {
            $empleado->delete();
            return redirect('/administrador/empleado/registro')->with('success', 'Empleado eliminado correctamente');
        } else {
            return redirect('/administrador/empleado/registro')->with('error', 'Empleado no encontrado');
        }
    }

    public function show($id_empleado)
    {
        $empleados = empleados::find($id_empleado);
        return view('Electromecanica/RYR_ADMIN/admin_update_employees', ['empleados' => $empleados]);
    }

    public function update(Request $request, $id_empleado) {
        // Validar el request
        $validatedData = $request->validate([
            'Nombre' => 'required',
            'Apellido' => 'required',
            'Cargo' => 'required',
            'Fecha_Inicio' => 'required',
            'Salario' => 'required',
            'Email' => 'required',
            'Telefono' => 'required',
            'Direccion' => 'required'
        ]);



        $empleados = empleados::find($id_empleado);
        if ($empleados) {
            $empleados->Nombre = $validatedData['Nombre'];
            $empleados->Apellido = $validatedData['Apellido'];
            $empleados->Cargo = $validatedData['Cargo'];
            $empleados->Fecha_Inicio = $validatedData['Fecha_Inicio'];
            $empleados->Salario = $validatedData['Salario'];
            $empleados->Email = $validatedData['Email'];
            $empleados->Telefono = $validatedData['Telefono'];
            $empleados->Direccion = $validatedData['Direccion'];

            $empleados->save();

            return view('Electromecanica/RYR_ADMIN.admin_update_employees', ['empleados' => $empleados]);
        } else {
            return redirect()->back()->with('error', 'Empleado no encontrado');
        }
    }


}

