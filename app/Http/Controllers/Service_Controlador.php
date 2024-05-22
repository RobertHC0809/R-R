<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Models\mensaje;
use App\Mail\respuesta;
use App\Mail\EmergencyCallReceived;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User  as UserModel;

class Service_Controlador extends Controller
{
    public function index_mensaje($id_mensaje)
{
    $mensaje = mensaje::find($id_mensaje);
    return view('/show/mensaje', ['mensaje' => $mensaje]);
}


    public function registra_mensaje(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            'telefono' => 'required',
            'mensaje' => 'required',
           
        ]);

        $mensaje = new mensaje($request->all());
        $mensaje->fecha = date("Y-m-d");
        $mensaje->save();

        return redirect("/")->with('success', 'mensaje registrado correctamente');
    }

    public function destroy_mensaje($id_mensaje){
        $all = mensaje::find($id_mensaje);

        if ($all) {
            $all->delete();
            return redirect('/administrador/mensaje')->with('success', 'Todo deleted successfully');
        } else {
            return redirect('/administrador/mensaje')->with('error', 'Registro no encontrado');
        }
        
    }

    public function show_mensaje($id_mensaje) {
        $mensaje = mensaje::find($id_mensaje);
        if ($mensaje) {
            return view('Electromecanica/RYR_ADMIN/update_mensaje', ['mensaje' => $mensaje]);
        } else {
            return redirect()->route('Electromecanica/RYR_ADMIN/update_mensaje')->with('error', 'Mensaje no encontrado');
        }
    }
    

    public function update_mensaje(Request $request, $id_mensaje) {
        // Validar el request
        $validatedData = $request->validate([
            'respuesta' => 'required',
        ]);
    
        // Buscar el registro existente
        $all = mensaje::find($id_mensaje);
        if ($all) {
            $all->respuesta = $validatedData['respuesta'];
            $all->save();
            $mensaje = db::table('mensaje')->where('id_mensaje', $all->id_mensaje)->first();
            $correo = $mensaje->email;

            Mail::to($correo)->send(new respuesta($mensaje->id_mensaje));
            
    
            return view('Electromecanica/RYR_ADMIN/update_mensaje', ['mensaje' => $all]);
        } else {
            return redirect('Electromecanica/RYR_ADMIN/update_mensaje')->with('error', 'Registro no encontrado');
        }
    }


}

