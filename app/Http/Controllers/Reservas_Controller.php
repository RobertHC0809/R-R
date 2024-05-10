<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Models\reserva;
use Illuminate\Support\Facades\Auth;
use App\Models\User as UserModel;

class Reservas_Controller extends Controller
{
    public function index($id_reserva)
    {
        $reserva = reserva::find($id_reserva);
        return view('show.reserva', ['reserva' => $reserva]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'ID_Usuario' => 'required|string',
            'ID_Servicio' => 'required|string',
            'Fecha' => 'required|string',
            'Hora' => 'required|string',
        ]);

        $reserva = new reserva($request->all());
        $reserva->save();

        return redirect("/administrador/reserva/registro")->with('success', 'Reserva registrada correctamente');
    }

    public function destroy($id_reserva)
    {
        $reserva = reserva::find($id_reserva);

        if ($reserva) {
            $reserva->delete();
            return redirect('/administrador/reserva/registro')->with('success', 'Reserva eliminada correctamente');
        } else {
            return redirect('/administrador/reserva/registro')->with('error', 'Reserva no encontrada');
        }
    }

    public function show($id_reserva)
    {
        $reserva = reserva::find($id_reserva);
        return view('Electromecanica/RYR_ADMIN/admin_update_reserva', ['reserva' => $reserva]);
    }

    public function update(Request $request, $id_reserva) {
        // Validar el request
        $validatedData = $request->validate([
            'ID_Usuario' => 'required',
            'ID_Servicio' => 'required',
            'Fecha' => 'required',
            'Hora' => 'required',
        ]);



        $reserva = reserva::find($id_reserva);
        if ($reserva) {
            $reserva->ID_Usuario = $validatedData['ID_Usuario'];
            $reserva->ID_Servicio = $validatedData['ID_Servicio'];
            $reserva->Fecha = $validatedData['Fecha'];
            $reserva->Hora = $validatedData['Hora'];

            $reserva->save();

            return view('Electromecanica/RYR_ADMIN/admin_update_reserva', ['reserva' => $reserva]);
        } else {
            return redirect()->back()->with('error', 'reserva no encontrada');
        }
    }


}