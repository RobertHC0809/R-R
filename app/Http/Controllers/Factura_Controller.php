<?php

namespace App\Http\Controllers;
use App\Mail\enviar_transfer;
use App\Mail\EmergencyCallReceived;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\factura;
use Illuminate\Support\Facades\Auth;
use App\Models\User as UserModel;

class Factura_Controller extends Controller
{
    public function create(Request $request)
	{
		$request->validate([
			'monto_total' => 'required',
            'ID_Metodo' => 'required', 
            'id_banco' => 'required',
		]);

		$factura = new factura($request->all());
		$id  = Auth::user()->ID_Usuario;
        $factura-> ID_Usuario = $id;
		$factura->save();

		$cliente = Auth::user()->email;
		Mail::to($cliente)->send(new enviar_transfer);
		return redirect("/")->with('success', 'factura registrado correctamente');
	}

}
